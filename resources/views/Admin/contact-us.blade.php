@extends('Layout.admin_app')
@section('contents')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Update company contact information</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Update contact</span></li>
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
                            <a class="nav-link" href="#edit" data-toggle="tab">Cause Category</a>
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
                            <form class="p-3" action="{{route('admin.dashboard.edit-contact-us')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Contact Information</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputCity">Enter Location </label>
                                        <input name="location" type="text" class="form-control" id="inputCity"  required>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="inputCity">Phone number</label>
                                        <input name="phone_number" type="tel" class="form-control" id="inputCity" min="9"  required>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="inputCity">Email</label>
                                        <input name="email" type="email" class="form-control" id="inputCity"  required>
                                    </div>
                                </div>
                                <hr class="dotted tall">
                                <div class="form-row">
                                    <div class="col-md-3 text-left mt-3">
                                        <button type="submit" class="btn btn-outline-success modal-confirm">Update Info</button>
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

                        <h2 class="card-title">Company's contact</h2>
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
                                <th>Location</th>
                                <th>Phone number</th>
                                <th>Email</th>
                                <th>Last Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contact as $contact)
                                <tr>
                                    <td>{{$contact->location}}</td>
                                    <td>{{$contact->contact}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->created_at}}</td>
                           @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>

@endsection

