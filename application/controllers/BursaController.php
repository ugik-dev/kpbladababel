<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BursaController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('BursaModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }
  
  public function index(){
    $this->SecurityModel->roleOnlyGuard('bursa');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'bursa/DashboardPage',
		);
    $this->load->view('Page', $pageData);
  }
  
  public function daftar_perusahaan(){
    $this->SecurityModel->userOnlyGuard();
		$pageData = array(
			'title' => "Daftar Perusahaan",
      'content' => 'bursa/DaftarPerusahaanPage',
      "contentData" => []
		);
    $this->load->view('Page', $pageData);
  }
  
  public function panduan(){
    $this->SecurityModel->roleOnlyGuard('bursa');
		$pageData = array(
			'title' => 'Panduan',
      'content' => 'bursa/PanduanPage',
		);
    $this->load->view('Page', $pageData);
  }
}
