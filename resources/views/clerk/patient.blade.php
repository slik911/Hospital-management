@extends('layouts.clerk')
@section('content')
    <div id="patient">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="font-weight:400; color:#336699">PATIENTS <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modelId"  style="font-weight:400; background-color:#336699">
                                New Patient
                              </button></h4>
                        </div>
                        <div class="card-body">
                            @include('include.msg')
                            <table class="table table-striped table-inverse table-responsive-sm text-center" id="example">
                                <thead>
                                    <tr>
                                        <th>S/No</th>
                                        <th>Date Created</th>
                                        <th>Card Number</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $n = 1
                                    @endphp
                                    @foreach ($patients as $patient)
                                    <tr>
                                    <td scope="row">{{$n++}}</td>
                                    <td>{{$patient->created_at->format('d-M-Y')}}</td>
                                    <td>{{$patient->card_no}}</td>
                                    <td>{{$patient->name}}</td>
                                    <td>{{$patient->phone}}</td>
                                    <td>
                                        @if ($patient->admitted == true)
                                           <span class="text-success">Admitted</span>
                                        @else
                                        <span class="text-danger">Out-Patient</span>
                                        @endif
                                    </td>
                                        <td>
                                                <a href="/clerk/patient/{{$patient->id}}/admissionHistory" class="btn btn-sm"  style="font-weight:400; background-color:#336699; color:white; text-decoration:none">Admission History</a>
                                        </td>
                                        <td>
                                        @if ($patient->admitted == false)
                                        <button type="button" class="btn btn-success btn-sm admit" data-toggle="modal" data-target="#admit_patient"  style="font-weight:400; " data-id="{{$patient->id}}">
                                                Admit Patient
                                              </button>
                                        @else
                                        <button type="button" class="btn btn-success btn-sm admit disabled" >
                                                Admit Patient
                                              </button>
                                        @endif
                                        </td>
                                        <td>
                                                @if ($patient->admitted == true)
                                                <a href="/patient/{{$patient->id}}/discharge" class="btn btn-danger btn-sm" >
                                                        Discharge
                                                </a>
                                                @else
                                                <a href="" class="btn btn-danger btn-sm disabled" >
                                                        Discharge
                                                </a>
                                                @endif
                                                </td>
                                        <td>
                                        <a href="/clerk/patient/{{$patient->id}}/details" class="btn btn-sm"  style="font-weight:400; background-color:#336699; color:white; text-decoration:none">Patient's Detail</a>
                                        </td>
                                        <td>
                                                <a href="/patient/{{$patient->id}}/delete" class="btn btn-sm"  style="font-weight:400; background-color:#336699; color:white" onclick="return confirm('Do you want to delete this ?')">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight:400; color:#336699">Create New patient</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                            <form method="POST" action="/clerk/patient/register">
                                @csrf
                                    <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="name">Full Name</label>
                                                <input type="text" id="name" class="form-control form-control-sm" name="name" placeholder="Enter Full Name" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="email">Email</label>
                                                <input type="text" id="email" name="email" class="form-control form-control-sm" placeholder="Enter Email" required>
                                            </div>
                                            <div class="form-group col-md-8">
                                                    <label for="address">Address</label>
                                                    <input type="text" id="address" class="form-control form-control-sm" name="address" placeholder="Enter Address" required>
                                                </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="gender">Gender</label>
                                                <select class="form-control form-control-sm" id="gender" name="gender" required>
                                                    <option value="">Select gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                                <span id="gnderror" style="color: red;"></span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="dob">Date of Birth</label>
                                                <input type="date" id="dob" name="date_of_birth" class="form-control form-control-sm" placeholder="Enter Date of Birth" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="ph">Phone No</label>
                                                <input type="text" id="ph" name="phone" class="form-control form-control-sm" placeholder="+234000000000" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="nxk">Name of Next of Kin</label>
                                                <input type="text" id="nok" class="form-control form-control-sm" name="name_of_kin" placeholder="Enter Name of Next of Kin" required>
                                            </div>
                                            <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="relationship">Relationship</label>
                                                <select class="form-control form-control-sm" id="relationship" name="relationship" required>
                                                    <option value="Father">Father</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Son">Son</option>
                                                    <option value="Daughter">Daughter</option>
                                                    <option value="Brother">Brother</option>
                                                    <option value="Sister">Sister</option>
                                                    <option value="Wife">Wife</option>
                                                    <option value="Relative">Relative</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="phk">Phone No of Next of Kin</label>
                                                <input type="text" id="phk" name="phone_number_of_kin" class="form-control form-control-sm" placeholder="+2340000000000" required>
                                            </div>
                                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"  style="font-weight:400; background-color:#336699">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="admit_patient" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-center" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-weight:400; color:#336699">Admit patient Record</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form action="/patient/admit" method="POST">
                            @csrf

                            <input type="hidden" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" class="form-control" name="name" id="uname" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                            <label for="cause">Reason for Admission</label>
                                <textarea class="form-control" name="cause" id="cause" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="ward">Choose Ward</label>
                                <select class="form-control form-control-sm" id="ward" name="ward">
                                    <option value="Male Ward">Male Ward</option>
                                    <option value="Female Ward">Female Ward</option>
                                    <option value="Children Ward">Children Ward</option>
                                    <option value="Maternity Ward">Maternity Ward</option>
                                    <option value="Psychiatric Ward">Psychiatric Ward</option>
                                    <option value="Rehabilitation Ward">Rehabilitation Ward</option>
                                    <option value="Emergency Ward">Emergency Ward</option>
                                </select>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"  style="font-weight:400; background-color:#336699">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
@endsection
@section('js')
        <script>
            $(document).ready(function(){
                $('#example').on('click', '.admit', function(){
                    var id = $(this).attr('data-id');
                    console.log(id);
                    $.ajax({
                        method: 'get',
                        url:"{{route('patient.show')}}",
                        data:{id:id},
                        success: function(data){
                            console.log(data);
                            $('#id').val(data.id);
                            $('#uname').val(data.name);

                        }
                });
                });

            });
        </script>
@endsection
