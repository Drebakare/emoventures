@extends('layout.admin_app')
@section('contents')
    <section role="main" class="content-body">
        <header class="page-header">
            {{--<h2>Boxed Layout Static Header</h2>--}}

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Dashboard</span></li>

                </ol>

                <a class="sidebar-right-toggle" ><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-3">
                    <div class="col-xl-6">
                        <section class="card card-featured-left card-featured-primary mb-3">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Total Users</h4>
                                            <div class="info">
                                                <strong class="amount">{{count($users)}}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a class="text-muted text-uppercase" href="{{route('admin.retrieve-all-users')}}">(view all Users)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-6">
                        <section class="card card-featured-left card-featured-secondary">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-secondary">
                                            <i class="fas fa-money-bill"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Total Order</h4>
                                            <div class="info">
                                                <strong class="amount">{{count($orders)}}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a class="text-muted text-uppercase" href="#">( View All Order )</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <section class="card card-featured-left card-featured-secondary">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-secondary">
                                            <i class="fas fa-download"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Total Appointments</h4>
                                            <div class="info">
                                                <strong class="amount">{{count($appointments)}}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a class="text-muted text-uppercase" href="#">( View All Appointments )</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-6">
                        <section class="card card-featured-left card-featured-secondary">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-secondary">
                                            <i class="fas fa-archive"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Services</h4>
                                            <div class="info">
                                                <strong class="amount">{{count($services)}}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                           {{-- <a class="text-muted text-uppercase" href="#">( View unapproved causes )</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-4 mt-1">
            <div class="col-xl-12 order-1 mb-4">
                <section class="card">
                    <header class="card-header card-header-transparent">
                        <div class="card-actions">
                            <a href="{{route('admin.retrieve-all-users')}}" class="card-action"> View all <i class="fa fa-arrow-right"></i></a>
                        </div>

                        <h2 class="card-title">last 5 registered users</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-responsive-md table-light mb-0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User type</th>
                                <th>Address</th>
                                <th>Phone number</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latest_users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->user_type ==0)
                                            <span class="badge badge-warning">Customer</span>
                                        @else
                                            <span class="badge badge-success">Admin</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->address)
                                         {{$user->address}}
                                        @else
                                            nil
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->phone_number)
                                            {{$user->phone_number}}
                                        @else
                                            nil
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
        <div class="row pt-2 mt-1 row">
            <div class="col-xl-6 order-1 mb-4">
                <section class="card">
                    <header class="card-header card-header-transparent">
                        <div class="card-actions">
                            <a href="#" class="card-action"> View all <i class="fa fa-arrow-right"></i></a>
                        </div>

                        <h2 class="card-title">last 5 registered Appointments</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-responsive-md table-light mb-0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Service</th>
                                <th>Start Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latest_appointments as $appointment)
                                <tr>
                                    <td>{{$appointment->user->name}}</td>
                                    <td>{{$appointment->service->keyword}}</td>
                                    <td>
                                        {{$appointment->start_date}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
            <div class="col-xl-6 order-1 mb-4">
                <section class="card">
                    <header class="card-header card-header-transparent">
                        <div class="card-actions">
                            <a href="{{route('admin.retrieve-all-orders')}}" class="card-action"> View all <i class="fa fa-arrow-right"></i></a>
                        </div>

                        <h2 class="card-title">last 5 product order</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-responsive-md table-light mb-0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Product</th>
                                <th>Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latest_orders as $order)
                                <tr>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->product->product_name}}</td>
                                    <td>{{$order->shipping_address}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
        <!-- end: page -->
    </section>
@endsection
