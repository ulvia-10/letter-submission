<br><br>

<div class="row">
	<div class="col-xl-6 xl-100 col-lg-12 box-col-12">
		<div class="card">
			<div class="card-header">
				<h5 class="pull-left">Data Surat Keluar</h5>
			</div>
			<div class="card-body">
				<div class="tabbed-card">
					<ul class="pull-right nav nav-pills nav-success" id="pills-clrtab1" role="tablist">
						<li class="nav-item"><a class="nav-link active" id="pills-clrhome-tab1" data-bs-toggle="pill"
								href="#pills-clrhome1" role="tab" aria-controls="pills-clrhome1" aria-selected="true">
								<i class="fa fa-check-circle" aria-hidden="true"></i> Diterima</a></li>
						<li class="nav-item"><a class="nav-link" id="pills-clrprofile-tab1" data-bs-toggle="pill"
								href="#pills-clrprofile1" role="tab" aria-controls="pills-clrprofile1"
								aria-selected="false"> <i class="fa fa-pencil-square" aria-hidden="true"></i> Revisi</a>
						</li>
						<li class="nav-item"><a class="nav-link" id="pills-clrcontact-tab1" data-bs-toggle="pill"
								href="#pills-clrcontact1" role="tab" aria-controls="pills-clrcontact1"
								aria-selected="false"> <i class="fa fa-times" aria-hidden="true"></i></i> Ditolak</a>
						</li>
					</ul>

					<div class="tab-content" id="pills-clrtabContent1">
						<div class="tab-pane fade show active" id="pills-clrhome1" role="tabpanel"
							aria-labelledby="pills-clrhome-tab1">
							<?php echo $this->session->flashdata('pesan') ?>
							<a href="<?= base_url(); ?>keuangan/tambahbuktikaskorwil/"
								class="btn btn-success btn-sm mb-3">
								<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a> <br>
							<table class="display" id="basic-3" style="text-align:center;">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal Diterima</th>
										<th>No Surat</th>
										<th>Jenis Surat</th>
										<th>Sifat Surat</th>
										<th>Action</th>
									</tr>

								</thead>
								<tbody>
									<?php $no = 1;
									  foreach ($suratkeluar_diterima AS $drm) { ?>
									<tr>
										<td><?=$no++?></td>
										<td><?= date('d-M-Y',strtotime($drm['tgl_diterima']))?></td>
										<td><?=$drm['no_surat']?></td>
										<td><span class="badge badge-primary"><?=$drm['jenis_surat']?></td></span>
										<td><?=$drm['sifat']?></td>
										<td>
											<!-- detail -->
											<a href="<?= base_url(); ?>surat/detailsurat/<?= $drm['id_surat'];?>"
												class="badge badge-secondary">
												<i class="fa fa-eye" aria-hidden="true"></i></a></a>

											<!-- cetak -->
											<a href="<?= base_url(); ?>surat/printsurat/<?= $drm['id_surat'];?>"
												class="badge badge-success">
												<i class="fa fa-print" aria-hidden="true"></i></a>

											<!-- edit -->

											<a href="<?= base_url(); ?>surat/editsurat/<?= $drm['id_surat'];?>"
												class="badge badge-primary">
												<i class="fa fa-edit" aria-hidden="true"></i></a>
											<!-- hapus -->
											<!-- pop up  -->
											<a href="#" data-bs-toggle="modal"
												data-bs-target="#aksi-hapus-<?php echo $drm['id_surat'] ?>"
												class="badge badge-danger "> <i class="fa fa-trash"
													aria-hidden="true"></i></a>
											<div class="modal fade" id="aksi-hapus-<?php echo $drm['id_surat'] ?>"
												tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenter"
												aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-body">
															<h4>Hapus Akun</h4>
															<p>Apakah anda yakin ingin menghapus surat yang diterima
																pada
																<b><?php echo date('d-m-Y', strtotime($drm['tgl_diterima'])) ?></b>.
																<p>Surat dari <?php echo $br['surat_dari'];?></p>
															</p>
														</div>
														<div class="modal-footer">
															<button class="btn btn-primary btn-sm" type="button"
																data-bs-dismiss="modal">Batal</button>
															<a href="<?php echo base_url('surat/deletesurat/' . $drm['id_surat']) ?>"
																class="btn btn-danger btn-sm" type="button"><i
																	class="fa fa-trash"></i> Hapus</a>
														</div>
													</div>

										</td>
									</tr>
									<?php
                        }
                            ?>
								</tbody>

							</table>


						</div>
						<div class="tab-pane fade" id="pills-clrprofile1" role="tabpanel"
							aria-labelledby="pills-clrprofile-tab1">

							<?php echo $this->session->flashdata('pesan') ?>
							<table class="display" id="basic-2" style="text-align:center;">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal Diterima</th>
										<th>No Surat</th>
										<th>Jenis Surat</th>
										<th>Sifat Surat</th>
										<th>Action</th>

									</tr>

								</thead>
								<tbody>
									<?php $no = 1;
										  foreach ($suratkeluar_revisi AS $rvs) { ?>
									<tr>
										<td><?=$no++?></td>
										<td><?= date('d-M-Y',strtotime($rvs['tgl_diterima']))?></td>
										<td><?=$rvs['no_surat']?></td>
										<td><span class="badge badge-primary"><?=$rvs['jenis_surat']?></td></span>
										<td><?=$rvs['sifat']?></td>
										<td>
											<!-- detail -->
											<a href="<?= base_url(); ?>surat/detailsurat/<?= $rvs['id_surat'];?>"
												class="badge badge-secondary">
												<i class="fa fa-eye" aria-hidden="true"></i></a></a>

											<!-- cetak -->
											<a href="<?= base_url(); ?>surat/printsurat/<?= $rvs['id_surat'];?>"
												class="badge badge-success">
												<i class="fa fa-print" aria-hidden="true"></i></a>

											<!-- edit -->

											<a href="<?= base_url(); ?>surat/editsurat/<?= $rvs['id_surat'];?>"
												class="badge badge-primary">
												<i class="fa fa-edit" aria-hidden="true"></i></a>
											<!-- hapus -->
											<!-- pop up  -->
											<a href="#" data-bs-toggle="modal"
												data-bs-target="#aksi-hapus-<?php echo $rvs['id_surat'] ?>"
												class="badge badge-danger "> <i class="fa fa-trash"
													aria-hidden="true"></i></a>
											<div class="modal fade" id="aksi-hapus-<?php echo $rvs['id_surat'] ?>"
												tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenter"
												aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-body">
															<h4>Hapus Akun</h4>
															<p>Apakah anda yakin ingin menghapus surat yang diterima
																pada
																<b><?php echo date('d-m-Y', strtotime($rvs['tgl_diterima'])) ?></b>.
																<p>Surat dari <?php echo $rvs['surat_dari'];?></p>
															</p>
														</div>
														<div class="modal-footer">
															<button class="btn btn-primary btn-sm" type="button"
																data-bs-dismiss="modal">Batal</button>
															<a href="<?php echo base_url('surat/deletesurat/' . $rvs['id_surat']) ?>"
																class="btn btn-danger btn-sm" type="button"><i
																	class="fa fa-trash"></i> Hapus</a>
														</div>
													</div>

										</td>
									</tr>
									<?php
                        }
                            ?>
								</tbody>
							</table>


						</div>
						<div class="tab-pane fade" id="pills-clrcontact1" role="tabpanel"
							aria-labelledby="pills-clrcontact-tab1">
							<!-- flash data  -->
							<?php echo $this->session->flashdata('pesan') ?>
						
							<table class="display" id="basic-1" style="text-align:center;">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal Diterima</th>
										<th>No Surat</th>
										<th>Jenis Surat</th>
										<th>Sifat Surat</th>
										<th>Action</th>

									</tr>

								</thead>
								<tbody>
									<?php $no = 1;
									  foreach ($suratkeluar_ditolak AS $dtk) { ?>
									<td><?=$no++?></td>
									<td><?= date('d-M-Y',strtotime($dtk['tgl_diterima']))?></td>
									<td><?=$dtk['no_surat']?></td>
									<td><span class="badge badge-primary"><?=$dtk['jenis_surat']?></td></span>
									<td><?=$dtk['sifat']?></td>
									<td>
										<!-- detail -->
										<a href="<?= base_url(); ?>surat/detailsurat/<?= $dtk['id_surat'];?>"
											class="badge badge-secondary">
											<i class="fa fa-eye" aria-hidden="true"></i></a></a>

										<!-- cetak -->
										<a href="<?= base_url(); ?>surat/printsurat/<?= $dtk['id_surat'];?>"
											class="badge badge-success">
											<i class="fa fa-print" aria-hidden="true"></i></a>

										<!-- edit -->

										<a href="<?= base_url(); ?>surat/editsurat/<?= $dtk['id_surat'];?>"
											class="badge badge-primary">
											<i class="fa fa-edit" aria-hidden="true"></i></a>
										<!-- hapus -->
										<!-- pop up  -->
										<a href="#" data-bs-toggle="modal"
											data-bs-target="#aksi-hapus-<?php echo $dtk['id_surat'] ?>"
											class="badge badge-danger "> <i class="fa fa-trash"
												aria-hidden="true"></i></a>
										<div class="modal fade" id="aksi-hapus-<?php echo $dtk['id_surat'] ?>"
											tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenter"
											aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-body">
														<h4>Hapus Akun</h4>
														<p>Apakah anda yakin ingin menghapus surat yang diterima pada
															<b><?php echo date('d-m-Y', strtotime($dtk['tgl_diterima'])) ?></b>.
															<p>Surat dari <?php echo $dtk['surat_dari'];?></p>
														</p>
													</div>
													<div class="modal-footer">
														<button class="btn btn-primary btn-sm" type="button"
															data-bs-dismiss="modal">Batal</button>
														<a href="<?php echo base_url('surat/deletesurat/' . $dtk['id_surat']) ?>"
															class="btn btn-danger btn-sm" type="button"><i
																class="fa fa-trash"></i> Hapus</a>
													</div>
												</div>


												</tr>
												<?php
                        }
                            ?>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
