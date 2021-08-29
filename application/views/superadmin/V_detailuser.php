<br><br> <br>
<div class="container-fluid">
	<!-- set flash data  -->
	<?php echo $this->session->flashdata('pesan') ?>
	<div class="row" style="margin-left:50px;">

		<div class="col-xl-4 box-col-6">
			<br> <br>
			<div class="card custom-card">
				<div class="card-header"><img class="img-fluid"
						src="http://admin.pixelstrap.com/cuba/assets/images/user-card/3.jpg" alt=""></div>
				<div class="card-profile"><img class="rounded-circle"
						src="<?= base_url('./assets/images/' . $user['photo']); ?>" alt=""></div>
				<ul class="card-social">
					<li><a> <i class="fa fa-users" aria-hidden="true"></i></a></li>
					<li><a> <i class="fa fa-heart" aria-hidden="true"></i></a></li>
					<li><a> <i class="fa fa-sun-o" aria-hidden="true"></i> </a></li>
					<li><a><i class="fa fa-fire" aria-hidden="true"></i></a></li>

				</ul>
				<div class="text-center profile-details">
					<h4> <?= $user['full_name']; ?></h4>
					<h6><?= $user['level']; ?></h6>
				</div>
				
			</div>
		</div>
		<br><br>
		<div class="col-xl-6 box-col-6">

			<div class="card">
				<div class="card-header" style="text-align: center;">
					My Profile <i class="fa fa-user-circle" aria-hidden="true"></i>

				</div>
				<div class="card-body" style="margin-left:30px;">
					<h5 class="card-title" style="text-align:center;"><?= $user['full_name']; ?> </h5> <br>
					<p class="card-text">Username: <?= $user['username']; ?></p>
					<p class="card-text">Jabatan: <?= $user['level']; ?></p>
					<p class="card-text">Email: <?= $user['email']; ?></p>
					<!-- <?php
					date_default_timezone_set("Asia/Jakarta") . '<br>'; 
														
														$tanggal = "-";
														if ( $user['tanggal_lahir'] ){

															$tanggal = date('d-m-Y',strtotime($user['tanggal_lahir']));
														}
													?>
					<p class="card-text">Tanggal Lahir: <?= $tanggal ?></p>
					<p class="card-text">Asal: <?= $user['asal']; ?></p>
					<p class="card-text">Alamat: <?= $user['address']; ?></p> -->
					<p class="card-text">Terakhir diubah pada: <?= date('D, d-m-Y H:i',strtotime($user['created_at']))?></p>
					<a href="<?= base_url('kegiatan/editprofile'); ?>" class="btn btn-primary"
						style="margin-left:200px;">Edit <i class="fa fa-edit"></i></a>
				</div>
			</div>
		</div>

	</div>




</div>
