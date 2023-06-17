<?php

namespace App\Http\Controllers\ProductMana;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Common;
use App\Models\ProductMana\Product;
use DB;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $pageSize = 10;
        if (isset($request->pageSize)) {
            $pageSize = $request->pageSize;
        }
        $models = Product::orderby('created_at', 'desc');
        $models = $models->paginate($pageSize);
        $models->appends(['pageSize' => $pageSize]);
        return view('productMana.product.index')
            ->with('pageSize', $pageSize)
            ->with('models', $models);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $model = new Product();
        $model->images = "[]";

        return view('productMana.product.create')
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
                'name' => ['required', 'string'],
                'price' => ['required', 'integer'],
                'cost' => ['required', 'integer'],
            ],
            $messages = [
                'name.required' => '必須項目です。',
                'price.required' => '必須項目です。',
                'cost.required' => '必須項目です。',
                'price.integer' => '数字を入力する必要があります。',
                'cost.integer' => '数字を入力する必要があります。'
            ]
        );


        $model = new Product();
        $model->name = $request->name;
        $model->images = $request->images;
        $model->price = $request->price;
        $model->description = $request->description ?? "";
        // $model->description = $request->description != null ? $request->description : "";
        $model->cost = $request->cost;
        $model->supplier_url = $request->supplier_url ?? "";
        // $model->supplier_url = $request->supplier_url != null ? $request->supplier_url : "";
        $model->other = '';

        $model->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $model = Product::find($id);

        return view('productMana.product.show')
            ->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $model = Product::find($id);

        return view('productMana.product.edit')
            ->with('model', $model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'name' => ['required', 'string'],
                'price' => ['required', 'integer'],
                'cost' => ['required', 'integer'],
            ],
            $messages = [
                'name.required' => '必須項目です。',
                'price.required' => '必須項目です。',
                'cost.required' => '必須項目です。',
                'price.integer' => '数字を入力する必要があります。',
                'cost.integer' => '数字を入力する必要があります。'
            ]
        );

        $model = Product::find($id);
        $model->name = $request->name;
        $model->images = $request->images;
        $model->price = $request->price;
        $model->description = $request->description ?? "";
        // $model->description = $request->description != null ? $request->description : "";
        $model->cost = $request->cost;
        $model->supplier_url = $request->supplier_url ?? "";
        // $model->supplier_url = $request->supplier_url != null ? $request->supplier_url : "";
        $model->other = '';

        $model->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $model = Product::find($id);
        $model->delete();
        return redirect()->route('product.index');
    }
}