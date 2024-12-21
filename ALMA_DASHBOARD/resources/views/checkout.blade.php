@extends('layouts.masterPage')
@section('content')

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
					
						<h1>Check Out Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Billing detail
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="index.html">
										<p>
										  <label for="phone"> Phone</label>
										  <input type="tel" id="phone" >
										</p>
									  
										<p>
										  <label for="country"> Country</label>
										  <input type="text" id="country" >
										</p>
									  
										<p>
										  <label for="city"> City</label>
										  <input type="text" id="city" >
										</p>
									  
										<p>
										  <label for="address"> Address</label>
										  <input type="text" id="address" >
										</p>
										<a href="#" class="boxed-btn">Edit Your Information</a>
									  </form>
						        </div>
						      </div>
						    </div>
						  </div>
						 
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
						        	<p>Your card details goes here.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
    <div class="order-details-wrap">
        <table class="order-details">
            <thead>
                <tr>
                    <th colspan="2" class="order-title">Your Order Details</th>
                </tr>
            </thead>
            <tbody class="order-details-body">
                <tr>
                    <td>Product</td>
                    <td>Total</td>
                </tr>
                <tr>
                    <td>Pink circle Bag</td>
                    <td>10JD</td>
                </tr>
                <tr>
                    <td>3 Frames</td>
                    <td>11JD</td>
                </tr>
				<tr>
                    <td>Needles</td>
                    <td>6JD</td>
                </tr>
            </tbody>
            <tbody class="checkout-details">
                <tr>
                    <td>Total &Shipping</td>
                    <td>32JD</td>
                </tr>
				<tr>
                    <td>Coupon</td>
                    <td>---</td>
                </tr>
				
                <tr>
                    <td>Payment Method</td>
                    <td>
                 
                        <label>
                            <input type="radio" name="payment-method" value="cod" checked> Cash on Delivery
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>
        <a href="{{ url('/thanks') }}" class="boxed-btn">Place Order</a>
		
    </div>
</div>

</div>
</div>

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