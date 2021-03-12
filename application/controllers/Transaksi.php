<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function index()
	{
		$this->load->view('transaksi');
	}
 	public function manual_pk()
	{
		$this->load->view('transaksi/manual_pk');
	}
	public function manual_murni()
	{
		$this->load->view('transaksi/manual_murni');
	}
	public function histori_tarif_parkir()
	{
		$this->load->model('M_data');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
		$data = array(
      		'nama'          => $d['nama'],
      		'foto_profil' => $d['foto_profil']
    	);
		$this->parser->parse('Transaksi/histori_tarif_parkir', $data);
	}
	
	public function get_data_produk()
    {
		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_produk($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['id_produk'];
			$nestedData[]	= $row['kodeproduk'];
			$nestedData[]	= $row['namaproduk'];
			$nestedData[]	= $row['jeniskendaraan'];
		
			
			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
			"data"            => $data
			);

		echo json_encode($json_data);
	}
	public function get_data_periode()
    {
		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_periode($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['id_periode'];
			$nestedData[]	= $row['periode_maks'];
			$nestedData[]	= $row['tarif_hilang'];
			$nestedData[]	= $row['tarif_inap'];
			$nestedData[]	= $row['tarif_event'];
		
			
			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
			"data"            => $data
			);

		echo json_encode($json_data);
	}
	public function get_data_siang()
    {
		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_siang($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['id_tarif'];
			$nestedData[]	= $row['jammulai'];
			$nestedData[]	= $row['jampertama'];
			$nestedData[]	= $row['jamkedua'];
			$nestedData[]	= $row['jamberikutnya'];
			$nestedData[]	= $row['maks'];
			$nestedData[]	= $row['tarifvip'];
			$nestedData[]	= $row['tarifvalet'];
		
			
			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
			"data"            => $data
			);

		echo json_encode($json_data);
	}
	public function get_data_malam()
    {
		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_malam($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['id_tarif'];
			$nestedData[]	= $row['jam_mulai'];
			$nestedData[]	= $row['jam_pertama'];
			$nestedData[]	= $row['jam_kedua'];
			$nestedData[]	= $row['jam_berikutnya'];
			$nestedData[]	= $row['maksimum'];
			$nestedData[]	= $row['vip'];
			$nestedData[]	= $row['valet'];
		
			
			$data[] = $nestedData;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
			"data"            => $data
			);

		echo json_encode($json_data);
	}
}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */