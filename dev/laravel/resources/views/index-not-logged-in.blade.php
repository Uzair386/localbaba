@extends('layouts.app')
@section('title', 'Home: '.$settings->site_name.'')
@section('description', ''.$settings->meta_name.'')
@section('content')
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">
	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center">
		<div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
			<div class="row justify-content-center">
				<div class="col-xl-7 col-lg-9 text-center">
					<h1 style="font-size: 40px;">Start your online dropshipping business today.</h1>
					<p>Sell 90,000+ LocalBaba products to customers across EU, Australia and the U.S, without having to hold inventory or arrange shipping and returns.</p>
				</div>
			</div>
			<div class="text-center">
				<a href="{{route('register')}}" class="btn-get-started scrollto sign-up ant-btn-primary">Get Started</a>
			</div>

			<img src="/img/dropship.svg" class="mt-4 w-100" alt="">
		</div>
	</section><!-- End Hero -->

	<main id="main">
		<!-- ======= Dropship Video Section ======= -->
		<section id="about-video" class="about-video">
			<div class="container" data-aos="fade-up">

				<div class="row">
					<div class="col-lg-6 pt-3 pt-lg-0 content" data-aos="fade-right" data-aos-delay="100">
						<div class="text">
							<h3>What Is Dropshipping?</h3>
							<p>
								Join our community of thousands of dropshippers and run an online business
								from the comfort of your own home.
							</p>
							<p>
								Discover 90,000+ LocalBaba products to add to your marketplace. You set the
								price and the profit.
							</p>
							<p>
								We send the products directly to your end customer, arrange returns and
								even advise you on customer support. What could be easier?
							</p>
							<p>
								Do you need more information? You can
								<a href="#" target="_blank" class="video-link">download our dropshipping guide</a>
								and check how easily you can start to dropship with LocalBaba.
							</p>
						</div>
					</div>
					<div class="col-lg-6 video-box align-self-baseline" data-aos="fade-left" data-aos-delay="100">
						<img src="assets/img/about-video.jpg" class="img-fluid" alt="">
						<a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
					</div>

				</div>

			</div>
		</section><!-- End Dropship Video Section -->
		<!-- ======= Dropship How it works Section ======= -->
		<section id="about-video" class="about-video">
			<div class="container" data-aos="fade-up">

				<div class="row">
					<div class="col-lg-12 pt-3 pt-lg-0 content" data-aos="fade-right" data-aos-delay="100">
						<div class="text">
							<h3 class="ml-2 ms-2">How does Dropshipping with LocalBaba work?</h3>
						</div>
						<div class="col-lg-12 video-box align-self-baseline" data-aos="fade-left" data-aos-delay="100">
							<img src="/img/how-it-works.jpg" class="img-fluid" alt="">
						</div>

					</div>

				</div>
		</section><!-- End Dropship How it works Section -->

		<!-- ======= Dropship Why choose us Section ======= -->
		<section id="about-video" class="about-video">
			<div class="container" data-aos="fade-up">

				<div class="row">
					<div class="col-lg-12 pt-3 pt-lg-0 content" data-aos="fade-right" data-aos-delay="100">
						<div class="text">
							<h3 class="text-center">Why Choose LocalBaba?</h3>
						</div>
						<div class="col-lg-12 video-box align-self-baseline" data-aos="fade-left" data-aos-delay="100">
							<img src="/img/why-us-desktop.jpg" class="img-fluid d-none d-md-block" alt="">
							<img src="/img/why-us-mobile.jpg" class="img-fluid d-md-none" alt="">
						</div>

					</div>

				</div>
		</section><!-- End Dropship Why choose us Section -->

	</main><!-- End #main -->
	<div id="preloader"></div>
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>
	<style>
		#hero h1,h3 {
			color: #ef704e !important;
		}
		.back-to-top:hover {
			color: #ef704e !important;
			color: #fff;
		}
		.back-to-top {
			background: #ef7f4e;
			color: #fff;
		}
		.about-video .play-btn {
			background:radial-gradient(#ef7f4e 50%, rgba(255, 255, 255, 0.4) 52%);
		}
		.about-video .play-btn:hover::after {
			border-left:15px solid #ef704e;
		}
		.about-video .play-btn::before {
			border: 5px solid rgb(206 84 36 / 70%);
		}
		a {
			color: #ef7f4e;
		}
		#scrollUp {
			display: none !important;
		}
		.back-to-top:hover {
			background: #ef704e !important;
		}
	</style>
@endsection