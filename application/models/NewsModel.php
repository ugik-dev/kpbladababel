<?php
class NewsModel extends CI_Model
{

  function simpan_berita($jdl, $berita, $gambar)
  {
    $hsl = $this->db->query("INSERT INTO tbl_berita (berita_judul,berita_isi,berita_image) VALUES ('$jdl','$berita','$gambar')");
    return $hsl;
  }

  function get_berita_by_kode($filter)
  {
    // $hsl=$this->db->query("SELECT * FROM tbl_berita WHERE berita_id='$kode'");
    $this->db->select('*');
    $this->db->from("tbl_berita");
    $this->db->order_by('berita_id', 'desc');
    if (!empty($filter)) $this->db->where('berita_id', $filter);
    $res = $this->db->get();

    return DataStructure::keyValue($res->result_array(), 'berita_id');
  }

  function get_all_berita()
  {
    $hsl = $this->db->query("SELECT * FROM tbl_berita ORDER BY berita_id DESC");
    return $hsl;
  }

  public function getComentar($filter = [])
  {
    $this->db->select('*');
    $this->db->from("tbl_komentar");
    $this->db->order_by('id_komentar', 'desc');
    // if ($this->session->userdata('nama_role') != 'admin') $this->db->where('show', '1');
    if (!empty($filter['berita_id'])) $this->db->where('berita_id', $filter['berita_id']);
    $res = $this->db->get();
    return $res->result_array();
  }


  public function getAll($filter = [])
  {
    if (!empty($filter['last'])) {
      $this->db->select('berita_id, berita_image, berita_judul');
      $this->db->from("tbl_berita");
      $this->db->order_by('berita_id', 'desc');
      $this->db->limit('4', 'asc');
      if (!empty($filter['berita_id'])) $this->db->where('berita_id', $filter['berita_id']);
      $res = $this->db->get();
      return $res->result_array();
    }

    $this->db->select('*');
    $this->db->from("tbl_berita");
    $this->db->order_by('berita_id', 'desc');
    if (!empty($filter['berita_id'])) $this->db->where('berita_id', $filter['berita_id']);
    $res = $this->db->get();
    return $res->result_array();
    // return DataStructure::keyValue($res->result_array(), 'berita_id');
  }


  public function getAllPagger($filter = [])
  {
    $this->db->select('berita_id, berita_image, berita_judul,berita_tanggal,substr(berita_isi,1,400) as berita_isi');
    $this->db->from("tbl_berita");
    $this->db->order_by('berita_id', 'desc');
    $this->db->limit(4, ($filter['page'] - 1) * 4, 'asc');
    if (!empty($filter['berita_id'])) $this->db->where('berita_id', $filter['berita_id']);
    if (!empty($filter['key'])) $this->db->where('berita_judul like "%' . $filter['key'] . '%" OR berita_isi like "%' . $filter['key'] . '%"');
    $res = $this->db->get();
    return $res->result_array();
  }

  public function count_pagger($filter = [])
  {
    $this->db->select('count(*) as count');
    $this->db->from("tbl_berita");
    $this->db->order_by('berita_id', 'desc');
    if (!empty($filter['key'])) $this->db->where('berita_judul like "%' . $filter['key'] . '%" OR berita_isi like "%' . $filter['key'] . '%"');
    if (!empty($filter['berita_id'])) $this->db->where('berita_id', $filter['berita_id']);
    $res = $this->db->get();
    return $res->result_array();
  }


  public function get($id = NULL)
  {
    $row = $this->getAll(['berita_id' => $id]);
    if (empty($row)) {
      throw new UserException("Berita yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
    }
    return $row[0];
  }

  public function add($data)
  {
    $this->db->insert('product', DataStructure::slice($data, ['id_perusahaan']));
    ExceptionHandler::handleDBError($this->db->error(), "Tambah Product gagal", "product");

    return $this->db->insert_id();
  }

  public function edit($data)
  {
    $this->db->where('id_product', $data['id_product']);
    $this->db->set('cover_product', !empty($data['cover_product']) ? $data['cover_product'] : NULL);
    $this->db->set('attachment_product', !empty($data['attachment_product']) ? $data['attachment_product'] : NULL);
    $this->db->update('product', DataStructure::slice($data, ['nama_product', 'deskripsi_product'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Product gagal", "product");

    return $data['id_product'];
  }

  public function delete($data)
  {
    $this->db->where('berita_id', $data['berita_id']);
    $this->db->delete('tbl_berita');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus News Post", "News");
  }

  public function post_comentar($data)
  {
    $data['berita_id'] = $data['id_news'];
    // $data['berita_id'] = $data['id_news'];
    $this->db->insert('tbl_komentar', DataStructure::slice($data, ['berita_id', 'name', 'email', 'ip_address', 'komentar']));
    ExceptionHandler::handleDBError($this->db->error(), "Komentar Gagal", "komentar");

    return $this->db->insert_id();
  }

  public function post_show($id, $count)
  {
    $this->db->where('berita_id', $id);
    $this->db->set('total_show', $count);
    $this->db->update('tbl_berita');
    // ExceptionHandler::handleDBError($this->db->error(), "Edit Product gagal", "product");

    // return $data['id_product'];
  }
}
