<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description"
		content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
	<meta name="keywords"
		content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
	<meta name="author" content="pixelstrap">
	<link rel="icon" href="<?php echo base_url() ?>assets/images/logo/images-3.jpeg" type="image/x-icon">
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo/images-3.jpeg" type="image/x-icon">
	<title><?= $title ?></title>

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
		rel="stylesheet">
	<!-- latest jquery-->


	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/fontawesome.css">
	<!-- ico-font-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendors/icofont.css">
	<!-- Themify icon-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendors/themify.css">
	<!-- Flag icon-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendors/flag-icon.css">
	<!-- Feather icon-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendors/feather-icon.css">
	<!-- Plugins css start-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendors/scrollbar.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/css/vendors/animate.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/css/vendors/chartist.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/css/vendors/date-picker.css'); ?>">
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url() ?>assets/frontend/css/vendors/date-time-picker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendors/datatables.css">
	<!-- Plugins css Ends-->
	<!-- Bootstrap css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendors/bootstrap.css">
	<!-- App css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/style.css">
	<link id="color" rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/color-1.css" media="screen">
	<!-- Responsive css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/responsive.css">

	<script src="<?php echo base_url() ?>assets/frontend/js/jquery-3.5.1.min.js"></script>
</head>

<body onload="startTime()">
	<!-- Loading -->
	<!-- <div class="loader-wrapper">
		<div class="loader-index"><span></span></div>
		<svg>
			<defs></defs>
			<filter id="goo">
				<fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
				<fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
				</fecolormatrix>
			</filter>
		</svg>
	</div> -->
	<!-- tap on top starts -->
	<div class="tap-top"><i data-feather="chevrons-up"></i></div>
	<!-- tap on tap ends-->
	<!-- page-wrapper Start-->
	<div class="page-wrapper compact-wrapper" id="pageWrapper">
		<!-- Page Header Start-->
		<div class="page-header">
			<div class="header-wrapper row m-0">
				<form class="form-inline search-full col" action="#" method="get">
					<div class="form-group w-100">
						<div class="Typeahead Typeahead--twitterUsers">
							<div class="u-posRelative">
								<input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
									placeholder="Search Cuba .." name="q" title="" autofocus>
								<div class="spinner-border Typeahead-spinner" role="status"><span
										class="sr-only">Loading...</span>
								</div><i class="close-search" data-feather="x"></i>
							</div>
							<div class="Typeahead-menu"></div>
						</div>
					</div>
				</form>

				<div class="header-logo-wrapper col-auto p-0">
					<div class="logo-wrapper"><a href="index.html"><img class="img-fluid"
								src="<?php echo base_url() ?>assets/frontend/images/logo/logo.png" alt=""></a></div>
					<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
							data-feather="align-center"></i>
					</div>
				</div>
				<div class="left-header col horizontal-wrapper ps-0">
					<ul class="horizontal-menu">

					</ul>
					</li>
					</ul>
				</div>

				<div class="nav-right col-8 pull-right right-header p-0">
					<ul class="nav-menus">


						<li>
							<div class="mode"><i class="fa fa-moon-o"></i></div>
						</li>

						<li>
							<div><a href="<?= base_url('login/logout'); ?>"><i data-feather="log-in"></i></a></div>
						</li>

						<li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
									data-feather="maximize"></i></a></li>
						<li class="profile-nav onhover-dropdown p-0 me-0">
							<div class="media profile-media"><img class="b-r-10" width="40px" height="40px"
									src="<?php echo base_url('assets/images/' . $this->session->userdata('sess_foto')) ?>"
									alt="">
								<div class="media-body">
									<span><?php echo $this->session->userdata('sess_fullname') ?></span>
									<p class="mb-0 font-roboto"><?php echo $this->session->userdata('sess_level') ?><i
											class="middle fa fa-angle-down"></i></p>
								</div>
							</div>
							<ul class="profile-dropdown onhover-show-div">
								<li><a href="<?= base_url('adminpusat/profile'); ?>"><i
											data-feather="user"></i><span>Edit
											Profile</span></a></li>
								<li><a href="<?= base_url('login/logout'); ?>"><i
											data-feather="log-in"></i><span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
				<script class="result-template" type="text/x-handlebars-template">
					<div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
				<script class="empty-template" type="text/x-handlebars-template">
					<div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
				</script>
			</div>
		</div>
		<!-- Page Header Ends                              -->
		<!-- Page Body Start-->
		<div class="page-body-wrapper">
			<!-- Page Sidebar Start-->
			<div class="sidebar-wrapper">
				<div>
					<div class="logo-wrapper"><a href="#"><img class="img-fluid for-light"
								src="<?php echo base_url() ?>assets/frontend/images/logo/logo.gif" alt=""><img
								class="img-fluid for-dark"
								src="<?php echo base_url() ?>assets/frontend/images/logo/logo_dark.gif" alt=""></a>
						<div class="back-btn"><i class="fa fa-angle-left"></i></div>
						<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid">
							</i></div>
					</div>
					<div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
								src="<?php echo base_url() ?>assets/images/logo/images-3.jpeg" width=30px;></a>
					</div>
					<nav class="sidebar-main">
						<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
						<div id="sidebar-menu">
							<ul class="sidebar-links" id="simple-bar">
								<li class="back-btn"><a href="index.html"><img class="img-fluid"
											src="<?php echo base_url() ?>assets/frontend/images/logo/logo-icon.png"
											alt=""></a>
									<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
											aria-hidden="true"></i></div>
								</li>

								<li class="sidebar-main-title">

								</li>

								<li class="sidebar-main-title">

								</li>

								<!-- <li class="sidebar-list">
									<a class="sidebar-link " href="<?= base_url('superadmin'); ?>"><i
											data-feather="home"></i><span class="lan-3">Dashboard </span></a>
								</li> -->

								<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
										href="<?= base_url('superadmin/datauser'); ?>"><i
											data-feather="user"></i></i><span>Data User</span></a>
								</li>
								
								<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
										href="<?= base_url('login/logout'); ?>"><i
											data-feather="log-out"></i></i><span>Log Out</span></a>
								</li>




							</ul>
						</div>
						<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
					</nav>
				</div>
			</div>
			<!-- Page Sidebar Ends-->
			<div class="page-body">
				<!-- Main Content -->
				<?php $this->load->view($namafolder . '/' . $namafileview); ?>
				<!-- End Main Content -->
				<!-- Container-fluid Ends-->
			</div>

			<!-- footer start-->
			<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 footer-copyright text-center">
							<p class="mb-0">Copyright <?= date('Y'); ?> Cabang Dinas Pendidikan Wilayah Kab.Jombang </p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>


	<!-- latest jquery-->
	<script src="<?php echo base_url() ?>assets/frontend/js/datepicker/date-time-picker/moment.min.js"></script>
	<script
		src="<?php echo base_url() ?>assets/frontend/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js">
	</script>
	<script src="<?php echo base_url() ?>assets/frontend/js/datepicker/date-time-picker/datetimepicker.custom.js">
	</script>
	<!-- Bootstrap js-->
	<script src="<?php echo base_url() ?>assets/frontend/js/bootstrap/bootstrap.bundle.min.js"></script>
	<!-- feather icon js-->
	<script src="<?php echo base_url() ?>assets/frontend/js/icons/feather-icon/feather.min.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/js/icons/feather-icon/feather-icon.js"></script>
	<!-- scrollbar js-->
	<script src="<?php echo base_url() ?>assets/frontend/js/scrollbar/simplebar.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/js/scrollbar/custom.js"></script>
	<!-- Sidebar jquery-->
	<script src="<?php echo base_url() ?>assets/frontend/js/config.js"></script>
	<!-- Plugins JS start-->
	<script src="<?php echo base_url() ?>assets/frontend/js/sidebar-menu.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/js/datatable/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/js/datatable/datatables/datatable.custom.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/js/tooltip-init.js"></script>
	<!-- Plugins JS Ends-->
	<!-- Theme js-->
	<script src="<?php echo base_url() ?>assets/frontend/js/script.js"></script>

	<!-- Dashboard JS-->
	<script src="<?= base_url('assets/frontend/js/chart/chartist/chartist.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/chart/chartist/chartist-plugin-tooltip.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/chart/knob/knob.min.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/chart/knob/knob-chart.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/chart/apex-chart/apex-chart.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/chart/apex-chart/stock-prices.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/dashboard/default.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/datepicker/date-picker/datepicker.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/datepicker/date-picker/datepicker.en.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/datepicker/date-picker/datepicker.custom.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/typeahead/handlebars.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/typeahead/typeahead.bundle.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/typeahead/typeahead.custom.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/typeahead-search/handlebars.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/typeahead-search/typeahead-custom.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/tooltip-init.js'); ?>"></script>

</body>

<script>
	// ***************** ALERT **********************//////////////
	window.setTimeout(function () {
		$(".alert").fadeTo(500, 0).slideUp(500, function () {
			$(this).remove();
		});
	}, 5000);

</script>

</html>
