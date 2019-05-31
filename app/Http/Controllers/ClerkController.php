<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Appointment;
use App\User;

use Illuminate\Support\Facades\Auth;

class ClerkController extends Controller
{
    public function index()
    {
        $pats = Patient::where('status', false)->count();
        $docs = User::where('status', false)->where('checked_in', true)->get();
        $app = Appointment::where('approved', true)->count();
        return view('clerk.index', compact('pats', 'docs', 'app'));
    }

    public function patient()
    {
        $patients = Patient::where('status', false)->get();
        return view('clerk.patient', compact('patients'));
    }

    public function success()
    {
        $ref = session()->get( 'ref' );
        return view('clerk.success', compact('ref'));
    }

    public function appointment()
    {
        $appointments = Appointment::latest()->where('approved', true)->get();
        return view('clerk.appointment', compact('appointments'));
    }

    public function profile()
    {
        return view('clerk.profile');
    }

}
