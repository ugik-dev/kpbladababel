<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DokumenPerusahaanController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array("DokumenPerusahaanModel"));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = TRUE;
  }

  public function getAll(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->DokumenPerusahaanModel->getAll($this->input->get());
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function add(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['dokumen_perusahaan'] = FileIO::genericUpload('dokumen_perusahaan', 'pdf', NULL, $data);
      $data['id_dokumen_perusahaan'] = $this->DokumenPerusahaanModel->add($data);
      $data = $this->DokumenPerusahaanModel->get($data['id_dokumen_perusahaan']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function delete(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $this->DokumenPerusahaanModel->delete($this->input->post());
			echo json_encode([]);
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
}