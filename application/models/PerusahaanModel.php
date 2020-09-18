<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PerusahaanModel extends CI_Model
{

  public function getAllPengiriman($filter = [])
  {
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
    if (!empty($filter['id_pengiriman'])) $this->db->where('eks.id_pengiriman', $filter['id_pengiriman']);

    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_pengiriman');
  }
  public function reqeust_verifikasi($data)
  {

    $this->db->set('verificated', 'R');
    $this->db->where('id_perusahaan', $data['id_perusahaan']);
    $this->db->update('perusahaan');
    ExceptionHandler::handleDBError($this->db->error(), "Update Request Verifikasi", "perusahaan");
  }


  public function getPengiriman($id = NULL)
  {
    $row = $this->getAllPengiriman(['id_perusahaan' => $id]);
    if (empty($row)) {
      throw new UserException("Perusahaan yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
    }
    return $row[$id];
  }

  public function updateModifedDate($data)
  {
    ini_set('date.timezone', 'Asia/Jakarta');
    $date = date("Y-m-d h:i:s");
    $this->db->set('date_modified', $date);
    $this->db->set('verificated', 'N');
    $this->db->where('id_perusahaan', $data);
    $this->db->update('perusahaan');
    ExceptionHandler::handleDBError($this->db->error(), "Update Data Perusahaan", "perusahaan");
  }

  public function getAll($filter)
  {
    if (!empty($filter['is_user'])) {
      $this->db->select("eks.*, jp.nama_jenis_perusahaan, u.kbi_id");
    } else {
      if ($this->session->userdata()['id_role'] == '2') {
        if ($filter['id_perusahaan'] == $this->session->userdata()['id_perusahaan']) {
          $this->db->select("eks.*, jp.nama_jenis_perusahaan, u.kbi_id");
        } else {
          $this->db->select("eks.id_perusahaan, eks.id_user, eks.id_jenis_perusahaan, eks.nama_perusahaan, eks.nama_pimpinan, eks.lok_perusahaan_full, eks.lok_perusahaan_kec, eks.lok_perusahaan_kabkot, eks.lok_unit_pengelolaan_full, eks.lok_unit_pengelolaan_kec, eks.lok_unit_pengelolaan_kabkot, lok_gudang_penyimpanan_full, eks.lok_gudang_penyimpanan_kec, eks.lok_gudang_penyimpanan_kabkot, eks.no_telepon, eks.email, jp.nama_jenis_perusahaan,  '-' as kbi_id ,  '-' as no_rek_bank ,  '-' as an_bank ,  '' as id_bank ");
        }
      } else {
        // $this->session->userdata();
        // var_dump($this->session->userdata()['id_role']);
        $this->db->select("eks.*, jp.nama_jenis_perusahaan, u.kbi_id as kbi_id");
      }
    }
    $this->db->select("IF('{$this->session->userdata()['id_user']}' = eks.id_user , NULL, 'Bukan Perusahaan') as edit_perusahaan", FALSE);
    $this->db->from("perusahaan as eks");
    $this->db->join('jenis_perusahaan as jp', "jp.id_jenis_perusahaan = eks.id_jenis_perusahaan");
    $this->db->join('user as u', "u.id_user = eks.id_user");
    if (!empty($filter['is_user'])) {
      $this->db->where("eks.id_user", $filter['id_user']);
      $res = $this->db->get();
      $res = $res->result_array();
      // var_dump($filter);
      return $res[0]['id_perusahaan'];
    }
    if (!empty($filter['id_perusahaan'])) $this->db->where("eks.id_perusahaan", $filter['id_perusahaan']);
    if (!empty($filter['id_jenis_perusahaan'])) $this->db->where("eks.id_jenis_perusahaan", $filter['id_jenis_perusahaan']);
    if (!empty($filter['verificated'])) $this->db->where("eks.verificated", $filter['verificated']);

    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_perusahaan');
  }

  public function get($id = NULL)
  {
    $row = $this->getAll(['id_perusahaan' => $id]);
    if (empty($row)) {
      throw new UserException("Perusahaan yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
    }

    return $row[$id];
  }

  public function addPengiriman($data)
  {
    $this->db->select('count(*) as num');
    $this->db->from("dokumen_perusahaan");
    $this->db->where('id_perusahaan', $data['id_perusahaan']);
    $res = $this->db->get();
    $res = $res->result_array();
    // echo $res[0];
    // throw new UserException($res[0]['num'], USER_NOT_FOUND_CODE);
    if ($res[0]['num'] < '8') {
      throw new UserException("Dokumen Perusahaan tidak lengkap.", USER_NOT_FOUND_CODE);
    };


    $data['id_tahap_proposal'] = '0';
    // var_dump($data);
    $this->db->insert('pengiriman', DataStructure::slice($data, ['id_perusahaan', 'id_tahap_proposal'], true));
    ExceptionHandler::handleDBError($this->db->error(), "Tambah Pengiriman gagal", "pengiriman");

    return $this->db->insert_id();
  }

  public function acc_seller($data)
  {
    ini_set('date.timezone', 'Asia/Jakarta');
    $date = date("Y-m-d h:i:s");
    $this->db->set('date_modified', $date);
    $this->db->set('verificated', $data['verificated']);
    $this->db->where('id_perusahaan', $data['id']);
    $this->db->update('perusahaan');
    ExceptionHandler::handleDBError($this->db->error(), "Update Data Buyer", "perusahaan");
  }


  public function update($data)
  {
    if (!empty($data['id_bank'])) {
      $data['id_bank'] = explode(' -- ', $data['id_bank'])[1];
    }

    $this->db->set(DataStructure::slice($data, ['nama_perusahaan', 'id_jenis_perusahaan', 'nama_pimpinan', 'lok_perusahaan_full', 'lok_perusahaan_kec', 'lok_perusahaan_kabkot', 'lok_unit_pengelolaan_full', 'lok_unit_pengelolaan_kec', 'lok_unit_pengelolaan_kabkot', 'lok_gudang_penyimpanan_full', 'lok_gudang_penyimpanan_kec', 'lok_gudang_penyimpanan_kabkot', 'no_telepon', 'email', 'id_bank', 'an_bank', 'no_rek_bank']));
    $this->db->where('id_perusahaan', $data['id_perusahaan']);
    $this->db->update('perusahaan');
    ExceptionHandler::handleDBError($this->db->error(), "Update Data Perusahaan", "perusahaan");

    return $data['id_perusahaan'];
  }

  public function cekUserByEmailBuyer2($data)
  {
      $this->db->select("count(email) as count");
      $this->db->from('buyer as u');
      $this->db->where('u.email', $data['email']);
      $res = $this->db->get();
      $row = $res->result_array();
      if ($row[0]['count'] > 1) {
          throw new UserException("Email yang kamu daftarkan sudah ada", USER_NOT_FOUND_CODE);
      }
  }
  public function cekUserByEmailSeller($data)
  {

      $this->db->select("count(email) as count");
      $this->db->from('perusahaan as u');
      $this->db->where('u.email', $data['email']);
      $res = $this->db->get();
      $row = $res->result_array();
      if ($row[0]['count'] > 0) {
          throw new UserException("Email yang kamu daftarkan sudah ada", USER_NOT_FOUND_CODE);
      }
  }

}
