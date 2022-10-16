<div class="visitor-header-content-wrapper">
    <div class="">
        <div class="dsc-header-visitor">
            <div class="pc-header">
                <div>
                    <div class="">
                        <div class="pc-header-main" id="pc-header-main">
                            <div class="inner">
                                <h2 class="logo-block">
                                    <a href="/">
                                        <span style="box-sizing:border-box;display:inline-block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative;max-width:100%; max-height: 38px;">
                                                            <span style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;max-height: 38px">
                                                                <img style="display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0; max-height: 38px"
                                                                     alt="" aria-hidden="true"
                                                                     src="{{asset($settings->logo)}}" />
                                                            </span>
                                                            <img
                                                                    alt="{{$settings->site_name}}"
                                                                    srcSet="{{asset($settings->logo)}}"
                                                                    src="{{asset($settings->logo)}}" decoding="async"
                                                                    data-nimg="intrinsic"
                                                                    style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                                                            />
                                                        </span>
                                    </a>
                                </h2>
                                <div class="header-search-container">
                                    <div class="header-search-wrap">
                                        <div class="search-wrap">
                                            <form method="get" action="{{ url('/search') }}" class="w-100">
                                            <span class="ant-input-affix-wrapper">

                                                <input class="ant-input" maxLength="200"
                                                       dsc-name="header_search_pc"
                                                       placeholder="Search Products" type="text"
                                                       value="" name="query" required/>
                                                <span class="ant-input-suffix">
                                                    <span role="button" aria-label="close-circle"
                                                            tabindex="-1"
                                                            class="anticon anticon-close-circle ant-input-clear-icon-hidden ant-input-clear-icon"><svg
                                                                viewBox="64 64 896 896" focusable="false"
                                                                data-icon="close-circle" width="1em"
                                                                height="1em" fill="currentColor"
                                                                aria-hidden="true">
                                                            <path
                                                                    d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm165.4 618.2l-66-.3L512 563.4l-99.3 118.4-66.1.3c-4.4 0-8-3.5-8-8 0-1.9.7-3.7 1.9-5.2l130.1-155L340.5 359a8.32 8.32 0 01-1.9-5.2c0-4.4 3.6-8 8-8l66.1.3L512 464.6l99.3-118.4 66-.3c4.4 0 8 3.5 8 8 0 1.9-.7 3.7-1.9 5.2L553.5 514l130 155c1.2 1.5 1.9 3.3 1.9 5.2 0 4.4-3.6 8-8 8z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <button title="search" type="submit" class="ant-btn ant-btn-primary btn-success">
                                                        <i type="magnifier" class="cb-icon icon-magnifier search-icon"></i>
                                                    </button>
                                                </span>
                                                </span>
                                            </form>
                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="dsc-user-info">
                                    @if (Auth::check())
                                        <div class="bd-r"><a href="{{ url('/account') }}">My Account</a></div>
                                        <a href="{{ url('/account/logout') }}" class="free-trial px-4" style="width: auto">Logout</a>
                                    @else
                                        <div class="bd-r"><a href="{{ url('/login') }}">Login</a></div>
                                        <a href="{{ url('/register') }}" class="free-trial px-4" style="width: auto">Sign Up</a>
                                    @endif

                                    <div class="header-cart ml-2" style="top: 0 !important;">
                                    <a title="Cart" href="{{ url('cart') }}" class="coupon-save">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                        <span class="count">{{Cart::content()->count()}}</span>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.includes.mobile_menu')
    </div>
</div>