<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PortOfOriginModel extends CI_Model {

  public function getAll($filter = []){
    $this->db->select('eks.*');
    $this->db->from("port_of_origin as eks");
    if(!empty($filter['id_port_of_origin'])) $this->db->where('eks.id_port_of_origin', $filter['id_port_of_origin']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_port_of_origin');
  }
  
	public function get($id = NULL){
    $row = $this->getAll(['id_port_of_origin' => $id]);
		if (empty($row)){
			throw new UserException("Port of Origin yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$id];
  }
  
	public function add($data){
    $this->db->insert('port_of_origin', DataStructure::slice($data, ['nama_port_of_origin', 'kapasitas']));
		ExceptionHandler::handleDBError($this->db->error(), "Tambah Port of Origin gagal", "port_of_origin");
		
		return $this->db->insert_id();
  }
  
	public function edit($data){
    $this->db->where('id_port_of_origin', $data['id_port_of_origin']);
    $this->db->update('port_of_origin', DataStructure::slice($data, ['nama_port_of_origin', 'kapasitas'], TRUE));
		ExceptionHandler::handleDBError($this->db->error(), "Edit Port of Origin gagal", "port_of_origin");
		
		return $data['id_port_of_origin'];
  }
  
	public function delete($data){
		$this->db->where('id_port_of_origin', $data['id_port_of_origin']);
		$this->db->delete('port_of_origin');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Port of Origin", "port_of_origin");
  }
}
