@extends('layouts.clerk')
@section('content')
    <div id="doctor-appointment">
        <div class="container">
            <div class="row">
                <div class="col-md-12 bg-white">
                    <h4 style="font-weight:400; color:#336699">Appointments</h4>
                    <table class="table table-striped table-inverse table-responsive-sm text-center" id="example">
                        <thead class="thead-inverse">
                            <tr>
                                <th>S/No</th>
                                <th>Date of Appointment</th>
                                <th>Card Number</th>
                                <th>Patient Name</th>
                                <th>Doctor</th>

                                <th>Approved</th>
                                <th></th>


                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n=1
                                @endphp
                                @foreach ($appointments as $booking)
                                <tr>
                                <td scope="row">{{$n++}}</td>
                                <td>{{$booking->date}}</td>
                                <td>{{$booking->card_no}}</td>
                                <td>{{$booking->patient->name}}</td>
                                <td>Dr {{$booking->user->name}}</td>
                               
                                <td>
                                        @if ($booking->approved == true)
                                        <span class="text-success">Approved</span>
                                    @else
                                    <span class="text-danger">pending</span>
                                    @endif
                                </td>
                                <td>
                                <button type="button" class="btn btn-primary btn-sm read" style="background-color:#336699" data-toggle="modal" data-target="#modelId" data-id="{{$booking->id}}">
                                    Read
                                </button>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
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
                    <h5 class="modal-title">Appointment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
        <script>
            $(document).ready(function(){

                $('#example').on('click', '.read', function(){
                    var id = $(this).attr('data-id');
                    console.log(id);
                    $.ajax({
                        method: 'get',
                        url:"{{route('appointment.read')}}",
                        data:{id:id},
                        success: function(data){
                            console.log(data);

                            $('.modal-body').text(data.comment);

                        }
                });
                });

            });
        </script>
@endsection
