<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BeaController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('BeaModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }
  
  public function index(){
    $this->SecurityModel->roleOnlyGuard('bea');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'bea/DashboardPage',
		);
    $this->load->view('Page', $pageData);
  }
  
  public function daftar_req_bea(){
    $this->SecurityModel->userOnlyGuard();
		$pageData = array(
			'title' => "Daftar Permohonan Bea",
      'content' => 'bea/DaftarReqBeaPage',
      "contentData" => []
		);
    $this->load->view('Page', $pageData);
  }
  
  public function panduan(){
    $this->SecurityModel->roleOnlyGuard('bea');
		$pageData = array(
			'title' => 'Panduan',
      'content' => 'bea/PanduanPage',
		);
    $this->load->view('Page', $pageData);
  }
}
