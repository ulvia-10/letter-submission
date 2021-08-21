<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Data Akun</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Data Tables</li>
                    <li class="breadcrumb-item active">Edit Data Akun</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->


<div class="card">
    <div class="card-header">
        <h5>Edit Data Akun</h5> <br>
        <?php echo $this->session->flashdata('akun') ?>
    </div>
    <form class="form theme-form" method="POST" action="<?php echo site_url('Admin/edit');?>" >
        <div class="card-body">
            <div class="row">
                <div class="col">
                   
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Full Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" placeholder="Isi Nama Panjang" name="full_name"
                                value="<?= $user['full_name']; ?>" required="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" placeholder="Isi Email" name="email"
                                value="<?= $user['email']; ?>" required="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Level</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="level" required="">
                                <option value="admin"
                                    <?php if ($user['level'] == "admin") echo 'selected="selected"'; ?>>
                                    Admin</option>
                                <option value="kepala_cabang"
                                    <?php if ($user['level'] == "kepala_cabang") echo 'selected="selected"'; ?>>
                                    Kepala Cabang</option>
                                <option value="kasubag_tu"
                                    <?php if ($user['level'] == "kasubag_tu") echo 'selected="selected"'; ?>>
                                    Kasubag Tata Usaha</option>
                                <option value="pma"
                                    <?php if ($user['level'] == "pma") echo 'selected="selected"'; ?>>
                                    Kepala Seksi SMA</option>
                                <option value="pmk"
                                    <?php if ($user['level'] == "pmk") echo 'selected="selected"'; ?>>
                                    Kepala Seksi SMK</option>
                                <option value="staf"
                                    <?php if ($user['level'] == "staf") echo 'selected="selected"'; ?>>
                                    Pegawai</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Status Akun</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="status_account" required="">
                                <option value="active"
                                    <?php if ($user['status_account'] == "active") echo 'selected="selected"'; ?>>
                                    Status Akun Aktif</option>
                                <option value="inactive"
                                    <?php if ($user['status_account'] == "inactive") echo 'selected="selected"'; ?>>
                                    Status Akun Tidak Aktif</option>

                            </select>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-sm-9 offset-sm-3">
                <button class="btn btn-primary" type="submit" name="edit">Simpan Data</button>
                <input class="btn btn-warning" type="reset" value="reset">
                <a href="<?= base_url('Admin/datauser'); ?>" class="btn btn-light" type="submit">Cancel</a>
            </div>
        </div>
    </form>
</div>