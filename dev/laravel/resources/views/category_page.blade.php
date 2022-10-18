@extends('layouts.app')
@section('title', 'Category: '.$category_page->name.'')
@section('description', 'Category | '.$settings->site_name.'')
@section('content')
<!-- =========================
        Slider Section
    ============================== -->
<section class="blog-slider-tow-grid wd-slider-section">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="text-center">
               <h1 class="wishlist-slider-title">{!!$category_page->name!!}</h1>
               <div class="page-location pt-0">
                  <ul>
                     <li><a href="">
                        {{ __('messages.category') }}
                        </a>
                     </li>
                     < </ul> </div> </div> </div> </div> </div> </section> 
                     <!--=========================Product  Section==============================-->
                        <section id="product-amazon" class="product-shop-page product-shop-full-grid">
                           <div class="container">
                              <div class="row">
                                 <div class="order-2 order-md-2 col-12 col-md-4 col-lg-3 ">

                                    <!-- =========================  Category Option ============================== -->
                                    <div class="side-bar category category-md">
                                       <h5 class="title">{{ __('messages.categories') }}</h5>
                                       <ul class="dropdown-list-menu">
                                          @foreach($categories as $category)
                                          <li>
                                             <a href="{{route('category_page', ['slug'=>$category->slug])}}"><i
                                                   class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                {{$category->name}}</a>
                                          </li>
                                          @endforeach
                                       </ul>
                                    </div>
                                 </div>
                                 <!-- ========================= Main Option ============================== -->

                                 <div class="order-1 order-md-1 col-12 col-md-8 col-lg-9 product-grid">
                                    <div class="row">
                                       <div class="col-12">
                                          <div class="filter row">
                                             <div class="col-8 col-md-3">
                                                <h6 class="result"><b>{{ __('messages.Total') }}</b> {{$products->total()}} {{ __('messages.Showing') }}
                                                   {{$products->count()}} {{ __('messages.results') }}</h6>
                                             </div>
                                             <div class="col-6 col-md-6 filter-btn-area text-center">
                                             </div>
                                             <div class="col-4 col-md-3 sorting text-right">
                                                <a href="">
                                                   <i class="fa fa-th active-color" aria-hidden="true"></i>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- <div class="owl-carousel"> -->
                                       @foreach($products as $product)
                                          <div class="col-sm-6 col-md-6 col-lg-4 reviews-load-more">
                                             <figure class="figure product-box row">
                                                <div class="col-12 col-md-12 col-lg-12 col-xl-12 p0">
                                                   <div class="product-box-img">
                                                      <a href="{{route('product_page', ['slug'=>$product->slug,'id'=>$product->id])}}">
                                                         <img src="{{asset($product->image)}}" class="figure-img img-fluid" alt="{{$product->name}}">
                                                      </a>
                                                   </div>
                                                   <div class="quick-view-btn">
                                                      <div class="compare-btn">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-md-12 col-lg-12 col-xl-12 p0">
                                                   <div class="figure-caption text-center">
                                                      <div class="content-excerpt">
                                                         <div class="product-name">
                                                            <span title='{!!$product->name!!}'>{!!$product->name!!}</span>
                                                         </div>
                                                         <!--<p></p>-->
                                                      </div>
                                                      <div class="product-stock-process text-dark d-flex justify-content-between mb-4">
                                                         <div class="inventory d-flex align-items-center">
                                                            <i type="warehouse" class="cb-icon icon-warehouse mb-1"></i>
                                                            <span class="value ml-1">@if($product->stock>0){{$product->stock}}<span class="in-stock-text"> in Stock @else Out of stock @endif</span></span>
                                                         </div>
                                                         <div class="processTime">

                                                            <span class="value">{!!$settings->currency->symbol!!}{{number_format($product->price,2)}}</span>
                                                         </div>
                                                      </div>
                                                      <div class="custom_btn text-center">
                                                         <form action="{{route('cart.add')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input  name="qty" type="hidden" value="1" />
                                                            <input type="hidden" name="product_id" value="{{$product->id}}" />
                                                            @if($product->stock>0)
                                                               <button class="ant-btn ant-btn-primary">{{$settings->cart_button}} </button>&nbsp
                                                            @endif
                                                            <a href="{{route('product_page', ['slug'=>$product->slug,'id'=>$product->id])}}"  class="ant-btn btn-light">Info</a>
                                                         </form>
                                                      </div>
                                                   </div>
                                                </div>
                                             </figure>
                                          </div>
                                       @endforeach



                                       <div class="col-12 text-center">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="float-right">
                                                   <nav class="wd-pagination">
                                                      <ul class="pagination">
                                                         {{$products->links()}}
                                                      </ul>
                                                   </nav>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </section>
                        <style>
                           .wd-pagination a {
                              font-size: 14px;
                              color: #666666;
                              font-weight: 400;
                           }

                           .wd-pagination a:hover {
                              background: #ff9800;
                              color: #fff;
                           }

                           .wd-pagination .page-link {
                              border-color: #f5f5f5;
                           }

                           .wd-pagination .page-item:last-child .page-link,
                           .wd-pagination .page-item:first-child .page-link {
                              background: #666666;
                              color: #fff;
                           }

                           .wd-pagination .page-item:last-child .page-link:hover,
                           .wd-pagination .page-item:first-child .page-link:hover {
                              background: #ff9800;
                           }

                           .wd-pagination .page-item.active .page-link {
                              background: #ff9800;
                              color: #fff;
                           }
                        </style>




                        @endsection