<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DisperindagController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('DisperindagModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }
  
  public function index(){
    $this->SecurityModel->roleOnlyGuard('disperindag');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'disperindag/DashboardPage',
		);
    $this->load->view('Page', $pageData);
  }
  
  public function daftar_req_disperindag(){
    $this->SecurityModel->userOnlyGuard();
		$pageData = array(
			'title' => "Daftar Permohonan Disperindag",
      'content' => 'disperindag/DaftarReqDisperindagPage',
      "contentData" => []
		);
    $this->load->view('Page', $pageData);
  }
  
  public function panduan(){
    $this->SecurityModel->roleOnlyGuard('disperindag');
		$pageData = array(
			'title' => 'Panduan',
      'content' => 'disperindag/PanduanPage',
		);
    $this->load->view('Page', $pageData);
  }
}
