<<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
     /// ******* PUNYA ADMIN  ******//////
//start function
    //--------------  *** Start model Tabel Akun Admin ****/--------------------------------------------------------//
     // Mengambil tabel akun 
     public function get_dataakun()
     {
 
         $query = $this->db->query('SELECT * FROM user where level != "super_admin"');
         return $query;
     }

     //Hapus AKun
     public function hapusdataakun($id_user)
     {
   
        $data =[
            'id_user' => $id_user
        ];
        $this->db->where('id_user', $id_user);
        $this->db->delete('user',$data);

         //flashdata 
         $elementHTML = '<div class="alert alert-secondary"><b>Pemberitahuan</b> <br> Akun berhasil dihapus </div>';
         $this->session->set_flashdata('akun', $elementHTML);
 
         //redirect
         redirect('Admin/datauser', 'refresh');
     }

     //tambahakun
     public function tambahdataakun($upload)
     {
         // password hash 
         $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
 
         $data = array(
             'id_user'   => $this->input->post('id_user'),
             'full_name'    => $this->input->post('full_name'),
             'username'    => $this->input->post('username'),
             'email'    => $this->input->post('email'),
             'password'     => $password,
             'level'        => $this->input->post('level'),
             'status_account'   => $this->input->post('status_account'),
             'photo'  => $upload['file']['file_name']
         );
        //  echo '<pre>';
        //  var_dump($data);
        //  echo'</pre>';
        //  execute database
         $this->db->insert('user', $data);
 
         //flashdata 
         $elementHTML = '<div class="alert alert-primary alert-dismissible fade show"><br> Akun berhasil ditambahkan pada ' . date('d F Y H.i A') . '</div>';
         $this->session->set_flashdata('akun', $elementHTML);
 
         redirect('admin/datauser');
     }
     //upload akun tambah foto
     public function upload()
     {
         $config['upload_path'] = './assets/images/';
         $config['allowed_types'] = 'jpg|png|jpeg';
         $this->load->library('upload', $config);
         if ($this->upload->do_upload('photo')) {
             $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
             return $return;
         } else {
             $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
             return $return;
         }
     }

     //edit akun
    public function editdata()
    {
        $id_user = $this->input->post('id_user');
        
        $data = [
            'id_user'      =>$id_user,
            'full_name'    => $this->input->post('full_name', true),
            'email'         => $this->input->post('email', true),
            'level'        => $this->input->post('level', true),
            'status_account'   => $this->input->post('status_account', true)
        ];

        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);

        //flashdata 
        $msg = '<div class="alert alert-info">Akun berhasil  diperbarui <br><small>Pada tanggal ' . date('d F Y H.i A') . '</small></div>';
        $this->session->set_flashdata('akun', $msg);
        //redirect
        redirect('admin/datauser/');
    }

     //Detail  Informasi Akun mengambil id_profile pada saat edit profile
     public function getEditProfileByID($id_user)
     {

         $sql = "SELECT * FROM user WHERE id_user= '$id_user'";
         return $this->db->query($sql)->row_array();
         
     }

     //detail akun
     public function getProfileByID($id_user)
     {
 
        $sql = "SELECT * FROM user
        WHERE user.id_user = '$id_user'
        ";
 
        return $this->db->query($sql)->row_array();
     }
    //--------------  *** end model Tabel Akun Admin ****/--------------------------------------------------------//

  //--------------  *** start  model Tabel Akun profile ****/--------------------------------------------------------//
    
    // Menampilkan isi informasi profile
  public function getproseseditProfileByID()
    {

        $id_profile = $this->session->userdata('sess_id_profile');
        $sql = "SELECT * FROM user";

        return $this->db->query($sql)->row_array();
    }

    //proses edit
    public function updateprofile($upload)
    {
        $this->session->set_userdata('sess_foto',$upload['file']['file_name']);
        $id_user = $this->input->post('id_user');
        
        // updae data di akun_profile 
        $dataProfile = array(
            'photo'  => $upload ['file']['file_name']
        );
        $this->db->where('id_user',$id_user);
        $this->db->update('user', $dataProfile);

        $data = [
           
            'full_name'           => $this->input->post('full_name',true),
            'username'            => $this->input->post('username',true),
            'email'               => $this->input->post('email',true),
            'telp'                => $this->input->post('telp',true),
        ];


        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);

        //flashdata 
        $msg = '<div class="alert alert-info">Profile berhasil  diperbarui <br><small>Pada tanggal ' . date('d F Y H.i A') . '</small></div>';
        $this->session->set_flashdata('profile', $msg);
        //redirect
        redirect('Admin/profile/' . $id_user);

        // echo "<pre>";
		// 	echo var_dump($data);
		// 	echo "</pre>";
        //Mencari eror
        //print_r($data);
    
    }
    //--------------  *** end  model Tabel Akun profile ****/--------------------------------------------------------//

    //--------------  *** start  model Tabel Akun surat ****/--------------------------------------------------------//

    public function datasurat($status)
    {
        //$id_cabang = $this->session->userdata('sess_id_cabang');
        $sql = " SELECT *FROM surat
        
        WHERE  surat.status = '$status'";
        return $this->db->query($sql)->result_array();

        // 1 data atau 1 baris | setting | detail profile | identitas dsb
        // row_array()    = $row['username']
        // row             = $row->username

        // lebih dari 1 data seperti rekapan | data master | dkk 
        // result_array() = $row['mahasiswa']
        // result         = $row->mahasiswa   
    }

    // Proses tabel tambah surat  Multiple 
    public function tambahSuratmasuk()
    {
        $upload = "";

        $id_profile = $this->session->userdata('sess_id_user');
       // $id_cabang = $this->session->userdata('sess_id_cabang');

        $dataUploaded = array();
        $dataError    = array();


        for ($i = 0; $i < count($_FILES['namaberkas']['name']); $i++) {

            $_FILES['namaberkas[]']['name']     = $_FILES['namaberkas']['name'][$i];
            $_FILES['namaberkas[]']['type']     = $_FILES['namaberkas']['type'][$i];
            $_FILES['namaberkas[]']['tmp_name']  = $_FILES['namaberkas']['tmp_name'][$i];
            $_FILES['namaberkas[]']['error']     = $_FILES['namaberkas']['error'][$i];
            $_FILES['namaberkas[]']['size']     = $_FILES['namaberkas']['size'][$i];


            // name = variable.jpg 
            // type = .jpg 
            // alamat memori
            // error file
            // 52 kb

            $config['upload_path']          = './assets/datapenting/'; // direktori lokal
            $config['allowed_types']        = 'jpeg|jpg|png|pdf|doc'; // ekstensi
            $config['max_size']             = 3000; // 3 mb

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // check data upload 
            if (!$this->upload->do_upload('namaberkas[]')) {

                array_push($dataError, array(

                    'name'  => $_FILES['namaberkas']['name'][$i],
                    'error' => $this->upload->display_errors()
                ));
            } else {

                array_push($dataUploaded, $this->upload->data('file_name'));
            }
        }

        // sesi insert
        if (count($dataError) > 0) { // upload error



            $file_gagalupload = "";
            foreach ($dataError as $row) {

                $file_gagalupload .= '<p>- ' . $row['name'] . ' <br> ' . $row['error'] . '</p>';
            }

            $pesan = '<div class="alert alert-danger">Pemberitahuan <br> ' . $file_gagalupload . '</div>';
            $this->session->set_flashdata('msg', $pesan);

            redirect('admin/surat');
        } else {

            $upload = implode(',', $dataUploaded);
        }

        $status = $this->input->post('status');
        $data = array(
            
            'surat_Dari' => $this->input->post('surat_dari'),
            'tgl_surat'    => $this->input->post('tgl_surat'),
            'tgl_diterima'    => $this->input->post('tgl_diterima'),
            'sifat'    => $this->input->post('sifat'),
            'perihal'    => $this->input->post('perihal'),
            'jenis_surat'    => $this->input->post('jenis_surat'),
            'diteruskan'    => $this->input->post('diteruskan'),
            'status'    => $status,
            'namaberkas'  => $upload,
        );
         $this->db->insert('surat', $data);
        
         $id_surat = $this->db->insert_id();
        $dataakun = $this->db->get_where('user')->result_array();
        
        for($i=0;$i<sizeof($dataakun);$i++){
            
            
        if ( $status == "publish" ) {
        

            $notif = [
                'id_user' => $dataakun[$i]["id_user"],
                'id_surat'=> $id_surat,
                'surat_dari' => $this->input->post('surat_dari'),
                'perihal' => $this->input->post('perihal'),
                'tgl_surat' => $this->input->post('tgl_surat'),
                'tgl_notifikasi' => $this->input->post('tgl_notifikasi'),
                'is_read' => 0
            ];
            $this->db->insert('tbl_notif', $notif);
        }
        }
        
            
        
         // execute
       

        // //flashdata 
        

        $pesan = '<div class="alert alert-info">Data Kegiatan Berhasil Disimpan! </div>';


        $this->session->set_flashdata('kegiatan', $pesan);

        redirect('admin/surat');
        
    }

}
