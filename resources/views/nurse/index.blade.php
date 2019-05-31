@extends('layouts.nurse')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                        <div class="col-md-12">
                                <a href="/nurse/patient" style="text-decoration:none">
                                    <div class="card mb-3">
                                        <div class="card-body  p-5 text-center text-white bg-success">

                                             <i class="fas fa-users fa-5x"></i>
                                        <h1 style="font-weight:400">{{$pats}}Admitted Patients</h1>
                                        </div>
                                    </div>
                                    </a>
                        </div>
                </div>
                <div class="col-md-6  pt-5" style="background:#336699; color:white">

                        <h4 style="font-weight:400; " class="mb-3 ">Available Doctors</h4>
                    <table class="table  table-inverse table-responsive-sm">
                        <thead class="thead-inverse">
                            <tr>
                                <th>S/No</th>
                                <th>Doctor</th>
                                <th>Specialty</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 1
                                @endphp
                                @foreach ($docs as $doc)
                                <tr>
                                <td>{{$n++}}</td>
                                <td>{{$doc->name}}</td>
                                <td>{{$doc->specialty}}</td>
                                <td><span class="text-success" style="background:white; padding:5px; border-radius:2px;"><i class="fas fa-circle    text-success"></i> Avaialable </span> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
