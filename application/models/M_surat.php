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
    // untuk surat masuk 
    function getdatasuratmasukditerima()
    {
        $sql="SELECT * FROM surat WHERE validasi_surat='diterima' AND gol_surat='masuk'";
        return $this->db->query($sql)->result_array();
      
    }
    
    function getsuratbyId($id_surat){
        $sql="SELECT * FROM surat WHERE id_surat = '$id_surat'";
        return $this->db->query($sql)->row_array();
    }

    function getdatasuratmasukrevisi()
    {
        $sql="SELECT * FROM surat WHERE validasi_surat='revisi'AND gol_surat='masuk'";
        return $this->db->query($sql)->result_array();
      
    }

    function getdatasuratmasukditolak()
    {
        $sql="SELECT * FROM surat WHERE validasi_surat='ditolak'AND gol_surat='masuk'";
        return $this->db->query($sql)->result_array();
      
    }


    // untuk surat keluar 
    function getdatasuratkeluarditerima(){
        $sql="SELECT * FROM surat WHERE validasi_surat='diterima'AND gol_surat='keluar'";
        return $this->db->query($sql)->result_array();
    }

    function getdatasuratkeluarrevisi(){
        $sql="SELECT * FROM surat WHERE validasi_surat='revisi'AND gol_surat='keluar'";
        return $this->db->query($sql)->result_array();
    }

    function getdatasuratkeluarditolak(){
        $sql="SELECT * FROM surat WHERE validasi_surat='ditolak'AND gol_surat='keluar'";
        return $this->db->query($sql)->result_array();
    }
   
}