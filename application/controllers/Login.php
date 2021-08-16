<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('M_login');
    }


    // main view tampilan
    function index()
    {

        $data = array(
            'namafolder'    => "login",
            'namafileview'  => "V_login",
            'title'         => "Login Page | Senyum Desa"
        );
        // templating
        $this->load->view('templating/login/template_login', $data);
    }

    function forgetpassword()
    {
        $data = array(
            'namafolder' => "login",
            'namafileview' => "V_forgetpassword"
        );
        $this->load->view('templating/template_loginheader', $data);
        $this->load->view('templating/template_loginfooter', $data);
    }

    // process login
    function processLogin()
    {

        //echo "Hello";
        // from view
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username
        );

        $dataAkun = $this->M_login->getDataAkun($where);


        // mengecek isi tabel
        if ($dataAkun->num_rows() > 0) {

            // alias
            $row = $dataAkun->row_array();


            // status account
            if ($row['status_account'] == "active") {

                // pencocokan password
                if (password_verify($password, $row['password'])) {


                    // add session
                    $data_session = array(

                        'sess_id_user'      => $row['id_user'],
                        'sess_fullname'     => $row['full_name'],
                        'sess_level'        => $row['level'],
                        'sess_foto'         => $row['foto']
                    );
                    $this->session->set_userdata($data_session);

                    // switch case | pencocokan level
                    switch ($row['level']) {

                        case 'kepala_cabang':
                            # code... redirect atau link menuju ke ?
                            redirect('');
                            break;
                        case 'kasubag_tu':
                            # code...
                            redirect('');
                            break;
                        case 'pmk':
                            # code...
                            break;
                        case 'pma':
                            # code...
                            break;
                        case 'staf':
                                # code...
                            break;
                        case 'admin':
                            # code...
                            break;
                    }



                    // echo "Bener ". $row['level'];
                } else {

                    echo "pw salah";
                    // wrong password
                }
            } else {


                echo "Akun tidak aktif";
            }
        } else {

            // account not registered
            echo "account not register";

            $this->session->set_flashdata('msg', '<div class="alert alert-danger"><small>Akun ' . $username . ' tidak terdaftar</small></div>');
            redirect('login');
        }


        // bener | not registered | account status | password
    }




    // logout
    function logout()
    {

        $this->session->sess_destroy();

        redirect('login');
    }
}