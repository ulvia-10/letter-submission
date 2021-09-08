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
          $this->form_validation->set_rules('status_account', 'status_account', 'trim|required');
          $this->form_validation->set_rules('full_name', 'full_name', 'trim|required');
          $this->form_validation->set_rules('level', 'level', 'trim|required');
          $this->form_validation->set_rules('email', 'email', 'trim|required');

          if ($this->form_validation->run() == FALSE) {
            #code...    
            $this->load->view('templating/admin/template_admin', $data);
          } else {
            // #code...
           // $this->M_admin->editdata();
          }
        }

        //edit profile
        public function editprofile(){
          $this->M_admin->editdata();
      } 

      //detailakun
      public function detail($id_user)
      {
        $data = array(
          'namafolder'	=> "admin",
          'namafileview'	=> "V_detailuser",
          'title'         => "Informasi Akun | Cabdin Jombang"
        );
        $data['user'] = $this->M_admin->getProfileByID($id_user);
        $this->load->view('templating/admin/template_admin', $data);
      }

        //--------------  *** End Data Akun ****/--------------------------------------------------------//

    //******************** Start profile ********************************************************/
     // main view tampilan profile
     public function profile()
     {
       $profile =  $this->M_admin-> getproseseditProfileByID();
       $data = array(
   
         'namafolder'	=> "admin",
         'namafileview'	=> "V_editprofile.php",
         'title'         => "Profile | Cabang Dinas Pendidikan Wilayah Jombang",
  
               //variabel
               'editprofile'      => $profile
       );
       $this->load->view('templating/admin/template_admin', $data);

     }

     //proses edit profile
       public function proseseditprofile(){
         $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
     
         // form validation 
         $this->form_validation->set_rules('full_name', 'full_name', 'required');
         $this->form_validation->set_rules('username','username','required');
         $this->form_validation->set_rules('telp','telp','required');
         $this->form_validation->set_rules('email','email','required');
        
         // redirect 
         if ($this->form_validation->run() == FALSE){
             echo validation_errors();
         }
         else{
             $upload = $this->M_admin->upload();
             if($upload ['result'] == 'success'){
                 $this->M_admin->updateprofile($upload);
                 // print_r($upload);
                 redirect('admin/profile','refresh');
             }else{
                 echo $upload['error'];
             }
             redirect('admin/profile','refresh');  
     }
     }

   //******************** End profile ********************************************************/




     //******************** Surat masuk ********************************************************/
     function surat()
    {
        $data = array(
            'namafolder'    => "admin",
            'namafileview'  => "V_suratmasuk",
            'title'         => "Surat Masuk | Cabdin Jombang"
        );

        $data['surat_diterima'] = $this->M_admin->datasurat("diterima");
        $data['surat_draft'] = $this->M_admin->datasurat("draft");
        $data['surat_revisi'] = $this->M_admin->datasurat("revisi");
        // templating
        $this->load->view('templating/admin/template_admin',$data);
    }

     //Tampilan tabel Tambah surat diterima,di draft dan di revisi
     public function tambahSuratmasuk()
     {
        
         $data = array(
 
             'namafolder'    => "admin",
             'namafileview'    => "V_tambahsuratmasuk",
             'title'         => " tambah surat masuk | cabdin Jombang",
 
         );
         $this->load->view('templating/admin/template_admin',$data);
     }
 
     //proses tabel tambah surat masuk diterima , di draft dan di revisi
     function prosesTambahsurat()
     {
         // print_r( $this->input->post() );
         $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
 
         $this->form_validation->set_rules('surat_dari', 'surat_dari', 'required');
         $this->form_validation->set_rules('tgl_surat', 'tgl_surat', 'required');
         $this->form_validation->set_rules('no_surat', 'no_surat', 'required');
         $this->form_validation->set_rules('tgl_diterima', 'tgl_diterima', 'required');
         $this->form_validation->set_rules('sifat', 'sifat', 'required');
         $this->form_validation->set_rules('perihal', 'perihal', 'required');
         $this->form_validation->set_rules('jenis_surat', 'jenis_surat', 'required');
         $this->form_validation->set_rules('status', 'status', 'required');
         $this->form_validation->set_rules('diteruskan', 'diteruskan', 'required');
 
 
         if ($this->form_validation->run() == FALSE) {
             // $this->tambah kegiatan;
             echo validation_errors();
         } else {
             // kirim data ke model 
             $this->M_admin->tambahSuratmasuk();
         }
     }

     public function editsuratmasuk()
     {
        
         $data = array(
 
             'namafolder'    => "admin",
             'namafileview'    => "V_editsurat",
             'title'         => " Edit Surat Masuk  | cabdin Jombang",
 
         );
         $this->load->view('templating/admin/template_admin',$data);
     }

     public function prosesEditSuratMasuk(){

      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');

      
      $this->form_validation->set_rules('surat_dari', 'surat_dari', 'required');
      $this->form_validation->set_rules('tgl_surat', 'tgl_surat', 'required');
      $this->form_validation->set_rules('no_surat', 'no_surat', 'required');
      $this->form_validation->set_rules('tgl_diterima', 'tgl_diterima', 'required');
      $this->form_validation->set_rules('sifat', 'sifat', 'required');
      $this->form_validation->set_rules('perihal', 'perihal', 'required');
      $this->form_validation->set_rules('jenis_surat', 'jenis_surat', 'required');
      $this->form_validation->set_rules('status', 'status', 'required');
      $this->form_validation->set_rules('diteruskan', 'diteruskan', 'required');

     }



      
     
     
     
     
     
     
     
     //******************** End surat masuk ********************************************************/
    
  }
