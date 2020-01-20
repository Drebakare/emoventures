@extends('Layout.admin_app')
@section('contents')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Add Service</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Add Service</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->

        <div class="row">
            <div class="col-lg-12">
                <form id="summary-form" action="{{route('admin.add-service-details')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="card">
                        <header class="card-header">
                            <div class="card-actions">
                                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                            </div>

                            <h2 class="card-title">Add new Service</h2>
                            <p class="card-subtitle">
                               Kindly use the form below to add a new service
                            </p>
                        </header>
                        <div class="card-body">
                            <div class="validation-message">
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
                                <ul></ul>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Service Name <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" class="form-control"  placeholder="Type the product name here" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Price<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fas fa-money-bill"></i>
														</span>
													</span>
                                        <input type="number" name="price" class="form-control" placeholder="Product price" required/>
                                    </div>
                                </div>
                                <div class="col-sm-9">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Service Title<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="title" rows="5"  class="form-control" placeholder="Enter Service title" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Service Description<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="body" rows="5"  class="form-control" placeholder="Enter Service description" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Service image<span class="required">*</span></label>
                                <label class="col-sm-3 control-label pt-2"> <input name="image" type="file" class="btn btn-outline-success" required></label>
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
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">Products</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Service name</th>
                                <th>Price</th>
                                <th>Service Details</th>
                                <th>actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $key => $service)
                                <tr>
                                    <td>{{$service->id}}</td>
                                    <td>{{$service->keyword}}</td>
                                    <td>{{$service->price}}</td>
                                    <td>{{$service->body}}</td>
                                    <td>
                                        <div class="row pl-2">
                                            <div class=" progress-half-rounded  light pr-2">
                                                <a href="{{route('admin.remove-service', ['id' => $service->id])}}"><button class="btn btn-sm btn-outline-danger ">Delete</button></a>
                                                <a class="mb-1 mt-1 mr-1 " data-toggle="modal" data-target="#modalBootstrap{{$key}}" href="#"><button class="btn btn-sm btn-outline-primary ">Edit</button></a>
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
    @foreach($services as $key => $service)
        <div class="modal" id="modalBootstrap{{$key}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="summary-form" action="{{route('admin.edit-service-details')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <section class="card">
                                        <header class="card-header">
                                            <h2 class="card-title">Edit Service</h2>
                                            <p class="card-subtitle">
                                                Kindly use the form below to Edit the service service
                                            </p>
                                        </header>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Service Name <span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="keyword" class="form-control" value="{{$service->keyword}}"  placeholder="{{$service->keyword}}" required/>
                                                    <input type="text" name="id" class="form-control" value="{{$service->id}}"  hidden/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Price<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fas fa-money-bill"></i>
														</span>
													</span>
                                                        <input type="number" name="price" value="{{$service->price}}" class="form-control" placeholder="{{$service->price}}" required/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Service title<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea name="title" rows="5"  class="form-control" placeholder="Enter Service title" required> {{$service->title}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Service Description<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea name="body" rows="5"  class="form-control" placeholder="Enter Service description" required> {{$service->body}}</textarea>
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

