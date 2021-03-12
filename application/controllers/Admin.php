<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		$data = array(
			'nama'          => $d['nama'],
			'foto_profil' => $d['foto_profil'],
		);
		$this->parser->parse('index', $data);
	}

	public function Konfigurasi()
	{
		$this->parser->parse('admin/Konfigurasi');
	}

	public function master_data()
	{
		$this->parser->parse('admin/master_data');
	}

	public function member_area()
	{
		$this->parser->parse('admin/member_area');
	}
}