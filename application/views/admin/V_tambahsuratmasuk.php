<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Tambah Surat</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Tabel Surat</li>
                    <li class="breadcrumb-item active">Tambah Surat</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Halaman Disposisi</h5>
                </div>
                <div class="card-body add-post">
                    <form class="row needs-validation"
                        action="<?php echo base_url('admin/prosesTambahsurat') ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="surat_dari">Surat Dari : </label>
                                <input class="form-control" name="surat_dari" id="surat_dari" type="text" placeholder="Isikan surat dari"
                                    required="">
                            </div>

                            <div class="mb-3">
                                <label for="perihal">Perihal : </label>
                                <input class="form-control" name="perihal" id="perihal" type="text" placeholder="Isikan Perihal"
                                    required="">
                            </div>
                            
                            <div class=" col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="tgl_surat">Tanggal Surat : </label>
                                    <input class="form-control form-control-lg" name="tgl_surat"
                                        id="tgl_surat" type="date" placeholder="Masukan Tanggal Surat"
                                        required=""></input>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="no_surat">No.Surat</label>
                                <input class="form-control" name="no_surat" id="no_surat" type="text"
                                    placeholder="Isikan No Surat" required="">
                            </div>

                            <div class=" col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="tgl_diterima">Tanggal Diterima: </label>
                                    <input class="form-control form-control-lg" name="tgl_diterima"
                                        id="tgl_diterima" type="date" placeholder="Masukan Tanggal Surat diterima"
                                        required=""></input>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="sifat">Sifat Surat : </label>
                                    <select class="form-select form-control-lg digits" name="sifat" id="sifat"
                                        required="">
                                        <option selected="" disabled="" value="">Pilih Sifat</option>
                                        <option value="sangat_segera">Sangat Segera</option>
                                        <option value="rahasia">Rahasia</option>
                                        <option value="segera">Segera</option>
                                        <option value="biasa">Biasa</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="diteruskan">Di Teruskan Kepada SDR: </label>
                                    <select class="form-select form-control-lg digits" name="diteruskan" id="diteruskan"
                                        required="">
                                        <option selected="" disabled="" value="">Diteruskan Kepada:</option>
                                        <option value="kepala_cabang">Biasa</option>
                                        <option value="kasubag_tu">Kasubag Tata Usaha</option>
                                        <option value="kasi_pma">Rahasia</option>
                                        <option value="kasi_pmk_dan_pklpk">Segera</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="jenis_surat">Jenis Surat : </label>
                                    <select class="form-select form-control-lg digits" name="jenis_surat" id="jenis_surat"
                                        required="">
                                        <option selected="" disabled="" value="">Jenis Surat</option>
                                        <option value="nota_dinas">Nota Dinas</option>
                                        <option value="surat">Surat</option>
                                        <option value="spt">Surat Pemberitahuan Tahunan (SPT)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="status">Status : </label>
                                    <select class="form-select form-control-lg digits" name="status" id="status"
                                        required="">
                                        <option selected="" disabled="" value="">Status</option>
                                        <option value="draft">Pilih Sebagai Draft</option>
                                        <option value="revisi">Pilih Sebagai Revisi</option>
                                    </select>
                                </div>
                            </div>

                          

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="namaberkas">Upload Data | Data berupa JPG,PNG,JPEG,PDF Dan Word</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control-lg" type="file" id="upload" placeholder="Foto Berupa JPEG,JPG Dan PNG"
                                            name="namaberkas[]" required multiple>
                                    </div>
                                </div>

    

                    </form>
                    <div class="btn-showcase">
                        <button class="btn btn-primary" type="submit">Save
                            Data</button>
                        <input class="btn btn-light" type="reset" value="Reset">
                        <a href="<?= base_url('Admin/surat'); ?>" class="btn btn-light"
                                type="submit">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Container-fluid Ends-->