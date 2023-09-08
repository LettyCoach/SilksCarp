<?php

namespace App\Http\Controllers;

use App\Models\MessageMana\Message;
use App\Models\MoneyMana\Money;
use App\Models\ProductMana\WithdrawalInfo;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MoneyManaController extends Controller
{
    //
    public function credit(Request $request){
        $user_id = Auth::user()->id;
        $money = Money::where('user_id', $user_id)->get()->first();
        if(!$money){
            $money = new Money();
            $money->user_id = $user_id;
            $money->save();           
        }
        $page = $request->page ?? 0;
        return view('moneyMana/credit/index',  compact('page', 'money'));
    }

    public function updateCredit(Request $request){
        $user_id = Auth::user()->id;
        $money = Money::where('user_id', $user_id )->get()->first();
        if(!$money){
            $money = new Money();
            $money->user_id = $user_id;
        }
        $money->cardNum = $request->cardNum;
        $money->cardType = $request->cardType;
        $money->period = $request->expiration;
        $money->secord = $request->cardSecret;

        $money->save();

        return redirect()
            ->route('credit.index', ['page' => 0]);
    }
    
    public function bank(Request $request){
        $user_id = Auth::user()->id;
        $money = Money::where('user_id', $user_id)->get()->first();
        if(!$money){
            $money = new Money();
            
            $money->user_id = $user_id;
            $money->save();           
        }
        $page = $request->page ?? 0;
        return view('moneyMana/bank/index',  compact('page', 'money'));
    }

    public function updateBank(Request $request){
        $user_id = Auth::user()->id;
        $money = Money::where('user_id', $user_id )->get()->first();
        if(!$money){
            $money = new Money();
            
            $money->user_id = $user_id;
        }
        $money->bankName = $request->bankName;
        $money->accountNum = $request->accountNum;
        $money->pointName = $request->pointName;
        $money->pointNum = $request->pointNum;
        $money->recipientNum = $request->recipientNum;

        $money->save();

        return redirect()
            ->route('bank.index', ['page' => 0]);
    }

    public function withdraw(Request $request){

        $pageSize = $request->pageSize ?? 10;

        $user_id = Auth::user()->id;
        $money = Money::where('user_id', $user_id)->get()->first();
        if(!$money){
            return redirect()->route('credit.index', ['page' => 0]);
        }
        
        elseif($money->bankName == ''){
            return redirect()->route('bank.index', ['page' => 1]);
        }
        $page = $request->page ?? 0;

        $withdrawInfos = WithdrawalInfo::where('user_id', $user_id)->get();
        $balance = 0;
        foreach($withdrawInfos as $key => $withdrawInfo) {
            // dd($withdrawInfo);
            $balance += $withdrawInfo->money_real * $withdrawInfo->type; 
        }
        $withdraw_historys = WithdrawalInfo::where('user_id', $user_id)->where('type', -1)->orderby('trade_date', 'DESC');
        
        if(isset($request->filter)){

            $filter = $request->filter;

            if ($filter == 1) {
                $ids = [];
                $withdraw_historys = $withdraw_historys->get();
                foreach ($withdraw_historys as $key => $withdraw_history) {
                    if ($withdraw_history->isWithdrawableState()) {
                        array_push($ids, $withdraw_history->id);
                    }
                }
                $withdraw_historys = WithdrawalInfo::whereNotIn('id', $ids)->where('type', -1)->orderby('trade_date', 'DESC');
            }
            else if ($filter == 2) {
                $ids = [];
                $withdraw_historys = $withdraw_historys->get();
                foreach ($withdraw_historys as $key => $withdraw_history) {
                    if($withdraw_history->state == 1) {
                        array_push($ids, $withdraw_history->id);
                    }
                    if (!$withdraw_history->isWithdrawableState()) {
                        array_push($ids, $withdraw_history->id);
                    }
                }
                $withdraw_historys = WithdrawalInfo::whereNotIn('id', $ids)->where('type', -1)->orderby('trade_date', 'DESC');
            }
            
            else if ($filter == 3) {
                $withdraw_historys = $withdraw_historys->where('state', 1);
            } 
            
            $page = 2;
        }
        
        $withdraw_historys = $withdraw_historys->paginate($pageSize);
        $withdraw_historys->appends(['pageSize' => $pageSize]);
        // dd($withdraw_historys);
        if(isset($request->pageSize)) {
            $page = 2;
        }

        return view('moneyMana/withdraw/index', compact('page', 'money', 'balance' , 'pageSize' ,'withdraw_historys') );
    }

    public function settingWithdraw(Request $request){
        $user_id = Auth::user()->id;

        $model = new WithdrawalInfo();
        $model->user_id = $user_id;
        $model->title = "withdraw";
        $model->money_all = $request->withdraw_amount * 1.1;
        $model->money_real = $request->withdraw_amount;
        $model->type = -1;
        $model->trade_date = Carbon::now();
        
        $model->save();
        
        $message = new Message();
        $message->user_id = $user_id;
        $message->title = "出金申請";
        $message->content = $model->targetUser->name. "様から" . $request->withdraw_amount . "円のお金が出金申請されました。";
        $message->save();

        $model->description = $message->id;
        $model->save();


        return redirect()->route('withdraw.index', ['page'=>0]);
    }

}
