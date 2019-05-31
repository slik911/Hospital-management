@extends('layouts.clerk')
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
                                        <button type="button" class="btn btn-transparent btn-block edit" data-toggle="modal" data-target="#modelId" data-id="{{$patient->id}}" style="font-weight:400; color:white; border:1px solid #336699; background:#336699;">
                                                    Edit Patient Details
                                                  </button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                        <form method="POST" action="/clerk/patient/update">
                            @csrf
                            @method('put')
                                <div class="row">
                                        <div class="form-group col-md-12">
                                            <input type="hidden" id="id" class="form-control form-control-sm" name="id" placeholder="">

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
@endsection

@section('js')
        <script>
            $(document).ready(function(){

                $('#pat_det').on('click', '.edit', function(){
                    var id = $(this).attr('data-id');
                    console.log(id);
                    $.ajax({
                        method: 'get',
                        url:"{{route('patient.show')}}",
                        data:{id:id},
                        success: function(data){
                            console.log(data);
                            $('#id').val(data.id);
                            $('#name').val(data.name);
                            $('#ph').val(data.phone);
                            $('#address').val(data.address);
                            $('#gender').val(data.gender);
                            $('#relationship').val(data.relationship);
                            $('#phk').val(data.phnok);
                            $('#nok').val(data.email);
                            $('#dob').val(data.dob);
                            $('#email').val(data.email);


                        }
                });
                });

            });
        </script>
@endsection
