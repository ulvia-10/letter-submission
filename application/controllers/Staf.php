<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Staf extends CI_Controller
{

    function index()
    {
        $data = array(
            'namafolder' => "staf",
            'namafileview' => "V_DashboardStaf",
            'title'         => "Dashboard Staf| Dinas Pendidikan Jombang"
        );
        $this->load->view('templating/login/template_login',$data);
    }
}
?>