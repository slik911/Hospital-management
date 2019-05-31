@extends('layouts.nurse')
@section('content')
    <div id="patient">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="font-weight:400; color:#336699">PATIENTS </h4>
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
                                        <a href="/nurse/patient/{{$patient->id}}/details" class="btn btn-sm"  style="font-weight:400; background-color:#336699; color:white; text-decoration:none">Patient's Detail</a>
                                        </td>

                                        <td>
                                            <a href="/nurse/patient/{{$patient->id}}/diagnosis/view" class="btn view btn-sm btn-primary">View All Diagnosis</a>
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
                    <h5 class="modal-title" style="font-weight:400; color:#336699">Patient Diagnosis</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/doctor/patient/diagnosis">
                        @csrf
                        <input type="hidden" class="form-control" name="did" id="did" aria-describedby="helpId" placeholder="">

                        <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Diagnosis:</label>
                                <div class="col-md-6">
                                <textarea class="form-control" id="diagn" rows="3" name="diagnosis"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Previous Medication:</label>
                                <div class="col-md-6">
                                <textarea class="form-control" id="pmed" rows="3" name="previous_medication"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Conclusion:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="conc" name="conclusion">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Prescription:</label>
                                <div class="col-md-6">
                                <textarea class="form-control" id="diagn" rows="3" name="prescription"></textarea>
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
                $('#example').on('click', '.view', function(){
                    var id = $(this).attr('data-id');

                    $('#did').val(id);

                });

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
