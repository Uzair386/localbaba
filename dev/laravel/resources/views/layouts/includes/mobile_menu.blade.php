<div class="dsc-pid-header ">
    <div>
        <div class="">
            <div class="pid-header">
                <i type="menu" class="cb-icon icon-menu "></i>
                <div class="logo-block">
                    <a title="{{$settings->site_name}}" href="/">
                        <img loading="eager"
                             height="22" quality="100" alt="{{$settings->site_name}}"
                             src="{{asset($settings->logo)}}" />
                    </a>
                </div>
                <div class="m-header-search-wrap type1 ">
                    <div class="search-wrap">
                        <span class="ant-input-affix-wrapper hidden-placeholder">
                            <input
                                    class="ant-input" maxLength="200" dsc-name="header_search_m"
                                    placeholder="Search Products" type="text"
                                    value="" />
                            <span class="ant-input-suffix"><i type="magnifier" style="color:#028A0F;font-weight:bold" class="cb-icon icon-magnifier "></i></span>
                        </span>
                    </div>
                    <div class="full-screen hidden" catchtouchmove="ture">
                        <div class="m-search-input">
                            <span class="ant-input-affix-wrapper">
                                <input class="ant-input" dsc-name="header_search_m2" autofocus="" maxLength="200"
                                        placeholder="Search Products"
                                        type="text" value="" />
                                <span class="ant-input-suffix">
                                    <span role="button" aria-label="close-circle" tabindex="-1" class="anticon anticon-close-circle ant-input-clear-icon-hidden ant-input-clear-icon">
                                        <svg viewBox="64 64 896 896" focusable="false" data-icon="close-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                            <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm165.4 618.2l-66-.3L512 563.4l-99.3 118.4-66.1.3c-4.4 0-8-3.5-8-8 0-1.9.7-3.7 1.9-5.2l130.1-155L340.5 359a8.32 8.32 0 01-1.9-5.2c0-4.4 3.6-8 8-8l66.1.3L512 464.6l99.3-118.4 66-.3c4.4 0 8 3.5 8 8 0 1.9-.7 3.7-1.9 5.2L553.5 514l130 155c1.2 1.5 1.9 3.3 1.9 5.2 0 4.4-3.6 8-8 8z"></path>
                                        </svg>
                                    </span>
                                    <i type="magnifier" style="color:#028A0F;font-weight:bold" class="cb-icon icon-magnifier "></i></span></span>
                            <span class="cancel">Cancel</span>
                        </div>
                    </div>
                </div>
                <div class="user-box">
                    <div class="m-user-box d-flex justify-content-end">
                        @if (Auth::check())
                            <a href="{{ url('/account') }}" class="login-txt">My Account</a>
                            <a href="{{ url('/account/logout') }}" class="login-txt">Logout</a>
                        @else
                            <a href="{{ url('/login') }}" class="login-txt">Login</a>
                            <a href="{{ url('/register') }}" class="login-txt">Signup</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
