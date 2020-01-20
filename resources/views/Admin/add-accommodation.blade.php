@extends('Layout.admin_app')
@section('contents')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Add Hotel</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Add Hotel</span></li>
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
                            <a class="nav-link" href="#edit" data-toggle="tab">Hotel</a>
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
                            <form class="p-3" action="{{route('admin.dashboard.add-accommodation')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Hotel Information</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputCity">Hotel Name<span class="required">*</span></label>
                                        <input name="name" type="text" class="form-control" id="inputCity"  required>
                                    </div>
                                </div>
                                <div class="form-row pt-2">
                                    <div class="form-group col-md-8">
                                        <label>Amount<span class="required">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-money-bill"></i>
                                                </span>
                                            </span>
                                            <input type="number" name="price" class="form-control" placeholder="Hotel price" required/>
                                        </div>
                                    </div>
                                </div>
                                <hr class="dotted tall">
                                <div class="form-row">
                                    <div class="col-md-3 text-left mt-3">
                                        <button type="submit" class="btn btn-outline-success modal-confirm">Add Hotel</button>
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

                        <h2 class="card-title">Product Categories</h2>
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
                                <th>Name</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accommodations as $key => $accommodation)
                                <tr>
                                    <td>{{$accommodation->id}}</td>
                                    <td>{{$accommodation->name}}</td>
                                    <td>{{$accommodation->price}}</td>
                                    <td>
                                        <div class="row pl-2">
                                            <div class=" progress-half-rounded  light pr-2">
                                                <a href="{{route('admin.remove-accommodation', ['id' => $accommodation->id])}}"><button class="btn btn-sm btn-outline-danger ">Delete</button></a>
                                            </div>
                                            <div class=" progress-half-rounded  light pr-2">
                                                <a class="mb-1 mt-1 mr-1 " data-toggle="modal" data-target="#modalBootstrap{{$key}}" href="#"><button class="btn btn-sm btn-outline-primary">Edit</button></a>
                                            </div>
                                        </div>
                                    </td>
                           @endforeach

                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
    @foreach($accommodations as $key => $accommodation)
        <div class="modal" id="modalBootstrap{{$key}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="summary-form" action="{{route('admin.edit-accommodation-details')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <section class="card">
                                        <header class="card-header">
                                            <h2 class="card-title">Edit Hotel Information</h2>
                                            <p class="card-subtitle">
                                                Kindly use the form below to Edit hotel information
                                            </p>
                                        </header>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Product Name <span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" class="form-control" value="{{$accommodation->name}}"  placeholder="{{$accommodation->name}}" required/>
                                                    <input type="text" name="id" class="form-control" value="{{$accommodation->id}}" hidden/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Amount<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fas fa-money-bill"></i>
														</span>
													</span>
                                                        <input type="number" name="price" class="form-control" value="{{$accommodation->price}}" placeholder="{{$accommodation->price}}" required/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">

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

