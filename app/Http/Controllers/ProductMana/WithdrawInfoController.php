<?php

namespace App\Http\Controllers\ProductMana;

use App\Http\Controllers\Controller;
use App\Models\ProductMana\WithdrawalInfo;
use Illuminate\Http\Request;

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

        $models = WithdrawalInfo::where('trade_date', '>=', $stDateTime)->where('trade_date', '<=', $edDateTime)->orderby('trade_date', 'asc');
        $models = $models->where('type', -1)->where('state', 1);
        $models = $models->paginate($pageSize);
        $models->appends(compact('pageSize', 'stDate', 'edDate'));

        return view('productMana.withdraw_info.index', compact('pageSize', 'stDate', 'edDate', 'models'));
    }

    public function list(Request $request)
    {
        $pageSize = $request->pageSize ?? 10;
        $state = $request->state ?? -1;

        $models = WithdrawalInfo::orderby('trade_date', 'asc');
        $models = $models->where('type', -1)->get();

        $ids = [];
        if ($state != -1) {
            foreach ($models as $key => $model) {
                if ($state != $model->isWithdrawableState()) {
                    array_push($ids, $model->id);
                }
            }
        }

        $models = WithdrawalInfo::whereNotIn('id', $ids)->where('type', -1)->orderby('trade_date', 'asc');

        $models = $models->paginate($pageSize);
        $models->appends(compact('pageSize', 'state'));

        return view('productMana.withdraw_info.list', compact('pageSize', 'state', 'models'));
    }


    public function exportCSV(Request $request)
    {

        $crtDate = Date('Y-m-d');
        $stDate = $request->stDate ?? $crtDate;
        $edDate = $request->edDate ?? $crtDate;
        $stDate = strcmp($stDate, $edDate) < 0 ? $stDate : $edDate;
        $stDateTime = $stDate . ' 00:00:00';
        $edDateTime = $edDate . ' 23:59:59';

        $models = WithdrawalInfo::where('state', 0)->where('date', '>=', $stDateTime)->where('date', '<=', $edDateTime)->orderby('date', 'asc');
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
                $row['価格(円)'] = $model->amount;
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
}