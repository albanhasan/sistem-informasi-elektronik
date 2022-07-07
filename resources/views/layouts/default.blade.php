<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- STYLES -->
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body>
    <!-- Left Panel -->
    <!-- SIDEBAR -->
    @include('includes.sidebar') 
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <!-- NAVBAR -->
        @include('includes.navbar')
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <!-- DASHBOARD -->
            @yield('content')
            <!-- /.content -->
            <div class="clearfix"></div>
            <!-- Footer -->
            <footer class="site-footer">
                <div class="footer-inner bg-white">
                    <div class="row">
                        <div class="col-sm-6">
                            Copyright &copy; 2018 Ela Admin
                        </div>
                        <div class="col-sm-6 text-right">
                            Designed by <a href="https://colorlib.com">Colorlib</a>
                        
                        
                        </div>
                    </div>
                </div>
            </footer>
            <!-- /.site-footer -->
        </div>
        <!-- /#right-panel -->

        <!-- SCRIPTS -->
        @stack('before-script')
        @include('includes.script')
        @stack('after-script')
</body>

</html>