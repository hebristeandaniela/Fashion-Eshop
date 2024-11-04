@extends('frontend.layouts.master')

@section('title', 'E-SHOP || Despre noi')

@section('main-content')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Acasă<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Despre noi</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Despre noi -->
	<section class="about-us section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="about-content">
							@php
$settings = DB::table('settings')->get();
							@endphp
							<h3>Bine ai venit la <span>Eshop</span></h3>
							<p>@foreach($settings as $data) {{$data->description}} @endforeach</p>
							<div class="button">
								<a href="{{route('blog')}}" class="btn">Blogul nostru</a>
								<a href="{{route('contact')}}" class="btn primary">Contactaţi-ne</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="about-img overlay">
							{{-- <div class="button">
								<a href="https://www.youtube.com/watch?v=nh2aYrGMrIE" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
							</div> --}}
							<img src="@foreach($settings as $data) {{$data->photo}} @endforeach" alt="@foreach($settings as $data) {{$data->photo}} @endforeach">
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- End Despre noi -->


	<!-- Start Shop Services Area -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Transport Gratuit</h4>
						<p>Pentru comenzi peste 200 RON</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Retur Gratuit</h4>
						<p>Retururi în 30 de zile</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Plată Securizată</h4>
						<p>Plată 100% securizată</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Cel Mai Bun Preț</h4>
						<p>Preț garantat</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>

			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->

	@include('frontend.layouts.newsletter')
@endsection
