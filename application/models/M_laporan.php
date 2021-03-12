<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class M_laporan extends CI_Model {
    function gettahun(){
        $query = $this->db->query("SELECT YEAR(tanggal) AS tahun FROM par_kendaraan GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal) ASC");
        return $query->result();
    }

    function filterbytanggal($tanggalawal, $tanggalakhir){
        $query = $this->db->query("SELECT * FROM par_kendaraan WHERE tanggal BETWEEN '$tanggalawal' AND '$tanggalakhir' AND status = '0' ORDER BY tanggal ASC");
        return $query->result();
    }

    function filterbybulan($tahun1,$bulanawal,$bulanakhir){
        $query = $this->db->query("SELECT * FROM par_kendaraan WHERE YEAR(tanggal) = '$tahun1' AND MONTH(tanggal) BETWEEN '$bulanawal' AND '$bulanakhir' AND status = '0' ORDER BY tanggal ASC");

        return $query->result();
    }

    function filterbytahun($tahun2){
        $query = $this->db->query("SELECT * FROM par_kendaraan WHERE YEAR(tanggal) = '$tahun2' AND status = '0' ORDER BY tanggal ASC");

        return $query->result();
    }

    public function banyakdata_pertanggal($tanggalawal,$tanggalakhir)
	{
		$sql    = "SELECT COUNT(id_kendaraan) as id_kendaraan FROM `par_kendaraan` WHERE tanggal BETWEEN '$tanggalawal' AND '$tanggalakhir' AND status = '0'";
		$query  =  $this->db->query($sql);
		$result = $query->row_array();
		return ($query->num_rows() === 1 ? $result['id_kendaraan'] : false);

    }
    

    function jumlahpertanggal($tanggalawal,$tanggalakhir)
	{
		$sql    = "SELECT SUM(total) as total FROM par_kendaraan WHERE tanggal BETWEEN '$tanggalawal' AND '$tanggalakhir' AND status = '0'";
		$query  =  $this->db->query($sql);
		$result = $query->row_array();
		return ($query->num_rows() === 1 ? $result['total'] : false);

    }
    
    public function banyakdata_perbulan($tahun1,$bulanawal,$bulanakhir)
	{
		$sql    = "SELECT COUNT(id_kendaraan) as id_kendaraan FROM `par_kendaraan` WHERE YEAR(tanggal) = '$tahun1' AND MONTH(tanggal) BETWEEN '$bulanawal' AND '$bulanakhir' AND status = '0'";
		$query  =  $this->db->query($sql);
		$result = $query->row_array();
		return ($query->num_rows() === 1 ? $result['id_kendaraan'] : false);

    }
    

    function jumlahperbulan($tahun1,$bulanawal,$bulanakhir)
	{
		$sql    = "SELECT SUM(total) as total FROM par_kendaraan WHERE YEAR(tanggal) = '$tahun1' AND MONTH(tanggal) BETWEEN '$bulanawal' AND '$bulanakhir' AND status = '0'";
		$query  =  $this->db->query($sql);
		$result = $query->row_array();
		return ($query->num_rows() === 1 ? $result['total'] : false);

	}

    public function banyakdata_tahunan($tahun2)
	{
		$sql    = "SELECT COUNT(id_kendaraan) as id_kendaraan FROM `par_kendaraan` WHERE tanggal LIKE '%".$tahun2."%' AND status = '0'";
		$query  =  $this->db->query($sql);
		$result = $query->row_array();
		return ($query->num_rows() === 1 ? $result['id_kendaraan'] : false);

	}

    function jumlahtahunan($tahun2)
	{
		$sql    = "SELECT SUM(total) as total FROM par_kendaraan WHERE YEAR(tanggal) = '$tahun2' AND status = '0'";
		$query  =  $this->db->query($sql);
		$result = $query->row_array();
		return ($query->num_rows() === 1 ? $result['total'] : false);

	}


}
?> 