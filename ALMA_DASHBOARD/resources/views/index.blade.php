@extends('layouts.masterPage')
@section('content')
    
    <!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<h1>Embroidery Tools</h1>
							<div class="hero-btns">
								<a href="{{ url('/shop') }}" class="boxed-btn">SHOP NOW </a>
								<a href="{{ url('/contact') }}" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free Shipping</h3>
							<p>When order over 50 JO</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Get refund within 3 days!</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	 <!-- product section -->
	 <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">    
                        <h3><span class="orange-text">New</span> Products</h3>
                        <p>Welcome to our Alma Embroidery Tools Collection.</p>
                    </div>
                </div>
            </div>

			<div class="row">
    @foreach($products as $product)
        <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
                <div class="product-image">
                    <a href="single-product.html">
                        <!-- Dynamic Image -->
						<img src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->url) : asset('assetsPages/assets/img/bags/bag2.jpg') }}" alt="{{ $product->name }}"> </a>
                </div>
                <h3>{{ $product->name }}</h3>
                <p class="product-price">{{ $product->price }} JD</p>
                <a href="wishlist.html" class="cart-btn"><i class="fas fa-heart"></i> Add to Wishlist</a>
                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            </div>
        </div>
		
    @endforeach
</div>

        </div>
    </div>
    <!-- end product section -->
	<!-- cart banner section -->
	<section class="cart-banner pt-100 pb-100">
    	<div class="container">
        	<div class="row clearfix">
            	<!--Image Column-->
            	<div class="image-column col-lg-6">
                	<div class="image">
                    	<div class="price-box">
                        	<div class="inner-price">
                                <span class="price">
                                    <strong>coupon</strong> 
									<br>
									<p>ALMA30</p> 
                                </span>
                            </div>
                        </div>
                    	<img src="{{asset('assetsPages/assets/img/Embroidery Frame/product19.jpg') }}" alt="">
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
					<h3><span class="orange-text">Deal</span> of the month</h3>
                    <h4>Special embroidery thread</h4>
                    <div class="text">Special embroidery threads are designed to add unique textures, colors, and effects to embroidery projects. </div>
                    <!--Countdown Timer-->
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2025/6/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
                	<a href="{{ url('/cart') }}" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section -->
	 
<!-- testimonail-section -->
<div class="testimonail-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 text-center">
				<div class="testimonial-sliders">
					<div class="single-testimonial-slider">
						<div class="client-avater">
							<img src="{{asset('assetsPages/assets/img/avaters/avatar1.png') }}" alt="">
						</div>
						<div class="client-meta">
							<h3>Saira Hakim <span>Local shop owner</span></h3>
							<p class="testimonial-body">
								" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
							</p>
							<div class="last-icon">
								<i class="fas fa-quote-right"></i>
							</div>
						</div>
					</div>
					<div class="single-testimonial-slider">
						<div class="client-avater">
							<img src="{{asset('assetsPages/assets/img/avaters/avatar2.png') }}" alt="">
						</div>
						<div class="client-meta">
							<h3>David Niph <span>Local shop owner</span></h3>
							<p class="testimonial-body">
								" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
							</p>
							<div class="last-icon">
								<i class="fas fa-quote-right"></i>
							</div>
						</div>
					</div>
					<div class="single-testimonial-slider">
						<div class="client-avater">
							<img src="{{asset('assetsPages/assets/img/avaters/avatar3.png') }}" alt="">
						</div>
						<div class="client-meta">
							<h3>Jacob Sikim <span>Local shop owner</span></h3>
							<p class="testimonial-body">
					" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis
                     iste natus error sit voluptatem accusantium "
							</p>
							<div class="last-icon">
								<i class="fas fa-quote-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end testimonail-section -->

	
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 2024</p>
						<h2>We are <span class="orange-text">Alma Embroidery Tools</span></h2>
						<p>Your Premier Destination for Embroidery Tools
						</p>
						<p>we celebrate the art of embroidery by providing a carefully curated selection of high-quality embroidery tools and supplies. includes embroidery hoops, threads, needles, scissors, and fabrics, all sourced from trusted brands to ensure durability and excellence.   Whether you’re a seasoned expert or just starting your stitching journey, we have everything you need to unleash your creativity and bring your designs to life.

							Join our vibrant community of embroidery enthusiasts and discover inspiration through our website.  we believe that every stitch tells a story, and we’re here to supports you every step of the way.
							
							Explore our collection today and let your creativity flourish!</p>
						
						<a href= "{{ url('/about') }}"class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
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
	@endsection