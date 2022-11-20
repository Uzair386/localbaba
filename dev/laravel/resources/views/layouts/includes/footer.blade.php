<!-- =========================
    Footer Section
============================== -->
<div id="doba-footer" class="visitor-footer visitor-mobile-footer ">
  <div class="footer-info-wrap ">
    <div class="footer-info-content">
      <div class="footer-info-col pc-des">
        <div class="footer-title" style="margin-bottom: 0px;">
          <span class="doba-footer-logo"><span
                    style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span
                      style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%"><img
                        style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                        alt="" aria-hidden="true" src="{{asset($settings->logo)}}" /></span><img
                      alt="local baba logo"
                      src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                        alt="doba logo"
                        srcSet="{{asset($settings->logo)}}, {{asset($settings->logo)}}"
                        src="{{asset($settings->logo)}}" decoding="async"
                        data-nimg="intrinsic"
                        style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                        loading="lazy" /></noscript></span></span></div>
        <ul class="footer-group">
          <li class="footer-text paragraph">
            {!! strip_tags(str_limit($settings->site_about, $limit = 100, $end = '...')) !!}
          </li>
          <li><a class="more" href="{{route('single_page', ['slug'=>'about'])}}" title="View More">View More<i
                      type="right" class="cb-icon icon-right "></i></a></li>
        </ul>

      </div>
      <div class="footer-info-col col-block ">
        <div class="footer-title footer-list-title">Company<i
                  class="cb-icon icon-down-arrow-Bold mobile-show " type="down-arrow-Bold"></i></div>
        <ul class="col-list">
          <li><a href="{{route('single_page', ['slug'=>'about'])}}" target="_blank">About us</a></li>
          <li><a href="#" target="_blank">Get in Touch</a></li>
          <li class="footer-text pc-des">{{$settings->site_name}} <br />{{$settings->site_number}} <br />
            {{$settings->site_email}} <br />
            <div style="inline-size: 300px; overflow-wrap: break-word;">{{$settings->site_address}}</div></li>
          <li class="footer-text mobile-show address">{{$settings->site_address}}</li>
        </ul>
      </div>
      <div class="footer-info-col col-block ">
        <div class="footer-title footer-list-title">Resources<i
                  class="cb-icon icon-down-arrow-Bold mobile-show " type="down-arrow-Bold"></i></div>
        <ul class="col-list">
          <li><a href="#" target="_blank">Return &amp; Refund Policy</a></li>
          <li><a href="{{route('single_page', ['slug'=>'tos'])}}" target="_blank">Terms of Use</a></li>
          <li><a href="{{route('single_page', ['slug'=>'privacy-policy'])}}" target="_blank">Privacy Policy</a></li>
          <li><a href="{{route('single_page', ['slug'=>'posts'])}}" rel="noopener" target="_blank">Blog</a></li>
        </ul>
      </div>
      <div class="footer-info-col mobile-des">
        <div class="footer-title">
          <span class="doba-footer-logo">
            <span style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%"><span style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-width:100%">
                <img style="display:block;max-width:100%;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0"
                     alt="" aria-hidden="true"
                     src="{{asset($settings->logo)}}" /></span>
              <img alt="doba logo"
                      src="{{asset($settings->logo)}}"
                      decoding="async" data-nimg="intrinsic"
                      style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%" /><noscript><img
                        alt="doba logo"
                        srcSet="{{asset($settings->logo)}}"
                        src="{{asset($settings->logo)}}" decoding="async"
                        data-nimg="intrinsic"
                        style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                        loading="lazy" /></noscript>
            </span>
          </span>
        </div>
        <ul class="footer-group">
          <li class="footer-text paragraph">
            {!! strip_tags(str_limit($settings->site_about, $limit = 100, $end = '...')) !!}
          </li>
          <li class="more-wrap"><a class="more" href="{{route('single_page', ['slug'=>'about'])}}" title="View More">View More<i type="right" class="cb-icon icon-right "></i></a>
          </li>
        </ul>
      </div>
    </div>
    <!-- =========================
        CopyRight
    ============================== -->
    <div class="footer-bottom d-flex justify-content-between text-white pt-4 wow fadeInUp animated mx-4 mx-md-0" style="margin-top: 0px" data-wow-delay="1500ms">
      <span>©Copyright 2022 {{$settings->site_name}} - All Rights Reserved</span>
      <div class="wb-social-media">
        <a href="{{$settings->social_facebook}}" class="fb" name="Facebook" ><i class="fa fa-facebook-official"></i></a>
        <a href="{{$settings->social_twitter}}" class="vn" name="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="{{$settings->social_instagram}}" class="gp" name="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a rel="alternate" type="application/atom+xml" href="{{ url('/feed') }}" name="Rss Feed"><i class="fa fa-rss" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- =========================
  Main Loding JS Script
============================== -->
<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="{{asset('js\jquery-ui.js')}}"></script>
<script src="{{asset('js\popper.js')}}"></script>
<script src="{{asset('js\bootstrap.min.js')}}"></script>
<script src="{{asset('js\jquery.counterup.min.js')}}"></script>
<script src="{{asset('js\jquery.nav.js')}}"></script>
<!-- <script src="js/jquery.nicescroll.js')}}"></script> -->
<script src="{{asset('js\jquery.rateyo.js')}}"></script>
<script src="{{asset('js\jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('js\jquery.sticky.js')}}"></script>
<script src="{{asset('js\mobile.js')}}"></script>
<script src="{{asset('js\lightslider.min.js')}}"></script>
<script src="{{asset('js\owl.carousel.min.js')}}"></script>
<script src="{{asset('js\circle-progress.min.js')}}"></script>
<script src="{{asset('js\waypoints.min.js')}}"></script>

<script src="{{asset('js\simplePlayer.js')}}"></script>

<script src="{{asset('js\main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}",'',{timeOut: 100000})
  @endif
  @if(Session::has('info'))
    toastr.info("{{Session::get('info')}}",'',{timeOut: 100000})
  @endif
  @if(Session::has('error'))
    toastr.error("{{Session::get('error')}}",'',{timeOut: 100000})
  @endif
  @if(Session::has('warning'))
    toastr.warning("{{Session::get('warning')}}",'',{timeOut: 100000})
  @endif
</script>
</body>
</html>
