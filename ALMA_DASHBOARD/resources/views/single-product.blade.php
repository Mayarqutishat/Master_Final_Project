@extends('layouts.masterPage')
@section('content')


	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{asset('assetsPages/assets/img/bags/bag1.jfif')}}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>Bags</h3>
						<p class="single-product-pricing"><span>10JD</p>
						<p>  this bag is spacious, lined with soft fabric and equipped with pockets for organization. Ideal for everyday use or special occasions, this unique piece combines functionality with artistic expression, making it a standout accessory in any wardrobe. Perfect for those who appreciate handmade craftsmanship and the charm of personalized items!</p>
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" placeholder="0">
							</form>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							<p><strong>Categories: </strong>Bags</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->
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
