@extends('Layout.admin_app')
@section('contents')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Customer Review</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Customer review</span></li>
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
                            <a class="nav-link" href="#edit" data-toggle="tab">Customer review</a>
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
                            <form class="p-3" action="{{route('admin.dashboard.add-review')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Add Review</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputCity">Enter Name</label>
                                        <input name="name" type="text" class="form-control" id="inputCity"  required>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="inputCity">Message</label>
                                        <input name="message" type="tel" class="form-control" id="inputCity" min="9"  required>
                                    </div>
                                </div>
                                <hr class="dotted tall">
                                <div class="form-row">
                                    <div class="col-md-3 text-left mt-3">
                                        <button type="submit" class="btn btn-outline-success modal-confirm">Add review</button>
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
                                <th>id</th>
                                <th>name</th>
                                <th>message</th>
                                <th>Last Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reviews as $key => $review)
                                <tr>
                                    <td>{{$review->id}}</td>
                                    <td>{{$review->name}}</td>
                                    <td>{{$review->message}}</td>
                                    <td>{{$review->created_at}}</td>
                                    <td>
                                        <div class="row pl-2">
                                            <div class=" progress-half-rounded  light pr-2">
                                                <a href="{{route('admin.remove-review', ['id' => $review->id])}}"><button class="btn btn-sm btn-outline-danger ">Delete</button></a>
                                                <a class="mb-1 mt-1 mr-1 " data-toggle="modal" data-target="#modalBootstrap{{$key}}" href="#"><button class="btn btn-sm btn-outline-primary ">Edit</button></a>
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
    @foreach($reviews as $key => $review)
        <div class="modal" id="modalBootstrap{{$key}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="summary-form" action="{{route('admin.edit-review-details')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <section class="card">
                                        <header class="card-header">
                                            <h2 class="card-title">Edit Review</h2>
                                            <p class="card-subtitle">
                                                Kindly use the form below to Edit review
                                            </p>
                                        </header>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputCity">Enter Name</label>
                                                    <input name="name" type="text" class="form-control" id="inputCity" value="{{$review->name}}" placeholder="{{$review->name}}"  required>
                                                    <input name="id" type="text" class="form-control" id="inputCity" value="{{$review->id}}" hidden>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="inputCity">Message</label>
                                                    <input name="message" type="text" class="form-control" id="inputCity" value="{{$review->message}}" placeholder="{{$review->message}}"   required>
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

@endsection

