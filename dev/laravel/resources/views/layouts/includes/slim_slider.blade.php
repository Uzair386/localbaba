<!-- =========================
Slider Section
============================== -->
<section id="main-slider-section" class="shop-slider-section">
<div id="shop-slider" class="owl-carousel owl-theme product-review">
@foreach($slides as $slide)
<a href="{{$slide->url}}">
    <div class="item bc-slider-bg" style="
    background-image: url({{asset($slide->image)}});
    background-repeat: no-repeat;
    background-size: 100% 100%;
    height: 400px;
    position: relative;">
        <div class="container">
            <div class="row">
            <div class="slider-text col-12">
            </div>
        </div>
        </div>
    </div>
</a>
@endforeach
</div>
</section>