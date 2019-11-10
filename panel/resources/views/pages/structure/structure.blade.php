<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>@yield('title', 'Mavi Kuryem - Yonetim Paneli')</title>

    <meta name="author" content="berk topcu">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <link rel="shortcut icon" href="/img/favicon.png">

   <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/plugins.css">

    <link rel="stylesheet" href="/css/main.css">

     <link rel="stylesheet" href="/css/themes.css">

    <script src="/js/vendor/modernizr.min.js"></script>

    @yield('especial_header')
</head>
<body>
<div id="page-wrapper">


    <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

        <!-- Main Sidebar -->
            @include('moduls.leftbar')
        <!-- END Main Sidebar -->

        <!-- Main Container -->
        <div id="main-container">

            @include('moduls.header')


                <!-- END Dashboard Header -->

                @yield('content')

            <!-- END Page Content -->

            <!-- Footer -->
            @include('moduls.footer')
            <!-- END Footer -->
        </div>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="/js/vendor/jquery.min.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/app.js"></script>


@yield('especial_footer')

</body>
</html>
