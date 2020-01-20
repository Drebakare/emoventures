@extends('Layout.admin_app')
@section('contents')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Add Product</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Add Product</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->

        <div class="row">
            <div class="col-lg-12">
                <form id="summary-form" action="{{route('admin.add-product-details')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="card">
                        <header class="card-header">
                            <div class="card-actions">
                                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                            </div>

                            <h2 class="card-title">Add new Product</h2>
                            <p class="card-subtitle">
                               Kindly use the form below to add a new product
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
                                <label class="col-sm-3 control-label text-sm-right pt-2">Product Name <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="product_name" class="form-control"  placeholder="Type the product name here" required/>
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
                                        <input type="number" name="amount" class="form-control" placeholder="Product price" required/>
                                    </div>
                                </div>
                                <div class="col-sm-9">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Select Product Category<span class="required">*</span></label></label>
                                <div class="col-lg-9">
                                    <select name="category_id" data-plugin-selectTwo class="form-control populate" data-plugin-options='{ "minimumInputLength": 2 }'>
                                        <optgroup label="Select Product Category">
                                            @foreach($product_categories as $category)
                                            <option value="{{$category->id}}">{{$category->keyword}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Product details <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="product_details" class="form-control"  placeholder="Type few details about the product" required/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Product Description<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="product_description" rows="5"  class="form-control" placeholder="Enter product description" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Product Main image<span class="required">*</span></label>
                                <label class="col-sm-3 control-label pt-2"> <input name="main_image" type="file" class="btn btn-outline-success" required></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Other Images<span class="required">*</span></label>
                                <label class="col-sm-4 control-label pt-2"> <input name="image1" type="file" class="btn btn-outline-success" required></label>
                                <label class="col-sm-3 control-label pt-2"> <input name="image2" type="file" class="btn btn-outline-success" required></label>
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
                                <th>Product name</th>
                                <th>Category</th>
                                <th>Uploaded Time</th>
                                <th>Price</th>
                                <th>Product Details</th>
                                <th>actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key=> $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->category->keyword}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>{{$product->amount}}</td>
                                    <td>{{$product->product_details}}</td>
                                    <td>
                                        <div class="row pl-2">
                                            <div class=" progress-half-rounded  light pr-2">
                                                <a href="{{route('admin.remove-product', ['id' => $product->id])}}"><button class="btn btn-sm btn-outline-danger ">Delete</button></a>
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

    @foreach($products as $key => $product)
        <div class="modal" id="modalBootstrap{{$key}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="summary-form" action="{{route('admin.edit-product-details')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <section class="card">
                                        <header class="card-header">
                                            <h2 class="card-title">Edit Product</h2>
                                            <p class="card-subtitle">
                                                Kindly use the form below to Edit the product
                                            </p>
                                        </header>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Product Name <span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}"  placeholder="{{$product->product_name}}" required/>
                                                    <input type="text" name="id" class="form-control" value="{{$product->id}}" hidden/>
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
                                                        <input type="number" name="amount" class="form-control" value="{{$product->amount}}" placeholder="{{$product->amount}}" required/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 control-label text-lg-right pt-2">Select Product Category<span class="required">*</span></label></label>
                                                <div class="col-lg-9">
                                                    <select name="category_id" data-plugin-selectTwo class="form-control populate" data-plugin-options='{ "minimumInputLength": 2 }'>
                                                        <optgroup label="Select Product Category">
                                                            @foreach($product_categories as $category)
                                                                <option value="{{$category->id}}" @if($category->id == $product->product_category_id) selected @endif>{{$category->keyword}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Product details <span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="product_details" class="form-control" value="{{$product->product_details}}"  placeholder="{{$product->product_details}}" required/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label text-sm-right pt-2">Product Description<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea name="product_description" rows="5"  class="form-control"  required> {{$product->product_description}}</textarea>
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

