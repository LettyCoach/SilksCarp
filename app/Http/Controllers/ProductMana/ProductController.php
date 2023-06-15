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
    public function index()
    {
        //
        return view('productMana.product.index')
            ->with('data', '');
    }

    public function list(Request $request)
    {

        $page = $request->page;
        $pageSize = $request->pageSize;

        $snapshot = Product::where('id', '>', 0);
        $totalCnt = $snapshot->count();

        $models = $snapshot->limit($pageSize)
            ->offset(($page - 1) * $pageSize)
            ->orderBy('id', 'asc')
            ->get();

        $stNo = ($page - 1) * $pageSize + 1;
        $links = Common::makePagination($page, $pageSize, $totalCnt, $models->count());

        return view('productMana.product.list')
            ->with('models', $models)
            ->with('stNo', $stNo)
            ->with('links', $links);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $temp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $temp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $temp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $temp)
    {
        //
    }
}