@extends('layouts.clerk')
@section('content')
    <div id="patient">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-3">
                    <div class="card">
                        <div class="card-header">
                        <h4 style="font-weight:400; color:#336699">{{$patient->name}} Admission History<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modelId"  style="font-weight:400; background-color:#336699">
                                New Patient
                              </button></h4>
                        </div>
                        <div class="card-body">
                            @include('include.msg')
                            <table class="table table-striped table-inverse table-responsive-sm text-center" id="example">
                                <thead>
                                    <tr>
                                        <th>S/No</th>
                                        <th>Card Number</th>
                                        <th>Name</th>
                                        <th>Date Admitted</th>
                                        <th>Status</th>
                                        <th>Ward</th>
                                        <th>Date Discharged</th>
                                        <th>Ailment</th>
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
                                    <td>{{$patient->patient->card_no}}</td>
                                    <td>{{$patient->admission_date}}</td>

                                    <td>{{$patient->patient->name}}</td>

                                    <td>
                                        @if ($patient->discharged == true)
                                           <span class="text-success">Discharged</span>
                                        @else
                                        <span class="text-danger">Admitted</span>
                                        @endif
                                    </td>
                                <td>{{$patient->ward}}</td>
                                    <td>
                                            @if ($patient->discharged == true)
                                               <span class="text-success">{{$patient->discharge_date}}</span>
                                            @else
                                            <span class="text-danger">Nil</span>
                                            @endif
                                        </td>
                                        <td>
                                                {{$patient->cause}}
                                        </td>
                                        <td>

                                        @if ($patient->discharged == true)
                                        <button type="button" class="btn btn-success btn-sm disabled">
                                                Transfer Patient
                                        </button>
                                            @else
                                            <button type="button" class="btn btn-success btn-sm transfer" data-toggle="modal" data-target="#admit_patient"  style="font-weight:400; " data-id="{{$patient->id}}">
                                                    Transfer Patient
                                            </button>
                                        @endif

                                        </td>


                                        <td>
                                                @if ($patient->discharged == true)
                                                <a href="/clerk/patient/{{$patient->id}}/history/delete" class="btn btn-sm disabled"  style="font-weight:400; background-color:#336699; color:white" onclick="return confirm('Do you want to delete this ?')">Delete</a>
                                                @else

                                                <a href="/clerk/patient/{{$patient->id}}/history/delete" class="btn btn-sm disabled"  style="font-weight:400; background-color:#336699; color:white" onclick="return confirm('Do you want to delete this ?')">Delete</a>

                                                @endif
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


    <div class="modal fade" id="admit_patient" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-center" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-weight:400; color:#336699">Patient Ward Transfer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form action="/patient/ward/transfer" method="POST">
                            @csrf

                            <input type="hidden" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">

                            <div class="form-group">
                            <label for="cause">Reason for Admission</label>
                                <textarea class="form-control" name="cause" id="cause" rows="3" readonly></textarea>
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
                $('#example').on('click', '.transfer', function(){
                    var id = $(this).attr('data-id');
                    console.log(id);
                    $.ajax({
                        method: 'get',
                        url:"{{route('admit.show')}}",
                        data:{id:id},
                        success: function(data){
                            console.log(data);
                            $('#id').val(data.id);
                            $('#cause').val(data.cause);
                            $('#ward').val(data.ward)
                        }
                });
                });

            });
        </script>
@endsection

