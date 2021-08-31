<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
  
    function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('M_login');
        $this->load->model('M_surat');
        $this->load->model('M_superadmin');
        $this->load->library('form_validation');

    }

    function tambahsurat(){
        $data = array(
            'namafolder'    => "admin",
            'namafileview'  => "V_tambahsuratmasuk",
            'title'         => "Admin Page | Cabdin Jombang"
        );
        $data['surat_diterima'] = $this->M_surat->getdatasuratmasukditerima();
        $data['surat_revisi'] = $this->M_surat->getdatasuratmasukrevisi();
        $data['surat_ditolak'] = $this->M_surat->getdatasuratmasukditolak();
        // templating
        $this->load->view('templating/admin/template_admin',$data);
    }


    function printsurat(){
        $this->load->library('pdf_surat');
        $data['surat'] = $this->Cetak_model_surat->view();
        $this->pdf_pembayaran->setPaper('A4', 'portrait');
        $this->pdf_pembayaran->filename = "Surat.pdf";
        $this->pdf_pembayaran->load_view("admin/V_surat",$data);
    }



}

?>