<!DOCTYPE html>
<html id="fixed" class="fixed {!!session('leftmenu')!='open'?'sidebar-left-collapsed':''!!}" {!!session('lang')=='-rtl'?'dir="rtl"':''!!} >
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">
        <title>@yield('title') {{$company->shortname}} </title>
        <meta name="copyright"   content="Copyright {{date('Y')}} by {{$company->shortname}}, All Rights Reserved, V 1.0" >
        <meta name="author"      content="Harout koja" >
        <meta name="generator"   content="{{$company->shortname}}" />
        <meta name="Keywords"    content="{{$company->seo_keyword}}" >
        <meta name="description" content="{{$company->seo_description}}">
        <meta name="robots"      content="ALL" />

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <!--  Icons  -->
        <!--[if IE]><link rel="shortcut icon" href="{!!url('public/img/'.$company->ico_icon)!!}"><![endif]-->
        <link rel="shortcut icon" href="{!!url('public/img/'.$company->png_icon)!!}">
        <link rel="apple-touch-icon" href="{!!url('public/img/'.$company->touch_icon)!!}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        {!!  Html::style('vendor/assets_admin/vendor/bootstrap'.session('lang').'/css/bootstrap.css') !!}
        {!!  Html::style('vendor/assets_admin/vendor/font-awesome/css/font-awesome.css') !!}
        {!!  Html::style('vendor/assets_admin/vendor/pnotify/pnotify.custom.css') !!}
        {!!  Html::style('vendor/assets_admin/vendor/magnific-popup/magnific-popup.css') !!}
        {!!  Html::style('vendor/assets_admin/vendor/select2/css/select2.css') !!}
        {!!  Html::style('vendor/assets_admin/vendor/select2-bootstrap-theme/select2-bootstrap.css') !!}
        {!!  Html::style('vendor/assets_admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') !!}
        {!!  Html::script('vendor/assets_admin/vendor/jquery/jquery.js') !!}

        @yield('header')

        <!-- Theme CSS -->
        {!!  Html::style('vendor/assets_admin/stylesheets/theme'.session('lang').'.css') !!}
        {!!  Html::style('vendor/assets_admin/stylesheets/skins/default'.session('lang').'.css') !!}
        {!!  Html::style('public/css/style'.session('lang').'.css') !!}

        <!-- Head Libs -->
        {!!  Html::script('public/js/functions.js') !!}
        {!!  Html::script('vendor/assets_admin/vendor/modernizr/modernizr.js') !!}

        <script>
            $(document).ready(function() {

                // left menu open or close session value
                $("#leftmenu").click(function() {
                    if($('#fixed').hasClass('sidebar-left-collapsed'))
                        var value = 'open';
                    $.ajax({
                        url: '{{url('ajax')}}', // form action url
                        type: 'GET', // form submit method get/post
                        dataType: 'json', // request type html/json/xml
                        data: {leftmenu:value},
                        async: false,
                        cache: false,
                        contentType: false,
                        beforeSend: function () {},
                        success: function (data) {},
                        error: function(xhr, status, error) { }
                    });
                });

            });
        </script>

        <meta name="csrf-token" content="{{ csrf_token() }}" />

    </head>
    <body>

    @if(Auth::check())

        <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="{{$company->website}}" class="logo" target="_blank">
                    <img src="{{url('public/img/'.$company->logo)}}" height="35" alt="Logo" />
                </a>
                <a href="" >
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </a>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">

                <span class="separator"></span>

                <ul class="notifications"  >
                    <li>
                        <a class="notification-icon" href="" ><i class="fa fa-life-ring"></i></a>
                    </li>
                    <li>
                        <a  class="notification-icon" href="" ><i class="fa fa-calendar"></i></a>
                    </li>
                    <li>
                        <a data-toggle="dropdown" class="dropdown-toggle notification-icon" href="" aria-expanded="true">
                            <i class="fa fa-globe"></i>
                        </a>
                        <div class="dropdown-menu notification-menu">
                            <div class="notification-title">{{Help::languages('Languages')}}</div>
                            <div class="content">
                                <ul>
                                    <li>
                                        <a class="clearfix" href="{{url('languages/ltr')}}">
                                            <figure class="image">
                                                <img class="img-circle" alt="Language" src="{{url('/public/img/en.png')}}">
                                            </figure>
                                            <span class="title">{{Help::languages('English')}}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="clearfix" href="{{url('languages/rtl')}}">
                                            <figure class="image">
                                                <img class="img-circle" alt="Language" src="{{url('/public/img/ar.png')}}">
                                            </figure>
                                            <span class="title">{{Help::languages('Arabic')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="{{url('public/img/user.png')}}" alt="User" class="img-circle" data-lock-picture="{{url('vendor/assets_admin/images/!logged-user.jpg')}}" />
                        </figure>
                        <div class="profile-info" data-lock-name="User" >
                            <span class="name">Harout Koja</span>
                        </div>
                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href=""><i class="fa fa-user"></i>{{Help::languages('My Profile')}}</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="" data-lock-screen="true"><i class="fa fa-lock"></i>{{Help::languages('Lock Screen')}}</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="{{url('auth/login/'.Auth::user()->id)}}"><i class="fa fa-power-off"></i>{{Help::languages('Logout')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        <div class="inner-wrapper">

            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title">
                        {{Help::languages('Navigation')}}
                    </div>
                    <div id="leftmenu" class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">
                                <li>
                                    <a href="{{url('/')}}">
                                        <i class="fa fa-home" aria-hidden="true"></i><span>{{Help::languages('Dashboard')}}</span>
                                    </a>
                                </li>
                                <li class="nav-parent HR">
                                    <a>
                                        <i class="fa fa-users" aria-hidden="true"></i><span>{{Help::languages('HR')}}</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li><a href="{{url('employees')}}">{{Help::languages('Employees')}}</a></li>
                                        <li><a href="{{url('jobs')}}">{{Help::languages('Jobs')}}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-line-chart" aria-hidden="true"></i><span>{{Help::languages('Sales')}}</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li><a href="">{{Help::languages('Bills')}}</a></li>
                                        <li><a href="">{{Help::languages('Items')}}</a></li>
                                        <li><a href="">{{Help::languages('Classes')}}</a></li>
                                        <li><a href="">{{Help::languages('Brands')}}</a></li>
                                        <li><a href="">{{Help::languages('Insurances')}}</a></li>
                                        <li><a href="">{{Help::languages('Clients')}}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-wrench" aria-hidden="true"></i><span>{{Help::languages('Maintenance')}}</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li><a href="">{{Help::languages('Bills')}}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>{{Help::languages('Purchase')}}</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li><a href="">{{Help::languages('Bills')}}</a></li>
                                        <li><a href="">{{Help::languages('Suppliers')}}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-gear" aria-hidden="true"></i><span>{{Help::languages('System Options')}} </span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li><a href="">{{Help::languages('Expenses')}}</a></li>
                                        <li><a href="">{{Help::languages('Company Info')}}</a></li>
                                        <li><a href="">{{Help::languages('Users & Permissions')}}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>

                        <hr class="separator" />

                        <div class="sidebar-widget widget-tasks">
                            <div class="widget-header">
                                <h6>Projects</h6>
                                <div class="widget-toggle">+</div>
                            </div>
                            <div class="widget-content">
                                <ul class="list-unstyled m-none">
                                    <li><a href="#">Porto HTML5 Template</a></li>
                                    <li><a href="#">Tucson Template</a></li>
                                    <li><a href="#">Porto Admin</a></li>
                                </ul>
                            </div><br>
                            <p align="center">
                                &copy; Copyright {{date('Y')}} by <a href="{{$company->website}}" target="_blank" >{{$company->shortname}}</a>,<br> All Rights Reserved, V 1.0
                            </p>
                        </div>


                    </div>

                </div>

            </aside>
            <!-- end: sidebar -->

            @yield('body')

        </div>

        <aside id="sidebar-right" class="sidebar-right">
            <div class="nano">
                <div class="nano-content">
                    <a href="#" class="mobile-close visible-xs">
                        Collapse <i class="fa fa-chevron-right"></i>
                    </a>

                    <div class="sidebar-right-wrapper">

                        <div class="sidebar-widget widget-calendar">
                            <h6>Upcoming Tasks</h6>
                            <div data-plugin-datepicker data-plugin-skin="dark" ></div>
                        </div>

                        <hr class="separator" />

                        <div class="sidebar-widget widget-stats">
                            <div class="widget-header">
                                <h6>Company Stats</h6>
                                <div class="widget-toggle">+</div>
                            </div>
                            <div class="widget-content">
                                <ul>
                                    <li>
                                        <span class="stats-title">Stat 1</span>
                                        <span class="stats-complete">85%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                                <span class="sr-only">85% Complete</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="stats-title">Stat 2</span>
                                        <span class="stats-complete">70%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="stats-title">Stat 3</span>
                                        <span class="stats-complete">2%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                                <span class="sr-only">2% Complete</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </aside>

    </section>

        <!-- CRUD Delete  Selected Record  -->
        <div id="modalDelete" class="modal-block modal-block-delete mfp-hide">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">{{Help::languages('Are you sure ?')}}</h2>
                </header>
                <div class="panel-body">
                    <div class="modal-wrapper">
                        <div class="modal-text">
                            <p>{{Help::languages('Are you sure that you want to delete this record ?')}}</p>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary modal-confirm-delete">{{Help::languages('Confirm')}}</button>
                            <button class="btn btn-default modal-dismiss">{{Help::languages('Cancel')}}</button>
                        </div>
                    </div>
                </footer>
            </section>
        </div>

    @else

        @yield('body')

    @endif

        <!-- Vendor JS -->
        {!!  Html::script('vendor/assets_admin/vendor/bootstrap'.session('lang').'/js/bootstrap.js') !!}

        <!-- Vendor -->
        {!!  Html::script('vendor/assets_admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js') !!}
        {!!  Html::script('vendor/assets_admin/vendor/nanoscroller/nanoscroller.js') !!}
        {!!  Html::script('vendor/assets_admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
        {!!  Html::script('vendor/assets_admin/vendor/jquery-maskedinput/jquery.maskedinput.js') !!}
        {!!  Html::script('vendor/assets_admin/vendor/pnotify/pnotify.custom.js') !!}
        {!!  Html::script('vendor/assets_admin/vendor/magnific-popup/jquery.magnific-popup.js') !!}
        {!!  Html::script('vendor/assets_admin/vendor/jquery-placeholder/jquery-placeholder.js') !!}
        {!!  Html::script('vendor/assets_admin/vendor/select2/js/select2.js') !!}

        @yield('footer')

        <!-- Theme Base, Components and Settings -->
        {!!  Html::script('vendor/assets_admin/javascripts/theme.js') !!}
        <!-- Theme Custom -->
        {!!  Html::script('vendor/assets_admin/javascripts/theme.custom.js') !!}
        <!-- Theme Initialization Files -->
        {!!  Html::script('vendor/assets_admin/javascripts/theme.init.js') !!}

        @yield('footer_examples')

    </body>
</html>


