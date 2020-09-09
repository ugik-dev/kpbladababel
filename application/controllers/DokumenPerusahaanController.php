<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DokumenPerusahaanController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array("DokumenPerusahaanModel", "PerusahaanModel"));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = FALSE;
  }

  public function getAll()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DokumenPerusahaanModel->getAll($this->input->get());
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function add()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      if ($data['allow_type'] == 'img') {
        $data['dokumen_perusahaan'] = FileIO::genericUpload('dokumen_perusahaan', array('png', 'jpeg', 'jpg'), NULL, $data);
      } else {
        $data['dokumen_perusahaan'] = FileIO::genericUpload('dokumen_perusahaan', 'pdf', NULL, $data);
      }
      if ($data['case'] == 'add') {
        $this->DokumenPerusahaanModel->add($data);
      } else if ($data['case'] == 'change') {
        $this->DokumenPerusahaanModel->edit($data);
      }
      $this->PerusahaanModel->updateModifedDate($data['id_perusahaan']);
      $data = $this->DokumenPerusahaanModel->getAll(array('id_perusahaan' => $data['id_perusahaan']));

      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function delete()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $this->DokumenPerusahaanModel->delete($this->input->post());
      echo json_encode([]);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
}
