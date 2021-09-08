<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
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


    function cetaksurat($id_surat){
        $this->load->library('pdf_surat');

        $data = array(
            'namafolder'    => "admin",
            'namafileview'  => "V_surat",
            'title'         => "Admin Page | Cabdin Jombang"
        );
        $this->load->view('templating/admin/template_admin',$data);
        $data['surat'] = $this->M_surat->getdatasuratmasukditerima();
        $this->pdf_pembayaran->setPaper('A4', 'portrait');
        $this->pdf_pembayaran->set_option('isRemoteEnabled', TRUE);
        $this->pdf_pembayaran->filename = "Surat.pdf";   
    }



}

?>