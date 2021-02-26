<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {

  public function getAll($filter = []){
    $this->db->select("pro.*, ekr.nama_perusahaan, COALESCE(pro.cover_product, 'thumbnail-600x400.jpg') as cover_product");
    $nama_role = !empty($this->session->userdata()['nama_role']) ? $this->session->userdata()['nama_role'] : NULL;
    $id_perusahaan = !empty($this->session->userdata()['id_perusahaan']) ? $this->session->userdata()['id_perusahaan'] : NULL;
    $this->db->select("@perusahaan := '{$id_perusahaan}' = pro.id_perusahaan", FALSE);
    $this->db->select("IF(!@perusahaan, 'Bukan Perusahaan', NULL ) as edit_perusahaan_pr");
    $this->db->from("product as pro");
    $this->db->join("perusahaan as ekr", "ekr.id_perusahaan = pro.id_perusahaan");
    if(!empty($filter['id_perusahaan'])) $this->db->where('pro.id_perusahaan', $filter['id_perusahaan']);
    if(!empty($filter['id_product'])) $this->db->where('pro.id_product', $filter['id_product']);
    if(!empty($filter['featured'])){
      $this->db->limit(4);
    }
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_product');
  }
  
	public function get($id = NULL){
    $row = $this->getAll(['id_product' => $id]);
		if (empty($row)){
			throw new UserException("Product yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$id];
  }
  
	public function add($data){
    $this->db->insert('product', DataStructure::slice($data, ['id_perusahaan']));
		ExceptionHandler::handleDBError($this->db->error(), "Tambah Product gagal", "product");
		
		return $this->db->insert_id();
  }
  
	public function edit($data){
    $this->db->where('id_product', $data['id_product']);
    $this->db->set('cover_product', !empty($data['cover_product']) ? $data['cover_product'] : NULL);
    $this->db->set('attachment_product', !empty($data['attachment_product']) ? $data['attachment_product'] : NULL);
    $this->db->update('product', DataStructure::slice($data, ['nama_product', 'deskripsi_product'], TRUE));
		ExceptionHandler::handleDBError($this->db->error(), "Edit Product gagal", "product");
		
		return $data['id_product'];
  }
  
	public function delete($data){
		$this->db->where('id_product', $data['id_product']);
		$this->db->delete('product');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Product", "Product");
  }
}
