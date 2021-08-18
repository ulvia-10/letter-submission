<br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-6 xl-100 col-lg-12 box-col-12">
			<div class="card">
				<div class="card-header">
					<h5 class="pull-left">Data Surat</h5>
				</div>
				<div class="card-body">
					<div class="tabbed-card">
						<ul class="pull-right nav nav-pills nav-primary" id="pills-clrtab1" role="tablist">
							<li class="nav-item"><a class="nav-link active" id="pills-clrhome-tab1"
									data-bs-toggle="pill" href="#pills-clrhome1" role="tab"
									aria-controls="pills-clrhome1" aria-selected="true"> <i class="fa fa-check-circle" aria-hidden="true"></i> Diterima</a></li>
							<li class="nav-item"><a class="nav-link" id="pills-clrprofile-tab1" data-bs-toggle="pill"
									href="#pills-clrprofile1" role="tab" aria-controls="pills-clrprofile1"
									aria-selected="false"> <i class="fa fa-pencil-square" aria-hidden="true"></i>  Revisi</a>
							</li>
							<li class="nav-item"><a class="nav-link" id="pills-clrcontact-tab1" data-bs-toggle="pill"
									href="#pills-clrcontact1" role="tab" aria-controls="pills-clrcontact1"
									aria-selected="false"> <i class="fa fa-times" aria-hidden="true"></i></i> Ditolak</a></li>
						</ul>

						<div class="tab-content" id="pills-clrtabContent1">
							<div class="tab-pane fade show active" id="pills-clrhome1" role="tabpanel"
								aria-labelledby="pills-clrhome-tab1">


								<?php echo $this->session->flashdata('pesan') ?>
								<table class="display" id="basic-3" style="text-align:center;">
									<thead>
										<tr>
											<th>No</th>
											<th>Bulan</th>
											<th>Tahun</th>
											<th>Nama</th>
											<th>Via</th>
											<th>Status</th>
											<th>Action</th>
										</tr>

									</thead>
									<tbody>
										<?php $no = 1;
									  foreach ($surat_revisi AS $blm) { ?>
										<tr>
											<td><?=$no++?></td>
											<?php $bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli', 'Agustus','September','Oktober','November','Desember']; 
                                                    $data_bulan = intval(date('m', strtotime($blm["tgl_surat"])));
                    
                                                    $sekarang = $bulan[ $data_bulan - 1 ];
                                                    $tahun = date('Y');
                                                    $tanggal = date('d');
                    
                                                    ?>

											<td><?= $sekarang?></td>

											<?php
														
														$tahun = "-";
                                                        
                                                          
														if ( $blm['tgl_surat'] ){

															$tahun = date('Y',strtotime($blm['tgl_surat']));
														}
													?>
											<td><?= $tahun ?></td>
											<!--<td><?= date('d-m-Y',strtotime($blm["tgl_surat"])); ?></td>-->
											<!--<td><?php echo date('F', strtotime( $blm['tgl_surat'] )); ?></td>-->
											<td><?= $blm["full_name"]; ?></td>
											<td><span class="badge badge-info"><?=$blm["surat_dari"];?></span></td>
											<?php
														$keterangan = "";
														$warna = "";

														if ( $blm['sifat'] == "baru" ) {

															$keterangan = "Verified";
															$warna      = "success";
														} else if ( $blm['sifat'] == "belum verifikasi" ) {

															$keterangan = "belum verifikasi";
															$warna = "primary";
														} 
														?>
											<td> <span class="badge badge-<?php echo $warna ?>">
													<?php echo $keterangan?></span></td>
											<!-- <td> <span
														class="badge badge-primary"><?= $blm["sifat"]; ?></span>
												</td> -->
											<td>
												<!-- edit -->
												<a href="<?= base_url(); ?>adminkorwil/editKas/<?= $blm['id_keuangan'];?>"
													class="badge badge-info">
													<i class="fa fa-pencil" aria-hidden="true"></i></a></a>
												<!-- detail -->
												<a href="<?= base_url(); ?>keuangan/detailkaskorwil/<?= $blm['id_keuangan'];?>"
													class="badge badge-secondary">
													<i class="fa fa-eye" aria-hidden="true"></i></a></a>
												<!-- hapus -->
												<a href="<?= base_url(); ?>keuangan/deletekasanggota/<?= $blm['id_keuangan'];?>"
													class="badge badge-secondary">
													<i class="fa fa-trash" aria-hidden="true"></i></a></a>
												<!-- <a href="#" data-bs-toggle="modal"
														data-bs-target="#aksi-hapus-<?php echo $blm['id_keuangan'] ?>"
														class="badge badge-warning "> <i class="fa fa-trash"
															aria-hidden="true"></i></a> -->
												<!-- pop up  -->
												<!-- <div class="modal fade"
														id="aksi-hapus-<?php echo $blm['id_keuangan'] ?>" tabindex=" -1"
														role="dialog" aria-labelledby="exampleModalCenter"
														aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-body">
																	<h4>Hapus Akun</h4>
																	<p>Apakah anda yakin ingin menghapus
																		kas tanggal
																		<b><?php echo date('d-m-Y', strtotime($blm['tgl_surat'])) ?></b>.
																	</p>
																</div>
																<div class="modal-footer">
																	<button class="btn btn-primary btn-sm" type="button"
																		data-bs-dismiss="modal">Batal</button>
																	<a href="<?php echo base_url('keuangan/delete/' . $blm['id_keuangan']) ?>"
																		class="btn btn-danger btn-sm" type="button"><i
																			class="fa fa-trash"></i> Hapus</a>
																</div>
															</div> -->

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
											<th>Bulan</th>
											<th>Tahun</th>
											<th>Nama</th>
											<th>Nominal</th>
											<th>Status</th>
											<th>Action</th>

										</tr>

									</thead>
									<tbody>
										<?php $no = 1;
										  foreach ($kegiatan_baru AS $br) { ?>
										<tr>
											<td><?=$no++?></td>
											<?php $bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli', 'Agustus','September','Oktober','November','Desember']; 
                                                    $data_bulan = intval(date('m', strtotime($br["tgl_surat"])));
                    
                                                    $sekarang = $bulan[ $data_bulan - 1 ];
                                                    $tahun = date('Y');
                                                    $tanggal = date('d');
                    
                                                    ?>

											<td><?= $sekarang?></td>

											<?php
                    														
                    														$tahun = "-";
                                                                            
                                                                              
                    														if ( $br['tgl_surat'] ){
                    
                    															$tahun = date('Y',strtotime($br['tgl_surat']));
                    														}
                    													?>
											<td><?= $tahun ?></td>

											<td><?= $br["full_name"]; ?></td>
											<?php
                                            $nominal=  $br["nominal"]
                                            ?>
											<td>Rp. <?= number_format($nominal, 2 ); ?></td>
											<?php
										$keterangan = "";
										$warna = "";

										if ( $br['sifat'] == "baru" ) {

											$keterangan = "Verified";
											$warna      = "success";
										} else if ( $br['sifat'] == "belum verifikasi" ) {

											$keterangan = "belum verifikasi";
											$warna = "primary";
										} 
										?>
											<td> <span class="badge badge-<?php echo $warna ?>">
													<?php echo $keterangan?></span></td>
											<td>

												<!-- detail -->
												<a href="<?= base_url(); ?>keuangan/detailkaskorwil/<?= $br['id_keuangan'];?>"
													class="badge badge-secondary">
													<i class="fa fa-eye" aria-hidden="true"></i></a></a>
												<!-- hapus -->
												<a href="#" data-bs-toggle="modal"
													data-bs-target="#aksi-hapus-<?php echo $br['id_keuangan'] ?>"
													class="badge badge-warning "> <i class="fa fa-trash"
														aria-hidden="true"></i></a>
												<!-- pop up  -->
												<div class="modal fade" id="aksi-hapus-<?php echo $br['id_keuangan'] ?>"
													tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenter"
													aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-body">
																<h4>Hapus Akun</h4>
																<p>Apakah anda yakin ingin menghapus kas pada
																	tanggal
																	<b><?php echo date('d-m-Y', strtotime($br['tgl_surat'])) ?></b>.
																	<p>Atas nama <?php echo $br['full_name'];?></p>
																</p>
															</div>
															<div class="modal-footer">
																<button class="btn btn-primary btn-sm" type="button"
																	data-bs-dismiss="modal">Batal</button>
																<a href="<?php echo base_url('keuangan/deletekasanggota/' . $br['id_keuangan']) ?>"
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
								<a href="<?= base_url(); ?>keuangan/tambahbuktikaskorwil/"
									class="btn btn-primary btn-sm mb-3">
									<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a> <br>
								<div style="margin-left:80%; margin-top:20px;">
									<!-- <a href="<?= base_url(); ?>laporan/index/"
										class="btn btn-info  mb-3">
										<i class="fa fa-print" aria-hidden="true"></i> Cetak Data</a> <br> -->
								</div>
								<table class="display" id="basic-1" style="text-align:center;">
									<thead>
										<tr>
											<th>No</th>
											<th>Bulan</th>
											<th>Tahun</th>
											<th>Nama</th>
											<th>Via</th>
											<th>Status</th>
											<th>Action</th>

										</tr>

									</thead>
									<tbody>
										<?php $no = 1;
									  foreach ($kegiatan AS $kgt) { ?>
										<tr>
											<td><?=$no++?></td>
											<?php $bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli', 'Agustus','September','Oktober','November','Desember']; 
                                                    $data_bulan = intval(date('m', strtotime($kgt["tgl_surat"])));
                    
                                                    $sekarang = $bulan[ $data_bulan - 1 ];
                                                    $tahun = date('Y');
                                                    $tanggal = date('d');
                    
                                                                            ?>

											<td><?= $sekarang?></td>

											<?php
                        														
														$tahun = "-";
                                                        
                                                          
														if ( $kgt['tgl_surat'] ){

															$tahun = date('Y',strtotime($kgt['tgl_surat']));
														}
													?>
											<td><?= $tahun ?></td>
											<td><?= $kgt["full_name"]; ?></td>
											<td><span class="badge badge-info"><?=$kgt["via"]?></span></td>
											<?php
										$keterangan = "";
										$warna = "";

										if ( $kgt['sifat'] == "baru" ) {

											$keterangan = "Verified";
											$warna      = "success";
										} else if ( $kgt['sifat'] == "belum verifikasi" ) {

											$keterangan = "belum verifikasi";
											$warna = "primary";
										} 
										?>
											<td> <span class="badge badge-<?php echo $warna ?>">
													<?php echo $keterangan?></span></td>

											<td>
												<!-- detail -->
												<a href="<?= base_url(); ?>keuangan/detailkaskorwil/<?= $kgt['id_keuangan'];?>"
													class="badge badge-primary">
													<i class="fa fa-eye" aria-hidden="true"></i></a></a>
												<!-- hapus -->
												<!-- <a href="#" data-bs-toggle="modal"
														data-bs-target="#aksi-hapus-<?php echo $kgt['id_keuangan'] ?>"
														class="badge badge-warning "> <i class="fa fa-trash"
															aria-hidden="true"></i></a> -->
												<!-- pop up  -->
												<!-- <div class="modal fade"
														id="aksi-hapus-<?php echo $kgt['id_keuangan'] ?>" tabindex=" -1"
														role="dialog" aria-labelledby="exampleModalCenter"
														aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-body">
																	<h4>Hapus Akun</h4>
																	<p>Apakah anda yakin ingin menghapus kegiatan
																		<b><?php echo date('d-m-Y', strtotime($kgt['tgl_surat'])) ?></b>.
																	</p>
																</div>
																<div class="modal-footer">
																	<button class="btn btn-primary btn-sm" type="button"
																		data-bs-dismiss="modal">Batal</button>
																	<a href="<?php echo base_url('keuangan/deletekasanggota/' . $kgt['id_keuangan']) ?>"
																		class="btn btn-danger btn-sm" type="button"><i
																			class="fa fa-trash"></i> Hapus</a>
																</div>
															</div> -->

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
				</div>
			</div>
		</div>
	</div>
</div>
