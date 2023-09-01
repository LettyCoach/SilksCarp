<?php

namespace App\Http\Controllers;

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

        $withdraw_historys = WithdrawalInfo::where('user_id', $user_id)->orderby('trade_date', 'DESC');
        
        if(isset($request->filter)){
            $filter = $request->filter;
            if($filter == 0) {
                $withdraw_historys = WithdrawalInfo::where('user_id', $user_id)->orderby('trade_date', 'DESC');
            }
            else if($filter == 1) {
                $withdraw_historys = WithdrawalInfo::where('user_id', $user_id)->where('type', 1)->orderby('trade_date', 'DESC');
            }
            else if($filter == 2) {
                $withdraw_historys = WithdrawalInfo::where('user_id', $user_id)->where('type', -1)->where('state', 0)->orderby('trade_date', 'DESC');
            }
            else if($filter == 3) {
                $withdraw_historys = WithdrawalInfo::where('user_id', $user_id)->where('type', -1)->where('state', 1)->orderby('trade_date', 'DESC');
            }
            $page = 2;
        }

        $withdraw_historys = $withdraw_historys->paginate($pageSize);
        $withdraw_historys->appends(['pageSize' => $pageSize]);
        if(isset($request->pageSize)) {
            $page = 2;
        }

        return view('moneyMana/withdraw/index', compact('page', 'money', 'pageSize' ,'withdraw_historys') );
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

        $money = Money::where('user_id', $user_id)->get()->first();
        $old_amount = $money->amount;
        $money->amount = $old_amount - $request->withdraw_amount * 1.1 ;
        $money->save();

        return redirect()->route('withdraw.index', ['page'=>0]);
    }

}
