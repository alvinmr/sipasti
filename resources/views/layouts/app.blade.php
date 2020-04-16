<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="SIPASTI adalah web pembayaran SPP otomatis untuk segala organisasi">
    <meta name="keywords" content="spp otomatis, SPP, Web spp otomatis">
    <meta name="author" content="ALVIN">
    <title>SPP</title>
    <link rel="apple-touch-icon" href="{{ asset('') }}app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" data-turbolinks-track="true" defer></script>


    <!-- BEGIN: Vendor CSS-->
    @include('dist.vendor-css')
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    @include('dist.theme-css')

    <!-- BEGIN: Page CSS-->
    @yield('page-css')
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    @include('dist.custom-css')
    <!-- END: Custom CSS-->

    <livewire:styles>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    @include('dist.navbar')    
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('dist.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">            
                <!-- Content Start -->
                @yield('content')
                <!-- Content end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('dist.footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    @include('dist.vendor-js')
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->    
    @yield('page-vendor-js')
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    @include('dist.theme-js')
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @yield('page-js')
    <!-- END: Page JS-->

    {{-- LiveWire --}}
    <livewire:scripts>

</body>
<!-- END: Body-->

</html>