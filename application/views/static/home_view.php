<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/images/ap.png">
	<title>Report Bulanan | SHIAM Airport</title>
	<!-- This page CSS -->
	<!-- chartist CSS -->
	<link href="<?php echo base_url()?>assets/node_modules/morrisjs/morris.css" rel="stylesheet">
	<!--Toaster Popup message CSS -->
	<link href="<?php echo base_url()?>assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php echo base_url()?>assets/dist/css/style.min.css" rel="stylesheet">
	<!-- Dashboard 1 Page CSS -->
	<link href="<?php echo base_url()?>assets/dist/css/pages/dashboard1.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/node_modules/tablesaw-master/dist/tablesaw.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/dist/css/pages/footable-page.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/node_modules/footable/css/footable.core.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />

	<link href="<?php echo base_url()?>assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url()?>assets/node_modules/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/node_modules/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/node_modules/wizard/steps.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

	<link href="<?php echo base_url()?>assets/dist/css/pages/contact-app-page.css" rel="stylesheet">

	<link href="<?php echo base_url()?>assets/node_modules/horizontal-timeline/css/horizontal-timeline.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/dist/css/pages/timeline-vertical-horizontal.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">


	<!-- <link href="<?php echo base_url()?>assets/node_modules/dropify/dist/css/dropify.min.css"> -->
	<link href="<?php echo base_url()?>assets/node_modules/dropify/dist/css/dropify.min.css" rel="stylesheet">



	<script src="<?php echo base_url()?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>


</head>

<body class="fixed-layout skin-blue-dark">
	<div class="preloader">
		<div class="loader">
			<div class="loader__figure"></div>
			<p class="loader__label">Loading</p>
		</div>
	</div>
	<div id="main-wrapper">
		<header class="topbar">
			<nav class="navbar top-navbar navbar-expand-md navbar-dark">
				<div class="navbar-header">
					<a class="navbar-brand" href="/report/main">
						<b>
							<i class="ti-book"></i>
							<!--   <img src="<?php echo base_url()?>assets/images/ap.png" alt="homepage" /> -->
						</b><span> Report Bulanan</span>
					</a>
				</div>
				<div class="navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
						<li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
					</ul>
					<ul class="navbar-nav my-lg-0">
						<li class="nav-item dropdown u-pro">
							<a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url()?>assets/images/user.png" alt="user" class=""> <span class="hidden-md-down"><?php echo $this->session->userdata('nama'); ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
							<div class="dropdown-menu dropdown-menu-right animated flipInY">
								<a href="<?php echo base_url()?>main/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<aside class="left-sidebar">
			<div class="scroll-sidebar">
				<nav class="sidebar-nav">
					<?php $this->load->view('static/menu_view');  ?>
				</nav>
			</div>
		</aside>
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						
						<h4 class="text-themecolor"><?php echo $sub_judul; ?></h4>
					</div>
					<div class="col-md-7 align-self-center text-right">
						<div class="d-flex justify-content-end align-items-center">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo $judul; ?></a></li>
								<li class="breadcrumb-item active"><?php echo $sub_judul; ?></li>
							</ol>
						</div>
					</div>
				</div>
				<?php $this->load->view($content); ?>

			</div>
		</div>
		<footer class="footer">
			© 2019 Report Bulanan | SHIAM Airport
		</footer>
	</div>


	<script src="<?php echo base_url()?>assets/node_modules/popper/popper.min.js"></script>
	<script src="<?php echo base_url()?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/dist/js/perfect-scrollbar.jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/dist/js/waves.js"></script>
	<script src="<?php echo base_url()?>assets/dist/js/sidebarmenu.js"></script>
	<script src="<?php echo base_url()?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
	<script src="<?php echo base_url()?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url()?>assets/dist/js/custom.min.js"></script>
	<!-- <script src="<?php echo base_url()?>assets/dist/js/dashboard1.js"></script> -->
	<script src="<?php echo base_url()?>assets/node_modules/toast-master/js/jquery.toast.js"></script>

</body>

</html>
