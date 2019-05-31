<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Admitted;

class PatientController extends Controller
{
    public function create(Request $request)
    {
            $length = 6;
            $year = Carbon::now()->format('Y');
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $ref = '';

            for ($i = 0; $i < $length; $i++) {
                $ref .= $characters[rand(0, strlen($characters) - 1)];
            }
            $patient = new Patient;
            $patient->staff_id = Auth::user()->id;
            $patient->name = $request->input('name');
            $patient->email = $request->input('email');
            $patient->phone = $request->input('phone');
            $patient->address = $request->input('address');
            $patient->gender = $request->input('gender');
            $patient->dob = $request->input('date_of_birth');
            $patient->nnok = $request->input('name_of_kin');
            $patient->relationship = $request->input('relationship');
            $patient->phnok = $request->input('phone_number_of_kin');
            $patient->card_no = $year.$ref;
             $patient->save();

             return redirect()->route('patient.success')->with([ 'ref' => $patient ]);;

    }

    public function view($id)
    {
        $patient = Patient::where('id', $id)->first();
        return view('clerk.patient_details', compact('patient'));
    }

    public function delete($id)
    {
        $patient = Patient::where('id', $id)->first();
        $patient->status = true;
        $patient->save();
        return back()->with('success', 'Patient Deleted Successfully');

    }

    public function show(Request $request)
    {
        $patient = Patient::where('id', $request->id)->first();
        return response()->json($patient);
    }

    public function admit(Request $request)
    {
        $patient = Patient::where('id', $request->id)->first();
        $patient->admitted = true;
        $patient->save();

        $new = new Admitted;
        $new->patient_id = $patient->id;
        $new->admission_date = Carbon::now()->format('d-M-Y');
        $new->ward = $request->ward;
        $new->cause = $request->cause;
        $new->save();

        return back()->with('success','Patient has been admitted successfully');
    }

    public function discharge($id)
    {
        $patient = Patient::where('id', $id)->first();
        $patient->admitted = false;
        $patient->save();

        $new = Admitted::where('patient_id', $id)->where('discharged', false)->first();
        $new->discharged = true;
        $new->discharge_date = Carbon::now()->format('d-M-Y');
        $new->save();

        return back()->with('success','Patient has been Discharged successfully');
    }

    public function update(Request $request)
    {


            $patient = Patient::where('id', $request->id)->first();
            $patient->staff_id = Auth::user()->id;
            $patient->name = $request->input('name');
            $patient->email = $request->input('email');
            $patient->phone = $request->input('phone');
            $patient->address = $request->input('address');
            $patient->gender = $request->input('gender');
            $patient->dob = $request->input('date_of_birth');
            $patient->nnok = $request->input('name_of_kin');
            $patient->relationship = $request->input('relationship');
            $patient->phnok = $request->input('phone_number_of_kin');
            $patient->save();

             return back()->with('success', 'Patient Details updated successfully');
    }

    public function history($id)
    {
        $patients = Admitted::where('patient_id', $id)->get();
        $patient = Patient::where('id', $id)->first();
        return view('clerk.history', compact('patients', 'patient'));
    }

    public function showAdmit(Request $request)
    {
        $patient = Admitted::where('id', $request->id)->first();
        return response()->json($patient);
    }

    public function transfer(Request $request)
    {
        $new = Admitted::where('id', $request->id)->first();
        $new->admission_date = Carbon::now()->format('d-M-Y');
        $new->ward = $request->ward;
        $new->save();

        return back()->with('success', 'Patient ward transfer successful');
    }

    public function historyDelete($id)
    {
        $pp = Admitted::where('id', $id)->first();

        $p = Patient::where('id', $pp->patient_id)->first();
        $p->admitted = false;
        $p->save();

        $patient = Admitted::where('id', $id)->delete();

        return back()->with('success', 'Patient Deleted Successfully');

    }
}


