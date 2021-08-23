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
            'title'         => "Admin | Cabdin Jombang"
        );
        // templating
        $this->load->view('templating/admin/template_admin',$data);
        
    }
    // detail
    function detail()
    {
        $data = array(
            'namafolder'    => "admin",
            'namafileview'  => "V_detailuser",
            'title'         => "Admin | Cabdin Jombang"
        );
        // templating
        $this->load->view('templating/admin/template_admin',$data);
        
    }
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
            $this->load->view('templating/admin/template_admin', $data);
          } else {
            // #code...
            $this->M_admin->editdata();
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
        $data['surat_diterima'] = $this->M_surat->getdatasuratmasukditerima();
        $data['surat_revisi'] = $this->M_surat->getdatasuratmasukrevisi();
        $data['surat_ditolak'] = $this->M_surat->getdatasuratmasukditolak();
        // templating
        $this->load->view('templating/admin/template_admin',$data);
    }


    
    function suratkeluar()
    {
        $data = array(
            'namafolder'    => "admin",
            'namafileview'  => "V_suratkeluar",
            'title'         => "Admin Page | Cabdin Jombang"
        );
        $data['suratkeluar_diterima'] = $this->M_surat->getdatasuratkeluarditerima();
        $data['suratkeluar_revisi'] = $this->M_surat->getdatasuratkeluarrevisi();
        $data['suratkeluar_ditolak'] = $this->M_surat->getdatasuratkeluarditolak();
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
    function proseseditakun(){
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
                $this->M_admin->editdata();
                redirect('superadmin/eventdonasi','refresh');
        }
    }
}
?>