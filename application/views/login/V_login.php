<!-- login page start -->
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-7 order-1"><img class="bg-img-cover bg-center"
				src="<?php echo base_url() ?>assets/images/background/login.gif" alt="loginpage"></div>
		<div class="col-xl-5 p-0">
			<div class="login-card">
				<div>
					<div><a class="logo text-start" href="#"><center><img class="img-fluid for-light"
								src="<?php echo base_url() ?>assets/images/logo/images-3.jpeg" width="70px" height="70px"
								alt="looginpage"></center></a></div>
					<div class="login-main">
						<form action="<?php echo base_url('login/processLogin') ?>" method="POST">
							<center><h5>Cabang Dinas Pendidikan Wilayah Kab.Jombang</h5></center>
							<center><p>Sign in to account</p></center>
							<?php echo $this->session->flashdata('pesan') ?>
							<div class="form-group">
								<label class="col-form-label">Username</label>
								<input class="form-control" type="text" name="username" placeholder="username...">
							</div>

							<div class="form-group">
								<label class="col-form-label">Password</label>
								<input class="form-control" type="password" name="password" placeholder="Password...">
							</div> <br>
							<button class="btn btn-primary btn-block" type="submit">Sign in <i class="fa fa-sign-in" aria-hidden="true"></i></button>

							<h6 class="text-muted mt-4 or">Or Forget Password</h6>
							<div class="social mt-4">
								<div class="btn-showcase"><a class="btn btn-info" href="#" target="_blank"><i class="txt-linkedin" data-feather="key"></i> Lupa Password </a></div>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
