<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_model_surat extends CI_Model {
    public function view(){

        // // Opsi 2 
        // $SQL = "SELECT a.id_siswa,a.nama,b.id_transaksi,b.tgl_bayar,b.status FROM siswa a JOIN transaksi b ON a.id_siswa = b.id_siswa";
        // $query = $this->db->query( $SQL );

        // return $query->result();

    }
    public function getdatabyID($id){
        return $this->db->get_where('surat', array('id_surat' => $id))->result();
    }
}