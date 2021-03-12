<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Parking extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_data');
		$this->load->model('M_parkir');
		
	}
	
	public function index()
	{
		$this->load->view('parking/index');
	}

	public function masuk()
	{
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}

			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil'],
				'data_masuk' => $this->M_data->data_masuk()
			);

		$this->parser->parse('parking/masuk', $data);
	}

	public function save_masuk()
	{
		$jenis_kendaraan = $this->input->post('jenis_kendaraan');
		if ($jenis_kendaraan == 'MOTOR') {
			$id_kendaraan = 'MTR';
		}else{
			$id_kendaraan = 'MBL';
		}
		$cek_id = $this->M_data->cek_id();
		foreach ($cek_id as $key => $cek_id) {
			$id_k = $cek_id['id_kendaraan'];
		}
		
		$data = array(
			'no_tiket' 			=> $id_kendaraan.str_pad($id_k, 7, '0', STR_PAD_LEFT),
			'no_pol' 			=> $this->input->post('nopol'),
			'jam_masuk' 		=> date('H:i:s'),
			'tanggal' 			=> date('Y-m-d'),
			'jenis_kendaraan' 	=> $this->input->post('jenis_kendaraan'),
			'foto_masuk' 		=> $this->input->post('image')
		
		);
		$this->load->model('M_data');
		$this->M_data->save_masuk($data);
		redirect('cetak/cetak_struk_masuk/'.$data['no_tiket']);
		
	}

	public function cari_transaksi()
	{
		$id_kendaraan = $this->input->get_post('no_tiket');
		$hasil = $this->M_parkir->SearchTransaksi($id_kendaraan);
		if($hasil->num_rows() > 0) {
			$dtrans = $hasil->row_array();
			echo $dtrans['jam_masuk']."|".$dtrans['tanggal']."|".$dtrans['jenis_kendaraan']."|".$dtrans['foto_masuk']."|".$dtrans['no_pol']."|".$dtrans['id_kendaraan'];
		}
	}

	public function cari_tarif()
	{
		$jenis_kendaraan = $this->input->get_post('jenis_kendaraan');
		$hasil = $this->M_parkir->Caritarif($jenis_kendaraan);
		if($hasil->num_rows() > 0) {
			$dtrans = $hasil->row_array();
			echo $dtrans['tarif_hilang']."|".$dtrans['tarif_inap'];
		}
	}
	
	public function keluar($id_kendaraan)
	{
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}

		$data['masuk'] = $this->M_parkir->get_data_masuk($id_kendaraan);
		$data = array(
			'nama'			=> $d['nama'],
			'foto_profil'	=> $d['foto_profil']

		);
		$this->parser->parse('parking/keluar', $data);
	}

	public function simpan_edit_keluar()
	{	
		$this->load->model('M_tarif');
		
		$data = array(
			'id_kendaraan'   => $this->input->post('id_kendaraan'), 
			'no_tiket'		 => $this->input->post('no_tiket'), 
			'jam_keluar' 	 => date('H:i:s'),
			'foto_keluar'    => $this->input->post('foto_keluar'),
			'tanggal_keluar' => date('Y-m-d'),
			'total'          => $this->input->post('total'),
			'bayar'          => $this->input->post('bayar'),
			"status"         => $this->input->post('status')
		);

		$d = $this->M_parkir->simpan_edit_keluar($data);

		if ($d) {

			$json_data = array(
				"success" => true,
				"data" => $data
			);
			
			echo json_encode($json_data);

		}else{

			$json_data = array(
				"success" => false,
				"data" => $data
			);
			
			echo json_encode($json_data);

		}
	}
}