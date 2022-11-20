@include('account.layouts.includes.header')
      <!-- #Top Bar -->
      @include('sweetalert::alert')
      <!-- Widgets -->
      @yield('content')
      @yield('mainjs_script')
@include('account.layouts.includes.footer')