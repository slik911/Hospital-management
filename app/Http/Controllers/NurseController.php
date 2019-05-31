<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Diagnosis;
use App\User;

class NurseController extends Controller
{
    public function index()
    {
        $pats = Patient::where('status', false)->where('admitted', true)->count();
        $docs = User::where('status', false)->where('checked_in', true)->get();
        return view('nurse.index', compact('pats', 'docs'));
    }
    public function patient()
    {
        $patients = Patient::where('status', false)->where('admitted', true)->get();
        return view('nurse.patient', compact('patients'));
    }
    public function viewDiagnosis($id)
    {
        $patients = Diagnosis::latest()->where('patient_id', $id)->get();
        $patient = Patient::where('id', $id)->first();
        return view('nurse.PatientDiagnosis', compact('patients', 'patient'));
    }

    public function profile()
    {
        return view('nurse.profile');
    }

    public function view($id)
    {
        $patient = Patient::where('id', $id)->first();
        return view('nurse.patient_details', compact('patient'));
    }
}
