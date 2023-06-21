<?php

namespace App\Http\Controllers;

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

        $page = $request->page ?? 0;

        return view('profile.index', compact('page', 'user'));
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


        return redirect()
            ->route('profile.index', ['page' => 1]);
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