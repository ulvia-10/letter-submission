<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>User Profile</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Detail Akun</li>
                    <li class="breadcrumb-item active">User Profile</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="user-profile">
              <div class="row">
                <!-- user profile first-style start-->
                <div class="col-sm-12">
                  <div class="card hovercard text-center">
                    <div class="cardheader"></div>
                    <div class="user-image">
                      <div class="avatar"><img alt="" src="<?php echo base_url('assets/images/' . $this->session->userdata('sess_foto')) ?>"></div>
                    </div>
                    <div class="info">
                      <div class="row">
                        <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa fa-envelope"></i>   Email</h6><span><?= $profile['email'];?></span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa fa-calendar"></i>   BOD</h6><span><?= date('d-M-Y',strtotime($profile['tanggal_lahir']))?></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                          <div class="user-designation">
                            <div class="title"><a target="_blank" href=""><?php echo $this->session->userdata('sess_fullname') ?></a></div>
                            <div class="desc mt-2"><?php echo $this->session->userdata('sess_level') ?></div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa fa-phone"></i>   Contact Us</h6><span><?= $profile['telp'];?></span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa fa-location-arrow"></i>   Location</h6><span><?= $profile['name_cabang'];?></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                                <a href="<?= base_url('Adminpusat/tabelakun'); ?>" class="btn btn-primary" type="submit">Back</a>
                      </div>
                    </div>
                  </div>
                <!-- user profile first-style end-->
</div>
</div>
</div>