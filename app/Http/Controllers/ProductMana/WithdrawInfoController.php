<?php

namespace App\Http\Controllers\ProductMana;

use App\Http\Controllers\Controller;
use App\Mail\WithdrawMail;
use App\Models\Alarm\AlarmToIndividual;
use App\Models\MessageMana\MessageSub;
use App\Models\ProductMana\WithdrawalInfo;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;

class WithdrawInfoController extends Controller
{
    //
    public function index(Request $request)
    {
        $pageSize = $request->pageSize ?? 10;

        $firstDate = Date('Y-m') . '-01';
        $crtDate = Date('Y-m-d');
        $stDate = $request->stDate ?? $firstDate;
        $edDate = $request->edDate ?? $crtDate;
        $stDate = strcmp($stDate, $edDate) < 0 ? $stDate : $edDate;
        $stDateTime = $stDate . ' 00:00:00';
        $edDateTime = $edDate . ' 23:59:59';

        $models = WithdrawalInfo::where('updated_at', '>=', $stDateTime)->where('updated_at', '<=', $edDateTime)->orderby('updated_at', 'asc');
        $models = $models->where('type', -1)->where('state', 1);
        $models = $models->paginate($pageSize);
        $models->appends(compact('pageSize', 'stDate', 'edDate'));

        return view('productMana.withdraw_info.index', compact('pageSize', 'stDate', 'edDate', 'models'));
    }

    public function list(Request $request)
    {
        $pageSize = $request->pageSize ?? 10;
        $state = $request->state ?? 1;
        
        $models = WithdrawalInfo::orderby('trade_date', 'asc');
        $models = $models->where('type', -1)->get();
        
        $ids = [];
        if ($state != -1) {
            foreach ($models as $key => $model) {
                if ($state != $model->isWithdrawableState()) {
                    array_push($ids, $model->id);
                }
                if ( $state == 1 ){
                    if( $model->state == 1 ){
                        array_push($ids, $model->id);
                    }
                }
            }
        }
        $models = WithdrawalInfo::whereNotIn('id', $ids)->where('state', 0)->where('type', -1)->orderby('trade_date', 'asc');

        $models = $models->paginate($pageSize);
        $models->appends(compact('pageSize', 'state'));

        return view('productMana.withdraw_info.list', compact('pageSize', 'state', 'models'));
    }
    
    public function withdraw(Request $request) {
        $models = WithdrawalInfo::orderby('trade_date', 'asc');
        $models = $models->where('type', -1)->get();
        $ids = [];
        $datas = [];
        foreach ($models as $key => $model) {
            if ($model->isWithdrawableState()) {
                $model->state = 1;
                $model->save();

                // $message_id = $model->description;
                // $message = new MessageSub();
                // $message->title = "出金通知";
                // $message->content = $model->money_real . "円のお金が" . Carbon::today()->format('Y 年 m 月 d 日') . "出金されました。";
                // $message->type = 1;
                // $message->message_id = $message_id;
                // $message->parent_id = null;
                // $message->read_date = "2000-01-01 00:00:00";

                // $message->save();

                if(!in_array($model->targetUser->id, $ids)) {
                    array_push($ids, $model->targetUser->id);
                    $tmp_array = [$model->targetUser->id, $model->money_real];
                    array_push($datas, $tmp_array);
                }
            }
        }
        foreach($datas as $key=>$data) {
            $id = $data[0];
            $val = $data[1];
            $date = Carbon::now()->format('Y-m-d');
            $alarm = new AlarmToIndividual();
            $alarm->user_id = $id;
            $alarm->type = 2;
            // $alarm->description = '申請した金額が'. $date .'に出金されました。';
            $alarm->read_date = '2000-01-01 00:00:00';
    
            $alarm->save();

            $user = User::find($id);
            $mailData = [
                'user' => $user->name,
                'date' => Carbon::now()->format('Y-m-d')
            ];


            // ------------------mail send---------------------------

            
            // Mail::to($user->email)->send(new WithdrawMail($mailData));
        }
        return redirect()->route('withdraw-info.list')->with('message', '操作が成功しました。');
    }


    public function exportCSV(Request $request)
    {

        $crtDate = Date('Y-m-d');
        $stDate = $request->stDate ?? $crtDate;
        $edDate = $request->edDate ?? $crtDate;
        $stDate = strcmp($stDate, $edDate) < 0 ? $stDate : $edDate;
        $stDateTime = $stDate . ' 00:00:00';
        $edDateTime = $edDate . ' 23:59:59';

        $models = WithdrawalInfo::where('state', 1)->where('updated_at', '>=', $stDateTime)->where('updated_at', '<=', $edDateTime)->orderby('updated_at', 'asc');
        $models = $models->get();

        $fileName = 'withdraw-info.csv';

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = array('No', '買い手', '価格(円)', '銀行名', '口座番号', '説明', '販売日');
        foreach ($columns as $i => $column) {
            $columns[$i] = mb_convert_encoding($column, "SJIS", "UTF-8");
        }
        $callback = function () use ($models, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($models as $i => $model) {
                $row['No'] = $i + 1;
                $row['買い手'] = mb_convert_encoding($model->targetUser->name, "SJIS", "UTF-8");
                $row['価格(円)'] = $model->money_real;
                $row['銀行名'] = $model->money->bankName;
                $row['口座番号'] = $model->money->accountNum;
                $row['説明'] = mb_convert_encoding($model->description, "SJIS", "UTF-8");
                $row['販売日'] = $model->getTradeDate();

                fputcsv($file, array($row['No'], $row['買い手'], $row['価格(円)'], $row['銀行名'], $row['口座番号'], $row['説明'], $row['販売日']));
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function applyCSV() {

        $admin_id = Auth::user()->id;
        $admin = User::find($admin_id);
        $admin_name = mb_convert_encoding($admin->name, "SJIS", "UTF-8");
        $models = WithdrawalInfo::where('type', -1)->orderby('trade_date', 'DESC')->get();

        $ids = [];
        foreach ($models as $key => $model) {
            if($model->state == 1) {
                array_push($ids, $model->id);
            }
            if (!$model->isWithdrawableState()) {
                array_push($ids, $model->id);
            }
        }
        $models = WithdrawalInfo::whereNotIn('id', $ids)->where('type', -1)->orderby('trade_date', 'DESC')->get();

        $fileName = 'withdraw-apply.csv';
        
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        
        $columns = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P');
        
        foreach ($columns as $i => $column) {
            $columns[$i] = mb_convert_encoding($column, "SJIS", "UTF-8");
        }

        $callback = function () use ($models, $columns) {
            $headers = array('1', '21', '0', '8818002600', 'yamada', '0901', '9', 'mitsui', '410', 'simmi', '1', '185018', '', '', '', '');
            
            $file = fopen('php://output', 'w');
            fputcsv($file, $headers);

            $total_money = 0;
            foreach ($models as $i => $model) {
                $total_money += $model->money_real;
                $row['A'] = '2';
                $row['B'] = '1';
                $row['C'] = mb_convert_encoding($model->money->bankName, "SJIS", "UTF-8");
                $row['D'] = $model->money->pointNum;
                $row['E'] = mb_convert_encoding($model->money->pointName, "SJIS", "UTF-8");
                $row['F'] = '0';
                $row['G'] = '1';
                $row['H'] = $model->money->accountNum;
                $row['I'] = mb_convert_encoding($model->targetUser->name, "SJIS", "UTF-8");
                $row['J'] = $model->money_real;
                $row['K'] = 0;
                $row['L'] = $model->money->recipientNum;
                $row['M'] = '';
                $row['N'] = '7';
                $row['O'] = '';
                $row['P'] = '';

                fputcsv($file, array($row['A'], $row['B'], $row['C'], $row['D'], $row['E'], $row['F'], $row['G'], $row['H'], $row['I'], $row['J'], $row['K'], $row['L'], $row['M'], $row['N'], $row['O'], $row['P'],));
            }

            $row['A'] = 8;
            $row['B'] = $models->count();
            $row['C'] = $total_money;

            fputcsv($file, array($row['A'], $row['B'], $row['C']));

            $row['A'] = 9;

            fputcsv($file, array($row['A']));


            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}