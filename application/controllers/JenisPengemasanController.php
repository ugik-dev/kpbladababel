<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisPengemasanController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array("JenisPengemasanModel"));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = TRUE;
  }
  
  public function getAll(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->JenisPengemasanModel->getAll($this->input->get());
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function get(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->JenisPengemasanModel->get($this->input->get()['id_jenis_pengemasan']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function add(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_jenis_pengemasan'] = $this->JenisPengemasanModel->add($data);
      $data = $this->JenisPengemasanModel->get($data['id_jenis_pengemasan']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function edit(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_jenis_pengemasan'] = $this->JenisPengemasanModel->edit($data);
      $data = $this->JenisPengemasanModel->get($data['id_jenis_pengemasan']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function delete(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $this->JenisPengemasanModel->delete($this->input->post());
			echo json_encode([]);
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
}