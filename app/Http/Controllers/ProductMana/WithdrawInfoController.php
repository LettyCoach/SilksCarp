<?php

namespace App\Http\Controllers\ProductMana;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductMana\Trade;

class WithdrawInfoController extends Controller
{
    //
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

}
