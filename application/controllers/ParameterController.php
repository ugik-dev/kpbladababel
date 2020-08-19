<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParameterController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array('ParameterModel'));
		$this->load->helper(array('DataStructure', 'Validation'));
  }

	public function getAllRole(){
		try{
			$this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->ParameterModel->getAllRole($this->input->get());
			echo json_encode(array("data" => $data));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}
	
	public function getAllNegara(){
		try{
			$this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->ParameterModel->getAllNegara($this->input->get());
			echo json_encode(array("data" => $data));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function getAllJenisDokumenPerusahaan(){
		try{
			$this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->ParameterModel->getAllJenisDokumenPerusahaan($this->input->get());
			echo json_encode(array("data" => $data));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}
	
	public function getAllJenisPerusahaan(){
		try{
			$this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->ParameterModel->getAllJenisPerusahaan($this->input->get());
			echo json_encode(array("data" => $data));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}
}
