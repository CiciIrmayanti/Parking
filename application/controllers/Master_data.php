<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_data extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_data');
		$this->load->model('M_member');	
	}

	public function lokasi()
	{
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil'],
			);
		$this->parser->parse('Master_data/lokasi', $data);
	}

	public function sektorlokasi_json()
	{
		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_sektorlokasi($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['kode'];
			$nestedData[]	= $row['keterangan'];
			$nestedData[]	= "<a href='".site_url('Master_data/edit_lokasi/'.$row['kode'])."'><button type='button' class='btn btn-success'> EDIT</button></a> <a id='hapus' href='".site_url('Master_data/hapus_lokasi/'.$row['id_sektorlokasi'])."'><button  type='button' class='btn btn-danger ml-1'>HAPUS</button></a>";
			
			
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

	public function edit_lokasi($kode)
	{
		$getlokasi['getlokasi'] = $this->M_data->get_lokasi($kode);
		

		$this->load->view('master_data/edit_lokasi', $getlokasi);

		

	}

	public function simpan_edit_lokasi()
	{
		
		$data = array(
			'id_sektorlokasi' => $this->input->post('id_sektorlokasi'), 
			'kode'            => $this->input->post('kode'),
			'keterangan'      => $this->input->post('keterangan')
			
			
		);

		$d = $this->M_data->simpan_edit_lokasi($data);

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
	
	public function hapus_lokasi($id_jenislokasi){
		$this->M_data->delete_lokasi($id_jenislokasi); 
		
		$callback = array(
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',
			
		);

		echo json_encode($callback);
	}

	public function perangkat()
	{	
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil'],
				'd' => $this->M_data->get_perangkat()
			);
		

		$this->parser->parse('Master_data/perangkat', $data);
	}	

	public function simpan_edit_jeniskendaraan()
	{
		
		$data = array(
			'id_jeniskendaraan'   => $this->input->post('id_jeniskendaraan'), 
			'nama_jeniskendaraan'   => $this->input->post('nama_jeniskendaraan'),
			"status"=>1
			
			
		);

		$d = $this->M_data->simpan_edit_jeniskendaraan($data);

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

	public function hapus_jeniskendaraan($id_jeniskendaraan){
		$this->M_data->delete_jeniskendaraan($id_jeniskendaraan); 

		$callback = array(
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',
			
		);

		echo json_encode($callback);
	}

	public function tambah_jeniskendaraan()
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
		$this->parser->parse('Master_data/tambah_jeniskendaraan', $data);
	}
	public function jenis_kendaraan()
	{	
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil'],
			);
		$this->parser->parse('Master_data/jenis_kendaraan', $data);
	}
	
	public function akses_kendaraan()
	{	
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil'],
			);
		$this->parser->parse('Master_data/akses_kendaraan', $data);
	}

	public function produk_parkir()
	{	
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil'],
			);
		$this->parser->parse('Master_data/produk_parkir', $data);
	}

	public function get_produkparkir_json()
	{
		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_produkparkir($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['id_produk'];
			$nestedData[]	= $row['kodeproduk'];
			$nestedData[]	= $row['namaproduk'];
			$nestedData[]	= $row['jeniskendaraan'];
			$nestedData[]	= "<a href='".site_url('Master_data/edit_produk/'.$row['id_produk'])."'><button type='button' class='btn btn-success'> EDIT</button></a> <a id='hapus' href='".site_url('Master_data/hapus_produk/'.$row['id_produk'])."'><button  type='button' class='btn btn-danger ml-1'>HAPUS</button></a>";
			
			
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

	public function tarif_parkir()
	{	$this->load->model('M_tarif');

		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		$url = $this->uri->segment(3);
		if($url == 'motor' || $url == ''){
			$jenis_kendaraan = 'motor';
		}else{
			$jenis_kendaraan = 'mobil';
		}
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil'],
				'jenis_kendaraan' => $jenis_kendaraan,
				'tarif_siang' => $this->M_tarif->get_tarifsiang($jenis_kendaraan),
				'tarif_malam' => $this->M_tarif->get_tarifmalam($jenis_kendaraan),
				'get_settingtarif' => $this->M_tarif->get_settingtarif($jenis_kendaraan)
			);
		$this->parser->parse('Master_data/tarif_parkir', $data);
	}

	public function get_data_jeniskendaraan()
	{
		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_jeniskendaraan($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['nama_jeniskendaraan'];
			$nestedData[]	= "<a href='".site_url('Master_data/edit_jeniskendaraan/'.$row['id_jeniskendaraan'])."'><button type='button' class='btn btn-success'> EDIT</button></a> <a id='hapus' href='".site_url('Master_data/hapus_jeniskendaraan/'.$row['id_jeniskendaraan'])."'><button  type='button' class='btn btn-danger ml-1'>HAPUS</button></a>";
			
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

	public function simpan_jeniskendaraan()
	{
		
		$data = array(
			'id_jeniskendaraan'   => $this->input->post('id_jeniskendaraan'), 
			'nama_jeniskendaraan'   => $this->input->post('nama_jeniskendaraan'),
			
			"status"=>1
			
			
		);

		$d = $this->M_data->simpan_jenis_kendaraan($data);

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
	
	public function edit_jeniskendaraan($id_jeniskendaraan)
	{
		$this->load->model('M_data');
		$id                  = $this->session->userdata('id');
		$data['data_edit']   = $this->M_data->find_user($id);
		$data['data_jenis']  = $this->M_data->find_jeniskendaraan($id_jeniskendaraan);
		$this->load->view('master_data/edit_jeniskendaraan', $data);
	}
	
	public function tambah_lokasi()
	{
		$this->load->model('M_data');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil']
			);
		$this->parser->parse('master_data/tambah_lokasi', $data);
	}

	public function simpan_lokasi()
	{
		
		$data = array(
			'kode'     => $this->input->post('kode_lokasi'), 
			'keterangan'     => $this->input->post('keterangan')
			
		);

		$d = $this->M_data->simpan_lok($data);

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
	
	public function tambah_produkparkir()
	{
		$this->load->model('M_data');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil']
			);
		$this->parser->parse('master_data/tambah_produkparkir', $data);
	}

	public function simpan_produkparkir()
	{
		
		$data = array(
			'kodeproduk'     => $this->input->post('kode_produk'), 
			'namaproduk'     => $this->input->post('nama_produk'),
			'jeniskendaraan' => $this->input->post('jenis_kendaraan'),
			
			"status"=>1
			
			
		);

		$d = $this->M_data->simpan_produk($data);

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
	
	public function get_data_produk()
	{
		$requestData	= $_REQUEST;
		$fetch			= $this->M_data->fetch_data_produkparkir($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['id_produk'];
			$nestedData[]	= $row['kodeproduk'];
			$nestedData[]	= $row['namaproduk'];
			$nestedData[]	= $row['jeniskendaraan'];
			$nestedData[]	= "
			<div class='btn-group' role='group' aria-label='Basic example'>               
			<a href='".site_url('Master_data/edit_produk/'.$row['id_produk'])."'>
			<button type='button' class='btn btn-success'> EDIT</button></a>
			<a id='hapus' href='".site_url('Master_data/hapus_produk/'.$row['id_produk'])."'>
			<button  type='button' class='btn btn-danger'>HAPUS</button></a>
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

	public function simpan_edit_produkparkir()
	{
		
		$data = array(
			'id_produk'      => $this->input->post('id_produk'), 
			'kodeproduk'     => $this->input->post('kode_produk'), 
			'namaproduk'     => $this->input->post('nama_produk'),
			'jeniskendaraan' => $this->input->post('jenis_kendaraan'),

			"status"=> 1
			
			
		);

		$d = $this->M_data->simpan_edit_produk($data);

		if ($d) {

			$json_data = array(
				"status" => 1,
				"data" => $data
			);
			
			echo json_encode($json_data);

		}else{

			$json_data = array(
				"status" => 0,
				"data" => $data
			);
			
			echo json_encode($json_data);

		}
	}
	

	public function edit_produk($id_produk)
	{
		$this->load->model('M_data');
		$id                  = $this->session->userdata('id');
		$data['data_edit']   = $this->M_data->find_user($id);
		$data['data_produk'] = $this->M_data->find_produk($id_produk);
		$this->load->view('master_data/edit_produkparkir', $data);
		
	}

	public function hapus_produk($id_produk){
		$this->M_data->delete_produk($id_produk); 


		
		$callback = array(
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',
			
		);

		echo json_encode($callback);
	}

	public function simpan_tarif()
	{
		
		$data = array(
			'id_produk'   => NULL,
			'kodeproduk'   => $this->input->post('kodeproduk'), 
			'namaproduk'   => $this->input->post('namaproduk'),
			'jeniskendaraan'   => $this->input->post('jeniskendaraan'),
			"status" => 1
			
		);

		$d = $this->M_data->simpan_tarif($data);

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

	public function simpan_periode()
	{
		
		$data = array(
			'id_periode'   => NULL, 
			'periode_maks'   => $this->input->post('periode_maks'), 
			'tarif_hilang'   => $this->input->post('tarif_hilang'),
			'tarif_inap'   => $this->input->post('tarif_inap'),
			'tarif_event'   => $this->input->post('tarif_event'),
			"status"=>1

			
			
			
			
		);

		$d = $this->M_data->simpan_periode($data);

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

	// public function tarif_malam()
	// {
		
	// 	$data = array( 
	// 		'id_tarif'   => NULL,
	// 		'jam_mulai'   => $this->input->post('jam_mulai'),
	// 		'jam_pertama'   => $this->input->post('jam_pertama'),
	// 		'jam_kedua'   => $this->input->post('jam_kedua'),
	// 		'jam_berikutnya'   => $this->input->post('jam_berikutnya'),
	// 		'maksimum'   => $this->input->post('maksimum'),
	// 		'vip'   => $this->input->post('vip'),
	// 		'valet'   => $this->input->post('valet'),
	// 		"status"=>1
			
			
			
			
			
	// 	);

	// 	$d = $this->M_data->tarif_malam($data);

	// 	if ($d) {

	// 		$json_data = array(
	// 			"status" => 1,
	// 		);
			
	// 		echo json_encode($json_data);

	// 	}else{

	// 		$json_data = array(
	// 			"status" => 0,
	// 		);
			
	// 		echo json_encode($json_data);

	// 	}
		
	// }

	// public function tarif_siang()
	// {
		
	// 	$data = array( 
	// 		'id_tarif'   => NULL,
	// 		'jammulai'   => $this->input->post('jammulai'),
	// 		'jampertama'   => $this->input->post('jampertama'),
	// 		'jamkedua'   => $this->input->post('jamkedua'),
	// 		'jamberikutnya'   => $this->input->post('jamberikutnya'),
	// 		'maks'   => $this->input->post('maks'),
	// 		'tarifvip'   => $this->input->post('tarifvip'),
	// 		'tarifvalet'   => $this->input->post('tarifvalet'),
	// 		"status"=>1
			
			
			
			
			
	// 	);

	// 	$d = $this->M_data->tarif_siang($data);

	// 	if ($d) {

	// 		$json_data = array(
	// 			"status" => 1,
	// 		);
			
	// 		echo json_encode($json_data);

	// 	}else{

	// 		$json_data = array(
	// 			"status" => 0,
	// 		);
			
	// 		echo json_encode($json_data);

	// 	}
		
	// }

	public function par_siang_malam()
	{	
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil'],
			);
		$this->parser->parse('Master_data/tarif_parkir', $data);
	}



	public function par_tarifparkir()
	{
	
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil'],
			);
		$this->parser->parse('Master_data/tarif_parkir', $data);
	}
	
	public function simpan_edit_tarif()
	{	$this->load->model('M_tarif');
		
		$data = array(
			'id_tarif'       => $this->input->post('id_tarif'), 
			'periode_maks'   => $this->input->post('periode_maks'), 
			'tarif_hilang'   => $this->input->post('tarif_hilang'),
			'tarif_inap'     => $this->input->post('tarif_inap'),
			'tarif_event'    => $this->input->post('tarif_event')

		);

		$d = $this->M_tarif->simpan_edit_tarif($data);

		if ($d) {

			$json_data = array(
				"status" => 1,
				"data" => $data
			);
			
			echo json_encode($json_data);

		}else{

			$json_data = array(
				"status" => 0,
				"data" => $data
			);
			
			echo json_encode($json_data);

		}
	}

	public function simpan_edit_siang()
	{	
		$this->load->model('M_tarif');
		
		$data = array(
			'id_tarif'       => $this->input->post('id_tarif'), 
			'jam_mulai'   => $this->input->post('jam_mulai'), 
			'jam_pertama'   => $this->input->post('jam_pertama'),
			'jam_kedua'     => $this->input->post('jam_kedua'),
			'jam_berikutnya'    => $this->input->post('jam_berikutnya'),
			'maksimum'    => $this->input->post('maksimum'),
			'vip'    => $this->input->post('vip'),
			'valet'    => $this->input->post('valet'),

			"status"=>1
		);

		$d = $this->M_tarif->simpan_edit_siang($data);

		if ($d) {

			$json_data = array(
				"status" => 1,
				"data" => $data
			);
			
			echo json_encode($json_data);

		}else{

			$json_data = array(
				"status" => 0,
				"data" => $data
			);
			
			echo json_encode($json_data);

		}
	}

	public function simpan_edit_malam()
	{	
		$this->load->model('M_tarif');
		
		$data = array(
			'id_tarif'       => $this->input->post('id_tarif'), 
			'jam_mulai'      => $this->input->post('jam_mulai'), 
			'jam_pertama'    => $this->input->post('jam_pertama'),
			'jam_kedua'      => $this->input->post('jam_kedua'),
			'jam_berikutnya' => $this->input->post('jam_berikutnya'),
			'maksimum'       => $this->input->post('maksimum'),
			'vip'            => $this->input->post('vip'),
			'valet'          => $this->input->post('valet'),

			"status"         => 1
		);

		$d = $this->M_tarif->simpan_edit_malam($data);

		if ($d) {

			$json_data = array(
				"status" => 1,
				"data" => $data
			);
			
			echo json_encode($json_data);

		}else{

			$json_data = array(
				"status" => 0,
				"data" => $data
			);
			
			echo json_encode($json_data);

		}
	}
	
}