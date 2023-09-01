<?php

namespace App\Http\Controllers\ProductMana;

use App\Http\Controllers\Controller;
use App\Models\MoneyMana\Money;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\ProductMana\Trade;
use App\Models\ProductMana\Product;
use Auth;
use Carbon\Carbon;
use Session;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->pageSize ?? 10;

        $ids = [];
        $check = [];
        $models = Trade::orderby('trade_date', 'desc')->get();
        foreach ($models as $k => $m) {
            $id = $m->id;
            $product_id = $m->product_id;

            if ($m->type == 1) {
                array_push($ids, $id);
                $check[$product_id] = 1;
                continue;
            }

            if (!isset($check[$product_id])) {
                $check[$product_id] = 1;
            } else {
                array_push($ids, $id);
            }
        }

        $models = Trade::whereNotIn('id', $ids)->orderby('trade_date', 'asc');
        $models = $models->paginate($pageSize);
        $models->appends(['pageSize' => $pageSize]);

        return view('productMana.purchase.index')
            ->with('pageSize', $pageSize)
            ->with('models', $models);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $id = $request->id;
        $model = Trade::find($id);
        return view('productMana.purchase.create')
            ->with('model', $model);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'destination' => ['required', 'string']
            ],
            $messages = [
                'destination.required' => '必須項目です。',
            ]
        );
        $user_id = Auth::user()->id;
        $money = User::find($user_id)->destination_address;
        if(!$money){
            return redirect()->route('profile.index', ['page' => 1]);
        }
        $id = $request->id;
        $modelSource = Trade::find($id);
        $model = new Trade();
        //dd($modelSource);
        $model->product_id = $modelSource->product_id;
        $model->source_user_id = 1;
        $model->target_user_id = Auth::user()->id;
        $model->money_amount = $modelSource->money_amount;
        $model->type = 1;
        $model->store_state = $request->store_state;
        $model->destination = $model->store_state == 0 ? "" : $request->destination;
        $model->trade_date = Carbon::now();


        Session::put('pModel', $model);

        // $model->save();

        // return redirect()->route('purchase.index');
        return redirect()
            ->route('square.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product_id = Trade::find($id)->product_id;
        $model = Product::find($product_id);

        return view('productMana.purchase.show')
            ->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}