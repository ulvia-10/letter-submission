<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_surat extends CI_Model
{

    // ambil data login 
    function getdatasurat()
    {
        $sql="SELECT * FROM surat";
        return $this->db->query($sql)->result_array();
      
    }
    function getdatasuratrevisi()
    {
        $sql="SELECT * FROM surat WHERE validasi_surat='diterima'";
        return $this->db->query($sql)->result_array();
      
    }
   
}