<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Monitoring extends CI_Controller {

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


}