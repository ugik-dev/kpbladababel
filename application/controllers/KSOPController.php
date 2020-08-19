<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KSOPController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('KSOPModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }
  
  public function index(){
    $this->SecurityModel->roleOnlyGuard('ksop');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'ksop/DashboardPage',
		);
    $this->load->view('Page', $pageData);
  }
  
  public function daftar_req_ksop(){
    $this->SecurityModel->userOnlyGuard();
		$pageData = array(
			'title' => "Daftar Permohonan KSOP",
      'content' => 'ksop/DaftarReqKSOPPage',
      "contentData" => []
		);
    $this->load->view('Page', $pageData);
  }
  
  public function panduan(){
    $this->SecurityModel->roleOnlyGuard('ksop');
		$pageData = array(
			'title' => 'Panduan',
      'content' => 'ksop/PanduanPage',
		);
    $this->load->view('Page', $pageData);
  }
}
