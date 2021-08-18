<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('M_login');
                $this->load->library('form_validation');
    }


    // main view tampilan
    function index()
    {
        if ($this->session->userdata('username')) {
            redirect('login');
        }
        $data = array(
            'namafolder'    => "login",
            'namafileview'  => "V_login",
            'title'         => "Login Page | Dinas Pendidikan Jombang"
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
        // echo'<pre>';
        // var_dump($username, $password);
        // echo'</pre>';
        // mengecek isi tabel
        if ($dataAkun->num_rows() > 0) {

            // alias
            $row = $dataAkun->row_array();

            // status account
            if ($row['status_account'] == "active") {
            
                // // pencocokan password
                if (password_verify($password, $row['password'])) {
                 
                //     // add session
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
                            echo "Hi Kepala Cabang";
                            break;

                        case 'kasubag_tu':
                            echo "Hi Kasubag TU ";
                            break;

                        case 'pmk':    
                            echo "Hi Admin";
                            break;

                        case 'pma':
                            echo "Hi Admin";
                            break;

                        case 'staf':
                            echo "Hi Admin";
                            break;

                        case 'admin':
                            redirect('admin');
                            // echo "Hi Admin";
                            break;
                        }
                  
                } else {
                    
                    echo "Mohon maaf Password yang Anda masukkan salah! Mohon coba lagi ";
                    // wrong password
                    $this->session->set_flashdata('pesan', '<div class="alert alert-primary"><small>Password Salah! </small></div>');
                    redirect('login');
                }
            } else {
                
                echo "Akun tidak aktif";
                //flashdata 
                $this->session->set_flashdata('pesan', '<div class="alert alert-success"><small>Akun ' . $username . ' tidak aktif </small></div>');
                redirect('login');
            }
        } else {
            echo "account not register";

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger"><small>Akun ' . $username . ' tidak terdaftar</small></div>');
            redirect('login');
        }

  
        // bener | not registered | account status | password
    }

    // logout
    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger"><small>Anda ' . $username . ' Sudah Logout Akun </small></div>');
        redirect('login');
    }
            }