<div class="container-fluid">
	<div class="page-title">
		<div class="row">
			<div class="col-6">
				<h3>Surat Masuk</h3>
			</div>
			<div class="col-6">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
					<li class="breadcrumb-item">Informasi Surat Masuk Dan Disposisi</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!-- Container-fluid starts                    -->
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-xl-6 xl-100">
			<div class="card">
				<div class="card-header">
					<h5 class="pull-left">Data Surat Masuk</h5>
				</div>
				<?php echo $this->session->flashdata('kegiatan') ?>
				<div class="card-body">

					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item"><a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
								role="tab" aria-controls="home" aria-selected="true">Draft</a></li>
						<li class="nav-item"><a class="nav-link" id="profile-tabs" data-bs-toggle="tab" href="#profile"
								role="tab" aria-controls="profile" aria-selected="false">Diterima</a></li>
						<li class="nav-item"><a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact"
								role="tab" aria-controls="contact" aria-selected="false">Direvisi</a></li>
					</ul>

					<br><br>
					<!-- Tambah Data -->
					<a href="<?= base_url('admin/tambahSuratmasuk'); ?>" class="btn btn-outline-primary" type="button"
						data-original-title="btn btn-outline-danger-2x" style="width: 250px;">Tambah
						Data</a>
					<!-- End Tambah Data -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<p class="mb-0 m-t-30">
								<!--table Draft -->
								<div class="card-body">
									<div class="table-responsive">

										<table class="display" id="basic-2" style="text-align:center;">
											<thead>

												<tr>
													<th>No</th>
													<th>Surat Diterima Dari</th>
													<th>Tanggal surat</th>
													<th>Jenis Surat</th>
													<th>Sifat Surat</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1;
                                                foreach ($surat_draft as $draft) { ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $draft["surat_dari"]; ?></td>
													<td><?= date('d-m-Y', strtotime($draft["tgl_surat"])); ?></td>
													<td><?= $draft["jenis_surat"]; ?></td>
													<td><span class="badge badge-primary"><?= $draft["sifat"]; ?></span>
													</td>
													</td>
													<td>
														<!-- edit -->
														<a href="<?= base_url(); ?>admin/editsuratmasuk/<?= $draft['id_surat']; ?>"
															class="badge badge-success"><i class="fa fa-edit "></i>
														</a>
														<!-- detail -->
														<a class="badge badge-secondary"
															href="<?= base_url('admin/detailsurat/' . $draft['id_surat']); ?>">
															<i class="fa fa-eye" aria-hidden="true"></i></a></a>

														<!-- Hapus-->
														<a href="#" data-bs-toggle="modal"
															data-bs-target="#aksi-hapus-<?php echo $draft['id_surat'] ?>"
															class="badge badge-danger "> <i class="fa fa-trash"
																aria-hidden="true"></i></a>

														<!--- DIV MODAL HAPUS -->
														<div class="modal fade"
															id="aksi-hapus-<?php echo $draft['id_surat'] ?>"
															tabindex=" -1" role="dialog"
															aria-labelledby="exampleModalCenter" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered"
																role="document">
																<div class="modal-content">
																	<div class="modal-body">
																		<h4>Hapus Kegiatan</h4>
																		<p>Apakah anda yakin ingin menghapus
																			data surat
																			<b><?php echo $draft['surat_dari'] ?></b>.
																		</p>
																	</div>
																	<div class="modal-footer">
																		<button class="btn btn-primary btn-sm"
																			type="button"
																			data-bs-dismiss="modal">Batal</button>
																		<a href="<?php echo base_url('admin/hapussurat/' . $draft['id_surat']) ?>"
																			class="btn btn-danger btn-sm"
																			type="button"><i class="fa fa-trash"></i>
																			Hapus</a>
																	</div>
																</div>
															</div>
														</div>
														<!--- END DIV MODAL HAPUS -->
													</td>
												</tr>

												<?php
                                                }
                                                ?>
											</tbody>

										</table>

									</div>
								</div>
							</p>
						</div>

						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<p class="mb-0 m-t-30">

								<!-- Tabel Publish -->
								<div class="card-body">
									<div class="table-responsive">

										<table class="display" id="basic-1" style="text-align:center;">
											<thead>

												<tr>
													<th>No</th>
													<th>Surat Diterima</th>
													<th>Tanggal surat</th>
													<th>Jenis Surat</th>
													<th>Sifat Surat</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1;
                                                foreach ($surat_diterima as $diterima) { ?>
												<tr>
													<td><?= $no++ ?></td>
													<td width="20%">
														<?php echo $diterima["surat_dari"];?> <br> <br>
														<a
															href="<?php echo base_url('data/pdf/'. $diterima['id_surat']) ?>"><small>Cetak disposisi</small></a>
													</td>
													<!-- <td><?= $diterima["surat_dari"]; ?></td> -->
													<td><?= date('d-m-Y', strtotime($diterima["tgl_surat"])); ?>
													</td>
													<td><?= $diterima["jenis_surat"]; ?></td>
													<td><span
															class="badge badge-primary"><?= $diterima["sifat"]; ?></span>
													</td>
													</td>
													<td>
														<!-- edit -->
														<a href="<?= base_url(); ?>admin/editsurat/<?= $diterima['id_surat']; ?>"
															class="badge badge-success"><i class="fa fa-edit "></i>
														</a>
														<!-- detail -->
														<a class="badge badge-secondary"
															href="<?= base_url('admin/detailsurat/' . $diterima['id_surat']); ?>">
															<i class="fa fa-eye" aria-hidden="true"></i></a></a>
														<!-- Hapus-->
														<a href="#" data-bs-toggle="modal"
															data-bs-target="#aksi-hapus-<?php echo $diterima['id_surat'] ?>"
															class="badge badge-danger "> <i class="fa fa-trash"
																aria-hidden="true"></i></a>

														<!--- DIV MODAL HAPUS -->
														<div class="modal fade"
															id="aksi-hapus-<?php echo $diterima['id_surat'] ?>"
															tabindex=" -1" role="dialog"
															aria-labelledby="exampleModalCenter" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered"
																role="document">
																<div class="modal-content">
																	<div class="modal-body">
																		<h4>Hapus Kegiatan</h4>
																		<p>Apakah anda yakin ingin menghapus
																			data surat
																			<b><?php echo $diterima['surat_dari'] ?></b>.
																		</p>
																	</div>
																	<div class="modal-footer">
																		<button class="btn btn-primary btn-sm"
																			type="button"
																			data-bs-dismiss="modal">Batal</button>
																		<a href="<?php echo base_url('admin/hapussurat/' . $diterima['id_surat']) ?>"
																			class="btn btn-danger btn-sm"
																			type="button"><i class="fa fa-trash"></i>
																			Hapus</a>
																	</div>
																</div>
															</div>
														</div>
														<!--- END DIV MODAL HAPUS -->
													</td>
												</tr>

												<?php
                                                }
                                                ?>
											</tbody>

										</table>

									</div>
								</div>
						</div>
						<!-- End Publish -->
						</p>

						<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							<p class="mb-0 m-t-30">
								<!-- Start expired -->
								<div class="card-body">
									<div class="table-responsive">

										<table class="display" id="basic-4" style="text-align:center;">
											<thead>

												<tr>
													<th>No</th>
													<th>Surat Diterima</th>
													<th>Tanggal surat</th>
													<th>Jenis Surat</th>
													<th>Sifat Surat</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1;
                                                foreach ($surat_revisi as $revisi) { ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $revisi["surat_dari"]; ?></td>
													<td><?= date('d-m-Y', strtotime($revisi["tgl_surat"])); ?>
													</td>
													<td><?= $revisi["jenis_surat"]; ?></td>
													<td><span
															class="badge badge-primary"><?= $revisi["sifat"]; ?></span>
													</td>
													</td>
													<td>
														<!-- edit -->
														<a href="<?= base_url(); ?>admin/editsurat/<?= $revisi['id_surat']; ?>"
															class="badge badge-success"><i class="fa fa-edit "></i>
														</a>
														<!-- detail -->
														<a class="badge badge-secondary"
															href="<?= base_url('admin/detailsurat/' . $revisi['id_surat']); ?>">
															<i class="fa fa-eye" aria-hidden="true"></i></a></a>

														<!-- Hapus-->
														<a href="#" data-bs-toggle="modal"
															data-bs-target="#aksi-hapus-<?php echo $revisi['id_surat'] ?>"
															class="badge badge-danger "> <i class="fa fa-trash"
																aria-hidden="true"></i></a>

														<!--- DIV MODAL HAPUS -->
														<div class="modal fade"
															id="aksi-hapus-<?php echo $revisi['id_surat'] ?>"
															tabindex=" -1" role="dialog"
															aria-labelledby="exampleModalCenter" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered"
																role="document">
																<div class="modal-content">
																	<div class="modal-body">
																		<h4>Hapus Kegiatan</h4>
																		<p>Apakah anda yakin ingin menghapus
																			data surat
																			<b><?php echo $revisi['surat_dari'] ?></b>.
																		</p>
																	</div>
																	<div class="modal-footer">
																		<button class="btn btn-primary btn-sm"
																			type="button"
																			data-bs-dismiss="modal">Batal</button>
																		<a href="<?php echo base_url('admin/hapussurat/' . $diterima['id_surat']) ?>"
																			class="btn btn-danger btn-sm"
																			type="button"><i class="fa fa-trash"></i>
																			Hapus</a>
																	</div>
																</div>
															</div>
														</div>
														<!--- END DIV MODAL HAPUS -->
													</td>
												</tr>

												<?php
                                                }
                                                ?>
											</tbody>

										</table>

									</div>
								</div>

								<!-- end tabel expired -->
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
