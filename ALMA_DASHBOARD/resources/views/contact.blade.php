
@extends('layouts.masterPage')
@section('content')





	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Get 24/7 Support</p>
						<h1>Contact us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Have you any question?</h2>
						
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form type="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
							<p>
								<input type="text" placeholder="Name" name="name" id="name">
							</p>
							<p>
								<input type="email" placeholder="Email" name="email" id="email">
							</p>
						
							<p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
							
							<p><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Shop Address</h4>
							<p>AMMAN , JORDAN </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i> Shop Hours</h4>
							<p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Contact</h4>
							<p>Phone: 0779348106 <br> Email:Alma_shop@gmail.com </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->


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
     	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->

	<!-- google map section -->
	<div class="embed-responsive embed-responsive-21by9">
		<iframe src="https://maps.google.com/maps?width=600&amp;height=752&amp;hl=en&amp;q=jabal amman&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
	</div>
	<!-- end google map section -->

@endsection