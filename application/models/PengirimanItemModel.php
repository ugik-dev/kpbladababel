<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengirimanItemModel extends CI_Model
{

  public function getAll($filter = [])
  {
    $this->db->select('jm.*, n.nama_negara, poo.nama_port_of_origin, jp.nama_jenis_pengemasan, pi.* , jm2.nama_jenis_mutu as nama_hasil_mutu');
    $this->db->select('CEILING(pi.netto / jp.kapasitas) as jumlah_pengemasan', FALSE);
    $this->db->from("pengiriman_item as pi");
    $this->db->join("jenis_mutu as jm", 'jm.id_jenis_mutu = pi.id_jenis_mutu', 'LEFT');
    $this->db->join("jenis_mutu as jm2", 'jm2.id_jenis_mutu = pi.hasil_mutu', 'LEFT');
  
    $this->db->join("negara as n", 'n.id_negara = pi.id_negara', 'LEFT');
    $this->db->join("port_of_origin as poo", 'poo.id_port_of_origin = pi.id_port_of_origin', 'LEFT');
    $this->db->join("jenis_pengemasan as jp", 'jp.id_jenis_pengemasan = pi.id_jenis_pengemasan', 'LEFT');
    if (!empty($filter['id_pengiriman'])) $this->db->where('pi.id_pengiriman', $filter['id_pengiriman']);
    if (!empty($filter['id_pengiriman_item'])) $this->db->where('pi.id_pengiriman_item', $filter['id_pengiriman_item']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_pengiriman_item');
  }

  public function get($id = NULL)
  {
    $row = $this->getAll(['id_pengiriman_item' => $id]);
    if (empty($row)) {
      throw new UserException("Pengiriman yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
    }
    return $row[$id];
  }

  public function add($data)
  {
    $this->db->insert('pengiriman_item', DataStructure::slice($data, ['id_pengiriman', 'netto', 'gross', 'netto_karung', 'gross_karung', 'id_jenis_mutu', 'nama_importir', 'city', 'province', 'id_negara', 'id_port_of_origin', 'port_of_destination', 'id_jenis_pengemasan', 'tanggal_pengiriman', 'shipping_mark', 'keterangan_marking', 'nomor_kontrak', 'keterangan_penggunaan_produk']));
    ExceptionHandler::handleDBError($this->db->error(), "Tambah Pengiriman gagal", "pengiriman");

    return $this->db->insert_id();
  }

  public function edit($data)
  {
    $this->db->where('id_pengiriman_item', $data['id_pengiriman_item']);
    $this->db->update('pengiriman_item', DataStructure::slice($data, ['netto', 'gross', 'netto_karung', 'gross_karung', 'id_jenis_mutu', 'nama_importir', 'city', 'province', 'id_negara', 'id_port_of_origin', 'port_of_destination', 'id_jenis_pengemasan', 'tanggal_pengiriman', 'shipping_mark', 'keterangan_marking', 'nomor_kontrak', 'keterangan_penggunaan_produk','alamat_buyer', 'nama_buyer'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Pengiriman gagal", "pengiriman");

    return $data['id_pengiriman_item'];
  }

  public function edit_hasil($data)
  {
    $this->db->where('id_pengiriman_item', $data['id_pengiriman_item']);
    $this->db->update('pengiriman_item', DataStructure::slice($data, ['hasil_mutu','no_hasil_mutu'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Pengiriman gagal", "pengiriman");

    return $data['id_pengiriman_item'];
  }

  public function edit_hasil_ig($data)
  {
    $this->db->where('id_pengiriman_item', $data['id_pengiriman_item']);
    $this->db->update('pengiriman_item', DataStructure::slice($data, ['no_sertifikat_ig'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Pengiriman gagal", "pengiriman");

    return $data['id_pengiriman_item'];
  }

  

  public function edit_manifest($data)
  {
    $this->db->where('id_pengiriman_item', $data['id_pengiriman_item']);
    $this->db->update('pengiriman_item', DataStructure::slice($data, ['no_manifest'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Pengiriman gagal", "pengiriman");

    return $data['id_pengiriman_item'];
  }

  public function delete($data)
  {
    $this->db->where('id_pengiriman_item', $data['id_pengiriman_item']);
    $this->db->delete('pengiriman_item');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Pengiriman", "Pengiriman");
  }
}
