<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisMutuController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array("JenisMutuModel"));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = TRUE;
  }
  
  public function getAll(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->JenisMutuModel->getAll($this->input->get());
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function get(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->JenisMutuModel->get($this->input->get()['id_jenis_mutu']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function add(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_jenis_mutu'] = $this->JenisMutuModel->add($data);
      $data = $this->JenisMutuModel->get($data['id_jenis_mutu']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function edit(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_jenis_mutu'] = $this->JenisMutuModel->edit($data);
      $data = $this->JenisMutuModel->get($data['id_jenis_mutu']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function delete(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $this->JenisMutuModel->delete($this->input->post());
			echo json_encode([]);
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
}