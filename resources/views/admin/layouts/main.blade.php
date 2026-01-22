 @include('admin.layouts.partials.header')

    <!-- Main Menu -->
    @include('admin.layouts.partials.sidebar')

        @yield('content')
    @include('user.layouts.partials.footer')
        @yield('script')
</body>

</html>