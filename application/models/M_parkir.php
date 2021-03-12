<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_parkir extends CI_Model {

    
    public function SearchTransaksi($id_kendaraan)
    {
        $query = $this->db->query("SELECT a.`id_kendaraan`, a.`no_tiket`, a.`no_pol`, a.`jam_masuk`, a.`jam_keluar`, a.`foto_masuk`, a.`foto_keluar`, a.`jenis_kendaraan`, a.`tanggal`, a.`tanggal_keluar`, a.`total`,
        b.`periode_maks`, b.`tarif_hilang`, b.`tarif_inap`, b.`tarif_event`,
        c.`jam_mulai` as siang_jam_mulai, c.`jam_pertama` as siang_jam_mulai, c.`jam_kedua` as siang_jam_kedua, c.`jam_berikutnya` as siang_jam_berikutnya, c.`maksimum` as siang_maksimum, c.`vip` as siang_vip, c.`valet` as siang_valet,
        d.`jam_mulai` as malam_jam_mulai, d.`jam_pertama` as malam_jam_mulai, d.`jam_kedua` as malam_jam_kedua, d.`jam_berikutnya` as malam_jam_berikutnya, d.`maksimum` as malam_maksimum, d.`vip` as malam_vip, d.`valet` as malam_valet
        FROM par_kendaraan as a
        LEFT JOIN par_tarif as b ON a.jenis_kendaraan = b.jenis_kendaraan
        LEFT JOIN par_tarif_siang as c ON a.jenis_kendaraan = c.jenis_kendaraan
        LEFT JOIN par_tarif_malam as d ON a.jenis_kendaraan = d.jenis_kendaraan
        WHERE a.no_tiket = '$id_kendaraan'");
        return $query;
    }

    public function Caritarif($jenis_kendaraan)
    {
        $query = $this->db->query("SELECT b.`periode_maks`, b.`tarif_hilang`, b.`tarif_inap`, b.`tarif_event`,
        c.`jam_mulai` as siang_jam_mulai, c.`jam_pertama` as siang_jam_mulai, c.`jam_kedua` as siang_jam_kedua, c.`jam_berikutnya` as siang_jam_berikutnya, c.`maksimum` as siang_maksimum, c.`vip` as siang_vip, c.`valet` as siang_valet,
        d.`jam_mulai` as malam_jam_mulai, d.`jam_pertama` as malam_jam_mulai, d.`jam_kedua` as malam_jam_kedua, d.`jam_berikutnya` as malam_jam_berikutnya, d.`maksimum` as malam_maksimum, d.`vip` as malam_vip, d.`valet` as malam_valet
        FROM par_tarif as b
        LEFT JOIN par_tarif_siang as c ON b.jenis_kendaraan = c.jenis_kendaraan
        LEFT JOIN par_tarif_malam as d ON b.jenis_kendaraan = d.jenis_kendaraan
        WHERE b.jenis_kendaraan = '$jenis_kendaraan'");
        return $query;
    }

    function get_data_masuk(){

        $sql = "SELECT * FROM `par_kendaraan` ";
		$query = $this->db->query($sql);
		return $query->result_array();


    }

    public function simpan_edit_keluar($data)
	{
		$this->db->where('id_kendaraan', $data['id_kendaraan']);
		$query = $this->db->update('par_kendaraan' ,$data);
		return $query;
	}

}

/* End of file ModelName.php */
