<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HargaMWPController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array("HargaMWPModel"));
    $this->load->helper(array('DataStructure', 'Validation'));
    // $this->db->db_debug = TRUE;
  }

  public function getAll(){
    try{
      $data = $this->HargaMWPModel->getAll($this->input->get());
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function getLatest(){
    try{
      $data = $this->HargaMWPModel->getLatest();
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function getStandarMutu(){
    try{
      $data = $this->HargaMWPModel->getStandarMutu();
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function add(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_harga_mwp'] = $this->HargaMWPModel->add($data);
      $data = $this->HargaMWPModel->get($data['id_harga_mwp']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function edit(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_harga_mwp'] = $this->HargaMWPModel->edit($data);
      $data = $this->HargaMWPModel->get($data['id_harga_mwp']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  
  public function edit_standar_mutu(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data = $this->HargaMWPModel->edit_standar_mutu($data);
      // $data = $this->HargaMWPModel->get($data['id_mutu']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }


  public function delete(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $this->HargaMWPModel->delete($this->input->post());
			echo json_encode([]);
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
}