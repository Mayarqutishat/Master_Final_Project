
@extends('layouts.masterPage')
@section('content')

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr class="table-body-row">
									<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="{{asset('assetsPages/assets/img/bags/bag1.jfif') }}" alt=""></td>
									<td class="product-name">Pink circle Bag</td>
									<td class="product-price">10JD</td>
									<td class="product-quantity"><input type="number" placeholder="0"></td>
									<td class="product-total">1</td>
								</tr>
								<tr class="table-body-row">
									<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="{{asset('assetsPages/assets/img/product 2.jpg') }}" alt=""></td>
									<td class="product-name">3 Frames</td>
									<td class="product-price">11JD</td>
									<td class="product-quantity"><input type="number" placeholder="0"></td>
									<td class="product-total">1</td>
								</tr>
								<tr class="table-body-row">
									<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="{{asset('assetsPages/assets/img/EmbroideryNeedles/product1.jpg') }}" alt=""></td>
									<td class="product-name"> Needles</td>
									<td class="product-price">6JD</td>
									<td class="product-quantity"><input type="number" placeholder="0"></td>
									<td class="product-total">1</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>27JD</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>5JD</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>32JD</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
						
							<a href="{{ url('/checkout') }}" class="boxed-btn black">Check Out</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->
     
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