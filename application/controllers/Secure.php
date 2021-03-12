<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Secure extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('M_data');
    $this->load->model('M_member'); 
  }

  public function index()
  {
    if($this->session->userdata('login_status') != NULL){
      redirect('secure/admin');
    }else{
      redirect('secure/login');
    }
  }

  public function member($id)
  {
    echo $id;
    echo "SUKSES MEMBER";
    $d = $this->M_data->check_member($id);  
    foreach ($d as $d) {} 
      echo $d['nama_member'];
    $this->cetakmember($d['nama_member']);
  }

  public function profile()
  {
    $id     = $this->session->userdata('id');
    $d      = $this->M_data->find_user($id);
    foreach ($d as $duser) {}
      $data = array(
        'nama'        => $duser['nama'],
        'foto_profil' => $duser['foto_profil'],
        'data_user'   => $d
      );
    $this->parser->parse('admin/profile', $data);
  }

  public function admin(){
    $level  = $this->session->userdata('level');
    $id     = $this->session->userdata('id');
    $d      = $this->M_data->find_user($id);
    foreach ($d as $d) {}
      if ($level == 1) {
        $data = array(
          'nama'               => $d['nama'],
          'foto_profil'        => $d['foto_profil'],
          'pengunjung_hariini' => $this->M_data->data_pengunjung_hariini(),
          'kendaraan'           => $this->M_data->kendaraandidalam(),
          'pengunjung_bulanini' => $this->M_data->data_pengunjung_bulanini(),
          'pendapatan_bulanini'  => $this->M_data->data_pendapatan_bulanini()
        );
        $this->parser->parse('index', $data);
      }else if ($level == 2) {
        $data = array(
          'nama'          => $d['nama'],
          'foto_profil' => $d['foto_profil']);
        $this->parser->parse('parking/keluar', $data);
      }else if ($level == 3) {
        $data = array(
          'nama'          => $d['nama'],
          'foto_profil' => $d['foto_profil'],
          'data_masuk' => $this->M_data->data_masuk()
        );
        $this->parser->parse('parking/masuk', $data);
      }else if ($level == 4) {
        $this->parser->parse('index');
      }else if ($level == 5) {
        $this->parser->parse('index');
      }else if ($level == 6) {
        $this->parser->parse('index');
      }else if ($level == 7) {
        $this->parser->parse('index');
      }else if ($level == 8) {
        $this->parser->parse('index');
      }
    }

    function create_barcode($kode)
    {
      $this->load->library('Zend');
      $this->zend->load('Zend/Barcode');
      Zend_Barcode::render('code128', 'image', array('text'=>$kode), array());
    }

    public function tombolmasuk()
    {
      $d = $this->M_data->masuk();
      if ($d) {
        $this->cetaktombolmasuk();
      }else{

      }
    }


    public function login()
    {
     $this->load->view('login');  
   }

   public function check_login()
   {
     $username = $this->input->post('username');
     $password = SHA1($this->input->post('password'));
     $data = $this->M_data->checkleveluser($username, $password);

     $level = $this->M_data->find_user($data);

     foreach ($level as $lvl){
      $leveluser = $lvl['id_level'];
    }

    if($data){

      $user_data = array(
        'id' => $data,
        'login_status' => 'success',
        'level' => $leveluser
      );

      $this->session->set_userdata($user_data);

      $data_login = array(
        'masuk' => date('Y-m-d'),
        'id_user' => $data,
        'host' => $_SERVER['REMOTE_ADDR'],
        'status' => "Online" 
      );
      $this->M_data->historylogin($data_login);    

      $validator['success'] = true;
      $validator['status'] = 'success';
      $validator['messages'] = "admin";

    }else{

      $validator['success'] = false;
      $validator['status'] = 'error';
      $validator['messages'] = "Username / Password anda salah";

    }

    echo json_encode($validator);

  }

  public function logout()
  {
    $this->session->sess_destroy();
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
    redirect('secure');
  }

}

/* End of file  Secure.php */

