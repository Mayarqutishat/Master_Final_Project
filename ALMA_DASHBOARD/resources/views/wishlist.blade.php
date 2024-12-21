@extends('layouts.masterPage')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Wishlist</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- wishlist -->
<br>
@php
$wishlist = Session::get('wishlist', []);
$wishlistProducts = \App\Models\Product::whereIn('id', $wishlist)->get();
@endphp

<div class="row">
    @foreach($wishlistProducts as $product)
    <div class="col-lg-4 col-md-6 text-center">
        <div class="single-product-item">
            <div class="product-image">
                <a href="{{ url('/single-product') }}">
                    <img src="{{ asset('assetsPages/assets/img/products/'.$product->name.'.jpg') }}" alt="">
                </a>
            </div>
            <h3>{{ $product->name }}</h3>
            <p class="product-price">{{ $product->price }} JD</p>
            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            <button class="remove-from-wishlist" data-product-id="{{ $product->id }}">Remove from Wishlist</button>
        </div>
    </div>
    @endforeach
</div>
<!-- end wishlist -->

<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="{{asset('assetsPages/assets/img/company-logos/company1.jpg') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{asset('assetsPages/assets/img/company-logos/company2.jpg') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{asset('assetsPages/assets/img/company-logos/company3.jpg') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{asset('assetsPages/assets/img/company-logos/company4.jpg') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{asset('assetsPages/assets/img/company-logos/company5.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->
@endsection
