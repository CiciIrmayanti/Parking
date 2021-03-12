<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_member');
		$this->load->model('M_data');

		if($this->session->userdata('login_status') == NULL){
			redirect();
		}
	}

	public function index()
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
		
		$this->parser->parse('member/member', $data);
	}

	public function data_member()
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

		$this->parser->parse('member/member', $data);

	}

	public function arsip_member()
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

		$this->parser->parse('member/arsip-member', $data);
	}

	
	public function guest_periode()
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

		$this->parser->parse('member/guest', $data);
	}
	public function kartu_parkir()
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

		$this->parser->parse('member/kartu-parkir', $data);
	}

	public function get_data_kartu()
	{
		$requestData	= $_REQUEST;
		$fetch			= $this->M_member->fetch_data_kartu($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['id_kartuparkir'];
			$nestedData[]	= $row['id_member'];
			$nestedData[]	= $row['no_kartu'];
			$nestedData[]	= $row['nopol'];
			$nestedData[]	= $row['nama'];
			$nestedData[]	= $row['lokasi'];
			$nestedData[]	= $row['tiket_trx'];
			$nestedData[]	= $row['masuk'];
			$nestedData[]	= "
			<div class='btn-group' role='group' aria-label='Basic example'>               
			<a href='".site_url('member/edit_kartu/'.$row['id_kartuparkir'])."'>
			<button type='button' class='btn btn-success'> EDIT</button></a>
			<a id='hapus' href='".site_url('member/hapus_kartu/'.$row['id_kartuparkir'])."'>
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

	public function tambah_kartu()
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
		$this->parser->parse('member/tambah_kartu', $data);
	}

	public function tambah_guest()
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
		$this->parser->parse('member/tambah_guest', $data);
	}

	public function simpan_guest()
	{

		$data = array(
			'id_guest_periode'   => $this->input->post('id_guest_periode'), 
			'nopol'   => $this->input->post('nopol'), 
			'jenis'   => $this->input->post('jenis'), 
			'nama'   => $this->input->post('nama'), 
			'alamat'   => $this->input->post('alamat'), 
			'input'   => $this->input->post('input'),
			'expire'   => $this->input->post('expire'),
			'lama'   => $this->input->post('lama'),
			'petugas'   => $this->input->post('petugas'),


		);

		$d = $this->M_member->simpan_guest($data);

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


	public function simpan_kartu()
	{

		$data = array(
			'id_kartuparkir'   => $this->input->post('id_kartuparkir'), 
			'id_member'   => $this->input->post('id_member'), 
			'no_kartu'   => $this->input->post('no_kartu'), 
			'nopol'   => $this->input->post('nopol'), 
			'nama'   => $this->input->post('nama'), 
			'lokasi'   => $this->input->post('lokasi'),
			'tiket_trx'   => $this->input->post('tiket_trx'),
			'masuk'   => $this->input->post('masuk'),
			"status"=>1


		);

		$d = $this->M_member->simpan_kartu($data);

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

	public function get_data_guest()
	{
		$requestData  = $_REQUEST;
    // $fetch      = $this->M_member->fetch_data_guest($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$fetch      = $this->M_member->fetch_data_guest($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData    = $fetch['totalData'];
		$totalFiltered  = $fetch['totalFiltered'];
		$query      = $fetch['query'];

		$data  = array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]  = $row['nomor'];
			$nestedData[]  = $row['id_guest_periode'];
			$nestedData[]  = $row['nopol'];
			$nestedData[]  = $row['jenis'];
			$nestedData[]  = $row['nama'];
			$nestedData[]  = $row['alamat'];
			$nestedData[]  = $row['input'];
			$nestedData[]  = $row['expire'];
			$nestedData[]  = $row['lama'];
			$nestedData[]  = $row['petugas'];
			$nestedData[]  = "
			<div class='btn-group' role='group' aria-label='Basic example'>               
			<a href='".site_url('member/edit_guest/'.$row['id_guest_periode'])."'>
			<button type='button' class='btn btn-success'> EDIT</button></a>
			<a id='hapus' href='".site_url('member/hapus_guest/'.$row['id_guest_periode'])."'>
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
	public function edit_kartu($id_kartuparkir)
	{
		$this->load->model('M_member');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		$data = array(
			'data_edit' 	=> $this->M_member->find_user($id),
			'data_kartu' 	=> $this->M_member->find_kartu($id_kartuparkir)
		);

		$this->parser->parse('member/edit_kartu', $data);
		
	}

	public function edit_guest($id_guest_periode)
	{
		$this->load->model('M_member');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		$data = array(
			'data_edit' 	=> $this->M_member->find_user($id),
			'data_guest' 	=> $this->M_member->find_guest($id_guest_periode)
		);

		$this->parser->parse('member/edit_guest', $data);
		
	}

	public function hapus_kartu($id_kartuparkir){
		$this->M_member->delete_kartu($id_kartuparkir); 


		
		$callback = array(
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',

		);

		echo json_encode($callback);
	}

	public function hapus_guest($id_guest_periode){
		$this->M_member->delete_guest($id_guest_periode); 


		
		$callback = array(
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',

		);

		echo json_encode($callback);
	}

	public function simpan_edit_kartu()
	{

		$data = array(
			'id_kartuparkir'=> $this->input->post('id_kartuparkir'),
			'nopol'   => $this->input->post('nopol'),
			'nama'	=> $this->input->post('nama'),
			'lokasi'	=> $this->input->post('lokasi'),
			"status"=>1


		);

		$d = $this->M_member->simpan_edit_kartu($data);

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

	public function simpan_edit_guest()
	{

		$data = array(
			'id_guest_periode'   => $this->input->post('id_guest_periode'), 
			'nopol'   => $this->input->post('nopol'), 
			'jenis'   => $this->input->post('jenis'), 
			'nama'   => $this->input->post('nama'), 
			'alamat'   => $this->input->post('alamat'), 
			'input'   => $this->input->post('input'),
			'expire'   => $this->input->post('expire'),
			'lama'   => $this->input->post('lama'),
			'petugas'   => $this->input->post('petugas'),


		);

		$d = $this->M_member->simpan_edit_guest($data);

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


	public function tambah()
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
		$this->parser->parse('member/tambah', $data);
	}
	public function edit($id_member)
	{
		$data['data_edit'] = $this->M_member->find_user($id_member);
		$this->load->view('member/edit', $data);
	}

	public function get_data_member()
	{
		$requestData	= $_REQUEST;
		$fetch			= $this->M_member->fetch_data_member($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['id_member'];
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['name'];
			$nestedData[]	= $row['aktif_mulai'];
			$nestedData[]	= $row['aktif_selesai'];
			$nestedData[]	= "
			<div class='btn-group' role='group' aria-label='Basic example'>               
			<a href='".site_url('member/edit/'.$row['id_member'])."'>
			<button type='button' class='btn btn-success'> EDIT</button></a>
			<a id='hapus' href='".site_url('member/hapus/'.$row['id_member'])."'>
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


	public function simpan()
	{

		$data = array(
			'id_member'   => NULL, 
			'username'   => $this->input->post('username'), 
			'name'   => $this->input->post('name'), 
			'password'   => sha1($this->input->post('password')), 
			'tanggal_lahir'   => $this->input->post('tanggal_lahir'), 

			'alamat'   => $this->input->post('alamat'),
			'aktif_mulai'   => $this->input->post('aktif_mulai'),
			'aktif_selesai'   => $this->input->post('aktif_selesai'),
			"status"=>1


		);

		$d = $this->M_member->simpan($data);

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
	public function simpan_edit()
	{

		$data = array(
			'id_member'   => $this->input->post('id_member'), 
			'username'   => $this->input->post('username'), 

			'name'   => $this->input->post('name'), 
			'tanggal_lahir'   => $this->input->post('tanggal_lahir'), 

			'alamat'   => $this->input->post('alamat'),
			'aktif_mulai'   => $this->input->post('aktif_mulai'),
			'aktif_selesai'   => $this->input->post('aktif_selesai')


		);


		$d = $this->M_member->simpan_edit($data);

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

	public function hapus($id_member){
		$this->M_member->delete($id_member); 


		
		$callback = array(
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',

		);

		echo json_encode($callback);
	}

	public function voucher()
	{
		$this->load->model('M_data');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil']

			);

		$this->parser->parse('member/voucher', $data);
	}

	


	
}