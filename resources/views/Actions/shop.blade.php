@extends('Layout.app')
@section('contents')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section" data-bgimage="{{asset('_landing/assets/images/bg/breadcrumb-bg.jpg')}}"
         data-black-overlay="4">
        <div class="container">
            <div class="tm-breadcrumb text-center">
                <h2>Products</h2>
                <ul>
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <li>Products</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Main Content -->
    <main class="main-content">
        <div class="tm-section products-page-content tm-padding-section bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-lg-3 col-12 mb-30">
                                <div class="widgets">
                                    <!-- Single Widget -->
                                    <div class="single-widget widget-search">
                                        <h5 class="widget-title">Search</h5>
                                        <form action="{{route('product.search')}}" class="widget-search-form" method="get">
                                            @csrf
                                            <input name="search" type="text" placeholder="Search..." required>
                                            <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tm-shop-products">
                                <div class="row mt-30-reverse">
                                @if(count($products)>0)
                                    @foreach($products as $product)
                                        <!-- Single Product -->
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-30">
                                            <div class="tm-product">
                                                <div class="tm-product-image">
                                                    <a class="tm-product-imagelink" href="{{route('shop.product-details',["name" => $product->product_name])}}">
                                                        <img src="{{asset('profile_picture/'.$product->main_image_name)}}" alt="product image">
                                                    </a>
                                                </div>
                                                <div class="tm-product-content">
                                                    <h5 class="tm-product-title"><a href="{{route('shop.product-details',["name" => $product->product_name])}}">{{$product->product_name}}</a></h5>
                                                    {{--<div class="tm-product-rating">
                                                        <span class="active"><i class="zmdi zmdi-star"></i></span>
                                                        <span class="active"><i class="zmdi zmdi-star"></i></span>
                                                        <span class="active"><i class="zmdi zmdi-star"></i></span>
                                                        <span class="active"><i class="zmdi zmdi-star"></i></span>
                                                        <span class="active"><i class="zmdi zmdi-star"></i></span>
                                                    </div>--}}
                                                    <h6 class="tm-product-price"><span>#</span>{{$product->amount}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--// Single Product -->
                                    @endforeach
                                @else
                                    <h4 class="text-center offset-5 font-weight-bolder"> No result Found</h4>
                                @endif
                                </div>
                            </div>

                            <div class="tm-pagination mt-50">
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <!--// Main Content -->
@endsection