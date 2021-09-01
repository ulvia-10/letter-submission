<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Edit Profile</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active"> Edit Profile</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                  <?php echo $this->session->flashdata('profile') ?>
                <div class="col-xl-4">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">My Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                        <center>
                          <div class="col-auto"><img class="img70 rounded-circle" style="width:150px; height:150px;"alt="" src="<?= base_url() ?>assets/images/<?= $editprofile["photo"]; ?>"></div>
                          <br>
                          <div class="col">
                            <h3 class="mb-1"><?php echo $this->session->userdata('sess_fullname') ?></h3><br>
                            <b><h5 class="mb-3"><?php echo $this->session->userdata('sess_level') ?></h5></b>
                          </div>
                        </center>
                        <br><br><br><br>
                        </div>
                    </div>
                  </div>
                </div>


                <div class="col-xl-8">
                <form  class="needs-validation card"  method="POST" action="<?php echo site_url('Admin/proseseditprofile');?>" role="form"  enctype="multipart/form-data">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Edit Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="mb-3">
                          <input type="hidden" name="id_user" value="<?= $editprofile['id_user']; ?>">
                            <label class="form-label" id="full_name">Nama Panjang</label>
                            <input class="form-control" type="text" placeholder="Isikan Nama Panjang" name="full_name" value="<?= $editprofile['full_name']; ?>" id="full_name" required="">
                            <div class="invalid-feedback">Nama Panjang Masih Kosong</div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                          <div class="mb-3">
                            <label class="form-label" id="username">Username</label>
                            <input class="form-control" type="text" placeholder="Isikan Username" name="username" readonly value="<?= $editprofile['username']; ?>" id="username" required="">
                            <div class="invalid-feedback">Username Masih Kosong</div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label" id="telp" >No. Telepon</label>
                            <input class="form-control" type="telp" placeholder="Isikan no.telpon"name="telp" value="<?= $editprofile['telp']; ?>" id="telp" required="">
                            <div class="invalid-feedback">Telp Masih Kosong</div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label" id="email">Email</label>
                            <input class="form-control" type="text" placeholder="Isikan Profesi" name="email" value="<?= $editprofile['email']; ?>" id="email" required="">
                            <div class="invalid-feedback">Email Masih Kosong</div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label" id="photo">Foto</label>
                            <input name="photo" class="form-control" type="file" rows="3" cols="50" aria-label="file example" required="" id="photo">
                            <div class="invalid-feedback">Anda Belum Upload Foto</div>
                          </div>
                        </div>
                       
                    </div>
                    <div class="card-footer text-end">
                      <button class="btn btn-primary" type="submit" value="simpan" >Update Profile</button>
                    </div>
                  </form>
                  
                </div>
                </div>
</div>
</div>

</div>
</div>
