@extends('layouts.doctor')
@section('content')
    <div id="doctor_diag">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto bg-white">
                        <h4 style="font-weight:400; color:#336699" class="mb-5">{{$patient->name}} Diagnosis Record</h4>
                    @include('include.msg')
                        <table class="table table-striped table-responsive-sm text-center" id="example">
                                <thead>
                                  <tr>
                                      <th>S/No</th>
                                    <th scope="col">Card Number</th>
                                    <th scope="col">Diagnosed By</th>
                                    <th scope="col">Date</th>
                                    <th scope="col"></th>
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
                                    <td>{{$n++}}</td>
                                        <td>{{$patient->patient->card_no}}</td>

                                        <td>Dr {{$patient->user->name}}</td>

                                        <td>{{$patient->created_at->format('d-M-Y')}}</td>

                                        <td>
                                        <button style="background:#336699" class="btn btn-primary btn-sm  view" data-toggle="modal" data-id="{{$patient->id}}" data-target="#modelId"> View</button>
                                        </td>

                                        <td>
                                        @if (Auth::user()->id == $patient->staff_id)
                                        <button style="background:#336699" class="btn btn-primary btn-sm edit" data-toggle="modal" data-id="{{$patient->id}}" data-target="#edit_diagnosis"> Edit</button>
                                        @endif
                                        </td>

                                        <td>
                                            @if (Auth::user()->id == $patient->staff_id)
                                            <a href="/doctor/diagnosis/{{$patient->id}}/delete" style="background:#336699" class="btn btn-primary btn-sm" onclick="return confirm('Do you want to delete this ?')"> Delete</a>
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
@endsection

<!--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
  Launch
</button> Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Diagnosis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">

                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Diagnosis:</label>
                            <div class="col-md-8">
                            <textarea class="form-control" readonly id="dg" rows="3" name="diagnosis">
                            </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Previous Medication:</label>
                            <div class="col-md-8">
                            <textarea class="form-control" readonly id="pm" rows="3" name="previous-medication">
                            </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Conclusion:</label>
                            <div class="col-md-8">
                                <input type="text" readonly class="form-control" id="conc" name="conclusion" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Prescription:</label>
                            <div class="col-md-8">
                            <textarea class="form-control" readonly id="presc" rows="3" name="prescription" value="">
                            </textarea>
                            </div>
                        </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>




<div class="modal fade" id="edit_diagnosis" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Diagnosis</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="/doctor/diagnosis/update" method="post">
                    @csrf
                    @method('PUT')
                <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" id="id">
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Diagnosis:</label>
                                <div class="col-md-8">
                                <textarea class="form-control"  id="edg" rows="3" name="diagnosis">
                                </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Previous Medication:</label>
                                <div class="col-md-8">
                                <textarea class="form-control"  id="epm" rows="3" name="previous_medication">
                                </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Conclusion:</label>
                                <div class="col-md-8">
                                    <input type="text"  class="form-control" id="econc" name="conclusion" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Prescription:</label>
                                <div class="col-md-8">
                                <textarea class="form-control"  id="epresc" rows="3" name="prescription" value="">
                                </textarea>
                                </div>
                            </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" style="background:#336699" data-dismiss="modal">update</button>
                </div>
            </form>
            </div>
        </div>
    </div>


@section('js')
        <script>
            $(document).ready(function(){

                $('#example').on('click', '.view', function(){
                    var id = $(this).attr('data-id');
                    console.log(id);
                    $.ajax({
                        method: 'get',
                        url:"{{route('diagnosis.show')}}",
                        data:{id:id},
                        success: function(data){
                            console.log(data);
                            $('#dg').val(data.diagnosis);
                            $('#pm').val(data.previous_medication);
                            $('#conc').val(data.conclusion);
                            $('#presc').val(data.prescription);
                        }
                });
                });

                $('#example').on('click', '.edit', function(){
                    var id = $(this).attr('data-id');
                    console.log(id);
                    $.ajax({
                        method: 'get',
                        url:"{{route('diagnosis.show')}}",
                        data:{id:id},
                        success: function(data){
                            console.log(data);
                            $('#id').val(data.id);
                            $('#edg').val(data.diagnosis);
                            $('#epm').val(data.previous_medication);
                            $('#econc').val(data.conclusion);
                            $('#epresc').val(data.prescription);
                        }
                });
                });

            });
        </script>
@endsection

