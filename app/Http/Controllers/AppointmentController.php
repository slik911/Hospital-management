<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use App\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $staffs = User::where('role', 'doctor')->get();
        return view('appointment', compact('staffs'));
    }

    public function book(Request $request)
    {
        if(Patient::where('card_no', $request->card_no)->exists())
        {

            $length = 10;
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $ref = '';
            for ($i = 0; $i < $length; $i++) {
                $ref .= $characters[rand(0, strlen($characters) - 1)];
            }

            $patient = Patient::where('card_no', $request->card_no)->first();

            $appointment = new Appointment;
            $appointment->card_no = $request->input('card_no');
            $appointment->comment = $request->input('comment');
            $appointment->date = $request->date;
            $appointment->staff_id = $request->staff;
            $appointment->ticket_no = $ref;
            $appointment->patient_id = $patient->id;
            $appointment->save();

            return back()->with('success', 'Your Appoint has been booked successfully, TICKET NUMBER <strong> '.$ref.'</strong>');
        }
        else
        {
            return back()->with('error', 'Sorry Card number does not exist. Please Visit our hospital to register and get your card number');

        }
    }

    public function track()
    {
        return view('confirm');
    }

    public function confirm(Request $request)
    {
        if(Appointment::where('ticket_no', $request->ticket_no)->exists())
        {

           if(Appointment::where('ticket_no', $request->ticket_no)->where('approved', true)->exists())
           {
                 return back()->with('success', 'Your Appointment had been APPROVED');
            }
            if(Appointment::where('ticket_no', $request->ticket_no)->where('status', true)->exists())
           {
                 return back()->with('error', 'Your Appointment had been DENIED');
            }
            if(Appointment::where('ticket_no', $request->ticket_no)->where('status', false)->where('approved', false)->exists())
           {
                 return back()->with('success', 'Your Appointment is still PENDING');
            }


        }
        else
        {
            return back()->with('error', 'Sorry Ticket Number does not exist');

        }
    }
}
