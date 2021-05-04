<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PublicController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("ProductModel", 'NewsModel', 'HargaMWPModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
        $this->db->db_debug = TRUE;
    }

    public function index()
    {
        $dataContent['pricing'] = $this->HargaMWPModel->getLatestPrice(array('limit' => '10'));

        // var_dump($pricing);
        // die();
        $this->load->view('PublicPage', [
            'title' => "Home",
            'content' => 'publicv2/LandingPage',
            'dataContent' => $dataContent
        ]);
    }

    public function products()
    {
        $this->load->view('PublicPage', [
            'title' => "Home",
            'content' => 'public/ProductPage',
        ]);
    }

    public function product()
    {
        $input = $this->input->get();
        $data = $this->ProductModel->get($input['id_product']);
        $this->load->view('PublicPage', [
            'title' => "Product {$data['nama_product']}",
            'content' => 'public/DetailProductPage',
            "contentData" => ['id_product' => $input['id_product']]
        ]);
    }

    public function news()
    {
        $this->load->view('PublicPage', [
            'title' => "Home",
            'content' => 'public/NewsPage',
        ]);
    }

    public function newsx()
    {
        $input = $this->input->get();

        $data = $this->NewsModel->get($input['id_news']);
        $this->load->view('PublicPage', [
            'title' => "{$data['berita_judul']}",
            'content' => 'publicv2/SingleBlog',
            "contentData" => $data
        ]);
    }
}
