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
        $this->load->model('M_admin');
        $this->load->library('form_validation');

        if (empty($this->session->userdata('sess_fullname'))) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> <small>Maaf anda harus login terlebih dahulu</small></div>');
            redirect('login');
        }
  
  
        if (empty($this->session->userdata('sess_id_user'))) {
  
          $this->session->set_flashdata('pesan', '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> <small>Maaf anda harus login terlebih dahulu</small></div>');
          redirect('login');
       }
  
       if (empty($this->session->userdata('sess_level')=='admin')) {
  
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> <small>Maaf anda harus login terlebih dahulu</small></div>');
        redirect('login');
      }

    }

    //--------- **** Code By Dashboard Admin **** -------------///////////////////////
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
    //--------- **** Code By End Dashboard Admin **** -------------///////////////////////

    //--------- **** Code By start Data User Admin **** -------------///////////////////////
    
    // Tabel data akun  User
    function datauser(){
          $data = array(
  
            'namafolder'	=> "admin",
            'namafileview'	=> "V_user",
            'title'         => "Data Akun | Cabdin Jombang"
          );

          //disesuaikan sama dengan nama view$ 
          $data['akun'] = $this->M_admin->get_dataakun();
          $this->load->view('templating/admin/template_admin', $data);
        }
  
        //hapus akun
            public function delete($id_user)
        {
          $this->M_admin->hapusdataakun($id_user);
          $this->session->set_flashdata('akun', 'Akun berhasil Dihapus');
          redirect('Admin/datauser', 'refresh');
        }

         // Tambah AKun 
         public function tambah()
         {
 
           //$dataMasterCabang = $this->M_master->getallwilayah();
           $data = array(
 
             'namafolder'	=> "admin",
             'namafileview'	=> "V_tambahuser",
             'title'			=> " Tambah Akun | Cabdin Jombang",
           );
           
           //disesuaikan sama dengan nama view$ 
           $data['tambahakun'] = $this->M_admin->get_dataakun();
           $this->load->view('templating/admin/template_admin', $data);
         }
 
         // Proses Tambah Akun
         function prosesTambah()
         {
 
           // print_r( $this->input->post() );
           $this->load->helper(array('form', 'url'));
           $this->load->library('form_validation');
 
           $this->form_validation->set_rules('full_name', 'fullName', 'trim|required');
           $this->form_validation->set_rules('username', 'username', 'trim|required');
           $this->form_validation->set_rules('password', 'password', 'trim|required');
           $this->form_validation->set_rules('email', 'email', 'trim|required');
 
           if ($this->form_validation->run() == FALSE) {
 
             // $this->tambah();
             echo validation_errors();
           } else {
             $upload = $this->M_admin->upload();
             if ($upload['result'] == 'success') {
               $this->M_admin->tambahdataakun($upload);
               $this->session->set_flashdata('akun', 'ditambahkan');
               redirect('admin/datauser', 'refresh');
             } else {
               echo $upload['error'];
             }
           }
         }

        //edit akun
        public function edit($id_user)
        {

          $editprofile =  $this->M_admin->getEditProfileByID($id_user);

          $data = array(

            'namafolder'	=> "admin",
            'namafileview'	=> "V_editakun",
            'title'         => "Edit  | Cabdin Jombang",

            // // variable
            'user'      => $editprofile
          );

          $this->form_validation->set_rules('full_name', 'fullName', 'trim|required');
          $this->form_validation->set_rules('username', 'username', 'trim|required');
          $this->form_validation->set_rules('password', 'password', 'trim|required');
          $this->form_validation->set_rules('email', 'email', 'trim|required');

          if ($this->form_validation->run() == FALSE) {
            #code...    
            //$data['profile'] = $this->M_dataakun->getProfileByID($id);
            $this->load->view('templating/admin/template_admin', $data);
            //print_r($data);
            // echo "<pre>";
            // echo var_dump($data);
            // echo "</pre>";
          } else {
            // #code...
            //$this->M_pusat->editdata();
            // echo "<pre>";
            // echo var_dump($data);
            // echo "</pre>";
          }
        }

        //edit profile
        public function editprofile(){
          $this->M_admin->editdata();
      } 

        //--------------  *** End Data Akun ****/--------------------------------------------------------//
    

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