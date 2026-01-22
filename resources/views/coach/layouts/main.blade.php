 @include('coach.layouts.partials.header')

    <!-- Main Menu -->
    @include('coach.layouts.partials.sidebar')
     <div class="page-body">
        @yield('content')
    </div>
    @include('coach.layouts.partials.footer')
        @yield('script')
</body>

</html>