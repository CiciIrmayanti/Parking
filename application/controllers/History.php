<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_member');
		$this->load->model('M_data');

		if($this->session->userdata('login_status') == NULL){
			redirect();
		}
	}

	public function laporan_keuangan()
	{
		$this->load->model('M_data');
		$level  = $this->session->userdata('level');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil']

			);
		
		$this->parser->parse('Laporan/keuangan', $data);
	}

	public function in_area()
	{
		$this->load->model('M_data');
		$level  = $this->session->userdata('level');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil'   => $d['foto_profil']

			);
		
		$this->parser->parse('history/history_admin', $data);
	}

	public function informasi_parkir()
	{
		$this->load->model('M_data');
		$level  = $this->session->userdata('level');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil']

			);
		
		$this->parser->parse('history/history_admin', $data);
	}

	public function histori_tarif_parkir()
	{
		$this->load->model('M_data');
		$level  = $this->session->userdata('level');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil']

			);
		
		$this->parser->parse('history/history_admin', $data);
	}

	public function history_login()
	{
		$this->load->model('M_data');
		$level  = $this->session->userdata('level');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil']

			);
		
		$this->parser->parse('history/history_login', $data);
	}

	public function get_data_history()
	{
		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_history($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['id_login'];
			$nestedData[]	= $row['masuk'];
			$nestedData[]	= $row['id_user'];
			$nestedData[]	= $row['host'];
			$nestedData[]	= $row['keluar'];
			
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

	public function history_admin()
	{
		$this->load->model('M_data');
		$level  = $this->session->userdata('level');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil']

			);
		
		$this->parser->parse('history/history_admin', $data);
	}
}