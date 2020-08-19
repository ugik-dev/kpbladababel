<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengirimanItemController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array("PengirimanItemModel"));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = TRUE;
  }
  
  public function getAll(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PengirimanItemModel->getAll($this->input->get());
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function get(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PengirimanItemModel->get($this->input->get()['id_pengiriman_item']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function add(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_pengiriman_item'] = $this->PengirimanItemModel->add($data);
      $data = $this->PengirimanItemModel->get($data['id_pengiriman_item']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function edit(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_pengiriman_item'] = $this->PengirimanItemModel->edit($data);
      $data = $this->PengirimanItemModel->get($data['id_pengiriman_item']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function delete(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $this->PengirimanItemModel->delete($this->input->post());
			echo json_encode([]);
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
}