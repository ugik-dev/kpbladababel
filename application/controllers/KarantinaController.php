<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KarantinaController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('KarantinaModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }
  
  public function index(){
    $this->SecurityModel->roleOnlyGuard('karantina');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'karantina/DashboardPage',
		);
    $this->load->view('Page', $pageData);
  }
  
  public function daftar_req_karantina(){
    $this->SecurityModel->userOnlyGuard();
		$pageData = array(
			'title' => "Daftar Permohonan Karantina",
      'content' => 'karantina/DaftarReqKarantinaPage',
      "contentData" => []
		);
    $this->load->view('Page', $pageData);
  }
  
  public function panduan(){
    $this->SecurityModel->roleOnlyGuard('karantina');
		$pageData = array(
			'title' => 'Panduan',
      'content' => 'karantina/PanduanPage',
		);
    $this->load->view('Page', $pageData);
  }
}
