<?php

namespace App\Http\Controllers\ProductMana;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductMana\Trade;
use Auth;
use Carbon\Carbon;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $pageSize = $request->pageSize ?? 10;
        $user_id = Auth::user()->id;

        $ids = [];
        $check = [];
        $models = Trade::orderby('trade_date', 'desc')->get();

        foreach ($models as $k => $m) {
            $id = $m->id;
            $product_id = $m->product_id;

            if ($m->type != 1) {
                array_push($ids, $id);
                $check[$product_id] = 1;
                continue;
            }

            if ($m->target_user_id != $user_id) {
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


        $models = Trade::whereNotIn('id', $ids)
            ->orderby('trade_date', 'asc');

        $models = $models->paginate($pageSize);
        $models->appends(['pageSize' => $pageSize]);

        return view('productMana.sale.index')
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

        return view('productMana.sale.create')
            ->with('model', $model);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $id = $request->id;
        $user_id = Auth::user()->id;
        $modelSource = Trade::find($id);
        if ($modelSource->target_user_id != $user_id) {
            exit;
        }

        $model = new Trade();

        $model->product_id = $modelSource->product_id;
        $model->source_user_id = Auth::user()->id;
        $model->target_user_id = 1;
        $model->money_amount = $modelSource->money_amount;
        $model->type = 2;
        $model->store_state = 0;
        $model->destination = '';
        $model->trade_date = Carbon::now();

        $model->save();

        return redirect()->route('sale.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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