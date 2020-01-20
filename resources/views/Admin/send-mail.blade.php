@extends('Layout.admin_app')
@section('contents')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Send Mail</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Send Mail</span></li>
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
                            <a class="nav-link" href="#edit" data-toggle="tab">Send Mail</a>
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
                            <form class="p-3" action="{{route('admin.mail.send')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Email Information</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputCity">Email Address<span class="required">*</span></label>
                                        <input name="email" type="text" class="form-control" id="inputCity"  required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputCity">Subject<span class="required">*</span></label>
                                        <input name="subject" type="text" class="form-control" id="inputCity"  required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputCity">Body<span class="required">*</span></label>
                                        <textarea name="body" rows="5"  class="form-control"  required></textarea>
                                    </div>
                                </div>
                                <hr class="dotted tall">
                                <div class="form-row">
                                    <div class="col-md-3 text-left mt-3">
                                        <button type="submit" class="btn btn-outline-success modal-confirm"><i class="fas fa-mail-bulk"></i>Send Mail</button>
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
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">All Sent Mails</h2>
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
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Body</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mails as $mail)
                                <tr>
                                    <td>{{$mail->email}}</td>
                                    <td>{{$mail->subject}}</td>
                                    <td>{{$mail->body}}</td>
                                    <td>
                                        <div class="row pl-2">
                                            <div class=" progress-half-rounded  light pr-2">
                                                <a href="{{route('admin.delete-mail', ['id' => $mail->id])}}"><button class="btn btn-sm btn-outline-danger ">Delete Mail</button></a>
                                            </div>
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

