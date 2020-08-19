<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerusahaanModel extends CI_Model {

  public function getAllPengiriman($filter = []){
    $this->db->select("GROUP_CONCAT(CONCAT(pi.netto, 'Kg (', jm.nama_jenis_mutu, ') - ', pi.city, ', ', pi.province, ', ', n.nama_negara, ' / ', pi.tanggal_pengiriman) separator '<br>') as item, tp.*, eks.*, ekr.nama_perusahaan", FALSE);
    $this->db->select("@nama_role := '{$this->session->userdata()['nama_role']}' as _", FALSE);
    $this->db->select("IF(@nama_role != 'perusahaan', 'Bukan Perusahaan', IF(eks.status_proposal != 'DIMULAI', 'Sudah dikirim, tidak bisa diedit', NULL)) as edit_perusahaan_eks");
    $this->db->select("
      IF(@nama_role != 'bp3l', 'Bukan BP3L', IF(eks.status_bp3l_rek != 'DIPROSES', 'Syarat Rek BP3L Belum Terpenuhi', NULL)) as bp3l_rek_edit,
      IF(@nama_role != 'mutu', 'Bukan BPSMB', IF(eks.status_bpsmb_mutu != 'DIPROSES', 'Syarat Mutu BPSMB Belum Terpenuhi', NULL)) as bpsmb_mutu_edit,
      IF(@nama_role != 'disperindag', 'Bukan Disperindag', IF(eks.status_disperindag_izin != 'DIPROSES', 'Syarat Izin Disperindag Belum Terpenuhi', NULL)) as disperindag_izin_edit
    ", FALSE);
    $this->db->from("pengiriman as eks");
    $this->db->join("tahap_proposal as tp", "tp.id_tahap_proposal = eks.id_tahap_proposal");
    $this->db->join('pengiriman_item as pi', 'pi.id_pengiriman = eks.id_pengiriman', 'LEFT');
    $this->db->join('jenis_mutu as jm', 'jm.id_jenis_mutu = pi.id_jenis_mutu', 'LEFT');
    $this->db->join('negara as n', 'n.id_negara = pi.id_negara', 'LEFT');
    $this->db->join("perusahaan as ekr", "ekr.id_perusahaan = eks.id_perusahaan");
    $this->db->group_by('eks.id_pengiriman');
   if(!empty($filter['id_pengiriman'])) $this->db->where('eks.id_pengiriman', $filter['id_pengiriman']);
   
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_pengiriman');
  }
  
  public function getPengiriman($id = NULL){
		$row = $this->getAllPengiriman(['id_perusahaan' => $id]);
		if (empty($row)){
			throw new UserException("Perusahaan yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$id];
  }

  public function getAll($filter){
    // var_dump($this->session->userdata());
    $this->db->select("eks.*, jp.nama_jenis_perusahaan");
    $this->db->select("IF('{$this->session->userdata()['id_user']}' = eks.id_user , NULL, 'Bukan Perusahaan') as edit_perusahaan", FALSE);
    $this->db->from("perusahaan as eks");
    $this->db->join('jenis_perusahaan as jp', "jp.id_jenis_perusahaan = eks.id_jenis_perusahaan");
    if(!empty($filter['id_perusahaan'])) $this->db->where("eks.id_perusahaan", $filter['id_perusahaan']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_perusahaan');
  }

	public function get($id = NULL){
		$row = $this->getAll(['id_perusahaan' => $id]);
		if (empty($row)){
			throw new UserException("Perusahaan yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$id];
  }

  public function addPengiriman($data){
    $data['id_tahap_proposal'] = '0';
    // var_dump($data);
    $this->db->insert('pengiriman', DataStructure::slice($data, ['id_perusahaan', 'id_tahap_proposal'], true));
		ExceptionHandler::handleDBError($this->db->error(), "Tambah Pengiriman gagal", "pengiriman");
		
		return $this->db->insert_id();
  }
	public function update($data){
    if(!empty($data['id_bank'])) { 
        $data['id_bank'] = explode(' -- ' , $data['id_bank'])[1];
      }
    $this->db->set(DataStructure::slice($data, ['nama_perusahaan', 'id_jenis_perusahaan', 'nama_pimpinan', 'lok_perusahaan_full', 'lok_perusahaan_kec', 'lok_perusahaan_kabkot', 'lok_unit_pengelolaan_full', 'lok_unit_pengelolaan_kec', 'lok_unit_pengelolaan_kabkot', 'lok_gudang_penyimpanan_full', 'lok_gudang_penyimpanan_kec', 'lok_gudang_penyimpanan_kabkot', 'no_telepon', 'email', 'id_bank', 'an_bank', 'no_rek_bank']));
    $this->db->where('id_perusahaan', $data['id_perusahaan']);
    $this->db->update('perusahaan');
    ExceptionHandler::handleDBError($this->db->error(), "Update Data Perusahaan", "perusahaan");
		
		return $data['id_perusahaan'];
	}
}
