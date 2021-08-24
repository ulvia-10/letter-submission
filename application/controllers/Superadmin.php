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


    function index(){
        $data = array(
            'namafolder'    => "superadmin",
            'namafileview'  => "V_dashboard",
            'title'         => "Superadmin Page | Dinas Pendidikan Jombang"
        );
        // templating
        $this->load->view('templating/superadmin/template_superadmin', $data);
    }

    function datauser(){
        $data = array(
            'namafolder'    => "superadmin",
            'namafileview'  => "V_users",
            'title'         => "Superadmin Page | Dinas Pendidikan Jombang"
        );
        $data['user'] = $this->M_superadmin->get_datauser();
        // templating
        $this->load->view('templating/superadmin/template_superadmin', $data);
    }

    function tambahuser(){
        $data = array(
            'namafolder'    => "superadmin",
            'namafileview'  => "V_tambahuser",
            'title'         => "Superadmin Page | Dinas Pendidikan Jombang"
        );
        $data['user'] = $this->M_superadmin->get_datauser();
        // templating
        $this->load->view('templating/superadmin/template_superadmin', $data);
    }

    function prosesTambahUser(){

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('full_name', 'fullName', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
          echo validation_errors();
        } else {
          $upload = $this->M_superadmin->upload();
          if ($upload['result'] == 'success') {
            $this->M_superadmin->tambahdataakun($upload);
            $this->session->set_flashdata('akun', 'ditambahkan');
            redirect('superadmin/datauser', 'refresh');
          } else {
            echo $upload['error'];
          }
        }


    }

    function edituser($id_user){

        $editprofile =  $this->M_superadmin->getEditProfileByID($id_user);

        $data = array(
            'namafolder'    => "superadmin",
            'namafileview'  => "V_edituser",
            'title'         => "Superadmin Page | Dinas Pendidikan Jombang",


            'user'      => $editprofile
        );
        // templating
        $this->load->view('templating/superadmin/template_superadmin', $data);

    }

    function prosesEditUser(){
            // set form validation
            $this->form_validation->set_rules('full_name','full_name','required');
            $this->form_validation->set_rules('email','email','required');
            $this->form_validation->set_rules('level','level','required');
            $this->form_validation->set_rules('status_account','status_account','required');
        
            // check process form validation 
            if ($this->form_validation->run() == FALSE){
                echo validation_errors();
              }
              else{
                    $this->M_superadmin->editdata();
                    redirect('superadmin/datauser','refresh');
            }
    }

    function detailuser($id_user){

        $data = array(
            'namafolder'    => "superadmin",
            'namafileview'  => "V_detailuser",
            'title'         => "Superadmin Page | Dinas Pendidikan Jombang"
        );
        $data['user'] = $this->M_superadmin->getEditProfileByID($id_user);
        // templatingget_datauser
        $this->load->view('templating/superadmin/template_superadmin', $data);
    }

    public function deleteuser($id_user)
    {
      $this->M_superadmin->hapusdataakun($id_user);
      $this->session->set_flashdata('akun', 'Akun berhasil Dihapus');
      redirect('superadmin/datauser', 'refresh');
    }





}

?>
