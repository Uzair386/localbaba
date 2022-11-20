

    @include('layouts.includes.header')

        <!-- =========================
            Header Section
        ============================== -->

   <!-- =========================
            Content Section
    ============================== -->
                @yield('content')
                @include('sweetalert::alert')
    <!-- =========================
            Footer Section
    ============================== -->
    @include('layouts.includes.footer')
