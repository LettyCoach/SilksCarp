<?php

namespace App\Http\Controllers\ProductMana;

use App\Http\Controllers\Controller;
use App\Models\Tariff;
use Illuminate\Http\Request;
use App\Models\ProductMana\Trade;
use Illuminate\Support\Facades\Validator;


class SaleInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->pageSize ?? 2;

        $firstDate = Date('Y-m') . '-01';
        $crtDate = Date('Y-m-d');
        $stDate = $request->stDate ?? $firstDate;
        $edDate = $request->edDate ?? $crtDate;
        $stDate = strcmp($stDate, $edDate) < 0 ? $stDate : $edDate;
        $stDateTime = $stDate . ' 00:00:00';
        $edDateTime = $edDate . ' 23:59:59';

        $models = Trade::where('type', 1)->where('trade_date', '>=', $stDateTime)->where('trade_date', '<=', $edDateTime)->orderby('trade_date', 'asc');
        $models = $models->paginate($pageSize);
        $models->appends(compact('pageSize', 'stDate', 'edDate'));

        return view('productMana.sale_info.index', compact('pageSize', 'stDate', 'edDate', 'models'));
    }

    public function exportCSV(Request $request)
    {
        
        $crtDate = Date('Y-m-d');
        $stDate = $request->stDate ?? $crtDate;
        $edDate = $request->edDate ?? $crtDate;
        $stDate = strcmp($stDate, $edDate) < 0 ? $stDate : $edDate;
        $stDateTime = $stDate . ' 00:00:00';
        $edDateTime = $edDate . ' 23:59:59';

        $models = Trade::where('type', 1)->where('trade_date', '>=', $stDateTime)->where('trade_date', '<=', $edDateTime)->orderby('trade_date', 'asc');
        $models = $models->get();
        $fileName = 'sale-info.csv';

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = array('No', 'タイトル', '買い手', '価格(円)', '説明', '販売日');
        foreach ($columns as $i => $column) {
            $columns[$i] = mb_convert_encoding($column, "SJIS", "UTF-8");
        }

        $callback = function () use ($models, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($models as $i => $model) {
                $row['No'] = $i + 1;
                $row['タイトル'] = mb_convert_encoding($model->product->name, "SJIS", "UTF-8");
                $row['買い手'] = mb_convert_encoding($model->targetUser->name, "SJIS", "UTF-8");
                $row['価格(円)'] = $model->amount;
                $row['説明'] = mb_convert_encoding($model->description, "SJIS", "UTF-8");
                $row['販売日'] = $model->getTradeDate();

                fputcsv($file, array($row['No'], $row['タイトル'], $row['買い手'], $row['価格(円)'], $row['説明'], $row['販売日']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function tariff(Request $request){
        $tariffs = Tariff::all();

        return view('productMana.sale_info.tariff')
            ->with('tariffs', $tariffs);
    }

    public function tariffUpdate(Request $request){
        // dd($request);
            $tariffsData = $request->input('tariffs');

            // $validator = Validator::make($tariffsData, [
            //     '*.guarantee' => 'required|numeric|min:0|max:100',
            //     '*.fee' => 'required|numeric|min:0|max:100',
            //     '*.paid' => 'required|numeric|min:0|max:100',
            // ]);

            // if ($validator->fails()) {
            //     return redirect()->back()
            //         ->withErrors($validator)
            //         ->withInput();
            // }
    
            foreach ($tariffsData as $tariffData) {
                $tariff = Tariff::find($tariffData['id']);
    
                if ($tariff) {
                    $tariff->guarantee = $tariffData['guarantee'];
                    $tariff->fee = $tariffData['fee'];
                    $tariff->paid = $tariffData['paid'];
                    $tariff->save();
                }
            }
    
            return redirect()->route('sale-info.index');
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