@extends('layouts.clerk')
@section('content')
    <div id="success">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto py-5">
                    <h1 class="text-center" style="color:#336699; font-weight:400">Registration Successful!!!</h1>
                    <h4  class="text-center" style="color:#111; font-weight:400">Your Card Number is:</h4>
                <h1 class="text-center" style="color:#336699; font-weight:400">{{$ref->card_no}}</h1>
                   <center> <a href="/clerk/patient" class="btn btn-transparent" style="border:1px solid #336699; color:#336699;"><h4 style="color:#336699; font-weight:400">Register New Patient</h3></a> <a href="/patient/{{$ref->id}}/details"  class="btn btn-transparent" style="border:1px solid #336699; color:#336699;"><h4 style="color:#336699; font-weight:400">View Patients Full Details</h4></a></center>
                </div>
            </div>
        </div>
    </div>
@endsection
