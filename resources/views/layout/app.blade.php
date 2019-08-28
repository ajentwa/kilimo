<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title> DAS @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- DataTable -->
    <link href="{{asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Site Theme Style -->
    <link href="{{asset('assets/css/site.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('assets/css/datepicker.css')}}" type="text/css">
    <!-- Sweet Alert CSS -->
    <link href="{{asset('assets/vendors/sweetAlert/sweetalert.css')}}" rel="stylesheet">
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{asset('assets/vendors/select2/dist/css/select2.css')}}">
    <!-- Page Specific CSS -->
    @yield('Styles')

</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{url('dashboard')}}" class="site_title"><i class="fa fa-tree"></i> <span>DAS</span></a>
                </div>
                <div class="clearfix"></div>
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{asset('assets/images/img.png')}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
{{--                        <h2>{{\Illuminate\Support\Facades\Auth::user()->first_name." ".\Illuminate\Support\Facades\Auth::user()->last_name}}</h2>--}}
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br/>
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{url('dashboard')}}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                            <li><a href="{{url('crop')}}"><i class="fa fa-crop"></i> Crops</a></li>
                        </ul>
                    </div>

{{--                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))--}}
                        <div class="menu_section">
                            <h3>General Settings</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{url('users')}}">Users</a></li>
                                        <li><a href="{{url('region')}}">Regions</a></li>
                                        <li><a href="{{url('unit')}}">Units</a></li>
                                        <li><a href="{{url('logs')}}">Logs</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
{{--                    @endif--}}
                </div>
            {{--@endif--}}
            <!-- /sidebar menu -->
                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{url('logout')}}">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

    <?php /* $stations = \App\Models\Setups\Station::find(\Illuminate\Support\Facades\Auth::user()->station_id); */?>

    <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle" style="color: white"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-left">
                        <span class="pull-left" style="color: white;margin-top: 2.0vh; font-size: 20px">Delight Agribusiness Solution (DAS)</span>
                    </ul>
                    <ul class="nav navbar-nav navbar-left pull-right">
                        <li class=" ">
                            <a style="color: white !important;" href="javascript:;" class="user-profile dropdown-toggle"
                               data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="{{asset('assets/images/img.png')}}"
                                     alt="">{{--{{$stations->name}}--}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li>

                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li><a href="{{url('logout')}}"><i
                                            class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">

            @include('layout.errors')
            @include('layout.success')

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @yield('content')
                </div>
            </div>
            <br/>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="{{asset('assets/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>

<!-- Sweet Alert JS -->
<script src="{{asset('assets/vendors/sweetAlert/sweetalert2.min.js')}}"></script>
<!-- Site Theme Scripts -->
<script src="{{asset('assets/js/site.js')}}"></script>
<!--  Select 2   -->
<script src="{{asset('assets/vendors/select2/dist/js/select2.full.js')}}"></script>
<!-- Date Picker -->
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('assets/js/custom.js')}}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function clearMsg() {
        $('.msg').hide();
    }

    $(window).load(function () {
        setTimeout(clearMsg, 3000);
    });
</script>


@yield('Scripts')
</body>
</html>
