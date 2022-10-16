@extends('layouts.app')
@section('title', 'Home: '.$settings->site_name.'')
@section('description', ''.$settings->meta_name.'')
@section('content')
	<div id="dobaMainContent">
		<div class="home-main-wrap">
			<div class="dsc-cnt products-wrap">
				<div class="categories-wrap">
					<div class="category-bar" id="j-category-bar">
						<ul class="primary-category">
							@foreach($categories as $category)
								<li class="category-item ">
									<div class="category-title">
										<a title="{{$category->name}}" href="{{route('category_page', ['slug'=>$category->slug])}}">
											{{$category->name}}
										</a><i type="right" class="cb-icon icon-right "></i></div>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="top-banner-wrap">
						<!-- =========================
							Gets Slider
						============================== -->
						@include('layouts.includes.slim_slider')
					</div>
					<div class="introduction-wrap ">
						<div class="info-bg"></div>
						<div class="info-main">
							<h2>Dropshipping Simplified</h2>
							<ul class="advantge">
								<li><i type="check" class="cb-icon icon-check "></i><span
											class="title">Seamless Integrations</span></li>
								<li><i type="check" class="cb-icon icon-check "></i><span
											class="title">Secure Supply Chain Support</span></li>
								<li><i type="check" class="cb-icon icon-check "></i><span
											class="title">Dedicated Account Manager</span></li>
							</ul>
							<div class="btn-group"><a id="register-intro-btn"
													  class="sign-up ant-btn-primary" target="_blank"
													  href="{{ url('/register') }}">Sign up</a></div>
							<div class="help-cneter ">
								<div class="help-top">
									<h3>Help Center</h3><a class="more sc-help-view-more" href="/help">View
										More<i type="right" class="cb-icon icon-right "></i></a>
								</div>
								<ul class="help-bottom">
									<li><a class="sc-help-0" href="/help/guide/qYDPVvvsqcbe">Integrate My
											Store with Doba</a></li>
									<li><a class="sc-help-1" href="/help/guide/vHDRVVbIbYqQ">Discover
											Products &amp; Suppliers</a></li>
									<li><a class="sc-help-2" href="/help/guide/bBqZVbDuqPvK">List &amp;
											Manage Products</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

<!-- =========================
        Hot-Products Section
    ============================== -->

	<div class="hot-top-wrap">
		<div class="products-box  hot-products">
			<div class="products-box-left">
				<h2 class="title">{{__('messages.Hot Products')}}</h2>
				<div class="descs">
					<div class="desc-item">In-demand</div>
					<div class="desc-item">Competitive prices</div>
				</div><a class="btn" href="/hot-products/"><span>View All</span><i type="right"
																				   class="cb-icon icon-right "></i></a><a class="m-btn"
																														  href="/hot-products/"></a>
			</div>
			<div class="products-box-right">
				@foreach($products as $product)
					<div class="product-item">
						<div class="img-wrapper">
							<div class="img-box" style="padding-top: 185px">
								<a class="sc-pds-hot-products-1"
								   title="{!!$product->name!!}"
								   href="{{route('product_page', ['slug'=>$product->slug,'id'=>$product->id])}}">
									<div class="lazyload-wrapper ">
										<img height="200" src="{{asset($product->image)}}"
											 alt="{{$product->name}}">
									</div>
								</a>
							</div>
						</div>
						<div class="name">
							<a title="{!!$product->name!!}"
							   class="sc-pds-hot-products-1"
							   href="{{route('product_page', ['slug'=>$product->slug,'id'=>$product->id])}}">
								{!!$product->name!!}
							</a>
						</div>
						<div class="price">{!!$settings->currency->code!!}{!!$settings->currency->symbol!!} <b>{{number_format($product->price,2)}}</b></div></div>
				@endforeach
			</div>
		</div>
	</div>
			</div>
		</div>
	</div>
<!-- =========================
        Weekly Top News
    ==============================
@if(count($posts) >0)

<section id="weekly-news">
	<div class="container-fluid custom-width">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="news-title"><i class="fa fa-newspaper-o" aria-hidden="true"></i>{{ __('messages.Recent Posts') }}</h2>
			</div>
			@foreach($posts as $post)
			<div class=" col-sm-6 col-md-6 col-xl-3 wow fadeInRight animated" data-wow-delay="300ms">
				<div class="weekly-news-box">
					<figure class="figure">
						<div class="weekly-news-img text-left">
							<img src="{{asset($post->image)}}" class="figure-img img-fluid rounded"
								alt="{!!$post->title!!}">
							<div class="weekly-news-title">
								<a href="{{route('post_page', ['slug'=>$post->slug])}}">
									<h4>{!!$post->title!!}</h4>
								</a>
							</div>
						</div>
						<figcaption class="figure-caption">
							<div class="blog-meta container">
								<div class="row">
									<div class="col blog-meta-box">
										<a href=""><i class="fa fa-user" aria-hidden="true"></i>{{$post->author}}</a>
									</div>
									<div class="col blog-meta-box">
										<a href=""><i class="fa fa-clock-o"
												aria-hidden="true"></i>{{$post->created_at->diffForHumans()}}</a>
									</div>
								</div>
							</div>
							<div class="text-center">
								{!! strip_tags(str_limit($post->content, $limit = 180, $end = '...')) !!}
							</div>
							<a href="{{route('post_page', ['slug'=>$post->slug])}}"
								class="badge badge-light wd-news-more-btn">{{ __('messages.Read_More') }}<i class="fa fa-arrow-right"
									aria-hidden="true"></i></a>
						</figcaption>
					</figure>
					<div class="weekly-news-shape"></div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif
					-->
@endsection