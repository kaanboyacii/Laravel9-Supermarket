<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>İz Market Yönetici Girişi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('assets')}}/admin/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/metisMenu.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/typography.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/default-css.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/styles.css">
    <link rel="stylesheet" href="{{asset('assets')}}/admin/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{asset('assets')}}/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="{{ route('admin_logincheck') }}" method="post" class="pt-3">
                    @csrf
                    <div class="login-form-head">
                        <h4>Yönetici Giriş</h4>
                    </div>
                    <div class="login-form-body">
                        @include('home.messages')
                        <div class="form-group">
                            <input name="email" id="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input name="password" id="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Beni Hatırla</label>
                                </div>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Giriş Yap <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Hesabınız Yok mu? <a href="register.html">Üye Ol</a></p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="{{asset('assets')}}/admin/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('assets')}}/admin/js/popper.min.js"></script>
    <script src="{{asset('assets')}}/admin/js/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/admin/js/owl.carousel.min.js"></script>
    <script src="{{asset('assets')}}/admin/js/metisMenu.min.js"></script>
    <script src="{{asset('assets')}}/admin/js/jquery.slimscroll.min.js"></script>
    <script src="{{asset('assets')}}/admin/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="{{asset('assets')}}/admin/js/plugins.js"></script>
    <script src="{{asset('assets')}}/admin/js/scripts.js"></script>
</body>

</html>
