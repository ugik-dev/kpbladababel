<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisMutuModel extends CI_Model {

  public function getAll($filter = []){
    $this->db->select('eks.*');
    $this->db->from("jenis_mutu as eks");
    if(!empty($filter['id_jenis_mutu'])) $this->db->where('eks.id_jenis_mutu', $filter['id_jenis_mutu']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_jenis_mutu');
  }
  
	public function get($id = NULL){
    $row = $this->getAll(['id_jenis_mutu' => $id]);
		if (empty($row)){
			throw new UserException("Jenis Mutu yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$id];
  }
  
	public function add($data){
    $this->db->insert('jenis_mutu', DataStructure::slice($data, ['nama_jenis_mutu', 'kapasitas']));
		ExceptionHandler::handleDBError($this->db->error(), "Tambah Jenis Mutu gagal", "jenis_mutu");
		
		return $this->db->insert_id();
  }
  
	public function edit($data){
    $this->db->where('id_jenis_mutu', $data['id_jenis_mutu']);
    $this->db->update('jenis_mutu', DataStructure::slice($data, ['nama_jenis_mutu', 'kapasitas'], TRUE));
		ExceptionHandler::handleDBError($this->db->error(), "Edit Jenis Mutu gagal", "jenis_mutu");
		
		return $data['id_jenis_mutu'];
  }
  
	public function delete($data){
		$this->db->where('id_jenis_mutu', $data['id_jenis_mutu']);
		$this->db->delete('jenis_mutu');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Jenis Mutu", "jenis_mutu");
  }
}
