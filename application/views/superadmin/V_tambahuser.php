<br><br>
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <h5>Tambah Akun Baru</h5>
    </div>
    <form class="form theme-form" action="<?php echo base_url('superadmin/prosesTambahUser') ?>" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="mb-2 row">
                        <label class="col-sm-3 col-form-label"  id="full_name">Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" placeholder="Isi Nama" name="full_name"
                                id="full_name" required="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label"  id="username">Username</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" placeholder="Isi username" name="username"
                                id="username" required="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label"  id="password">Password</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="password" placeholder="Input max length 8" maxlength="8"
                                name="password" id="password" required="">
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <label class="col-sm-3 col-form-label" id="email">Email</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" placeholder="Isi Email" name="email" id="email"
                                required="">
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" id="foto">Pas Foto</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="photo" required="" id="photo">
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Level</label>
                        <div class="col-sm-9">
                        <select class="form-select" name="level" id="level">
                            <option value="admin">Admin</option>
                            <option value="kepala_cabang">Kepala Cabang</option>
                            <option value="kasubag_tu">Kasubag Tata Usaha</option>
                            <option value="pma">Kepala Seksi SMA</option>
                            <option value="pmk">Kepala Seksi SMK</option>
                            <option value="staf">Pegawai</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">

                        <label class="col-sm-3 col-form-label">Status Account</label>
                        <div class="col-sm-9">
                            <div class="m-checkbox-inline custom-radio-ml">
                                <div class="form-check form-check-inline radio radio-primary">
                                    <input class="form-check-input" id="radioinline7" type="radio" name="status_account"
                                        id="status_account" value="active" required="">
                                    <label class="form-check-label mb-0" for="radioinline7"><span class="digits">
                                            Active</span></label>
                                </div>
                                <div class="form-check form-check-inline radio radio-primary">
                                    <input class="form-check-input" id="radioinline8" type="radio" name="status_account"
                                        id="status_account" value="inactive" required="">
                                    <label class="form-check-label mb-0" for="radioinline8"><span class="digits">
                                            Inactive</span></label>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-footer">
           <center>
                <button class="btn btn-primary" type="submit">Tambah</button>
                <input class="btn btn-warning" type="reset" value="Reset">
                <a href="<?= base_url('superadmin/datauser'); ?>" class="btn btn-light" type="submit">Cancel</a>
          </center>
        </div>
    </form>
</div>
</div>
