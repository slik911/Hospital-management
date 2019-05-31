@extends('layouts.doctor')
@section('content')
    <div id="doctor">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                @if (Auth::user()->checked_in == false)
                <a href="/doctor/{{Auth::user()->id}}/status" style="text-decoration:none">
                    <div class="card mb-3">
                        <div class="card-body p-5 text-center text-white bg-success">
                             <i class="fas fa-sign-in-alt fa-5x"></i>
                             <h1 style="font-weight:400">Check In</h1>
                        </div>
                    </div>
                    </a>
                @else
                <a href="/doctor/{{Auth::user()->id}}/status" style="text-decoration:none">
                    <div class="card mb-3">
                        <div class="card-body p-5 text-center text-white bg-danger">
                            <i class="fas fa-sign-out-alt   fa-5x "></i>

                             <h1 style="font-weight:400">Check Out</h1>
                        </div>
                    </div>
                    </a>
                @endif
                </div>
                <div class="col-md-6">
                        <a href="/doctor/appointment" style="text-decoration:none">
                        <div class="card mb-3">
                            <div class="card-body  p-5 text-center bg-primary text-white">
                                 <i class="fas fa-calendar-alt fa-5x"></i>
                            <h1 style="font-weight:400">{{$apps}} Unread Appointments</h1>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                            <a href="#" style="text-decoration:none">
                            <div class="card mb-3">
                                <div class="card-body  p-5 text-center bg-info text-white">
                                     <i class="fas fa-folder-open fa-5x"></i>
                                <h1 style="font-weight:400">{{$diagnosis}} Diagnosis</h1>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                                <a href="/doctor/patient" style="text-decoration:none">
                                <div class="card mb-3">
                                    <div class="card-body  p-5 text-center text-white" style="background:#336699">

                                         <i class="fas fa-users fa-5x"></i>
                                    <h1 style="font-weight:400">{{$pats}} Patients</h1>
                                    </div>
                                </div>
                                </a>
                            </div>
            </div>
        </div>
    </div>
@endsection
