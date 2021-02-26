<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BuyerController extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model(array('BuyerModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    }

    public function index()
    {
        // var_dump($this->session->userdata());
        $this->SecurityModel->roleOnlyGuard('buyer');
        if ($this->session->userdata()['region'] == 'D') {
            $text = 'Beranda';
            $pageBuyer = 'buyer/DashboardPage';
        } else {
            $text = 'Dashboard';
            $pageBuyer = 'buyer/DashboardPageF';
        }
        $pageData = array(
            'title' => $text,
            'content' => $pageBuyer,
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
            'id_ubuyer' => $this->session->userdata()['id_user']
        );
        $this->load->view('Page', $pageData);
    }
    public function addDokument()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->input->post();
            // var_dump($data);
            $text = 'no_' . $data['tipe'];
            $data[$data['tipe']] = FileIO::genericUpload($data['tipe'], array('png', 'pdf', 'jpeg', 'jpg'), NULL, $data);
            $data['id_dokumen_perusahaan'] = $this->BuyerModel->addDokument($data);
            // $data = $this->DokumenPerusahaanModel->getAll(array('id_perusahaan' => $data['id_perusahaan'], 'id_jenis_dokumen_perusahaan' => $data['id_jenis_dokumen_perusahaan'], 'is_get' => '1'));
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }
    public function dokumen_buyer()
    {
        $this->SecurityModel->userOnlyGuard();
        if ($this->session->userdata()['region'] == 'D') {
            $text = 'Dokument';
            $pageBuyer = 'buyer/DokumentBuyerPage';
        } else {
            $text = 'Document';
            $pageBuyer = 'buyer/DokumentBuyerPageF';
        }

        // } else {
        //     $pageBuyer = 'buyer/DokumentBuyerPageF';
        // }
        $pageData = array(
            'title' => $text,
            'content' => $pageBuyer,
            'breadcrumb' => array(
                'Home' => base_url(),
            ),

        );
        $this->load->view('Page', $pageData);
    }

    public function info_fragment()
    {
        $this->SecurityModel->userOnlyGuard();
        try {
            $pageData = array(
                "contentData" => ['id_buyer' => $this->input->get()['id_buyer']]
            );
            $this->load->view('detail_buyer_fragment/InfoFragment', $pageData);
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }
    public function addPengiriman()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->input->post();
            $data['id_pengiriman'] = $this->BuyerModel->addPengiriman($data);
            // echo $data['id_pengiriman'];
            $data = $this->BuyerModel->getPengiriman($data['id_pengiriman']);
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    public function dokumen_buyer_fragment()
    {
        $this->SecurityModel->userOnlyGuard();
        try {
            $pageData = array(
                "contentData" => ['id_buyer' => $this->input->get()['id_buyer']]
            );
            $this->load->view('detail_buyer_fragment/DokumenBuyerFragment', $pageData);
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function pengiriman_fragment()
    {
        $this->SecurityModel->userOnlyGuard();
        try {
            $pageData = array(
                "contentData" => ['id_buyer' => $this->input->get()['id_buyer']]
            );
            $this->load->view('detail_buyer_fragment/PengirimanFragment', $pageData);
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function getAll()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->BuyerModel->getAll($this->input->get());
            // var_dump($this->input->post());
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function get()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->BuyerModel->get($this->input->get()['id']);
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function update()
    {
        try {
            $this->SecurityModel->userOnlyGuard(TRUE);
            $data = $this->input->post();
            $id = $this->BuyerModel->update($data);
            $data = $this->BuyerModel->getAll(array('id' => $id));
            $data = $data[$id];
            // $this->BuyerModel->updateModifedDate($id);
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function reqeust_verifikasi()
    {
        try {
            $this->SecurityModel->rolesOnlyGuard(array('buyer'));
            $data = $this->input->post();
            $this->BuyerModel->reqeust_verifikasi($data);
            echo json_encode(array("data" => $data));
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }


    public function panduan()
    {
        $this->SecurityModel->roleOnlyGuard('buyer');
        $pageData = array(
            'title' => 'Panduan',
            'content' => 'buyer/PanduanPage',
            'breadcrumb' => array(
                'Home' => base_url(),
            ),
        );
        $this->load->view('Page', $pageData);
    }
}
