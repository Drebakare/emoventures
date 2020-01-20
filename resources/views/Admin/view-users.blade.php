
@extends('Layout.admin_app')
@section('contents')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>All Users</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Users</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">User</h2>
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger"  style="margin-top: 10px; margin-left: 10px;">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        @if(session('failure'))
                            <div class="alert alert-danger" style="margin-top: 10px; margin-left: 10px;">
                                {{session('failure')}}
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success" style=" margin-top: 10px; margin-left: 10px;">
                                {{session('success')}}
                            </div>
                        @endif
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Account information</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>
                                        @if($user->account_status ==1 && $user->user_type == 1 )
                                            <div class="row ml-2">
                                                <span class="badge badge-success">Verified</span>
                                                <span class="badge badge-info">Admin</span>
                                            </div>
                                        @endif
                                        @if($user->account_status ==0 && $user->user_type == 0 )
                                            <div class="row ml-2">
                                                <span class="badge badge-danger">Unverified</span>
                                                <span class="badge badge-dark">User</span>
                                            </div>
                                        @endif
                                        @if($user->account_status ==1 && $user->user_type == 0)
                                            <div class="row ml-2">
                                                <span class="badge badge-success">Verified</span>
                                                <span class="badge badge-dark">User</span>
                                            </div>
                                        @endif
                                        @if($user->account_status ==0 && $user->user_type == 1)
                                            <div class="row ml-2">
                                                <span class="badge badge-red">Unverified</span>
                                                <span class="badge badge-info">Admin</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row pl-2">
                                            @if($user->account_status == 0 )
                                                <div class=" progress-half-rounded light  pr-2 pb-2">
                                                    <a href="{{route('admin.user.verify-user', ['token' => $user->token])}}"><button class="btn btn-sm btn-outline-success ">Verify User</button></a>
                                                </div>
                                            @endif
                                            @if($user->user_type == 0)
                                                <div class=" progress-half-rounded  light pr-2">
                                                    <a href="{{route('admin.user.make-admin', ['token' => $user->token])}}"><button class="btn btn-sm btn-outline-success ">Make an Admin</button></a>
                                                </div>
                                            @endif
                                            @if($user->user_type == 1)
                                                <div class=" progress-half-rounded  light pr-2">
                                                    <a href="{{route('admin.user.remove-admin', ['token' => $user->token])}}"><button class="btn btn-sm btn-outline-danger ">Remove Admin</button></a>
                                                </div>
                                            @endif
                                                <div class=" progress-half-rounded  light pr-2">
                                                    <a href="{{route('admin.user.remove', ['token' => $user->token])}}"><button class="btn btn-sm btn-outline-danger ">Delete User</button></a>
                                                </div>
{{--
                                            <div class=" progress-half-rounded  light">
                                                <a href="#"><button class="btn btn-sm btn-outline-danger">Delete User</button></a>
                                            </div>--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection