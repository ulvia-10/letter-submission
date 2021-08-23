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
        	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo/images-3.jpeg"
        		type="image/x-icon">
        	<title><?= $title ?></title>
        	<!-- Google font-->
        	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        		rel="stylesheet">
        	<link
        		href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        		rel="stylesheet">
        	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/fontawesome.css">
        	<!-- ico-font-->
        	<link rel="stylesheet" type="text/css"
        		href="<?php echo base_url() ?>assets/frontend/css/vendors/icofont.css">
        	<!-- Themify icon-->
        	<link rel="stylesheet" type="text/css"
        		href="<?php echo base_url() ?>assets/frontend/css/vendors/themify.css">
        	<!-- Flag icon-->
        	<link rel="stylesheet" type="text/css"
        		href="<?php echo base_url() ?>assets/frontend/css/vendors/flag-icon.css">
        	<!-- Feather icon-->
        	<link rel="stylesheet" type="text/css"
        		href="<?php echo base_url() ?>assets/frontend/css/vendors/feather-icon.css">

        	<!-- Bootstrap css-->
        	<link rel="stylesheet" type="text/css"
        		href="<?php echo base_url() ?>assets/frontend/css/vendors/bootstrap.css">
        	<!-- App css-->
        	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/style.css">
        	<link id="color" rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/color-1.css"
        		media="screen">
        	<!-- Responsive css-->
        	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/responsive.css">
        </head>


        <div class="page-body">
        	<!-- Main Content -->
        	<?php $this->load->view($namafolder . '/' . $namafileview); ?>
        	<!-- End Main Content -->
        	<!-- Container-fluid Ends-->
        </div>

        <script src="<?= base_url('assets/frontend/js/theme-plugin.js'); ?>"></script>
        <script src="<?= base_url('assets/frontend/js/theme-script.js'); ?>"></script>
        </script>
        <!-- latest jquery-->
        <script src="<?php echo base_url() ?>assets/frontend/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="<?php echo base_url() ?>assets/frontendjs/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="<?php echo base_url() ?>assets/frontendjs/icons/feather-icon/feather.min.js"></script>
        <script src="<?php echo base_url() ?>assets/frontend/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="<?php echo base_url() ?>assets/frontend//js/config.js"></script>

        <script src="<?php echo base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="<?php echo base_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="<?php echo base_url() ?>assets/js/config.js"></script>
     
        <!-- Theme js-->
        <script src="<?php echo base_url() ?>assets/frontend/js/script.js"></script>
        <script>
        	window.setTimeout(function () {
        		$(".alert").fadeTo(500, 0).slideUp(500, function () {
        			$(this).remove();
        		});
        	}, 5000);

        </script>
        <!-- login js-->
        <!-- Plugin used-->
