<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengirimanModel extends CI_Model
{

  public function getAll($filter = [])
  {
    // var_dump($filter);
    $this->db->select("GROUP_CONCAT(CONCAT(pi.netto, 'Kg (', jm.nama_jenis_mutu, ') - ', pi.city, ', ', pi.province, ', ', n.nama_negara, ' / ', pi.tanggal_pengiriman) separator '<br>') as item,
    GROUP_CONCAT(CONCAT(pi.netto, 'Kg (', jm.nama_jenis_mutu, ') to ', pi.city, ', ', pi.province, ', ', n.nama_negara, ' / ', pi.tanggal_pengiriman) separator ' - ') as item_v2 , tp.*, eks.*, ekr.nama_perusahaan, ekr.email,ekr.id_jenis_perusahaan,ekr.lok_perusahaan_full,ekr.lok_perusahaan_kec,ekr.lok_perusahaan_kabkot,ekr.lok_gudang_penyimpanan_full,ekr.lok_gudang_penyimpanan_kec,ekr.lok_gudang_penyimpanan_kabkot", FALSE);
    $this->db->select("@nama_role := '{$this->session->userdata()['nama_role']}' as _", FALSE);
    $this->db->select("IF(@nama_role != 'perusahaan', 'Bukan Perusahaan', IF(eks.status_proposal != 'DIMULAI', 'Sudah dikirim, tidak bisa diedit', NULL)) as edit_perusahaan_eks");
    $this->db->select("
    IF(@nama_role != 'kpb', 'Bukan KPB',
      IF(eks.status_kpb_rek = 'DIPROSES' ,  NULL,
        IF(eks.status_kpb_rek = 'DIPROSES2' ,  NULL, 'Syarat Rek KPB Belum Terpenuhi')
      )
    ) as kpb_rek_edit,
      
    IF(@nama_role != 'bp3l', 'Bukan BP3L', 
        IF(eks.status_bp3l_rek = 'DIPROSES', NULL, 
          IF(eks.status_bp3l_rek = 'DIPROSES2',  NULL, 'Syarat Rek BP3L Belum Terpenuhi')
        )
      ) as bp3l_rek_edit,
      
    IF(@nama_role != 'mutu', 'Bukan BPSMB', 
      IF(eks.status_bpsmb_mutu = 'DIPROSES', NULL, 
        IF(eks.status_bpsmb_mutu = 'DIPROSES2',  NULL, 'Syarat Rek Mutu BPSMB Belum Terpenuhi')
      )
    ) as bpsmb_mutu_edit,
      IF(@nama_role != 'disperindag', 'Bukan Disperindag', IF(eks.status_disperindag_izin != 'DIPROSES', 'Syarat Izin Disperindag Belum Terpenuhi', NULL)) as disperindag_izin_edit
    ", FALSE);
    $this->db->from("pengiriman as eks");
    $this->db->join("tahap_proposal as tp", "tp.id_tahap_proposal = eks.id_tahap_proposal");
    $this->db->join('pengiriman_item as pi', 'pi.id_pengiriman = eks.id_pengiriman', 'LEFT');
    $this->db->join('jenis_mutu as jm', 'jm.id_jenis_mutu = pi.id_jenis_mutu', 'LEFT');
    $this->db->join('negara as n', 'n.id_negara = pi.id_negara', 'LEFT');
    $this->db->join("perusahaan as ekr", "ekr.id_perusahaan = eks.id_perusahaan");
    $this->db->group_by('eks.id_pengiriman');
    if (!empty($this->session->userdata()['id_perusahaan'])) $this->db->where("ekr.id_perusahaan", $this->session->userdata()['id_perusahaan']);

    if (!empty($filter['id_perusahaan'])) $this->db->where('eks.id_perusahaan', $filter['id_perusahaan']);
    if (!empty($filter['id_pengiriman'])) $this->db->where('eks.id_pengiriman', $filter['id_pengiriman']);
    if (!empty($filter['tahun'])) $this->db->where('YEAR(eks.created_at)', $filter['tahun']);
    if (!empty($filter['status_proposal'])) $this->db->where('eks.status_proposal', $filter['status_proposal']);
    if (!empty($filter['sampel'])) $this->db->where('eks.id_tahap_proposal', '4');
    if (!empty($filter['exstatus_proposal'])) $this->db->where("eks.status_proposal <> '".  $filter['exstatus_proposal']."'");
    if (!empty($filter['bulan_laporan'])){
      if (empty($filter['tahun_laporan']))throw new UserException("Masukkan Tahun", USER_NOT_FOUND_CODE);
 
      $fils = $filter['tahun_laporan'].'_'.$filter['bulan_laporan'];
      $this->db->where('eks.date_kpb like "'.$fils.'%"');
    }
    
    if (!empty($filter['status_kpb_rek'])) $this->db->where('eks.status_kpb_rek', $filter['status_kpb_rek']);
    if (!empty($filter['status_kpb_rek_not'])) $this->db->where('eks.status_kpb_rek !=', $filter['status_kpb_rek_not']);


    if (!empty($filter['status_bp3l_rek'])) $this->db->where('eks.status_bp3l_rek', $filter['status_bp3l_rek']);
    if (!empty($filter['status_bp3l_rek_not'])) $this->db->where('eks.status_bp3l_rek !=', $filter['status_bp3l_rek_not']);

    if (!empty($filter['status_bpsmb_mutu'])) $this->db->where('eks.status_bpsmb_mutu', $filter['status_bpsmb_mutu']);
    if (!empty($filter['status_bpsmb_mutu_not'])) $this->db->where('eks.status_bpsmb_mutu !=', $filter['status_bpsmb_mutu_not']);

    if (!empty($filter['status_disperindag_izin'])) $this->db->where('eks.status_disperindag_izin', $filter['status_disperindag_izin']);
    if (!empty($filter['status_disperindag_izin_not'])) $this->db->where('eks.status_disperindag_izin !=', $filter['status_disperindag_izin_not']);
    $res = $this->db->get();
    // var_dump($res);
    return DataStructure::keyValue($res->result_array(), 'id_pengiriman');
  }

  public function get($id = NULL)
  {
    $row = $this->getAll(['id_pengiriman' => $id]);
    if (empty($row)) {
      throw new UserException("Pengiriman yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
    }
    return $row[$id];
  }

  public function add($data)
  {
    $this->db->select('verificated');
    $this->db->from("perusahaan");
    $this->db->where('id_perusahaan', $data['id_perusahaan']);
    $res = $this->db->get();
    $res = $res->result_array();
    // echo $res[0];
    // throw new UserException($res[0], USER_NOT_FOUND_CODE);
    if ($res[0]['verificated'] != 'Y') {
      throw new UserException("Maaf akun anda belum terverifikasi.", USER_NOT_FOUND_CODE);
    };

    $data['id_tahap_proposal'] = 0;
    $this->db->insert('pengiriman', DataStructure::slice($data, ['id_perusahaan', 'id_tahap_proposal'], true));
    ExceptionHandler::handleDBError($this->db->error(), "Tambah Pengiriman gagal", "pengiriman");

    return $this->db->insert_id();
  }

  public function edit($data)
  {
    ini_set('date.timezone', 'Asia/Jakarta');
    $date = date("Y-m-d h:i:s");
    $this->db->where('id_pengiriman', $data['id_pengiriman']);
    if (!empty($data['status_proposal']) && $data['status_proposal'] == 'DIPROSES') {
      $this->db->set('status_kpb_rek', 'DIPROSES');
      $this->db->set('date_proposal', $date);
      $this->db->set('id_tahap_proposal', 1);
    }
    $this->db->update('pengiriman', DataStructure::slice($data, ['rencana_pengapalan', 'jumlah_berat', 'jumlah_partai', 'nama_pengiriman', 'nama_komoditi', 'status_proposal', 'no_surat'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Pengiriman gagal", "pengiriman");

    return $data['id_pengiriman'];
  }

  public function kpb_rek($data)
  {
    ini_set('date.timezone', 'Asia/Jakarta');
    $date = date("Y-m-d h:i:s");
    $this->db->where('id_pengiriman', $data['id_pengiriman']);
    if ($data['status_kpb_rek'] == 'DITERIMA') {
      $this->db->set('status_kpb_rek', 'DITERIMA');
      $this->db->set('status_proposal', 'DITERIMA');
      $this->db->set('date_kpb_acc', $date);
      $this->db->set('id_tahap_proposal', 99);
      $this->db->update('pengiriman', DataStructure::slice($data, ['status_kpb_rek', 'status_bp3l_rek', 'catatan_kpb_rek','dokumen_kpb_rek'], TRUE));
    } else if ($data['status_kpb_rek'] == 'DITOLAK') {
      $this->db->set('status_proposal', 'DITOLAK');
      $this->db->set('date_kpb', $date);
      $this->db->update('pengiriman', DataStructure::slice($data, ['status_kpb_rek', 'status_bp3l_rek', 'dokumen_kpb_rek', 'catatan_kpb_rek'], TRUE));
    } else if ($data['status_kpb_rek'] == 'DIPROSES2') {
      $this->db->set('status_bp3l_rek', 'DIPROSES');
      $this->db->set('status_kpb_rek', 'DIPROSES2');
      $this->db->set('date_kpb', $date);
      $this->db->set('id_tahap_proposal', 2);
      $this->db->update('pengiriman', DataStructure::slice($data, ['status_kpb_rek', 'status_bp3l_rek', 'dokumen_kpb_rek', 'catatan_kpb_rek'], TRUE));
    }
    // var_dump($data);
    ExceptionHandler::handleDBError($this->db->error(), "Edit Pengiriman gagal", "pengiriman");

    return $data['id_pengiriman'];
  }

  public function bp3l_rek($data)
  {
    ini_set('date.timezone', 'Asia/Jakarta');
    $date = date("Y-m-d h:i:s");
    $this->db->where('id_pengiriman', $data['id_pengiriman']);
    if ($data['status_bp3l_rek'] == 'DITERIMA') {
      $this->db->set('status_bp3l_rek', 'DITERIMA');
      $this->db->set('date_bp3l_acc', $date);
      $this->db->set('id_tahap_proposal', 6);
      $this->db->update('pengiriman', DataStructure::slice($data, ['status_bp3l_rek', 'dokumen_bp3l_sertifikat_ig', 'catatan_bp3l_rek'], TRUE));
    } else if ($data['status_bp3l_rek'] == 'DITOLAK') {
      $this->db->set('date_bp3l', $date);
      $this->db->set('status_proposal', 'DITOLAK');
      $this->db->update('pengiriman', DataStructure::slice($data, ['status_bp3l_rek', 'catatan_bp3l_rek'], TRUE));
    } else if ($data['status_bp3l_rek'] == 'DIPROSES2') {
      $this->db->set('status_bp3l_rek', 'DIPROSES2');
      $this->db->set('status_bpsmb_mutu', 'DIPROSES');
      $this->db->set('date_bp3l', $date);
      $this->db->set('id_tahap_proposal', 3);
      $this->db->update('pengiriman', DataStructure::slice($data, ['status_bp3l_rek', 'dokumen_bp3l_rek', 'catatan_bp3l_rek'], TRUE));
    }
    // var_dump($data);
    // $this->db->update('pengiriman', DataStructure::slice($data, ['status_bp3l_rek', 'dokumen_bp3l_rek', 'catatan_bp3l_rek'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Pengiriman gagal", "pengiriman");

    return $data['id_pengiriman'];
  }

  public function bpsmb_mutu($data)
  {
    ini_set('date.timezone', 'Asia/Jakarta');
    $date = date("Y-m-d h:i:s");
    $this->db->where('id_pengiriman', $data['id_pengiriman']);
    if ($data['status_bpsmb_mutu'] == 'DIPROSES2') {


      if (!empty($data['dokumen_hasil_mutu'])) {  //UMKM
        $data['status_bpsmb_mutu'] = 'DITERIMA';
        // $this->db->set('id_tahap_proposal', 5);
        //   // $this->db->update('pengiriman', DataStructure::slice($data, ['status_bpsmb_mutu', 'dokumen_bpsmb_mutu' ,'catatan_bpsmb_mutu'], TRUE));
        // } else if($data['jenis_usaha'] == '1') {
        // $this->db->set('status_disperindag_izin', 'DIPROSES');
        $this->db->set('id_tahap_proposal', 5);
      } else {
        $this->db->set('id_tahap_proposal', 4);
        $this->db->set('tgl_sampel', $data['tgl_sampel']);
      }
      // if($data['jenis_usaha'] == '2') {  //UMKM
      //   $this->db->set('id_tahap_proposal', 5);
      //   // $this->db->update('pengiriman', DataStructure::slice($data, ['status_bpsmb_mutu', 'dokumen_bpsmb_mutu' ,'catatan_bpsmb_mutu'], TRUE));
      // } else if($data['jenis_usaha'] == '1') {
      //   $this->db->set('status_disperindag_izin', 'DIPROSES');
      //   $this->db->set('id_tahap_proposal', 4);
      // }   
      // $this->db->update('pengiriman', DataStructure::slice($data, ['status_bpsmb_mutu', 'dokumen_bpsmb_mutu' ,'catatan_bpsmb_mutu'], TRUE));	
    } else if ($data['status_bpsmb_mutu'] == 'DITOLAK') {
      $this->db->set('status_proposal', 'DITOLAK');
      // $this->db->update('pengiriman', DataStructure::slice($data, ['status_bpsmb_mutu', 'dokumen_bpsmb_mutu' ,'catatan_bpsmb_mutu'], TRUE));
    }
    $this->db->set('date_bpsmb_mutu', $date);
    // var_dump($data);
    $this->db->update('pengiriman', DataStructure::slice($data, ['status_bpsmb_mutu', 'dokumen_hasil_mutu', 'catatan_bpsmb_mutu'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Pengiriman gagal", "pengiriman");

    return $data['id_pengiriman'];
  }


  public function disperindag_izin($data)
  {
    ini_set('date.timezone', 'Asia/Jakarta');
    $date = date("Y-m-d h:i:s");
    $this->db->where('id_pengiriman', $data['id_pengiriman']);
    if ($data['status_disperindag_izin'] == 'DITERIMA') {
      $this->db->set('id_tahap_proposal', 5);
    }
    $this->db->set('date_disperindag', $date);
    $this->db->update('pengiriman', DataStructure::slice($data, ['status_disperindag_izin', 'dokumen_disperindag_izin', 'catatan_disperindag_izin'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Pengiriman gagal", "pengiriman");

    return $data['id_pengiriman'];
  }

  public function dok_permohonan_upload($data)
  {
    $this->db->where('id_pengiriman', $data['id_pengiriman']);
    $this->db->update('pengiriman', DataStructure::slice($data, ['dokumen_permohonan'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Upload Gagal!!", "pengiriman");
    return $data['id_pengiriman'];
  }

  public function re_upload($data)
  {
    $data[$data['parm']] = 
    $this->db->set($data['parm'], $data['filename']);
    $this->db->where('id_pengiriman', $data['id_pengiriman']);
    $this->db->update('pengiriman', DataStructure::slice($data, ['catatan_kpb_rek'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Upload Gagal!!", "pengiriman");
    return $data['id_pengiriman'];
  }

  public function upload_manifest($data)
  {
  
    // $this->db->set($data['parm'], $data['filename']);
    $this->db->where('id_pengiriman', $data['id_pengiriman']);
    $this->db->update('pengiriman', DataStructure::slice($data, ['dokumen_manifest'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Upload Gagal!!", "pengiriman");
    return $data['id_pengiriman'];
  }

  public function dok_permohonan_upload_bpsmb($data)
  {
    $this->db->where('id_pengiriman', $data['id_pengiriman']);
    $this->db->update('pengiriman', DataStructure::slice($data, ['dokumen_bpsmb_mutu'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Upload Gagal!!", "pengiriman");
    return $data['id_pengiriman'];
  }
  public function dok_permohonan_upload_bp3l($data)
  {
    $this->db->where('id_pengiriman', $data['id_pengiriman']);
    $this->db->update('pengiriman', DataStructure::slice($data, ['dokumen_bp3l'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Upload Gagal!!", "pengiriman");
    return $data['id_pengiriman'];
  }
  public function delete($data)
  {
    $this->db->where('id_pengiriman', $data['id_pengiriman']);
    $this->db->delete('pengiriman');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Pengiriman", "Pengiriman");
  }

  public function getEmailConfig()
  {
    $this->db->select('*');
    $this->db->from('config_email');
    $res = $this->db->get();
    // $res = $res->result_array();
    // var_dump($res);
    // return $res;
    return DataStructure::keyValue($res->result_array(), 'type');
  }

  public function getServerSTMP()
  {

    $tipe = 'stmp_mail';

    $this->db->select("*");
    $this->db->from("config_email as ssk");
    $this->db->where("ssk.type", $tipe);
    $res = $this->db->get();
    $res = $res->result_array();
    // var_dump($res);
    return $res['0'];
  }
}
