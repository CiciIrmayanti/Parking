<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tarif extends CI_Model {

    
    public function get_tarifsiang($jenis_kendaraan)
    {
        
        $sql = "SELECT * FROM `par_tarif_siang` WHERE `jenis_kendaraan` = '$jenis_kendaraan'";
		$query = $this->db->query($sql); 
		return $query->result_array();
    }

    function get_tarifmalam($jenis_kendaraan){

        $sql = "SELECT * FROM `par_tarif_malam` WHERE `jenis_kendaraan` = '$jenis_kendaraan'";
		$query = $this->db->query($sql);
		return $query->result_array();


    }

    function get_settingtarif($jenis_kendaraan){

        $sql = "SELECT * FROM `par_tarif` WHERE `jenis_kendaraan` = '$jenis_kendaraan'";
		$query = $this->db->query($sql);
		return $query->result_array();


    }

    function get_tarif($periode_maks){

        $sql = "SELECT * FROM `par_tarif` WHERE `periode_maks` = '$periode_maks'";
		$query = $this->db->query($sql);
		return $query->result_array();

    }

    public function simpan_edit_tarif($data)
	{
		$this->db->where('id_tarif', $data['id_tarif']);
		$query = $this->db->update('par_tarif' ,$data);
		return $query;
    }
    
    public function simpan_edit_siang($data)
	{
		$this->db->where('id_tarif', $data['id_tarif']);
		$query = $this->db->update('par_tarif_siang' ,$data);
		return $query;
    }
    
    public function simpan_edit_malam($data)
	{
		$this->db->where('id_tarif', $data['id_tarif']);
		$query = $this->db->update('par_tarif_malam' ,$data);
		return $query;
	}

}

/* End of file ModelName.php */
