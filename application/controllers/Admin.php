<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('M_login');
        $this->load->model('M_surat');
        $this->load->library('form_validation');
    }


    // main view tampilan
    function index()
    {
        $data = array(
            'namafolder'    => "admin",
            'namafileview'  => "V_dashboard",
            'title'         => "Admin |Cabdin Jombang"
        );
        // templating
        $this->load->view('templating/admin/template_admin',$data);
        
    }

    function surat()
    {
        $data = array(
            'namafolder'    => "admin",
            'namafileview'  => "V_indexadmin",
            'title'         => "Admin Page | Cabdin Jombang"
        );
        $data['surat_diterima'] = $this->M_surat->getdatasuratrevisi();
        $data['surat_revisi'] = $this->M_surat->getdatasuratrevisi();
        $data['surat_ditolak'] = $this->M_surat->getdatasuratrevisi();
        // templating
        $this->load->view('templating/admin/template_admin',$data);
    }
    function profile()
    {
        $data = array(
            'namafolder'    => "admin",
            'namafileview'  => "V_profile",
            'title'         => "Admin Page | Cabdin Jombang"
        );
        // templating
        $this->load->view('templating/admin/template_admin',$data);
    }
}
?>