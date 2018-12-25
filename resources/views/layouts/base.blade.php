<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('pageTitle') @yield('pageDescription')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/dist/css/skins/skin-red.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
    .error {
        background-color: #ffebe8;
        border: 1px solid #dd3c10;
        padding: 7px 3px;
        text-align: center;
        margin-top: 10px;
    }
    .success{
        background-color: #e0ffef;
        border: 1px solid #33dd12;
        padding: 7px 3px;
        text-align: center;
        margin-top: 10px;
    }
    #response{

    }
</style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>TD</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>@lang('value.attended')</b> Dashboard</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{URL::asset('img_profile/' . Auth::user()->img_profile)}}" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"> {{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{URL::asset('img_profile/' . Auth::user()->img_profile)}}" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->name }} - {{Auth::user()->rule}}
                                    <small>Member since. {{ date("Y-m-d", strtotime(Auth::user()->created_at)) }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{route('PageProfile')}}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Sign out
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{URL::asset('img_profile/' . Auth::user()->img_profile)}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            @if(Auth::user()->rule == "admin")
                <!-- Sidebar Content -->
                @include('sidebar.admin_sidebar')
            @else
                <!-- Sidebar Content -->
                    @include('sidebar.employee_sidebar')

            @endif


            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('pageTitle')
                <small> @yield('pageDescription')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @yield('pageLevel')</a></li>
                <li class="active">@yield('pageActive')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            For a job task
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2018 <a href="https://www.instagram.com/raditsan" target="_blank">Raditsan</a>.</strong> All rights reserved.
    </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{asset('assets/adminlte/bower_components/jquery/dist/jquery.min.j')}}s"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/adminlte/dist/js/adminlte.min.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

<script>
    @if (\Request::is('index'))
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    setupServerClock( jQuery('#showtime'), '{{route('GetFunctionTime')}}', 1000*10, 1000 );
    getLocation();
    get_ipCLient();
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        document.getElementById("txt_lat").value = position.coords.latitude;
        document.getElementById("txt_lng").value = position.coords.longitude;

        /*var lat =  position.coords.latitude;
        var lng =  position.coords.longitude;
        var z = [lat,lng];
        jQuery('#txt_alamat').val('resyncing Location...');
        var url = "uri if have a api key, the code passing to here as response place";

        $.post(url, {latlang:z}, function(response){
            //alert(response);
            document.getElementById("txt_alamat").value = response;
        });*/
    }

    function get_ipCLient(){
        var url = "{{route('GetIP')}}";
        jQuery('#txt_ip').val('resyncing IP...');
        $.get(url, function(msg){
            document.getElementById("txt_ip").value = msg;
        });
    }

    function setupServerClock( clock_element, remote_time_url, remote_update_interval, local_update_interval ) {
        var w = window;
        // client time on resync
        var ct = new Date();
        // server time on resync
        var st = new Date();
        // setup resync
        // w.setInterval( function() {
        // jQuery.ajax( {
        // url: remote_time_url,
        // success: function (data) {
        // ct = new Date();
        // st = new Date(data);
        // }
        // });
        // }, remote_update_interval);
        // setup local clock display
        w.setInterval( function() {
            // the time passed on our local machine since the last resync
            var delta = new Date() - ct;
            var clock = st - 0 + delta; // - 0 to convert to microsecond timestamp
            jQuery('#showtime').val(new Date(clock));
        }, local_update_interval);

        w.setInterval( function() {
            jQuery('#showtime').val('resyncing clock...');
            jQuery.ajax( {
                url: remote_time_url,
                success: function (data) {
                    ct = new Date();
                    st = new Date(data);
                }
            });
        }, remote_update_interval);
    }

    setInterval(function(){
        get_ipCLient();
    }, 1250*2);

    setInterval(function(){
        $('#txt_lat').val('resyncing Location...');
        $('#txt_lng').val('resyncing Location...');
        getLocation();
    }, 1500*10);

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function btIn(){
        //var name = $("input[name=txt_lat]").val();
        var tx_lat = $("input[name=txt_lat]").val();
        var tx_lng = $("input[name=txt_lng]").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'{{route('EmployeeIn')}}',
            data:{
                txt_lat:tx_lat,
                txt_lng:tx_lng,
            },
            success:function(data){
                if(data.status == "success"){
                    fSuccess(data);
                }else{
                    fFailed(data);
                }
            },error: function(data){
                $("#response").html(data.responseText);
                alert("error");
            }
        });
    }

    function btOut(){
        //var name = $("input[name=txt_lat]").val();
        var tx_lat = $("input[name=txt_lat]").val();
        var tx_lng = $("input[name=txt_lng]").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'{{route('EmployeeOut')}}',
            data:{
                txt_lat:tx_lat,
                txt_lng:tx_lng,
            },
            success:function(data){
                if(data.status == "success"){
                    fSuccess(data);
                }else{
                    fFailed(data);
                }
            },error: function(data){
                $("#response").html(data.responseText);
                alert("error");
            }
        });
    }

    function fSuccess(data) {
        $("#response").html(data.message);
        $("#response").removeClass('error');
        $("#response").addClass('success');

    }
    function fFailed(data) {
        $("#response").html(data.message);
        $("#response").removeClass('success')
        $("#response").addClass('error');
    }
    @endif
</script>
<script>
    function underdeveloptment(){
        alert('Cant access this page, under maintenance!');
    }
</script>
</body>
</html>