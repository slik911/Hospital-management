<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;

class AdminController extends Controller
{
    public function index()
    {

        return redirect('/admin/staff');
    }

    public function staff()
    {
        $staffs = User::where('status', false)->where('role', '!=', 'admin')->get();
        return view('admin.staff', compact('staffs'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'role' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else {
            $staff = new User;
            $staff->name = $request->input('name');
            $staff->email = $request->input('email');
            $staff->phone = $request->input('phone');
            $staff->address = $request->input('address');
            $staff->gender = $request->input('gender');
            $staff->role = $request->input('role');
            $staff->password = bcrypt('password');
           if($request->role == 'doctor')
           {
            $staff->specialty = $request->specialty;
           }

            if ((User::where('email', $request->input('email'))->orWhere('phone', $request->input('phone'))  )->exists())
            {
                Session::flash('errors', 'Email or phone number already exists');
                return redirect()->back();
            }
            else
            {
                $staff->save();
                Session::flash('success', 'Staff Registered Successfully');
                return redirect('/admin/staff');
            }
        }

    }

    public function show(Request $request)
    {
        $staff = User::where('id', $request->id)->first();
        return response()->json($staff);
    }

    public function update(Request $request)
    {

                $staff = User::where('id', $request->id)->first();
                $staff->name = $request->name;
                $staff->email = $request->email;
                $staff->phone = $request->phone;
                $staff->address = $request->address;
                $staff->gender = $request->gender;
                $staff->role = $request->role;
                if($request->role == 'doctor')
            {
                $staff->specialty = $request->specialty;
            }
                $staff->save();
                return back()->with('success', 'Staff Details Updated Successfully');
    }

    public function block($id)
    {
        $staff = User::where('id', $id)->first();
        $staff->active = !$staff->active;
        $staff->save();
        return back()->with('success', 'Staff Status Updated Successfully');

    }

    public function delete($id)
    {
        $staff = User::where('id', $id)->first();
        $staff->status = true;
        $staff->save();
        return back()->with('success', 'Staff Deleted Successfully');
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
