<?php
    include("check.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/core/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/core/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/core/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/core/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/core/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/core/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/core/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/core/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/core/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/core/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/core/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/core/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/core/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/core/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/core/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>Puskesmas</title>

    <link href="assets/core/css/lib/chartist/chartist.min.css" rel="stylesheet">
	<link href="assets/core/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/core/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="assets/core/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/core/css/helper.css" rel="stylesheet">
    <link href="assets/core/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <!-- All Jquery -->
    <script src="assets/core/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/core/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="assets/core/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/core/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="assets/core/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/core/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>


    <!-- <script src="assets/core/js/lib/datamap/d3.min.js"></script> -->
    <!-- <script src="assets/core/js/lib/datamap/topojson.js"></script> -->
    <!-- <script src="assets/core/js/lib/datamap/datamaps.world.min.js"></script> -->
    <!-- <script src="assets/core/js/lib/datamap/datamap-init.js"></script> -->
    
    <script src="assets/core/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/core/js/lib/weather/weather-init.js"></script>
    <script src="assets/core/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/core/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- <script src="assets/core/js/lib/datatables/datatables.min.js"></script> -->
    <!-- <script src="assets/core/js/lib/datatables/datatables-init.js"></script> -->

    <!-- <script src="assets/core/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/core/js/lib/chartist/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/core/js/lib/chartist/chartist-init.js"></script> -->
    <!--Custom JavaScript -->
    <script src="assets/core/js/scripts.js"></script>
    <!-- select2 -->
    <link href="assets/core/css/lib/select2/select2.min.css" rel="stylesheet" />
    <script src="assets/core/js/lib/select2/select2.full.min.js"></script>
    <!-- select2 -->    
    <!-- toastr -->
    <link href="assets/core/css/lib/toastr/toastr.min.css" rel="stylesheet" />
    <script src="assets/core/js/lib/toastr/toastr.min.js"></script>
    <!-- toastr -->  

    <script src="assets/core/js/lib/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="assets/core/js/lib/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="assets/core/js/lib/html5-editor/wysihtml5-init.js"></script>

    <script src="assets/core/js/lib/datatables/datatables.min.js"></script>
    <script src="assets/core/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="assets/core/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="assets/core/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="assets/core/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="assets/core/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="assets/core/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="assets/core/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="assets/core/js/lib/datatables/datatables-init.js"></script>
    <script src="chart/js/fusioncharts.js"></script>
    <script src="chart/js/themes/fusioncharts.theme.fint.js"></script>
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="assets/core/images/logo.png" alt="puskesmas" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="assets/core/images/logo-text.png" alt="puskesmas" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/core/images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>                        
                          <?php if (($_SESSION['level'] == 1)) { ?>
                          <li> <a class="" href="pasien.php" aria-expanded="false"><i class="fa fa-hotel"></i><span class="hide-menu">Pasien </span></a> </li>
                          <li> <a class="" href="laporan_tenaga_medis.php" aria-expanded="false"><i class="fa fa-tasks"></i><span class="hide-menu">Laporan </span></a> </li>
                          <li> <a class="" href="obat.php" aria-expanded="false"><i class="fa fa-thermometer-0"></i><span class="hide-menu">Obat </span></a> </li>
                          <li> <a class="" href="pegawai.php" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Tenaga Medis </span></a> </li>
                          <li> <a class="" href="rekam_medis.php" aria-expanded="false"><i class="fa fa-heartbeat"></i><span class="hide-menu">Rekam Medis </span></a></li>                                              
                          <?php } ?>
                          <?php if (($_SESSION['level'] == 0)) { ?>
                          <li> <a class="" href="laporan.php" aria-expanded="false"><i class="fa fa-tasks"></i><span class="hide-menu">Laporan </span></a> </li>
                          <li> <a class="" href="chart.php" aria-expanded="false"><i class="fa fa-bar-chart-o"></i><span class="hide-menu">Grafik</span></a> </li>
                          <?php } ?>                                         
    
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                						

                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Puskesmas</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">

                    </ol>
                </div>
            </div>