<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_model_surat extends CI_Model {
    public function view(){

        $query="SELECT * FROM surat";
        return $this->db->query($query);
        // return $query->result();

    }
    public function getdatabyID($id){
        return $this->db->get_where('surat', array('id_surat' => $id))->result();
    }
}