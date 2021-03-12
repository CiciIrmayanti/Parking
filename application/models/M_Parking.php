<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_parking extends CI_Model {

    
    public function SearchTransaksi($id_kendaraan)
    {
        $query = $this->db->query("SELECT * FROM par_kendaraan WHERE id_kendaraan = '$id_kendaraan'");
        return $query;
    }

    public function get_data_masuk(){

        $sql = "SELECT * FROM `par_kendaraan` ";
		$query = $this->db->query($sql);
        return $query->result_array();
    }

    public function save_masuk($data)
    {
        $query = $this->db->insert('par_pintu_keluar', $data);
        return $query;
    }



}

/* End of file ModelName.php */
