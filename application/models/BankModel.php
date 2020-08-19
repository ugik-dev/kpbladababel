<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BankModel extends CI_Model {

  public function getAll($filter = []){
    $this->db->select('eks.*');
    $this->db->from("kode_bank as eks");
    $this->db->Order_by('id_bank','ASC');
    if(!empty($filter['id_bank'])) $this->db->where('eks.id_bank', $filter['id_bank']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_bank');
  }
  
	public function get($id = NULL){
    $row = $this->getAll(['id_bank' => $id]);
		if (empty($row)){
			throw new UserException("Jenis Mutu yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$id];
  }
  
	public function add($data){
    $this->db->insert('kode_bank', DataStructure::slice($data, ['nama_bank']));
		ExceptionHandler::handleDBError($this->db->error(), "Tambah Bank gagal", "kode_bank");
		
		return $this->db->insert_id();
  }
  
	public function edit($data){
    $this->db->where('id_bank', $data['id_bank']);
    $this->db->update('kode_bank', DataStructure::slice($data, ['nama_bank'], TRUE));
		ExceptionHandler::handleDBError($this->db->error(), "Edit Bank gagal", "kode_bank");
		
		return $data['id_bank'];
  }
  
	public function delete($data){
		$this->db->where('id_bank', $data['id_bank']);
		$this->db->delete('kode_bank');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Bank gagal", "kode_bank");
  }
}
