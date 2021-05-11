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
        $input['id_news'] = '-5';
        $data = $this->NewsModel->get($input['id_news']);
        $this->NewsModel->post_show($input['id_news'], $data['total_show'] + 1);
        $data['comentar'] = $this->NewsModel->getComentar(array('berita_id' => $input['id_news']));
        $expiration = time() - 7200; // Two hour limit
        $this->db->where('captcha_time < ', $expiration)
            ->delete('captcha');

        $this->load->helper('captcha');
        $this->load->helper('string');
        $vals = array(
            'word'          => random_string('alpha', 8),
            'img_path'      => APPPATH . '../assets/captcha/',
            'img_url'       => base_url('assets/captcha/'),
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '150',
            'img_height'    => 40,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size'     => 20,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        // store image html code in a variable
        $cap = create_captcha($vals);

        $data_captca = array(
            'captcha_time'  => $cap['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $cap['word']
        );

        $query = $this->db->insert_string('captcha', $data_captca);
        $this->db->query($query);

        $this->session->set_userdata('mycaptcha', $cap['word']);
        $data['captcha'] = $cap['image'];

        $this->load->view('PublicPage', [
            'title' => "{$data['berita_judul']}",
            'content' =>
            'publicv2/SingleBlog',
            'contentData' => $data
        ]);
    }

    public function services()
    {
        $input['id_news'] = '-2';
        $data = $this->NewsModel->get($input['id_news']);
        $this->NewsModel->post_show($input['id_news'], $data['total_show'] + 1);
        $data['comentar'] = $this->NewsModel->getComentar(array('berita_id' => $input['id_news']));
        $expiration = time() - 7200; // Two hour limit
        $this->db->where('captcha_time < ', $expiration)
            ->delete('captcha');

        $this->load->helper('captcha');
        $this->load->helper('string');
        $vals = array(
            'word'          => random_string('alpha', 8),
            'img_path'      => APPPATH . '../assets/captcha/',
            'img_url'       => base_url('assets/captcha/'),
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '150',
            'img_height'    => 40,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size'     => 20,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        // store image html code in a variable
        $cap = create_captcha($vals);

        $data_captca = array(
            'captcha_time'  => $cap['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $cap['word']
        );

        $query = $this->db->insert_string('captcha', $data_captca);
        $this->db->query($query);

        $this->session->set_userdata('mycaptcha', $cap['word']);
        $data['captcha'] = $cap['image'];

        $this->load->view('PublicPage', [
            'title' => "{$data['berita_judul']}",
            'content' =>
            'publicv2/SingleBlog',
            'contentData' => $data
        ]);
    }

    public function terms()
    {
        $input['id_news'] = '-4';
        $data = $this->NewsModel->get($input['id_news']);
        $this->NewsModel->post_show($input['id_news'], $data['total_show'] + 1);
        $data['comentar'] = $this->NewsModel->getComentar(array('berita_id' => $input['id_news']));
        $expiration = time() - 7200; // Two hour limit
        $this->db->where('captcha_time < ', $expiration)
            ->delete('captcha');

        $this->load->helper('captcha');
        $this->load->helper('string');
        $vals = array(
            'word'          => random_string('alpha', 8),
            'img_path'      => APPPATH . '../assets/captcha/',
            'img_url'       => base_url('assets/captcha/'),
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '150',
            'img_height'    => 40,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size'     => 20,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        // store image html code in a variable
        $cap = create_captcha($vals);

        $data_captca = array(
            'captcha_time'  => $cap['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $cap['word']
        );

        $query = $this->db->insert_string('captcha', $data_captca);
        $this->db->query($query);

        $this->session->set_userdata('mycaptcha', $cap['word']);
        $data['captcha'] = $cap['image'];

        $this->load->view('PublicPage', [
            'title' => "{$data['berita_judul']}",
            'content' =>
            'publicv2/SingleBlog',
            'contentData' => $data
        ]);
    }

    public function other_news()
    {
        $filter = $this->input->get();
        if (empty($filter['page'])) $filter['page'] = 1;
        $dataContent['collect'] = $this->NewsModel->getAllPagger($filter);
        $dataContent['count_pagger'] = $this->NewsModel->count_pagger($filter)[0]['count'];
        $dataContent['select_pager'] = $filter['page'];
        // echo json_encode($dataContent);

        $title = "Berita";
        $this->load->view('PublicPage', [
            'title' => $title,
            'dataContent' => $dataContent,
            'page' => 'other_news',
            'content' => 'publicv2/page/other_news',
        ]);
    }

    public function search()
    {
        $filter = $this->input->get();
        if (empty($filter['page'])) $filter['page'] = 1;
        $dataContent['collect'] = $this->NewsModel->getAllPagger($filter);
        $dataContent['count_pagger'] = $this->NewsModel->count_pagger($filter)[0]['count'];
        $dataContent['select_pager'] = $filter['page'];
        $dataContent['key'] = $filter['key'];
        // echo json_encode($dataContent);

        $title = "Berita";
        $this->load->view('PublicPage', [
            'title' => $title,
            'dataContent' => $dataContent,
            'page' => 'other_news',
            'content' => 'publicv2/page/other_news',
        ]);
    }


    public function procedur()
    {
        $input['id_news'] = '-3';
        $data = $this->NewsModel->get($input['id_news']);
        $this->NewsModel->post_show($input['id_news'], $data['total_show'] + 1);
        $data['comentar'] = $this->NewsModel->getComentar(array('berita_id' => $input['id_news']));
        $expiration = time() - 7200; // Two hour limit
        $this->db->where('captcha_time < ', $expiration)
            ->delete('captcha');

        $this->load->helper('captcha');
        $this->load->helper('string');
        $vals = array(
            'word'          => random_string('alpha', 8),
            'img_path'      => APPPATH . '../assets/captcha/',
            'img_url'       => base_url('assets/captcha/'),
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '150',
            'img_height'    => 40,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size'     => 20,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        // store image html code in a variable
        $cap = create_captcha($vals);

        $data_captca = array(
            'captcha_time'  => $cap['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $cap['word']
        );

        $query = $this->db->insert_string('captcha', $data_captca);
        $this->db->query($query);

        $this->session->set_userdata('mycaptcha', $cap['word']);
        $data['captcha'] = $cap['image'];

        $this->load->view('PublicPage', [
            'title' => "{$data['berita_judul']}",
            'content' =>
            'publicv2/SingleBlog',
            'contentData' => $data
        ]);
    }

    public function visi_misi()
    {
        $input['id_news'] = '-1';
        $data = $this->NewsModel->get($input['id_news']);
        $this->NewsModel->post_show($input['id_news'], $data['total_show'] + 1);
        $data['comentar'] = $this->NewsModel->getComentar(array('berita_id' => $input['id_news']));
        $expiration = time() - 7200; // Two hour limit
        $this->db->where('captcha_time < ', $expiration)
            ->delete('captcha');

        $this->load->helper('captcha');
        $this->load->helper('string');
        $vals = array(
            'word'          => random_string('alpha', 8),
            'img_path'      => APPPATH . '../assets/captcha/',
            'img_url'       => base_url('assets/captcha/'),
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '150',
            'img_height'    => 40,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size'     => 20,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        // store image html code in a variable
        $cap = create_captcha($vals);

        $data_captca = array(
            'captcha_time'  => $cap['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $cap['word']
        );

        $query = $this->db->insert_string('captcha', $data_captca);
        $this->db->query($query);

        $this->session->set_userdata('mycaptcha', $cap['word']);
        $data['captcha'] = $cap['image'];

        $this->load->view('PublicPage', [
            'title' => "Visi & Misi",
            'page' => 'visi_misi',
            'content' =>
            'publicv2/SingleBlog',
            'contentData' => $data
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

    public function newsx($data_return = NULL)
    {
        if ($data_return != NULL) {
            $input = $data_return['id_news'];
        } else {
            $input = $this->input->get();
        }
        $data = $this->NewsModel->get($input['id_news']);
        $this->NewsModel->post_show($input['id_news'], $data['total_show'] + 1);
        $data['comentar'] = $this->NewsModel->getComentar(array('berita_id' => $input['id_news']));
        $expiration = time() - 7200; // Two hour limit
        $this->db->where('captcha_time < ', $expiration)
            ->delete('captcha');

        $this->load->helper('captcha');
        $this->load->helper('string');
        $vals = array(
            'word'          => random_string('alpha', 8),
            'img_path'      => APPPATH . '../assets/captcha/',
            'img_url'       => base_url('assets/captcha/'),
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '150',
            'img_height'    => 40,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size'     => 20,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        // store image html code in a variable
        $cap = create_captcha($vals);

        $data_captca = array(
            'captcha_time'  => $cap['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $cap['word']
        );

        $query = $this->db->insert_string('captcha', $data_captca);
        $this->db->query($query);

        $this->session->set_userdata('mycaptcha', $cap['word']);
        $data['captcha'] = $cap['image'];
        $this->load->view('PublicPage', [
            'title' => "{$data['berita_judul']}",
            'content' => 'publicv2/SingleBlog',
            "contentData" => $data
        ]);
    }

    public function comentar()
    {
        $input = $this->input->post();
        $expiration = time() - 7200; // Two hour limit
        $this->db->where('captcha_time < ', $expiration)
            ->delete('captcha');

        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($input['captcha'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count == 0) {
            $this->session->set_flashdata('msg', 'Captcha Salah !!');
            $this->session->set_flashdata('name', $input['name']);
            $this->session->set_flashdata('email', $input['email']);
            $this->session->set_flashdata('komentar', $input['komentar']);
            redirect(base_url('index.php/newsx?id_news=') . $input['id_news']);
            return;
        }
        $input['ip_address'] = $this->input->ip_address();
        $this->NewsModel->post_comentar($input);
        redirect(base_url('index.php/newsx?id_news=') . $input['id_news']);
    }
}
