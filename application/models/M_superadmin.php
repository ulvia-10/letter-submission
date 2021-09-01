<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_superadmin extends CI_Model
{

    function get_datauser(){
        $query = $this->db->query('SELECT * FROM user');
        return $query;
    }

    function getdetail_user(){
        $sql = $this->db->query('SELECT * FROM user');
        return $this->db->query($sql)->row_array();
    }

    public function getEditProfileByID($id_user)
    {
        $sql = "SELECT * FROM user WHERE id_user= '$id_user'";
         return $this->db->query($sql)->row_array();
         
    }


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
        redirect('superadmin/datauser', 'refresh');
    }

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
        $this->db->insert('user', $data);

        //flashdata 
        $elementHTML = '<div class="alert alert-primary alert-dismissible fade show"><br> Akun berhasil ditambahkan pada ' . date('d F Y H.i A') . '</div>';
        $this->session->set_flashdata('akun', $elementHTML);

        redirect('superadmin/datauser');
    }

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

    public function editdata(){
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
        redirect('superadmin/edituser/' . $id_user);
    }
  
}
?>