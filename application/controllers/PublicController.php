<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublicController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array("ProductModel",'NewsModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = TRUE;
  }
  
  public function index(){
    $this->load->view('PublicPage', [
			'title' => "Home",
      'content' => 'public/LandingPage',
    ]);
  }

  public function products(){
    $this->load->view('PublicPage', [
			'title' => "Home",
      'content' => 'public/ProductPage',
    ]);
  }

  public function product(){
    $input = $this->input->get();
    $data = $this->ProductModel->get($input['id_product']);
    $this->load->view('PublicPage', [
      'title' => "Product {$data['nama_product']}",
      'content' => 'public/DetailProductPage',
      "contentData" => ['id_product' => $input['id_product']]
    ]);
  }

  public function news(){
    $this->load->view('PublicPage', [
			'title' => "Home",
      'content' => 'public/NewsPage',
    ]);
  }

  public function newsx(){
    $input = $this->input->get();
    
    $data = $this->NewsModel->get($input['id_news']);
    $this->load->view('PublicPage', [
      'title' => "News {$data['berita_judul']}",
      'content' => 'public/DetailNewsPage',
      "contentData" => ['id_berita' => $input['id_news']]
    ]);
  }
}