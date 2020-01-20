
@extends('Layout.admin_app')
@section('contents')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>All Appointments</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Medical Appointments</span></li>
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

                        <h2 class="card-title">Medical Appointments</h2>
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
                                <th>Service</th>
                                <th>Start Date</th>
                                <th>Accommodation Status</th>
                                <th>Amount</th>
                                <th>Appointment Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appointments as $key => $appointment)
                                <tr>
                                    <td>{{$appointment->user->name}}</td>
                                    <td>{{$appointment->service->keyword}}</td>
                                    <td>{{$appointment->start_date}}</td>
                                    <td>
                                        @if($appointment->accommodation_status ==1 )
                                            <span class="badge badge-success">Booked</span>
                                        @else
                                            <span class="badge badge-danger">No accommodation</span>
                                        @endif
                                    </td>
                                    <td>{{$appointment->amount}}</td>
                                    <td>
                                        <div class="row ml-2">
                                            @if($appointment->appointment_status ==1 )
                                                <span class="badge badge-success">Completed</span>
                                            @else
                                                <span class="badge badge-danger">Pending</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row pl-2">
                                            @if($appointment->appointment_status == 0 )
                                                <div class=" progress-half-rounded light  pr-2 pb-2">
                                                    <a href="{{route('admin.appointment.complete', ['id' => $appointment->id])}}"><button class="btn btn-sm btn-outline-success ">Completed</button></a>
                                                </div>
                                            @endif
                                            <div class=" progress-half-rounded  light pr-2">
                                                <a href="{{route('admin.appointment.delete', ['id' => $appointment->id])}}"><button class="btn btn-sm btn-outline-danger ">Delete</button></a>
                                            </div>
                                            <div class=" progress-half-rounded  light pr-2">
                                                <a class="mb-1 mt-1 mr-1 " data-toggle="modal" data-target="#modalBootstrap{{$key}}" href="#"><button class="btn btn-sm btn-outline-info ">View Msg</button></a>
                                            </div>
                                            <div class=" progress-half-rounded  light pr-2">
                                                <a class="mb-1 mt-1 mr-1 " data-toggle="modal" data-target="#modal{{$key}}" href="#"><button class="btn btn-sm btn-outline-primary">Edit</button></a>
                                            </div>
                                            {{--<div class=" progress-half-rounded  light pr-2">
                                                <a class="mb-1 mt-1 mr-1 " data-toggle="modal" data-target="#report{{$key}}" href="#"><button class="btn btn-sm btn-outline-secondary">Report</button></a>
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
    @foreach($appointments as $key => $appointment)
        <div class="modal" id="modalBootstrap{{$key}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        {{$appointment->message}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach($appointments as $key => $appointment)
        <div class="modal" id="modal{{$key}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="summary-form" action="{{route('admin.edit-appointment-details')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <section class="card">
                                        <header class="card-header">
                                            <h2 class="card-title">Edit Appointment</h2>
                                            <p class="card-subtitle">
                                                Kindly use the form below to Edit Appointment
                                            </p>
                                        </header>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Name <span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" class="form-control" value="{{$appointment->user->name}}"  placeholder="{{$appointment->user->name}}" disabled/>
                                                    <input type="text" name="id" class="form-control" value="{{$appointment->id}}" hidden/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Email<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="email" class="form-control" value="{{$appointment->user->email}}"  placeholder="{{$appointment->user->email}}" disabled/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Start Date<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="start_date" class="form-control" value="{{$appointment->start_date}}"  placeholder="{{$appointment->start_date}}"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 control-label text-lg-right pt-2">Select Accommodation<span class="required">*</span></label></label>
                                                <div class="col-lg-9">
                                                    <select name="accommodation_status" data-plugin-selectTwo class="form-control populate" data-plugin-options='{ "minimumInputLength": 2 }'>
                                                        <optgroup label="Select Product Category">
                                                            <option value="0" @if($appointment->accommodation_status == 0) selected @endif>NO</option>
                                                            <option value="1" @if($appointment->accommodation_status == 1) selected @endif>YES</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 control-label text-lg-right pt-2">Select Product Category<span class="required">*</span></label></label>
                                                <div class="col-lg-9">
                                                    <select name="service_id" data-plugin-selectTwo class="form-control populate" data-plugin-options='{ "minimumInputLength": 2 }'>
                                                        <optgroup label="Select Product Category">
                                                            @foreach($services as $service)
                                                                <option value="{{$service->id}}" @if($service->id == $appointment->service_id) selected @endif>{{$service->keyword}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Message<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea name="message" rows="5"  class="form-control"  required> {{$appointment->message}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="card-footer">
                                            <div class="row justify-content-end">
                                                <div class="col-sm-9">
                                                    <button class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </footer>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
  {{--  @foreach($appointments as $key => $appointment)
        <div class="modal" id="report{{$key}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="summary-form" action="{{route('admin.edit-appointment-details')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <section class="card">
                                        <header class="card-header">
                                            <h2 class="card-title">Report </h2>
                                            <p class="card-subtitle">
                                                Kindly use the form below to give report on the appointment
                                            </p>
                                        </header>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Name <span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" class="form-control" value="{{$appointment->user->name}}"  placeholder="{{$appointment->user->name}}" disabled/>
                                                    <input type="text" name="user_id" class="form-control" value="{{$appointment->user_id}}" hidden/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Message<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea name="message" rows="5"  class="form-control"  required> {{$appointment->message}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="card-footer">
                                            <div class="row justify-content-end">
                                                <div class="col-sm-9">
                                                    <button class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </footer>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach--}}
@endsection