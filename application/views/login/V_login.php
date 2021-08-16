<section>
<!-- login page start -->
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-7 order-1"><img class="bg-img-cover bg-center"
				src="http://admin.pixelstrap.com/cuba/assets/images/login/1.jpg" alt="looginpage"></div>
		<div class="col-xl-5 p-0">
			<div class="login-card">
				<div>
					<div><a class="logo text-start" href="index.html"><img class="img-fluid for-light"
								src="<?php echo base_url() ?>assets/frontend/img/logo_jombang.png" width="10%"
								alt="looginpage"><img class="img-fluid for-dark"
								src="../assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
					<div class="login-main">

						<form  action="<?php echo base_url('login/processLogin') ?>" method="POST" >
							<h4>Sign in to account</h4>
							<p>Enter your username & password to login</p>
                            <?php echo $this->session->flashdata('pesan') ?>
							<div class="form-group">
								<label class="col-form-label">Username</label>
								<input class="form-control" type="text" name="username"  placeholder="username...">
							</div>

							<div class="form-group">
								<label class="col-form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password...">
							</div>
								<button class="btn btn-primary btn-block" type="submit">Sign in</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>