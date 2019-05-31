@extends('layouts.admin')
@section('content')
    <div id="staff">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="font-weight:400; color:#336699">STAFF <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modelId"  style="font-weight:400; background-color:#336699">
                                New Staff
                              </button></h4>
                        </div>
                        <div class="card-body">
                            @include('include.msg')
                            <table class="table table-striped table-inverse table-responsive-sm text-center" id="example">
                                <thead>
                                    <tr>
                                        <th>S/No</th>
                                        <th>Date Created</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $n = 1
                                    @endphp
                                    @foreach ($staffs as $staff)
                                    <tr>
                                    <td scope="row">{{$n++}}</td>
                                    <td>{{$staff->created_at->format('d-M-Y')}}</td>
                                    <td>{{$staff->name}}</td>
                                    <td>{{$staff->phone}}</td>
                                    <td>{{$staff->role}}</td>
                                    <td>
                                        @if ($staff->active == true)
                                           <span class="text-success">Active</span>
                                        @else
                                        <span class="text-danger">Blocked</span>
                                        @endif
                                    </td>
                                            <td>
                                                @if ($staff->active == 1)
                                                <a href="/admin/staff/{{$staff->id}}/status" class="btn btn-sm"  style="font-weight:400; background-color:#336699; color:white; text-decoration:none">Block</a>
                                                @else
                                                <a href="/admin/staff/{{$staff->id}}/status"  class="btn-sm" style="font-weight:400; background-color:#336699; color:white; text-decoration:none;">Unblock</a>
                                                @endif
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#edit_staff"  style="font-weight:400; background-color:#336699" data-id="{{$staff->id}}">
                                                        Edit
                                            </button>
                                            </td>
                                            <td>
                                                    <a href="/admin/staff/{{$staff->id}}/delete" class="btn btn-sm"  style="font-weight:400; background-color:#336699; color:white">Delete</a>
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
                    <h5 class="modal-title" style="font-weight:400; color:#336699">Create New Staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/staff/register" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="fname">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control form-control-sm" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control form-control-sm" id="gender" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control form-control-sm" id="role" name="role">
                                <option value="admin">Admin</option>
                                <option value="nurse">Nurse</option>
                                <option value="doctor">Doctor</option>
                                <option value="clerk">Clerk</option>
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="specialty">Specialty</label>
                                <input type="text" name="specialty" id="specialty" class="form-control form-control-sm" placeholder="Enter Specialty">
                                <small class="text-muted">For Doctors Only</small>
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

    <div class="modal fade" id="edit_staff" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-center" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-weight:400; color:#336699">Update Staff Record</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/staff/update" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                    <input type="hidden" name="id" id="id" class="form-control form-control-sm" placeholder="">
                                <label for="fname">Full Name</label>
                                <input type="text" name="name" id="uname" class="form-control form-control-sm" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="uemail" class="form-control form-control-sm" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="uphone" class="form-control form-control-sm" placeholder="Enter Phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="uaddress" class="form-control form-control-sm" placeholder="Enter Address">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control form-control-sm" id="ugender" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control form-control-sm" id="urole" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="nurse">Nurse</option>
                                    <option value="doctor">Doctor</option>
                                    <option value="clerk">Clerk</option>
                                </select>
                            </div>

                            <div class="form-group">
                                    <label for="specialty">Specialty</label>
                                    <input type="text" name="specialty" id="uspecialty" class="form-control form-control-sm" placeholder="Enter Specialty">
                                    <small class="text-muted">For Doctors Only</small>
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
                $('#example').on('click', '.edit', function(){
                    var id = $(this).attr('data-id');
                    // console.log(id);
                    $.ajax({
                        method: 'get',
                        url:"{{route('staff.show')}}",
                        data:{id:id},
                        success: function(data){
                            // console.log(data);
                            $('#id').val(data.id);
                            $('#uname').val(data.name);
                            $('#uphone').val(data.phone);
                            $('#ugender').val(data.gender);
                            $('#uaddress').val(data.address);
                            $('#uemail').val(data.email);
                            $('#urole').val(data.role);
                            $('#uspecialty').val(data.specialty);
                        }
                });
                });

            });
        </script>
@endsection
