<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class M_Voucher extends CI_Model {

	public function find_user($id)
	{
		$sql = "SELECT * FROM `par_user`
		WHERE `par_user`.`id_user` = '$id' 
		";
		$query = $this->db->query($sql);
		return $query->result_array();
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
            2   => 'a.`nominal`',
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

    public function simpan_edit_voucher($data)
	{

	$this->db->where('id_voucher', $data['id_voucher']);
	$query = $this->db->update('par_voucher' ,$data);
	return $query;
	}

	public function delete($id_voucher){
		$sql = "DELETE FROM `par_voucher` WHERE `par_voucher`.`id_voucher` = $id_voucher 
		";
		$query  = $this->db->query($sql);
           return $query;
		}

	public function find_voucher($id_voucher)
	{
		$sql = "SELECT * FROM `par_voucher` WHERE `id_voucher` = '$id_voucher' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


}