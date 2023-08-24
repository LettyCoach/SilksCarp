<?php

namespace App\Http\Controllers;

use Session;
use App\Models\ProductMana\Trade;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class NoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $id = $request->id;
        Session::put('login', $id);
        $model = Trade::find($id);
        return view('nogin.index')
            ->with('model', $model);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $user_id = Auth::user()->id;
        $money = User::find($user_id)->destination_address;
        if($money){
            return redirect()->route('square.index', ['model'=>$request->id]);
        }
            
        return view('nogin.create')
            ->with('trade_id', $request->id);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'destination_address' => ['required', 'string'],
                'post_code' => ['required', 'string'],
                'prefecture' => ['required', 'string'],
                'city' => ['required', 'string'],
                'street' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'birth' => ['required', 'date'],
            ],
            $messages = [
                'destination_address.required' => '必須項目です。',
                'post_code.required' => '必須項目です。',
                'prefecture.required' => '必須項目です。',
                'city.required' => '必須項目です。',
                'street.required' => '必須項目です。',
                'phone.required' => '必須項目です。',
                'birth.required' => '必須項目です。',
                
            ]
        );
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->destination_address = $request->destination_address;
        $user->save();


        $profile = new Profile();
        $profile->post = $request->post_code;
        $profile->prefecture = $request->prefecture;
        $profile->city = $request->city;
        $profile->street = $request->street;
        $profile->building = $request->building;
        $profile->phone = $request->phone;
        $profile->gender = $request->gender;
        $profile->birth = $request->birth;
        $profile->user_id = $user_id;
        $profile->save();

        return redirect()->route('square.index', ['model'=>$request->trade_id]);
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
