<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class M_data extends CI_Model {

	public function masuk()
	{
		$id = 'MTR'.date('YmdHis');
		$jam_masuk = date('H:i:s');
		$tanggal = date('Y-m-d');
		$jenis_kendaraan = 'motor';
		$query = $this->db->query("INSERT INTO `par_kendaraan` (`id_kendaraan`, `platnomor`, `jam_masuk`, `jam_keluar`, `foto_masuk`, `foto_keluar`, `jenis_kendaraan`, `tanggal`, `total`) VALUES ('".$id."', NULL, '".$jam_masuk."', NULL, NULL, NULL, '".$jenis_kendaraan."','".$tanggal."', NULL)");
		return $query;
	}

	public function checkleveluser($username, $password)
	{
		if($username && $password) {
			$sql = "SELECT * FROM par_user WHERE username = ? AND password = ?";
			$query = $this->db->query($sql, array($username, $password));
			$result = $query->row_array();

			return ($query->num_rows() === 1 ? $result['id_user'] : false);
		}
		else {
			return false;
		}
	}

	public function find_parameter($id_parameter)
	{
	$sql = "SELECT * FROM `par_parameter` WHERE `id_parameter` = '".$id_parameter."'";
	$query = $this->db->query($sql);
	return $query->result_array();
	}

	 public function simpan_jenis_kendaraan($data)
    {
        $query = $this->db->insert('par_jeniskendaraan', $data);
        return $query;
	}
	
	public function simpan_edit_parameter($data)
    {
        $this->db->where('id_parameter', $data['id_parameter']);
		$query = $this->db->update('par_parameter' ,$data);
		return $query;
	}

	public function get_lokasi($kode)
	{
		$query = $this->db->query("SELECT * FROM `par_sektor_lokasi` WHERE `kode` = $kode");
		return $query->result_array();
	}

    public function save_masuk($data)
    {
    	$query = $this->db->insert('par_kendaraan', $data);
        return $query;
    }

    public function cek_id()
    {
    	$query = $this->db->query("SELECT `id_kendaraan` FROM `par_kendaraan` ORDER BY `par_kendaraan`.`id_kendaraan` DESC LIMIT 1");
		return $query->result_array();
    }

	public function fetch_data_jeniskendaraan($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_jeniskendaraan`,
				a.`nama_jeniskendaraan`
			
			FROM
				`par_jeniskendaraan` AS a
				, (SELECT @row := 0) r WHERE 1=1 AND a.`status` = '1'
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`nama_jeniskendaraan` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`nama_jeniskendaraan`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }

    public function fetch_data_sektorlokasi($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_sektorlokasi`,
				a.`kode`,
				a.`keterangan`
			
			FROM
				`par_sektor_lokasi` AS a
				, (SELECT @row := 0) r WHERE 1=1
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`kode` LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR a.`keterangan` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`nama_jeniskendaraan`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }

    public function fetch_data_produkparkir($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_produk`,
				a.`kodeproduk`,
				a.`namaproduk`,
				a.`jeniskendaraan`,
				a.`status`
			
			FROM
				`par_produk` AS a
				, (SELECT @row := 0) r WHERE 1=1
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`namaproduk` LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR a.`jeniskendaraan` LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR a.`kodeproduk` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`kodeproduk`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }

	public function check_member($id)
	{
		$sql = "SELECT * FROM `par_member` WHERE id_member = $id";
			$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function find_user($id)
	{
		$sql = "SELECT * FROM `par_user`
		WHERE `par_user`.`id_user` = '$id' 
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_listjabatan(Type $var = null)
	{
		$sql = "SELECT * FROM `par_jabatan`
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function find_akses($id_level)
	{
		$sql = "SELECT * FROM `par_user` LEFT JOIN `par_jabatan` ON `par_jabatan`.`id_level` = `par_user`.`id_level` where id_user = $id_level";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// public function find_akses($id_level){
	// 	$this->db->select('*');
	// 	$this->db->from('par_jabatan');
	// 	$this->db->join('par_user','par_jabatan.id_level = par_user.id_level');      
	// 	$query = $this->db->get();
	// 	return $query;
	// }
  

	public function data_pendapatan_bulanini()
	{
		$bulan  = date('Y-m');
		$sql    = "SELECT SUM(total) as total FROM `par_kendaraan` WHERE `tanggal` LIKE '%".$bulan."%'";
		$query  =  $this->db->query($sql);
		$result = $query->row_array();
		return ($query->num_rows() === 1 ? $result['total'] : false);

	}

	public function data_pengunjung_hariini()
	{
		$bulan  = date('Y-m-d');
		$sql    = "SELECT COUNT(id_kendaraan) as id_kendaraan FROM `par_kendaraan` WHERE `tanggal` LIKE '%".$bulan."%'";
		$query  =  $this->db->query($sql);
		$result = $query->row_array();
		return ($query->num_rows() === 1 ? $result['id_kendaraan'] : false);

	}

	public function data_pengunjung_bulanini()
	{
		$bulan  = date('Y-m');
		$sql    = "SELECT COUNT(id_kendaraan) as id_kendaraan FROM `par_kendaraan` WHERE tanggal LIKE '%".$bulan."%'";
		$query  =  $this->db->query($sql);
		$result = $query->row_array();
		return ($query->num_rows() === 1 ? $result['id_kendaraan'] : false);

	}

	public function kendaraandidalam($value='')
	{
		$bulan  = date('Y-m-d');
		$status = 1;
		$sql    = "SELECT COUNT(id_kendaraan) as id_kendaraan FROM `par_kendaraan` WHERE `tanggal` LIKE '%".$bulan."%' AND `status` LIKE '%".$status."%'";
		$query  =  $this->db->query($sql);
		$result = $query->row_array();
		return ($query->num_rows() === 1 ? $result['id_kendaraan'] : false);
	}

	public function fetch_data_akses($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			
			SELECT 
			(@row:=@row+1) AS nomor,
				`a`.`id_user`, 
				`b`.`id_level`, 
				`a`.`username`, 
				`a`.`password`, 
				`a`.`nama`, 
				`b`.`nama_jabatan` 
			FROM 
				`par_user` a
				
			LEFT JOIN 
				`par_jabatan` b ON `b`.`id_level`= `a`.`id_level`
				, (SELECT @row := 0) r WHERE 1=1
					
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`nama` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`id_user`',
            2   => 'a.`username`',
			3   => 'a.`nama`',
			4   => 'b.`nama_jabatan`'
 		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }

    public function simpan_edit_akses($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$query = $this->db->update('par_user' ,$data);
		return $query;
	}

	public function delete_parameter($id_parameter){
		$sql    = "DELETE FROM `par_parameter` WHERE `par_parameter`.`id_parameter` = $id_parameter";
		$query  = $this->db->query($sql);
	   return $query;
	}

	public function fetch_data_nopol($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_nopol`,
				a.`nopol`,
				a.`informasi`
			
			FROM
				`par_nopol` AS a
				, (SELECT @row := 0) r WHERE 1=1 AND a.`status` = '1'
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`nama` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`id_nopol`',
            2   => 'a.`nopol`',
            3   => 'a.`informasi`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }

	public function edit_kendaraan($data)
	{
		$this->db->where('id_jeniskendaraan', $data['id_jeniskendaraan']);
		$query = $this->db->update('par_jeniskendaraan' ,$data);
		return $query;
	}

	public function delete_jeniskendaraan($id_jeniskendaraan){
		$sql    = "DELETE FROM `par_jeniskendaraan` WHERE `par_jeniskendaraan`.`id_jeniskendaraan` = $id_jeniskendaraan";
		$query  = $this->db->query($sql);
	    return $query;
	}
	
	public function delete_lokasi($id_sektorlokasi){
		$sql    = "DELETE FROM `par_sektor_lokasi` WHERE `id_sektorlokasi` = $id_sektorlokasi";
		$query  = $this->db->query($sql);
		return $query;
	}

	public function simpan_kendaraan($data)
    {
        $query = $this->db->insert('par_jeniskendaraan', $data);
        return $query;
    }

    public function simpan_edit_jeniskendaraan($data)
	{

		$this->db->where('id_jeniskendaraan', $data['id_jeniskendaraan']);
		$query = $this->db->update('par_jeniskendaraan' ,$data);
		return $query;
	}

	public function simpan_edit_lokasi($data)
	{
		$this->db->where('id_sektorlokasi', $data['id_sektorlokasi']);
		$query = $this->db->update('par_sektor_lokasi' ,$data);
		return $query;
	}

	public function find_jeniskendaraan($id_jeniskendaraan)
	{
		$sql   = "SELECT * FROM `par_jeniskendaraan` WHERE `id_jeniskendaraan` = '".$id_jeniskendaraan."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function simpan_nopol($data)
    {
        $query = $this->db->insert('par_nopol', $data);
        return $query;
	}
	
	public function historylogin($data_login)
	{
		$query = $this->db->insert('par_login', $data_login);
        return $query;
	}

	public function fetch_data_history($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_login`,
				a.`masuk`,
				a.`id_user`,
				a.`host`,
				a.`keluar`
			
			FROM
				`par_login` AS a
				, (SELECT @row := 0) r WHERE 1=1 AND a.`status` = 'Online'
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`nama` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`id_login`',
            2   => 'a.`masuk`',
            3   => 'a.`id_user`',
			4   => 'a.`host`',
			5   => 'a.`keluar`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }

    public function simpan_edit_nopol($data)
	{
		$this->db->where('id_nopol', $data['id_nopol']);
		$query = $this->db->update('par_nopol' ,$data);
		return $query;
	}

	public function delete_nopol($id_nopol){
		$sql    = "DELETE FROM `par_nopol` WHERE `par_nopol`.`id_nopol` = $id_nopol";
		$query  = $this->db->query($sql);
    	return $query;
	}

    public function find_nopol($id_nopol)
	{
		$sql   = "SELECT * FROM `par_nopol` WHERE `id_nopol` = '".$id_nopol."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function data_masuk()
	{
		$sql   = "SELECT * FROM `par_kendaraan`";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function delete($id_jeniskendaraan){
		$sql    = "DELETE FROM `par_jeniskendaraan` WHERE `par_jeniskendaraan`.`id_jeniskendaraan` = $id_jeniskendaraan";
		$query  = $this->db->query($sql);
        return $query;
	}

	public function simpan_produk($data)
	{
		$query = $this->db->insert('par_produk', $data);
		return $query;
	}

	public function delete_produk($id_produk){
		$sql    = "DELETE FROM `par_produk` WHERE `par_produk`.`id_produk` = $id_produk";
		$query  = $this->db->query($sql);
	   return $query;
	}

	public function find_produk($id_produk)
	{
		$sql   = "SELECT * FROM `par_produk` WHERE `id_produk` = '".$id_produk."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function simpan_edit_produk($data)
	{
		$query = $this->db->query("UPDATE `par_produk` SET `kodeproduk`= '".$data['kodeproduk']."',`namaproduk`= '".$data['namaproduk']."',`jeniskendaraan`= '".$data['jeniskendaraan']."',`status`= '".$data['status']."' WHERE id_produk = ".$data['id_produk'].""); 
		return $query;
	}

	public function simpan_lok($data)
	{
		$query = $this->db->insert('par_sektor_lokasi', $data);
		return $query;
	}


	

	
	
	

	public function fetch_data_karyawan($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_parameter`,
				a.`nama`,
				a.`nilai`,
				a.`keterangan`
			
			FROM
				`par_parameter` AS a
				, (SELECT @row := 0) r WHERE 1=1 AND a.`status` = '1'
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`nama` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`id_parameter`',
            2   => 'a.`nama`',
            3   => 'a.`nilai`',
            4   => 'a.`keterangan`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }

	public function simpan_parameter($data)
    {
        $query = $this->db->insert('par_parameter', $data);
        return $query;
    }

	public function get_perangkat()
	{
		$sql   = "SELECT * FROM `par_perangkat`";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function fetch_data_produk($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_produk`,
				a.`kodeproduk`,
				a.`namaproduk`,
				a.`jeniskendaraan`
			
			FROM
				`par_produk` AS a
				, (SELECT @row := 0) r WHERE 1=1 AND a.`status` = '1'
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`namaproduk` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`id_produk`',
            2   => 'a.`kodeproduk`',
            3   => 'a.`namaproduk`',
            4   => 'a.`jeniskendaraan`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
	}

	public function simpan_periode($data)
    {
        $query = $this->db->insert('par_periode', $data);
        return $query;
	}
	
	public function simpan_tarif($data)
    {
        $query = $this->db->insert('par_produk', $data);
        return $query;
    }

	public function tarif_malam($data)
    {
        $query = $this->db->insert('par_tarif_malam', $data);
        return $query;
    }

	public function tarif_siang($data)
    {
        $query = $this->db->insert('par_tarif_siang', $data);
        return $query;
    }

	public function find_tarifparkir($id_tarifparkir)
	{
		$sql   = "SELECT * FROM `par_tarifparkir` WHERE `id_tarifparkir` = '".$id_tarifparkir."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

    public function fetch_data_periode($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_periode`,
				a.`periode_maks`,
				a.`tarif_hilang`,
				a.`tarif_inap`,
				a.`tarif_event`
			
			FROM
				`par_periode` AS a
				, (SELECT @row := 0) r WHERE 1=1 AND a.`status` = '1'
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`periode_maks` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`id_periode`',
            2   => 'a.`periode_maks`',
            3   => 'a.`tarif_hilang`',
            4   => 'a.`tarif_inap`',
            5   => 'a.`tarif_event`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }

    public function fetch_data_siang($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_tarif`,
				a.`jammulai`,
				a.`jampertama`,
				a.`jamkedua`,
				a.`jamberikutnya`,
				a.`maks`,
				a.`tarifvip`,
				a.`tarifvalet`
			
			FROM
				`par_tarif_siang` AS a
				, (SELECT @row := 0) r WHERE 1=1 AND a.`status` = '1'
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`jammulai` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`id_tarif`',
            2   => 'a.`jammulai`',
            3   => 'a.`jampertama`',
            4   => 'a.`jamkedua`',
            5   => 'a.`jamberikutnya`',
            6   => 'a.`maks`',
            7   => 'a.`tarifvip`',
            8   => 'a.`tarifvalet`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
	}
	
    public function fetch_data_malam($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_tarif`,
				a.`jam_mulai`,
				a.`jam_pertama`,
				a.`jam_kedua`,
				a.`jam_berikutnya`,
				a.`maksimum`,
				a.`vip`,
				a.`valet`
			
			FROM
				`par_tarif_malam` AS a
				, (SELECT @row := 0) r WHERE 1=1 AND a.`status` = '1'
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`jam_mulai` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`id_tarif`',
            2   => 'a.`jam_mulai`',
            3   => 'a.`jam_pertama`',
            4   => 'a.`jam_kedua`',
            5   => 'a.`jam_berikutnya`',
            6   => 'a.`maksimum`',
            7   => 'a.`vip`',
            8   => 'a.`valet`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }
}