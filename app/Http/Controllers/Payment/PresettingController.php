<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Custom;
use App\Models\ProductMana\Trade;
use Illuminate\Http\Request;

class PresettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        
        return view('payment.presetting.create');
        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $custom = new Custom();
        $custom->name = $request->custom_first_name.' '. $request->custom_last_name;
        $custom->kana = $request->custom_first_kana.' '. $request->custom_last_kana;
        $custom->address = $request->custom_prefecture.' '.$request->custom_city.' '.$request->custom_address . ' ' . $request->custom_building;
        $custom->phone = $request->custom_phone;
        $custom->gendar = $request->gendar; 
        $custom->birthday = $request->birth_year . ' ' . $request->birth_month;
        $custom->save();

        return $this->show($custom->id);
        
    }
    public function store2(Request $request)
    {
        //
        
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        dd($id);
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
