<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class ProfileController extends Controller
{
    //

    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        
        $profile = Profile::where('user_id', $user_id)->get()->first();
        if(!$profile){
            $profile = new Profile();
            $profile->user_id = $user_id;

            $profile->save();
        }

        $page = $request->page ?? 0;

        return view('profile.index', compact('page', 'user', 'profile'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string']
            ],
            $messages = [
                'name.required' => '必須項目です。'
            ]
        );

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->name = $request->name ?? ".";
        $user->destination_address = $request->destination_address ?? "";

        $user->save();

        $profile = Profile::where('user_id', $user_id)->get()->first();
        if(!$profile){
            $profile = new Profile();
            $profile->user_id = $user_id;
        }
        $profile->post = $request->post_code;
        $profile->prefecture = $request->prefecture;
        $profile->city = $request->city;
        $profile->street = $request->street;
        $profile->building = $request->building;
        $profile->phone = $request->phone;
        $profile->gender = $request->gender;
        $profile->birth = $request->birth;
        $profile->save();

        return redirect()
            ->route('profile.index', ['page' => 0]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'nullable|required_with:newPassword',
            'newPassword' => 'nullable|min:8|required_with:currentPassword',
            'renewPassword' => 'nullable|min:8|required_with:newPassword|same:newPassword'
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if (!is_null($request->input('currentPassword'))) {
            if (Hash::check($request->input('currentPassword'), $user->password)) {
                $user->password = $request->input('newPassword');
            } else {
                // return redirect()->back()->withInput();
                $error = ValidationException::withMessages([
                    'currentPassword' => ['パスワードが間違っています。']
                ]);
                throw $error;
            }
        }

        $user->save();
        return redirect()
            ->route('profile.index', ['page' => 2]);
    }
}