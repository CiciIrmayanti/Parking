<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_member');
		$this->load->model('M_data');
		$this->load->model('M_laporan');

		if($this->session->userdata('login_status') == NULL){
			redirect();
		}
    }

    public function laporan_keuangan()
	{
		
		$level  = $this->session->userdata('level');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil']

			);
		
		$data['tahun'] = $this->M_laporan->gettahun();

		$this->parser->parse('Laporan/keuangan', $data);
	}

	function filter(){
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalakhir = $this->input->post('tanggalakhir');
		$tahun1 = $this->input->post('tahun1');
		$bulanawal = $this->input->post('bulanawal');
		$bulanakhir = $this->input->post('bulanakhir');
		$tahun2 = $this->input->post('tahun2');
		$nilaifilter = $this->input->post('nilaifilter');

		if ($nilaifilter == 1) {
			
			$data{'title'} = "Laporan Keuangan";
			$data['subtitle'] = "Tanggal : ".$tanggalawal.' s/d '.$tanggalakhir;
			$data{'datafilter'} = $this->M_laporan->filterbytanggal($tanggalawal, $tanggalakhir);
			$data{'jumlahtotal'} = $this->M_laporan->jumlahpertanggal($tanggalawal,$tanggalakhir);
			$data{'banyakdata'} = $this->M_laporan->banyakdata_pertanggal($tanggalawal,$tanggalakhir);

			$this->load->view('Laporan/print_laporan', $data);
			
		} else if ($nilaifilter == 2) {
			
			$data{'title'} = "Laporan Keuangan";
			$data['subtitle'] = "Bulan : ".$bulanawal.' s/d bulan : '.$bulanakhir.' Th.'.$tahun1;
			$data{'datafilter'} = $this->M_laporan->filterbybulan($tahun1,$bulanawal,$bulanakhir);
			$data{'jumlahtotal'} = $this->M_laporan->jumlahperbulan($tahun1,$bulanawal,$bulanakhir);
			$data{'banyakdata'} = $this->M_laporan->banyakdata_perbulan($tahun1,$bulanawal,$bulanakhir);

			$this->load->view('Laporan/print_laporan', $data);

		} else if ($nilaifilter == 3) {
			ob_start();
			$data{'title'} = "Laporan Keuangan";
			$data['subtitle'] = ' Tahun '.$tahun2;
			$data{'datafilter'} = $this->M_laporan->filterbytahun($tahun2);
			$data{'jumlahtotal'} = $this->M_laporan->jumlahtahunan($tahun2);
			$data{'banyakdata'} = $this->M_laporan->banyakdata_tahunan($tahun2);
			

			$this->load->view('Laporan/print_laporan', $data);
		} 

	}

	public function cetak($tahun2){
		
		ob_start();
		require_once 'assets/html2pdf/autoload.php';
		$data{'datafilter'} = $this->M_laporan->filterbytahun($tahun2);
		$data{'jumlahtotal'} = $this->M_laporan->jumlahtahunan($tahun2);
		$data{'banyakdata'} = $this->M_laporan->banyakdata_tahunan($tahun2);
		$this->load->view('laporan/laporan_keuangan',$data);
		$html = ob_get_contents();
		
		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('Data Keuangan.pdf', 'D');
		ob_end_clean();
		
	}
	
	

	public function print_laporan()
	{
		
		$level  = $this->session->userdata('level');
		$id     = $this->session->userdata('id');
		$d      = $this->M_data->find_user($id);
		foreach ($d as $d) {}
			$data = array(
				'nama'          => $d['nama'],
				'foto_profil' => $d['foto_profil']

			);

		$this->parser->parse('Laporan/print_laporan', $data);
	}

	
}
?>