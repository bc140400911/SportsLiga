<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SportsLiga</title>
    @include('includes.frontend.styles')
</head>

<body>

    <!-- layout-->
    <div id="layout">
        <!--- header -->
        @include('includes.frontend.header')
        <!--- sections -->
        @yield('slider')
        @yield('football-news')
        @yield('cricket-news')
        @yield('about-us')
        @yield('contact-us')
        @yield('tournament')
        @yield('userProfile')

    </div>
    <!-- End layout-->

    <!-- Script Files-->
    @include('includes.frontend.scripts')
</body>


    @include('includes.frontend.footer')
</html>
