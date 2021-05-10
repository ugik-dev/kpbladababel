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
        $dataContent['pricing_last'] =
            $dataContent['pricing'][0];

        // echo json_encode($dataContent);
        // die();
        $this->load->view('PublicPage', [
            'title' => "Home",
            'content' => 'publicv2/LandingPage',
            'dataContent' => $dataContent
        ]);
    }


    public function about()
    {
        // $dataContent['pricing'] = $this->HargaMWPModel->getLatestPrice(array('limit' => '10'));

        // var_dump($pricing);
        // die();
        $this->load->view('PublicPage', [
            'title' => "About",
            'page' => 'about',
            'content' => 'publicv2/page/layout',
            // 'dataContent' => $dataContent
        ]);
    }

    public function services()
    {
        $this->load->view('PublicPage', [
            'title' => "Pelayanan",
            'page' => 'pelayanan',
            'content' => 'publicv2/page/layout',
        ]);
    }

    public function terms()
    {
        $this->load->view('PublicPage', [
            'title' => "Syarat-Syarat",
            'page' => 'terms',
            'content' => 'publicv2/page/layout',
        ]);
    }

    public function procedur()
    {
        $this->load->view('PublicPage', [
            'title' => "Prosedur",
            'page' => 'procedur',
            'content' => 'publicv2/page/layout',
        ]);
    }

    public function visi_misi()
    {
        $this->load->view('PublicPage', [
            'title' => "Visi & Misi",
            'page' => 'visi_misi',
            'content' => 'publicv2/page/layout',
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
