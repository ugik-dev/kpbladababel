<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PortOfOriginController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array("PortOfOriginModel"));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = TRUE;
  }
  
  public function getAll(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PortOfOriginModel->getAll($this->input->get());
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function get(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PortOfOriginModel->get($this->input->get()['id_port_of_origin']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function add(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_port_of_origin'] = $this->PortOfOriginModel->add($data);
      $data = $this->PortOfOriginModel->get($data['id_port_of_origin']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function edit(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_port_of_origin'] = $this->PortOfOriginModel->edit($data);
      $data = $this->PortOfOriginModel->get($data['id_port_of_origin']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function delete(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $this->PortOfOriginModel->delete($this->input->post());
			echo json_encode([]);
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
}