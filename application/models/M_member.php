<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_member extends CI_Model {


    public function simpan($data)
    {
        $query = $this->db->insert('par_member', $data);
        return $query;
    }
    
    public function find_user($id_member)
	{
		$sql = "SELECT * FROM `par_member` WHERE `id_member` = '$id_member' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function find_kartu($id_kartuparkir)
	{
		$sql = "SELECT * FROM `par_kartu_parkir` WHERE `id_kartuparkir` = '$id_kartuparkir' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function find_guest($id_guest_periode)
	{
		$sql = "SELECT * FROM `par_guest_periode` WHERE `id_guest_periode` = '$id_guest_periode' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function simpan_edit($data)
	{

	$this->db->where('id_member', $data['id_member']);
	$query = $this->db->update('par_member' ,$data);
	return $query;
	}

	public function fetch_data_member($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_member`,
				a.`name`,
				a.`aktif_mulai`,
				a.`aktif_selesai`
			
			FROM
				`par_member` AS a
				, (SELECT @row := 0) r WHERE 1=1 AND a.`status` = '1'
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`name` LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR a.`id_member` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`id_member`',
            2   => 'a.`name`',
            3   => 'a.`aktif_mulai`',
            4   => 'a.`aktif_selesai`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
	}
	

	// Fungsi untuk melakukan simpan data ke tabel siswa
	

   
	// Fungsi untuk melakukan menghapus data siswa berdasarkan ID siswa
	public function delete($id_member){
		$data = array(
            "status"    => '0',
		);

		$this->db->where('id_member', $id_member);
		$this->db->update('par_member', $data); // Untuk mengeksekusi perintah delete data
	}

	public function getuserwhere($id_user)
   {
   	return $this->db->query("SELECT * FROM `k55_user` where id_user = ".$id_user." ")->result();
   }  
                            
   function pdf()
   {
	   return $this->db->get_where('anggota' , array('role' => '1'))->result();
   }
   function excel()
   {
	   return $this->db->get_where('anggota',  array('role' => '1'))->result();
   }

   public function fetch_data_kartu($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_kartuparkir`,
				a.`id_member`,
				a.`no_kartu`,
				a.`nopol`,
				a.`nama`,
				a.`lokasi`,
				a.`tiket_trx`,
				a.`masuk`
			
			FROM
				`par_kartu_parkir` AS a
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
            1   => 'a.`id_kartuparkir`',
            2   => 'a.`id_member`',
            3   => 'a.`no_kartu`',
            4   => 'a.`nopol`',
            5   => 'a.`nama`',
            6   => 'a.`lokasi`',
            7   => 'a.`tiket_trx`',
            8   => 'a.`masuk`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }

    public function simpan_kartu($data)
    {
        $query = $this->db->insert('par_kartu_parkir', $data);
        return $query;
	}
	
	public function simpan_guest($data)
    {
        $query = $this->db->insert('par_guest_periode', $data);
        return $query;
    }

    public function delete_kartu($id_kartuparkir){
		$sql = "DELETE FROM `par_kartu_parkir` WHERE `par_kartu_parkir`.`id_kartuparkir` = $id_kartuparkir
		";
		$query  = $this->db->query($sql);
           return $query;
	}

	public function delete_guest($id_guest_periode){
		$sql = "DELETE FROM `par_guest_periode` WHERE `par_guest_periode`.`id_guest_periode` = $id_guest_periode";
		$query  = $this->db->query($sql);
           return $query;
	}

	 public function simpan_edit_kartu($data)
	{

	$this->db->where('id_kartuparkir', $data['id_kartuparkir']);
	$query = $this->db->update('par_kartu_parkir' ,$data);
	return $query;
	}


	public function simpan_edit_guest($data)
	{

	$this->db->where('id_guest_periode', $data['id_guest_periode']);
	$query = $this->db->update('par_guest_periode' ,$data);
	return $query;
	}

	public function fetch_data_voucher($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_voucher`,
				a.`nominal`
			
			FROM
				`par_voucher` AS a
				, (SELECT @row := 0) r WHERE 1=1 AND a.`status` = '1'
		";

		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`nominal` LIKE '%".$this->db->escape_like_str($like_value)."%'
				
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();

		$columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`id_voucher`',
            2   => 'a.`nominal`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

		$data['query'] = $this->db->query($sql);
		return $data;
    }

    public function simpan_voucher($data)
    {
        $query = $this->db->insert('par_voucher', $data);
        return $query;
    }
	
	
	public function fetch_data_guest($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
    {
        $sql = "
      		SELECT
				(@row:=@row+1) AS nomor,
				a.`id_guest_periode`,
				a.`nopol`,
				a.`jenis`,
				a.`nama`,
				a.`alamat`,
				a.`input`,
				a.`expire`,
				a.`lama`,
				a.`petugas`

      
      FROM
        `par_guest_periode` AS a
        , (SELECT @row := 0) r WHERE 1=1
        ";

    $data['totalData'] = $this->db->query($sql)->num_rows();

    if( ! empty($like_value))
    {
      $sql .= " AND ( ";
      $sql .= "
        a.`nama` LIKE '%".$this->db->escape_like_str($like_value)."%'
        OR a.`id_guest_periode` LIKE '%".$this->db->escape_like_str($like_value)."%'
      ";
      $sql .= " ) ";
    }

    $data['totalFiltered']  = $this->db->query($sql)->num_rows();

    $columns_order_by = array(
            0   => 'nomor',
            1   => 'a.`id_guest_periode`',
            2   => 'a.`nopol`',
            3   => 'a.`jenis`',
			4   => 'a.`nama`',
			5   => 'a.`alamat`',
			6   => 'a.`input`',
			7   => 'a.`expire`',
			8   => 'a.`lama`',
			9   => 'a.`petugas`'
	);

    $sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
    $sql .= " LIMIT ".$limit_start." ,".$limit_length." ";

    $data['query'] = $this->db->query($sql);
    	return $data;
    }

                        
}