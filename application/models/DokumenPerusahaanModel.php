<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DokumenPerusahaanModel extends CI_Model {

  public function getAll($filter = []){
    $this->db->select("dp.*, jdp.nama_jenis_dokumen_perusahaan");
    $this->db->from("dokumen_perusahaan as dp");
    $this->db->join("jenis_dokumen_perusahaan as jdp", "jdp.id_jenis_dokumen_perusahaan = dp.id_jenis_dokumen_perusahaan");
    if(!empty($this->session->userdata()['id_perusahaan'])) $this->db->where("dp.id_perusahaan", $this->session->userdata()['id_perusahaan']);
   
    if(!empty($filter['id_perusahaan'])) $this->db->where('dp.id_perusahaan', $filter['id_perusahaan']);
    if(!empty($filter['id_jenis_dokumen_perusahaan'])) $this->db->where('dp.id_jenis_dokumen_perusahaan', $filter['id_jenis_dokumen_perusahaan']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_dokumen_perusahaan');
  }
  
	public function get($id = NULL){
    $row = $this->getAll(['id_dokumen_perusahaan' => $id]);
		if (empty($row)){
			throw new UserException("Dokumen Perusahaan yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$id];
  }
  
	public function add($data){
    $this->db->insert('dokumen_perusahaan', DataStructure::slice($data, ['id_jenis_dokumen_perusahaan', 'id_perusahaan', 'no_dokumen_perusahaan', 'dokumen_perusahaan']));
		ExceptionHandler::handleDBError($this->db->error(), "Tambah Dokumen Perusahaan gagal", "dokumen_perusahaan");
		
		return $this->db->insert_id();
  }
  
	public function delete($data){
		$this->db->where('id_dokumen_perusahaan', $data['id_dokumen_perusahaan']);
		$this->db->delete('dokumen_perusahaan');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Dokumen Perusahaan", "DokumenPerusahaan");
  }
}
