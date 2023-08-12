<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Institute of Quranic Studies">
    <title>Admin | IQS-BD </title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('public/images/apple-icon.png')}}" >
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="36x36"  href="{{asset('public/images/android-icon-36x36.png')}}">
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/default.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/plugin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/dashboard.css')}}" rel="stylesheet" type="text/css">    
    <link href="{{asset('public/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    @yield('css')
</head>

<body>
   
<!-- start Container Wrapper -->
<div id="container-wrapper">
    <!-- Dashboard -->
    <div id="dashboard">
        <!-- Responsive Navigation Trigger -->
        <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>  

        @include('backend.layouts.header')
        @include('backend.layouts.navbar')

        <!-- main contents -->
        <div class="dashboard-content">
            @yield('main-content')
        </div>
    </div>
    <!-- Dashboard / End -->
</div>
<!-- end Container Wrapper -->
    <!-- Back to top start -->
<div id="back-to-top">
    <a href="#"></a>
</div>
<!-- Back to top ends -->

<!--*Scripts*-->
<script src="{{asset('public/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('public/js/canvasjs.min.js')}}"></script>
<script src="{{asset('public/js/chart.js')}}"></script>    
<script src="{{asset('public/js/counterup.min.js')}}"></script>
<script src="{{asset('public/js/dashboard-custom.js')}}"></script>
<script src="{{asset('public/js/jpanelmenu.min.js')}}"></script>

@yield('scripts')

</body>

</html>