<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('NewsModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }
  
  public function index(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'admin/DashboardPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }
  
  public function kelola_user(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Kelola User',
      'content' => 'admin/KelolaUserPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }

  public function kelola_harga_mwp(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Kelola Harga Muntok White Pepper',
      'content' => 'admin/KelolaHargaMWP',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }

  public function kelola_standar_mutu(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Kelola Standar Mutu',
      'content' => 'admin/KelolaStandarMutu',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }

  public function kelola_email(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Kelola Email',
      'content' => 'admin/KelolaEmail',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }

  public function news_post(){
    $this->SecurityModel->roleOnlyGuard('admin');

    $kode=$this->uri->segment(3);
    $x['data']=$this->NewsModel->get_berita_by_kode($kode);
    $pageData = array(
			'title' => 'News Post',
      'content' => 'admin/NewsPost',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $pageData['data']=$x;
    $this->load->view('Page', $pageData);
  }
  
  public function new_news_post(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'News Post',
      'content' => 'admin/NewNewsPost',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }

  public function panduan(){
    $this->SecurityModel->roleOnlyGuard('admin');
		$pageData = array(
			'title' => 'Beranda',
      'content' => 'admin/PanduanPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
		);
    $this->load->view('Page', $pageData);
  }
}
