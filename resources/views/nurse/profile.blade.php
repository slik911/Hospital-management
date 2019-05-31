@extends('layouts.nurse')
@section('content')
    <div id="profile">

        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto bg-white p-4">
                        <h4 style="font-weight:400; color:#336699" class="mb-3">Profile</h4>
                        @include('include.msg')
                        <form action="/profile/update" method="post">
                            @csrf
                            @method('put')
                        <div class="form-group">
                                <label for="fname">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{Auth::user()->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone" value="{{Auth::user()->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input type="text" name="gender" id="gender" class="form-control" placeholder="Enter Gender" value="{{Auth::user()->gender}}">
                            </div>
                            <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Gender" value="{{Auth::user()->address}}">
                                </div>
                            @if (Auth::user()->role == 'doctor')
                        <div class="form-group">
                            <label for="specialty">Specialty</label>
                            <input type="text" name="specialty" id="specialty" class="form-control" placeholder="Area of Specialization" value="{{Auth::user()->specialty}}">
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary btn-sm" style="background:#336699"> <i class="fas fa-upload    "></i> Change Profile</button>
                    </form>
                </div>
                <div class="col-md-6 mx-auto bg-white p-4">
                        <h4 style="font-weight:400; color:#336699" class="mb-3">Change Password</h4>
                        <form action="/profile/password/change" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId" value="">
                            </div>
                            <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" name="confirm_password" id="cpassword" class="form-control" placeholder="" aria-describedby="helpId" value="">
                            </div>
                        <button type="submit" class="btn btn-primary btn-sm" style="background:#336699"> <i class="fas fa-key" aria-hidden="true"></i> Change Password</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
