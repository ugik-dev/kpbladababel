<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MutuController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('MutuModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }
  
  public function index(){
    $this->SecurityModel->roleOnlyGuard('mutu');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'mutu/DashboardPage',
		);
    $this->load->view('Page', $pageData);
  }
  
  public function jadwal_pengambilan_sampel(){
    $this->SecurityModel->userOnlyGuard();
		$pageData = array(
			'title' => "Jadwal Pengambilan Sampel",
      'content' => 'JadwalPengambilanSampel',
      "contentData" => []
		);
    $this->load->view('Page', $pageData);
  }
  
  public function daftar_req_mutu(){
    $this->SecurityModel->userOnlyGuard();
		$pageData = array(
			'title' => "Daftar Permohonan Mutu",
      'content' => 'mutu/DaftarReqMutuPage',
      "contentData" => []
		);
    $this->load->view('Page', $pageData);
  }
  
  public function panduan(){
    $this->SecurityModel->roleOnlyGuard('mutu');
		$pageData = array(
			'title' => 'Panduan',
      'content' => 'mutu/PanduanPage',
		);
    $this->load->view('Page', $pageData);
  }
}
