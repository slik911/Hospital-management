@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 bg-white p-5">
                        @include('include.msg')
                        <form method="POST" action="/appointment/book">
                            @csrf
                            <div class="form-group row">
                                <label for="card_no" class="col-md-4 col-form-label text-md-right">Card Number</label>
                                <div class="col-md-6">
                                    <input id="card_no" type="text" class="form-control" name="card_no" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="card_no" class="col-md-4 col-form-label text-md-right">Appointment date</label>
                                    <div class="col-md-6">
                                        <input id="date" type="date" class="form-control" name="date" value="" required autofocus>
                                    </div>
                                </div>

                            <div class="form-group row">
                                <label for="comment" class="col-md-4 col-form-label text-md-right">Comment</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="comment" class="col-md-4 col-form-label text-md-right">Preffered Specialist</label>
                                    <div class="col-md-6">
                                            <select id="my-select" class="form-control" name="staff">
                                                    <option value="">Choose Specialist...</option>
                                                    @foreach ($staffs as $staff)
                                                <option value="{{$staff->id}}">{{$staff->name}} <span class="float-right ml-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;({{$staff->specialty}})</span></option>
                                                    @endforeach
                                                </select>
                                    </div>
                                </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="background:#336699">
                                        Book Appointment
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
@endsection
