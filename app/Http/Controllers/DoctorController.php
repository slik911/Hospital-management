<?php

namespace App\Http\Controllers;
use App\Patient;
use Illuminate\Http\Request;
use App\Diagnosis;
use Illuminate\Support\Facades\Auth;
use App\Appointment;
use App\User;

class DoctorController extends Controller
{
    public function index()
    {
        $apps = Appointment::where('read', false)->count();
        $pats = Patient::where('status', false)->count();
        $diagnosis = Diagnosis::where('staff_id', Auth::user()->id)->count();
        return view('doctor.index', compact('apps', 'pats', 'diagnosis'));
    }

    public function patient()
    {
        $patients = Patient::where('status', false)->get();
        return view('doctor.patient', compact('patients'));
    }

    public function diagnosis(Request $request)
    {
            $diagnostic = new Diagnosis;
            $diagnostic->patient_id = $request->did;
            $diagnostic->staff_id = Auth::user()->id;
            $diagnostic->diagnosis = $request->diagnosis;
            $diagnostic->previous_medication = $request->previous_medication;
            $diagnostic->conclusion = $request->conclusion;
            $diagnostic->prescription = $request->prescription;
            $diagnostic->save();

            return back()->with('success', 'Diagnosis Uploaded Successfully');
    }

    public function viewDiagnosis($id)
    {
        $patients = Diagnosis::latest()->where('patient_id', $id)->get();
        $patient = Patient::where('id', $id)->first();
        return view('doctor.PatientDiagnosis', compact('patients', 'patient'));
    }

    public function show(Request $request)
    {
        $diagnosis =Diagnosis::where('id', $request->id)->first();
        return response()->json($diagnosis);
    }

    public function update(Request $request)
    {
        $diagnosis = Diagnosis::where('id', $request->id)->first();
        $diagnosis->diagnosis = $request->input('diagnosis');
        $diagnosis->previous_medication = $request->input('previous-medication');
        $diagnosis->conclusion = $request->input('conclusion');
        $diagnosis->prescription = $request->input('prescription');
        $diagnosis->save();

        return back()->with('success', 'Diagnosis Updated Successfully');
    }

    public function delete($id)
    {
        Diagnosis::where('id', $id)->delete();
        return back()->with('success', 'Diagnosis deleted Successfully');
    }

    public function appointment()
    {
        $appointments = Appointment::latest()->where('staff_id', Auth::user()->id)->where('status', false)->get();
        return view('doctor.appointment', compact('appointments'));
    }

    public function read(Request $request)
    {
        $appointment = Appointment::where('id', $request->id)->first();
        $appointment->read = true;
        $appointment->save();
        return response()->json($appointment);
    }

    public function approve($id)
    {
        $appointment = Appointment::where('id', $id)->first();
        $appointment->approved = true;
        $appointment->save();

        return back()->with('success', 'Appointment has been approved');
    }
    public function view($id)
    {
        $patient = Patient::where('id', $id)->first();
        return view('doctor.patient_details', compact('patient'));
    }
    public function deleteAppointment($id)
    {
        $appointment = Appointment::where('id', $id)->first();
        $appointment->status = true;
        $appointment->save();

        return back()->with('success', 'Appointment has been deleted');
    }

    public function profile()
    {
        return view('doctor.profile');
    }

    public function check($id)
    {
        $check = User::where('id', $id)->first();
        $check->checked_in = !$check->checked_in;
        $check->save();
        return back()->with('success', 'Availability status has been updated');
    }
}
