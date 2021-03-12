<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Voucher extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('M_voucher');

		if($this->session->userdata('login_status') == NULL){
                redirect();
            }

		
	}

	public function voucher()
	{
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
		$data = array(
      		'nama'          => $d['nama'],
      		'foto_profil' => $d['foto_profil'],
    	);
		$this->parser->parse('voucher/voucher', $data);
	}



	public function data_voucher()
	{
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
		$data = array(
      		'nama'          => $d['nama'],
      		'foto_profil' => $d['foto_profil'],
    	);
		$this->load->view('voucher/data_voucher');
	}

	public function tambah()
	{
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
		$data = array(
      		'nama'          => $d['nama'],
      		'foto_profil' => $d['foto_profil'],
    	);
		$this->load->view('voucher/tambah');
	}
	public function edit($id_voucher)
	{
		$this->load->model('M_voucher');
		$id     = $this->session->userdata('id');
		$data['data_edit']     = $this->M_voucher->find_user($id);
		$data['data_voucher'] = $this->M_voucher->find_voucher($id_voucher);
		$this->load->view('voucher/edit', $data);
		
    }

    public function hapus($id_voucher){
		$this->M_voucher->delete($id_voucher); 


		
		$callback = array(
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus',
		
		);

		echo json_encode($callback);
	}

	public function get_data_voucher()
    {
		$requestData	= $_REQUEST;
		$fetch			= $this->M_voucher->fetch_data_voucher($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);

		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();

		foreach($query->result_array() as $row)
		{
			$nestedData = array();
			$nestedData[]	= $row['nomor'];
			$nestedData[]	= $row['id_voucher'];
            $nestedData[]	= $row['nominal'];
            $nestedData[]	= "<a  href='".site_url('voucher/edit/'.$row['id_voucher'])."' type='button' class='btn btn-success'> EDIT</a> <a id='hapus' href='".site_url('voucher/hapus/'.$row['id_voucher'])."' type='button' class='btn btn-danger ml-1'>HAPUS</a>";
		
			
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

	public function simpan_voucher()
	{
	
        $data = array(
			'id_voucher'   => $this->input->post('id_voucher'), 
			'nominal'   => $this->input->post('nominal'), 
			"status"=>1
	
       
        );

        $d = $this->M_voucher->simpan_voucher($data);

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

    public function simpan_edit_voucher()
	{
	
        $data = array(
			'id_voucher'   => $this->input->post('id_voucher'), 
			'nominal'   => $this->input->post('nominal'),
			"status"=>1
	
       
        );

        $d = $this->M_voucher->simpan_edit_voucher($data);

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

	public function simpan()
	{
	    $id_petugas = $this->session->userdata('id');
        $data = array(
            'id_user'   => $id_petugas, 
			'id_voucher'   => $this->input->post('id_voucher'), 
            'nama'   => $this->input->post('nama'), 
            'aktif_mulai'   => $this->input->post('aktif_mulai'), 
            'aktif_selesai'   => $this->input->post('aktif_selesai'), 
            'kode'   => $this->input->post('kode'),
			"status"=>1
	
       
        );

        $d = $this->M_voucher->simpan($data);

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
		'id_voucher'   => $this->input->post('id_voucher'), 
			'nama'   => $this->input->post('nama'), 
            'kode'   => $this->input->post('kode'),
            'aktif_mulai'   => $this->input->post('aktif_mulai'), 
            'aktif_selesai'   => $this->input->post('aktif_selesai'), 

			"status"=>1
			       

       
        );
       

        $d = $this->M_voucher->simpan_edit($data);

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
}