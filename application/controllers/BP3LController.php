<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BP3LController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('BP3LModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }
  
  public function index(){
    $this->SecurityModel->roleOnlyGuard('bp3l');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'bp3l/DashboardPage',
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
  
  public function daftar_req_bp3l(){
    $this->SecurityModel->userOnlyGuard();
		$pageData = array(
			'title' => "Daftar Permohonan BP3L",
      'content' => 'bp3l/DaftarReqBP3LPage',
      "contentData" => []
		);
    $this->load->view('Page', $pageData);
  }
  
  public function panduan(){
    $this->SecurityModel->roleOnlyGuard('bp3l');
		$pageData = array(
			'title' => 'Panduan',
      'content' => 'bp3l/PanduanPage',
		);
    $this->load->view('Page', $pageData);
  }
}
