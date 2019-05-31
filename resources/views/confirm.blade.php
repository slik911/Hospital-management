@extends('layouts.app')
@section('content')
    <div id="confirm" class="py-5">
        <div class="container">
            <div class="col-md-8 mx-auto bg-white p-5 mt-5 ">
                <h4 style="font-weight:400; color:#336699" class="mb-3">Confirm Appointment</h4>
                @include('include.msg')
                <form action="/appointment/confirm" method="post">
                    @csrf
                    <div class="row">
                            <div class="col-md-9 col-9">
                                    <div class="form-group">
                                      <input type="text" name="ticket_no" id="ticket_no" class="form-control" placeholder="Enter Ticket Number" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col-md-3 col-3">
                                    <button type="submit" class="btn btn-primary" style="background:#336699"> Confirm</button>
                                </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
