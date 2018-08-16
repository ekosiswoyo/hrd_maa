
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>E-Recruitment BPR MAA</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->

    <link rel="stylesheet" href=""{{ asset('vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css') }}" />
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href=""{{ asset('vendors/blueimp-file-upload/css/jquery.fileupload.css') }}" />
    <link rel="stylesheet" href=""{{ asset('vendors/blueimp-file-upload/css/jquery.fileupload-ui.css') }}" />
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript>
        <link rel="stylesheet" href=""{{ asset('vendors/blueimp-file-upload/css/jquery.fileupload-noscript.css') }}" />
        <link rel="stylesheet" href=""{{ asset('vendors/blueimp-file-upload/css/jquery.fileupload-ui-noscript.css') }}" />
    </noscript>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="{{ asset('vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('vendors/select2/css/select2-bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/pages/wizard.css') }}" type="text/css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/iCheck/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/iCheck/css/line/line.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/bootstrap-switch/css/bootstrap-switch.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/switchery/css/switchery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/awesome-bootstrap-checkbox/css/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/radio_checkbox.css') }}">
    <link href="{{ asset('vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="{{ asset('vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/only_dashboard.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/colReorder.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/rowReorder.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap.css') }}" />
    <link href="{{ asset('css/pages/tables.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/pages/advmodals.css') }}" rel="stylesheet" />
    
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/sweetalert/css/sweetalert.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/pages/tab.css') }}" />
    @yield('css')
</head>

<body class="skin-josh">
    <header class="header">
        <a href="index.html" class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="logo">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
{{--                     
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f" data-hovercolor="#e9573f" data-size="28"></i>
                            <span class="label label-warning">7</span>
                        </a>
                        <ul class=" notifications dropdown-menu">
                            <li class="dropdown-title">You have 7 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <i class="livicon danger" data-n="timer" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">after a long time</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Just Now
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="gift" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">Jef's Birthday today</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Few seconds ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon warning" data-n="dashboard" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">out of space</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            8 minutes ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon bg-aqua" data-n="hand-right" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">New friend request</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            An hour ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon danger" data-n="shopping-cart-in" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">On sale 2 products</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            3 Hours ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="image" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">Lee Shared your photo</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Yesterday
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon warning" data-n="thumbs-up" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">David liked your photo</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            2 July 2014
                                        </small>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/storage/avatars/{{ Auth::user()->avatar }}" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            <div class="riot">
                                <div>
                                    {{ \Illuminate\Support\Str::limit(Auth::user()->nama, 10) }}
                                    <span>
                                           
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="/storage/avatars/{{ Auth::user()->avatar }}" width="90" class="img-circle img-responsive" height="90" alt="User Image" />
                                <p class="topprofiletext"> {{ Auth::user()->nama }}</p><br>
                            </li>
                            <!-- Menu Body -->
                            
                            <li>
                                <a href="view_user.html"> <i class="livicon" data-name="user" data-s="18"></i> My Profile </a>
                            </li>
                            <li role="presentation"></li>
                            <li>
                                <a href="user_profile.html"><i class="livicon" data-name="gears" data-s="18"></i> Account Settings </a>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="lockscreen.html"> <i class="livicon" data-name="lock" data-s="18"></i> Lock </a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> <i class="livicon" data-name="sign-out" data-s="18"></i> Logout </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                   
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li>
                            <a href="/index">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="/fptk">
                                <i class="livicon" data-name="doc-portrait" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">FPTK</span>
                            </a>
                        </li>
                        <li>
                            <a href="/printfptk">
                                <i class="livicon" data-name="printer" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Cetak FPTK TERAKHIR</span>
                            </a>
                        </li>
                        @if(Auth::user()->id_bagian == 36)
                        <li>
                            <a href="/home_fptk">
                                <i class="livicon" data-name="table" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Data FPTK</span>
                            </a>
                        </li>
                        <li>
                            <a href="/data_pelamar">
                                <i class="livicon" data-name="table" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Data Pelamar</span>
                            </a>
                        </li>
                        @else
                        <li>
                            <a href="/data-fptk">
                                <i class="livicon" data-name="table" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Data FPTK</span>
                            </a>
                        </li>
                        @endif
                        <li>
                                <a href="/lowongan">
                                    <i class="livicon" data-name="table" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                    <span class="title">Data Lowongan</span>
                                </a>
                        </li>
                        <li>
                                <a href="/seleksi">
                                    <i class="livicon" data-name="table" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                    <span class="title">Data Jenis Tes</span>
                                </a>
                        </li>
                        <li>
                                <a href="/proses">
                                    <i class="livicon" data-name="table" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                    <span class="title">Proses Seleksi</span>
                                </a>
                        </li>
                        
                        
                       
                      
                       
                       
                       
                       
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
        </aside>
        @yield('content')

    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    @yield('script')
    {{-- <script type="text/javascript" src="{{ asset('js/pages/sweetalert.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('vendors/sweetalert/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/sweetalert/js/sweetalert-dev.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('vendors/iCheck/js/icheck.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/switchery/js/switchery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/card/lib/js/jquery.card.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/radio_checkbox.js') }}"></script>
    <script src="{{ asset('vendors/jquery.easy-pie-chart/js/easypiechart.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.easy-pie-chart/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easingpie.js') }}"></script>
    <script src="{{ asset('vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/fullcalendar/js/fullcalendar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/flotchart/js/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/flotchart/js/jquery.flot.resize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/sparklinecharts/jquery.sparkline.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/countUp.js/js/countUp.js') }}"></script>
    <script src="{{ asset('vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('vendors/chartjs/Chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!--  todolist-->
    <script src="{{ asset('js/pages/todolist.js') }}"></script>
    <script src="{{ asset('js/pages/dashboard.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/js/pages/table-advanced.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/jeditable/js/jquery.jeditable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.colReorder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.rowReorder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.colVis.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.html5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.print.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/buttons.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/pdfmake.js') }}"></script>

    <!-- begining of page level js -->
    <script src="{{ asset('vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
    
    <script src="{{ asset('vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/form_wizard.js') }}" type="text/javascript"></script>
    
    <!-- end of page level js -->
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!-- end of page level js -->
</body>

</html>
