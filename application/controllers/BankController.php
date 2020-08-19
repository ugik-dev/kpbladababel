<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BankController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array("BankModel"));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = TRUE;
  }
  
  public function getAll(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->BankModel->getAll($this->input->get());
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function get(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->BankModel->get($this->input->get()['id_bank']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function add(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_bank'] = $this->BankModel->add($data);
      $data = $this->BankModel->get($data['id_bank']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function edit(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_bank'] = $this->BankModel->edit($data);
      $data = $this->BankModel->get($data['id_bank']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function delete(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $this->BankModel->delete($this->input->post());
			echo json_encode([]);
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
}