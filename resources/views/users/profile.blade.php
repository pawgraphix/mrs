@extends('layouts.app')
@section('page-content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="panel-title"> User Profile </h3>
                            </div>
                            <div class="col-md-4" style="text-align: right">
                                <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#create_modal">Change Password</button>
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary waves-effect waves-light" id="edit_profile">Update Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                <div class="profile_img">
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                            <img class="img-responsive avatar-view"
                                                 src="{{asset('assets/images/user.png')}}" alt="Avatar" height="220" width="220">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="profile_title">
                                    <div class="col-md-6">
                                        <h2>User Information</h2>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="reportrange" class="pull-right"
                                             style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 5px; border: 1px solid #E6E9ED">
                                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            <span>{{date("F j, Y, g:i a")}}</span> <b class="caret"></b>
                                        </div>
                                    </div>
                                </div>
                                <table id="datatable" class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{$user->full_name}}</td>
                                        <th>Phone Number</th>
                                        <td>{{$user->phone_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$user->email}}</td>
                                        <th>Gender</th>
                                        <td>{{$user->gender}}</td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td>{{$user->role->name}}</td>
                                        <th>Department</th>
                                        <td>{{$user->department->name}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('auth::users.change_password')

            <!-- Edit Modal-->
            <div id="edit_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modal-edit">

                    </div>
                </div>
            </div>

        </div>

@endsection
@section('Scripts')
    <script>
        $('#edit_profile').on('click', function (e) {
            e.preventDefault();
            const dataURL = $(this).attr('href');
            $('.modal-edit').load(dataURL, function () {
                $('#edit_modal').modal({show: true});
            });
        });
    </script>
@endsection
