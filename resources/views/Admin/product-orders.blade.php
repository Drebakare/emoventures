
@extends('Layout.admin_app')
@section('contents')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>All Orders</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Product Orders</span></li>
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

                        <h2 class="card-title">Product Orders</h2>
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
                                <th>Payment ID</th>
                                <th>Product Name</th>
                                <th>Name</th>
                                <th>Shipping Address</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->payment_id}}</td>
                                    <td>{{$order->product->product_name}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->shipping_address}}</td>
                                    <td>{{$order->amount_paid}}</td>
                                    <td>
                                        <div class="row ml-2">
                                            @if($order->status ==1 )
                                                <span class="badge badge-success">Completed</span>
                                            @else
                                                <span class="badge badge-danger">Pending</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row pl-2">
                                            @if($order->status == 0 )
                                                <div class=" progress-half-rounded light  pr-2 pb-2">
                                                    <a href="{{route('admin.orders.complete', ['id' => $order->id])}}"><button class="btn btn-sm btn-outline-success ">Completed</button></a>
                                                </div>
                                            @endif
                                            <div class=" progress-half-rounded  light pr-2">
                                                <a href="{{route('admin.orders.remove', ['id' => $order->id])}}"><button class="btn btn-sm btn-outline-danger ">Delete</button></a>
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