@extends('layouts.masterPage')

@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Shop</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <!-- Product filters -->
        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".Bags">Bags</li>
                        <li data-filter=".Frame">Embroidery Frame</li>
                        <li data-filter=".Needles">Embroidery Needles</li>
                        <li data-filter=".Yarns">Yarns</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Product list -->
        <div class="row product-lists">
        @foreach($products as $product)
<div class="col-lg-4 col-md-6 text-center {{ $product->category->name }}">
    <div class="single-product-item">
        <div class="product-image">
            <a href="{{ url('/single-product') }}">
                <img src="{{ asset('assetsPages/assets/img/products/'.$product->name.'.jpg') }}" alt="">
            </a>
        </div>
        <h3>{{ $product->name }}</h3>
        <p class="product-price">{{ $product->price }} JD</p>
        <button class="cart-btn add-to-wishlist" data-product-id="{{ $product->id }}">
            <i class="fas fa-heart"></i> Add to Wishlist
        </button>
        <a href="{{ url('/cart') }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
    </div>
</div>
@endforeach

        </div>
    </div>
</div>
<!-- end products -->

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const wishlistButtons = document.querySelectorAll('.add-to-wishlist');

        wishlistButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;

                // إرسال طلب AJAX لإضافة المنتج
                fetch("{{ route('wishlist.add') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ product_id: productId }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Added!',
                            text: data.message,
                        });
                    } else {
                        Swal.fire({
                            icon: 'info',
                            title: 'Oops!',
                            text: data.message,
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Something went wrong. Please try again.',
                    });
                });
            });
        });
    });
</script>

@endsection
