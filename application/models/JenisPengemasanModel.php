<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisPengemasanModel extends CI_Model {

  public function getAll($filter = []){
    $this->db->select('eks.*');
    $this->db->from("jenis_pengemasan as eks");
    if(!empty($filter['id_jenis_pengemasan'])) $this->db->where('eks.id_jenis_pengemasan', $filter['id_jenis_pengemasan']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_jenis_pengemasan');
  }
  
	public function get($id = NULL){
    $row = $this->getAll(['id_jenis_pengemasan' => $id]);
		if (empty($row)){
			throw new UserException("Jenis Pengemasan yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$id];
  }
  
	public function add($data){
    $this->db->insert('jenis_pengemasan', DataStructure::slice($data, ['nama_jenis_pengemasan', 'kapasitas']));
		ExceptionHandler::handleDBError($this->db->error(), "Tambah Jenis Pengemasan gagal", "jenis_pengemasan");
		
		return $this->db->insert_id();
  }
  
	public function edit($data){
    $this->db->where('id_jenis_pengemasan', $data['id_jenis_pengemasan']);
    $this->db->update('jenis_pengemasan', DataStructure::slice($data, ['nama_jenis_pengemasan', 'kapasitas'], TRUE));
		ExceptionHandler::handleDBError($this->db->error(), "Edit Jenis Pengemasan gagal", "jenis_pengemasan");
		
		return $data['id_jenis_pengemasan'];
  }
  
	public function delete($data){
		$this->db->where('id_jenis_pengemasan', $data['id_jenis_pengemasan']);
		$this->db->delete('jenis_pengemasan');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Jenis Pengemasan", "jenis_pengemasan");
  }
}
