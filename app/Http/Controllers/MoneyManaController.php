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

        $money->save();

        return redirect()
            ->route('bank.index', ['page' => 0]);
    }

    public function withdraw(Request $request){
        $user_id = Auth::user()->id;
        $money = Money::where('user_id', $user_id)->get()->first();
        if(!$money){
            return redirect()->route('credit.index', ['page' => 0]);
        }
        
        elseif($money->bankName == ''){
            return redirect()->route('bank.index', ['page' => 1]);
        }
        $page = $request->page ?? 0;

        return view('moneyMana/withdraw/index', compact('page', 'money') );
    }

    public function settingWithdraw(Request $request){
        $user_id = Auth::user()->id;
        $model = new WithdrawalInfo();
        
        $model->user_id = $user_id;
        $model->amount = $request->withdraw_amount;
        $model->state = false;
        $model->date = Carbon::today();
        
        $model->save();

        $money = Money::where('user_id', $user_id)->get()->first();
        $old_amount = $money->amount;
        $money->amount = $old_amount - $request->withdraw_amount * 1.1 ;
        $money->save();

        return redirect()->route('withdraw.index', ['page'=>0]);
    }

}
