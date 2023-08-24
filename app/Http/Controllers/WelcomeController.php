<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Session;
use App\Models\ProductMana\Trade;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index(Request $request){
        if(Session::get('login')){
            Session::forget('login');
        }
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
        
        return view('welcome')
            ->with('models', $models)
            ->with('pageSize', $pageSize);
    }
}
