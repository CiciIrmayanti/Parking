<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	public function parameter()
	{
		$this->load->model('M_data');
		$level  = $this->session->userdata('level');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil'],
			);
		$this->parser->parse('Konfigurasi/parameter', $data);
	}

	public function get_data_parameter()
	{
		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_karyawan($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['id_parameter'];
			$nestedData[]	= $row['nama'];
			$nestedData[]	= $row['nilai'];
			$nestedData[]	= $row['keterangan'];
			$nestedData[]	= "
			<div class='btn-group' role='group' aria-label='Basic example'>               
			<a href='".site_url('konfigurasi/edit_parameter/'.$row['id_parameter'])."'>
			<button type='button' class='btn btn-success'> EDIT</button></a>
			<a id='hapus' href='".site_url('konfigurasi/hapus_parameter/'.$row['id_parameter'])."'>
			<button  type='button' class='btn btn-danger ml-1'>HAPUS</button></a>
			</div>
			";
			
			
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

	public function tambah_parameter()
	{
		$this->load->model('M_data');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil']
			);
		$this->parser->parse('Konfigurasi/tambah_parameter', $data);
	} 

	public function simpan()
	{
		
		$data = array(
			'id_parameter'   => $this->input->post('id_parameter'), 
			'nama'        => $this->input->post('nama'),
			'nilai'   => $this->input->post('nilai'),
			'keterangan'   => $this->input->post('keterangan'),
			"status"=>1   
		);

		$d = $this->M_data->simpan_parameter($data);

		if ($d) {

			$json_data = array(
				"status" => 1,
			);
			
			echo json_encode($json_data);

		}else{

			$json_data = array(
				"status" => 0,
			);
			
			echo json_encode($json_data);

		}
		
	}
	
	public function edit_parameter($id_parameter)
	{
		$this->load->model('M_data');
		$id     = $this->session->userdata('id');
		$data['data_edit']     = $this->M_data->find_user($id);
		$data['data_parameter'] = $this->M_data->find_parameter($id_parameter);
		$this->load->view('Konfigurasi/edit_parameter', $data);
	}
	
	public function simpan_edit_parameter()
	{
		$data = array(
			'id_parameter'   => $this->input->post('id_parameter'), 
			'nama'   => $this->input->post('nama'),
			'nilai'   => $this->input->post('nilai'),
			'keterangan'   => $this->input->post('keterangan'),
			"status"=>1   
		);

		$d = $this->M_data->simpan_edit_parameter($data);

		if ($d) {

			$json_data = array(
				"status" => 1,
			);

			echo json_encode($json_data);

		}else{

			$json_data = array(
				"status" => 0,
			);
			
			echo json_encode($json_data);

		}
	}

	public function hapus_parameter($id_parameter){
		$this->M_data->delete_parameter($id_parameter); 
		
		$callback = array(
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',
			
		);

		echo json_encode($callback);
	}

	public function hak_akses()
	{
		$this->load->model('M_data');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil']
			);
		$this->parser->parse('Konfigurasi/hak_akses', $data);
	} 

	public function get_data_akses()
	{
		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_akses($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['id_user'];
			$nestedData[]	= $row['username'];
			$nestedData[]	= $row['nama'];
			$nestedData[]	= $row['nama_jabatan'];
			$nestedData[]	= "             
			<a class='btn btn-success' href='".site_url('konfigurasi/edit_akses/'.$row['id_user'])."'>
			<i class='fa fa-pencil'></i></a>
			";	
			
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
	
	public function edit_akses($id_level)
	{
		$this->load->model('M_data');
		$id     = $this->session->userdata('id');
		$data['data_edit']  = $this->M_data->find_user($id);
		$data['data_akses'] = $this->M_data->find_akses($id_level);
		$data['level']  = $this->M_data->get_listjabatan();
		$this->load->view('Konfigurasi/edit_akses', $data);
		
	}

	public function simpan_edit_akses()
	{
		$data = array(
			'id_user'      => $this->input->post('id_user'), 
			'username'     => $this->input->post('username'),
			'nama'         => $this->input->post('nama'),
			'id_level'     => $this->input->post('id_level')		
			
		);

		$d = $this->M_data->simpan_edit_akses($data);

		if ($d) {

			$json_data = array(
				"status" => 1,
			);
			
			echo json_encode($json_data);

		}else{

			$json_data = array(
				"status" => 0,
			);
			
			echo json_encode($json_data);

		}
		
	}

	public function hapus_akses($id_user){
		$this->M_data->delete_akses($id_user); 
		
		$callback = array(
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',
			
		);

		echo json_encode($callback);
	}

	public function info_nopol()
	{
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil'],
			);
		$this->parser->parse('Konfigurasi/info_nopol', $data);
	}
	
	public function get_data_nopol()
	{
		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_nopol($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['id_nopol'];
			$nestedData[]	= $row['nopol'];
			$nestedData[]	= $row['informasi'];
			$nestedData[]	= "
			<div class='btn-group' role='group' aria-label='Basic example'>               
			<a href='".site_url('konfigurasi/edit_nopol/'.$row['id_nopol'])."'>
			<button type='button' class='btn btn-success'> EDIT</button></a>
			<a id='hapus' href='".site_url('konfigurasi/hapus_nopol/'.$row['id_nopol'])."'>
			<button  type='button' class='btn btn-danger ml-1'>HAPUS</button></a>
			</div>
			";
			
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

	public function tambah_nopol()
	{
		$this->load->model('M_data');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'        => $d['nama'],
				'foto_profil' => $d['foto_profil']
			);
		$this->parser->parse('Konfigurasi/tambah_nopol', $data);
	}

	public function simpan_nopol()
	{
		$data = array(
			'id_nopol'   => $this->input->post('id_nopol'), 
			'nopol'      => $this->input->post('nopol'), 
			'informasi'  => $this->input->post('informasi'), 
			"status"=>1,
		);

		$d = $this->M_data->simpan_nopol($data);

		if ($d) {

			$json_data = array(
				"status" => 1,
			);
			
			echo json_encode($json_data);

		}else{

			$json_data = array(
				"status" => 0,
			);
			
			echo json_encode($json_data);

		}
	}

	public function simpan_edit_nopol()
	{
		
		$data = array(
			'id_nopol'   => $this->input->post('id_nopol'), 
			'nopol'   => $this->input->post('nopol'),
			'informasi'   => $this->input->post('informasi'),
			"status"=>1
			
			
		);

		$d = $this->M_data->simpan_edit_nopol($data);

		if ($d) {

			$json_data = array(
				"status" => 1,
			);
			
			echo json_encode($json_data);

		}else{

			$json_data = array(
				"status" => 0,
			);
			
			echo json_encode($json_data);

		}
		
	}
	
	public function edit_nopol($id_nopol)
	{
		$this->load->model('M_data');
		$id     = $this->session->userdata('id');
		$data['data_edit']     = $this->M_data->find_user($id);
		$data['data_nopol'] = $this->M_data->find_nopol($id_nopol);
		$this->load->view('Konfigurasi/edit_nopol', $data);
		
	}    

	public function hapus_nopol($id_nopol){
		$this->M_data->delete_nopol($id_nopol); 

		$callback = array(
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',
			
		);

		echo json_encode($callback);
	}
	
	public function jam_shift()
	{
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil'],
			);
		$this->parser->parse('Konfigurasi/jam_shift', $data);
	}

	public function hapus($id_jeniskendaraan){
		$this->load->model('M_data');
		$this->M_data->delete($id_jeniskendaraan); 
		
		$data = array(
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',
			
		);

		echo json_encode($data);
	}

	
}