<?php
class NewsModel extends CI_Model{
 
    function simpan_berita($jdl,$berita,$gambar){
        $hsl=$this->db->query("INSERT INTO tbl_berita (berita_judul,berita_isi,berita_image) VALUES ('$jdl','$berita','$gambar')");
        return $hsl;
    }
 
    function get_berita_by_kode($filter){
        // $hsl=$this->db->query("SELECT * FROM tbl_berita WHERE berita_id='$kode'");
        $this->db->select('*');
        $this->db->from("tbl_berita");
        $this->db->order_by('berita_id','desc');
        if(!empty($filter)) $this->db->where('berita_id', $filter);
        $res = $this->db->get();
       
        return DataStructure::keyValue($res->result_array(), 'berita_id');
    }
 
    function get_all_berita(){
        $hsl=$this->db->query("SELECT * FROM tbl_berita ORDER BY berita_id DESC");
        return $hsl;
    }


  public function getAll($filter = []){
    $this->db->select('*');
    $this->db->from("tbl_berita");
    $this->db->order_by('berita_id','desc');
    if(!empty($filter['berita_id'])) $this->db->where('berita_id', $filter['berita_id']);
    $res = $this->db->get();
   return $res->result_array();
    // return DataStructure::keyValue($res->result_array(), 'berita_id');
    }
  
	public function get($id = NULL){
    $row = $this->getAll(['berita_id' => $id]);
		if (empty($row)){
			throw new UserException("Berita yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[0];
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
		$this->db->where('berita_id', $data['berita_id']);
		$this->db->delete('tbl_berita');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus News Post", "News");
  }
}

