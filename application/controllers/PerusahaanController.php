<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PerusahaanController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('PerusahaanModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }

  public function index()
  {
    $this->SecurityModel->roleOnlyGuard('perusahaan');
    $pageData = array(
      'title' => 'Beranda',
      'content' => 'perusahaan/DashboardPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function detail()
  {
    $this->SecurityModel->userOnlyGuard();
    $input = $this->input->get();
    $data = $this->PerusahaanModel->get($input['id_perusahaan']);
    $pageData = array(
      'title' => "{$data['nama_perusahaan']}",
      'content' => 'DetailPerusahaanPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      "contentData" => ['id_perusahaan' => $input['id_perusahaan']]
    );
    $this->load->view('Page', $pageData);
  }

  public function info_fragment()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $pageData = array(
        "contentData" => ['id_perusahaan' => $this->input->get()['id_perusahaan']]
      );
      $this->load->view('detail_perusahaan_fragment/InfoFragment', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
  public function addPengiriman()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_pengiriman'] = $this->PerusahaanModel->addPengiriman($data);
      // echo $data['id_pengiriman'];
      $data = $this->PerusahaanModel->getPengiriman($data['id_pengiriman']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function reqeust_verifikasi()
  {
    try {
      $data = $this->input->post();
      $this->PerusahaanModel->reqeust_verifikasi($data);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAllPengiriman()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PerusahaanModel->getAllPengiriman($this->input->get());
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getPengiriman()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PerusahaanModel->getPengiriman($this->input->get()['id_pengiriman']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function dokumen_perusahaan_fragment()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $pageData = array(
        "contentData" => ['id_perusahaan' => $this->input->get()['id_perusahaan']]
      );
      $this->load->view('detail_perusahaan_fragment/DokumenPerusahaanFragment', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function product_fragment()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $pageData = array(
        "contentData" => ['id_perusahaan' => $this->input->get()['id_perusahaan']]
      );
      $this->load->view('detail_perusahaan_fragment/ProductFragment', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function pengiriman_fragment()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $pageData = array(
        "contentData" => ['id_perusahaan' => $this->input->get()['id_perusahaan']]
      );
      $this->load->view('detail_perusahaan_fragment/PengirimanFragment', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAll()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PerusahaanModel->getAll($this->input->get());
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function get()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PerusahaanModel->get($this->input->get()['id_perusahaan']);
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
      $id = $this->PerusahaanModel->update($data);
      $this->PerusahaanModel->updateModifedDate($id);
      $data = $this->PerusahaanModel->get($id);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function panduan()
  {
    $this->SecurityModel->roleOnlyGuard('perusahaan');
    $pageData = array(
      'title' => 'Panduan',
      'content' => 'perusahaan/PanduanPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }
}
