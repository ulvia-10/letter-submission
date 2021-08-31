<br><br>
<div class="container-fluid">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h5>Data Akun Yang terdaftar </h5>
			</div>
			<div class="card-body">

				<div class="table-responsive">
					<!-- Data User -->
					<?php echo $this->session->flashdata('akun') ?>
					<a href="<?= base_url(); ?>admin/tambah/" class="btn btn-primary btn-sm mb-3">
						<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Akun</a>
					<table class="display" id="basic-1" style="text-align:center;">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Username</th>
								<th>Level</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
                        foreach ($akun->result_array() as $akn) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $akn["full_name"]; ?></td>
								<td><?= $akn["username"]; ?></td>
								<td><span class="badge badge-info"><?=$akn["level"];?></span></td>
								<td><?= $akn["email"]; ?></td>
								<td>
									<!-- detail -->

									
									<a href="<?= base_url(); ?>admin/detail/<?= $akn['id_user']; ?>"
										class="badge badge-primary">
										<i class="fa fa-eye" aria-hidden="true"></i></a></a>


									<?php   if (( $akn['level'] == 'pma' ) || ( $akn['level'] == 'pmk' ) ||  ( $akn['level'] == 'kepala_cabang' ) || ($akn['level'] == 'kasubag_tu') || ($akn['level']== 'staff') ) {?>
										<a href="<?= base_url(); ?>admin/edit/<?= $akn['id_user']; ?>"
                                    class="badge badge-success"><i class="fa fa-edit "></i> </a>
									<?php }?>

									<!-- hapus -->
									<?php   if (( $akn['level'] == 'pma' ) || ( $akn['level'] == 'pmk' ) ||  ( $akn['level'] == 'kepala_cabang' ) || ($akn['level'] == 'kasubag_tu') || ($akn['level']== 'staff') ) {?>
									<a href="#" data-bs-toggle="modal"
										data-bs-target="#aksi-hapus-<?php echo $akn['id_user'] ?>"
										class="badge badge-danger "> <i class="fa fa-trash" aria-hidden="true"></i></a>
									<!-- pop up  -->
									<div class="modal fade" id="aksi-hapus-<?php echo $akn['id_user'] ?>" tabindex=" -1"
										role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-body">
													<h4>Hapus Akun</h4>
													<p>Apakah anda yakin ingin menghapus Akun
														<b><?php echo $akn['full_name'] ?></b>.
													</p>
												</div>
												<div class="modal-footer">
													<button class="btn btn-primary btn-sm" type="button"
														data-bs-dismiss="modal">Batal</button>
													<a href="<?php echo base_url('Admin/delete/' . $akn['id_user']) ?>"
														class="btn btn-warning btn-sm" type="button"><i
															class="fa fa-trash"></i> Hapus</a>
												</div>
											</div>
										</div>
									</div>
									<?php }?>

								</td>

								<?php
                        }
                            ?>
							</tr>

					</table>
				</div>
			</div>
		</div>
	</div>
</div>
