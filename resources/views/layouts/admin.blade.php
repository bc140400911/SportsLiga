<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8">
    <title>SportsLiga</title>

    <!-- style files -->
    @include('includes.backend.styles')
</head>
<!-- END HEAD -->

<body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> <!-- remove ks-page-header-fixed to unfix header -->

    <!-- admin header -->
    @include('includes.backend.header')

    <!-- admin sidebar -->
    @include('includes.backend.sidebar')
    <!--- script files -->
    @include('includes.backend.scripts')
</body>
</html>