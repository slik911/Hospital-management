@extends('layouts.nurse')
@section('content')
    <div id="patien_details">
        <div class="container">
                <div class="row">
                        <div class="col-md-12 mx-auto p-3" >
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                            <h4 style="font-weight:400; color:#336699">Patient's Details</h4>
                                            @include('include.msg')
                                            <table class="table table-striped table-bordered table-inverse table-responsive-sm">
                                                    <tbody>
                                                        <tr>
                                                            <th>Full Name</th>
                                                            <td>{{$patient->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email</th>
                                                            <td>{{$patient->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Phone Number</th>
                                                            <td>{{$patient->phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Address</th>
                                                            <td>{{$patient->address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Gender</th>
                                                            <td>{{$patient->gender}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date Of Birth</th>
                                                            <td>{{$patient->dob}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Name of Next of Kin</th>
                                                            <td>{{$patient->nnok}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Phone Number of Next of Kin</th>
                                                            <td>{{$patient->phnok}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Relationship</th>
                                                            <td>{{$patient->relationship}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date Created</th>
                                                            <td>{{$patient->created_at->format('d-M-Y')}}</td>
                                                        </tr>
                                                    </tbody>
                                            </table>


                                    </div>
                                    <div class="col-md-4" id="pat_det">
                                            <div class="row">
                                                    <div class="col -md-12">
                                                            <h4 style="font-weight:400; color:#336699" >Card Number</h4>
                                                    </div>
                                            <div class="col-md-12">
                                                    <h1 style="font-weight:400; color:#336699" >{{$patient->card_no}}</h1>
                                            </div>

                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

    <!-- Button trigger modal -->

@endsection
