<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class ProfileController extends Controller
{
    public function password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else {
            if($request->password != $request->confirm_password)
            {
                return back()->with('error', 'Password does not match!');
            }
            else{
                 $user = User::where('id', Auth::user()->id)->first();
                $user->password = bcrypt($request->password);
                $user->save();

                return redirect()->back()->with('success', 'Password updated successfully');
            }
        }
    }

    public function update(Request $request)
    {


            $user = User::where('id', Auth::user()->id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $user->address = $request->address;

            $user->save();

            return redirect()->back()->with('success', 'Profile updated successfully');
        
    }
}
