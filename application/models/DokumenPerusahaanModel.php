<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DokumenPerusahaanModel extends CI_Model
{

  public function getAll($filter = [])
  {
    $this->db->select("dp.*");
    $this->db->from("v2_dok_perusahaan as dp");
    // $this->db->join("jenis_dokumen_perusahaan as jdp", "jdp.id_jenis_dokumen_perusahaan = dp.id_jenis_dokumen_perusahaan", 'right');
    if (!empty($this->session->userdata()['id_perusahaan'])) $this->db->where("dp.id_perusahaan", $this->session->userdata()['id_perusahaan']);
    if (!empty($filter['id_perusahaan'])) $this->db->where('dp.id_perusahaan', $filter['id_perusahaan']);
    if (!empty($filter['id_jenis_dokumen_perusahaan'])) $this->db->where('dp.id_jenis_dokumen_perusahaan', $filter['id_jenis_dokumen_perusahaan']);
    if (!empty($filter['clue'])) {
      $this->db->where("dp.nama_jenis_dokumen_perusahaan Like '%" . $filter['clue'] . "%'");

      $res = $this->db->get();
      $res = $res->result_array();
      if (!empty($res[0]['dokumen_perusahaan'])) return $res[0];

      return null;
    }

    // $this->db->select("dp.*, jdp.nama_jenis_dokumen_perusahaan");
    // $this->db->from("dokumen_perusahaan as dp");
    // $this->db->join("jenis_dokumen_perusahaan as jdp", "jdp.id_jenis_dokumen_perusahaan = dp.id_jenis_dokumen_perusahaan", 'right');
    // if (!empty($this->session->userdata()['id_perusahaan'])) $this->db->where("dp.id_perusahaan", $this->session->userdata()['id_perusahaan']);

    // if (!empty($filter['id_perusahaan'])) $this->db->where('dp.id_perusahaan', $filter['id_perusahaan']);
    // if (!empty($filter['id_jenis_dokumen_perusahaan'])) $this->db->where('dp.id_jenis_dokumen_perusahaan', $filter['id_jenis_dokumen_perusahaan']);

    // if (!empty($filter['is_get'])) {
    //   $res = $this->db->get();
    //   $res = $res->result_array();
    //   return $res[0];
    // }

    $res = $this->db->get();
    // return $res->result_array();
    return DataStructure::keyValue($res->result_array(), 'id_jenis_dokumen_perusahaan');
  }

  public function get($id = NULL)
  {
    $row = $this->getAll(['id_dokumen_perusahaan' => $id]);
    if (empty($row)) {
      throw new UserException("Dokumen Perusahaan yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
    }
    return $row[$id];
  }

  public function add($data)
  {
    // try {
    // throw new Exception('Database error! Error Code [' . 'adw' . '] Error: ');
    // throw new UserException('Kamu tidak berhak mengakses resource ini');
    $this->db->insert('dokumen_perusahaan', DataStructure::slice($data, ['id_jenis_dokumen_perusahaan', 'id_perusahaan', 'no_dokumen_perusahaan', 'dokumen_perusahaan']));
    ExceptionHandler::handleDBError($this->db->error(), "Tambah Dokumen Perusahaan gagal", "dokumen_perusahaan");
    $this->db->insert_id();
    return $data['id_perusahaan'];
    // echo $db_error;
    // if (empty($db_error)) {
    // throw new UserException($db_error);
    // }
    // throw new UserException('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
    //     return false; // unreachable retrun statement !!!
    //   }
    //   //  return $this->db->insert_id();
    // } catch (Exception $e) {
    // this will not catch DB related errors. But it will include them, because this is more general. 
    // ExceptionHandler::handle($e);
    // }
  }
  public function edit($data)
  {
    $this->db->where('id_dokumen_perusahaan', $data['id_dokumen_perusahaan']);
    $this->db->update('dokumen_perusahaan', DataStructure::slice($data, ['no_dokumen_perusahaan', 'dokumen_perusahaan'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Dokumen gagal", "dokumen_perusahaan");

    return $data['id_perusahaan'];
  }

  public function delete($data)
  {
    $this->db->where('id_dokumen_perusahaan', $data['id_dokumen_perusahaan']);
    $this->db->delete('dokumen_perusahaan');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Dokumen Perusahaan", "DokumenPerusahaan");
  }
}
