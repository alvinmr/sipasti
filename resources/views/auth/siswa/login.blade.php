<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description"
            content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords"
            content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>Login Page - Vuexy - Bootstrap HTML admin template</title>
        <link rel="apple-touch-icon" href="{{ asset('') }}app-assets/images/ico/apple-icon-120.png">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}app-assets/images/ico/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        @include('dist.vendor-css')
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        @include('dist.theme-css')

        <!-- BEGIN: Page CSS-->
        
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/style.css">
        <!-- END: Custom CSS-->

    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->

    <body
        class="vertical-layout vertical-menu-modern dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page"
        data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="dark-layout">
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="row flexbox-container">
                        <div class="col-xl-8 col-11 d-flex justify-content-center">
                            <div class="card bg-authentication rounded-0 mb-0">
                                <div class="row m-0">
                                    <div class="col-lg-6 d-lg-block d-none align-self-center">
                                        <img src="{{ asset('') }}images/login-siswa.png" width="90%" height="90%" alt="branding logo">
                                    </div>
                                    <div class="col-lg-6 col-12 p-0">
                                        <div class="card rounded-0 mb-0 px-2">
                                            <div class="card-header pb-1">
                                                <div class="card-title">
                                                    <h4 class="mb-0">Login</h4>
                                                </div>
                                            </div>
                                            <p class="px-2">Selamat datang! yuk mari login dulu</p>
                                            <div class="card-content">
                                                <div class="card-body pt-1">
                                                    <form action="/login-siswa" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="form-label-group form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" id="nisn" placeholder="NISN" name="nisn">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                            <label for="nisn">NISN</label>
                                                        </div>
                                                        <div class="form-group d-flex justify-content-between align-items-center">
                                                            <div class="text-right">
                                                                <a href="{{ route('home') }}" class="card-link">Login Admin/Petugas?</a>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-inline round">Login</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="login-footer">
                                                <div class="divider">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
        <!-- END: Content-->


        <!-- BEGIN: Vendor JS-->
        @include('dist.vendor-js')
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        @include('dist.theme-js')
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        @if (session()->has('message'))
        <script>
            Swal.fire({
            title: '{{ session("judul") }}!',
            text: '{{ session("message") }}',
            type: '{{ session("jenis") }}',
            confirmButtonText: 'Oke'
            })
        </script>
        @endif
        <!-- END: Page JS-->

    </body>
    <!-- END: Body-->

</html>