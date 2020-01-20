@extends('Layout.admin_app')
@section('contents')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Birthday</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Birthday celebrants</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->

        <div class="row">
            <div class="col-lg-10 col-xl-10">

                <div class="tabs">
                    <ul class="nav nav-tabs tabs-primary">
                        <li class="nav-item">
                            <a class="nav-link" href="#edit" data-toggle="tab">Birthday Message</a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <div id="edit" class="tab-pane active">
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
                            <form class="p-3" action="{{route('admin.update-birthday-msg')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Message Information</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputCity">Birthday Message<span class="required">*</span></label>
                                        <textarea name="message" rows="5"  class="form-control"  required>{{$message->message}}</textarea>
                                    </div>
                                </div>
                                <hr class="dotted tall">
                                <div class="form-row">
                                    <div class="col-md-3 text-left mt-3">
                                        <button type="submit" class="btn btn-outline-success modal-confirm">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            @if(count($users)>0)
                              <a href="{{route('admin.send-birthday-mail')}}"><button class="btn btn-sm btn-outline-success ">Send Birthday Message</button></a>
                            @endif
                        </div>

                        <h2 class="card-title"> Birthday Celebrants</h2>
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
                                <th>Address</th>
                                <th>Phone Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>@if(empty($user->phone_number))
                                            nil
                                        @else
                                            {{$user->phone_number}}
                                        @endif
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

