<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HargaMWPModel extends CI_Model
{

  public function getAll($filter = [])
  {
    $this->db->select("*");
    $this->db->from("harga_mwp");
    $this->db->order_by("tanggal_berlaku", "DESC");
    if (!empty($filter['latest'])) $this->db->limit(1);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_harga_mwp');
  }

  public function get($id = NULL)
  {
    $row = $this->getAll(['id_harga_mwp' => $id]);
    if (empty($row)) {
      throw new UserException("Harga MWP yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
    }
    return $row[$id];
  }


  public function getStandarMutu()
  {
    $this->db->select("*");
    $this->db->from("rinc_standart_mutu");
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_mutu');
  }


  public function getLatest()
  {
    $row = $this->getAll(['latest' => true]);
    if (empty($row)) {
      throw new UserException("Harga MWP yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
    }
    return reset($row);
  }

  public function add($data)
  {
    $this->db->insert('harga_mwp', DataStructure::slice($data, [
      'tanggal_berlaku', 'harga_mwp1_petani', 'harga_mwp1_fob', 'harga_mwp2_petani', 'harga_mwp2_fob', 'harga_asta_petani', 'harga_asta_fob', 'harga_esa_petani', 'harga_esa_fob', 'harga_ipc_petani', 'harga_ipc_fob', 'harga_sni1_petani', 'harga_sni1_fob', 'harga_iso_petani', 'harga_iso_fob', 'd_harga_mwp1_petani',
      'd_harga_mwp1_fob',
      'd_harga_mwp2_petani',
      'd_harga_mwp2_fob',
      'd_harga_asta_petani',
      'd_harga_asta_fob',
      'd_harga_esa_petani',
      'd_harga_esa_fob',
      'd_harga_ipc_petani',
      'd_harga_ipc_fob',
      'd_harga_sni1_petani',
      'd_harga_sni1_fob',
      'd_harga_iso_petani',
      'd_harga_iso_fob'
    ]));
    ExceptionHandler::handleDBError($this->db->error(), "Tambah Harga MWP gagal", "harga_mwp");

    return $this->db->insert_id();
  }

  public function edit($data)
  {
    $this->db->where('id_harga_mwp', $data['id_harga_mwp']);
    $this->db->update('harga_mwp', DataStructure::slice($data, [
      'tanggal_berlaku',
      'harga_mwp1_petani',
      'harga_mwp1_fob',
      'harga_mwp2_petani',
      'harga_mwp2_fob',
      'harga_asta_petani',
      'harga_asta_fob',
      'harga_esa_petani',
      'harga_esa_fob',
      'harga_ipc_petani',
      'harga_ipc_fob',
      'harga_sni1_petani',
      'harga_sni1_fob',
      'harga_iso_petani',
      'harga_iso_fob',

      'd_harga_mwp1_petani',
      'd_harga_mwp1_fob',
      'd_harga_mwp2_petani',
      'd_harga_mwp2_fob',
      'd_harga_asta_petani',
      'd_harga_asta_fob',
      'd_harga_esa_petani',
      'd_harga_esa_fob',
      'd_harga_ipc_petani',
      'd_harga_ipc_fob',
      'd_harga_sni1_petani',
      'd_harga_sni1_fob',
      'd_harga_iso_petani',
      'd_harga_iso_fob'
    ], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Harga MWP gagal", "harga_mwp");

    return $data['id_harga_mwp'];
  }

  public function edit_standar_mutu($data)
  {
    $this->db->where('id_mutu', $data['id_mutu']);
    $this->db->update('rinc_standart_mutu', DataStructure::slice($data, ['cemaran_serangga', 'kerapatan', 'kadar_air', 'kadar_biji_enteng', 'kadar_benda_asing', 'kadar_cemaran', 'kadar_hitam_putih', 'e_colli', 'salmonella', 'kadar_piperin', 'kadar_minyak'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Standar Mutu gagal", "id_mutu");

    return $data;
  }

  public function delete($data)
  {
    $this->db->where('id_harga_mwp', $data['id_harga_mwp']);
    $this->db->delete('harga_mwp');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Harga MWP", "harga_mwp");
  }
}
