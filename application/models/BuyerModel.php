<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BuyerModel extends CI_Model
{

    public function getAllPengiriman($filter = [])
    {
        $this->db->select("GROUP_CONCAT(CONCAT(pi.netto, 'Kg (', jm.nama_jenis_mutu, ') - ', pi.city, ', ', pi.province, ', ', n.nama_negara, ' / ', pi.tanggal_pengiriman) separator '<br>') as item, tp.*, eks.*, ekr.nama_buyer", FALSE);
        $this->db->select("@nama_role := '{$this->session->userdata()['nama_role']}' as _", FALSE);
        $this->db->select("IF(@nama_role != 'buyer', 'Bukan Buyer', IF(eks.status_proposal != 'DIMULAI', 'Sudah dikirim, tidak bisa diedit', NULL)) as edit_buyer_eks");
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
        $this->db->join("buyer as ekr", "ekr.id_buyer = eks.id_buyer");
        $this->db->group_by('eks.id_pengiriman');
        if (!empty($filter['id_pengiriman'])) $this->db->where('eks.id_pengiriman', $filter['id_pengiriman']);

        $res = $this->db->get();
        return DataStructure::keyValue($res->result_array(), 'id_pengiriman');
    }

    public function getPengiriman($id = NULL)
    {
        $row = $this->getAllPengiriman(['id_buyer' => $id]);
        if (empty($row)) {
            throw new UserException("Buyer yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
        }
        return $row[$id];
    }

    public function updateModifedDate($data)
    {
        ini_set('date.timezone', 'Asia/Jakarta');
        $date = date("Y-m-d h:i:s");
        $this->db->set('date_modified', $date);
        $this->db->where('id', $data);
        $this->db->update('buyer');
        ExceptionHandler::handleDBError($this->db->error(), "Update Data Buyer", "buyer");
    }

    public function getAll($filter)
    {
        // if (!empty($filter['is_user'])) {
        //     $this->db->select("eks.*, jp.nama_jenis_buyer, u.kbi_id");
        // } else {
        //     if ($this->session->userdata()['id_role'] == '2') {
        //         if ($filter['id_buyer'] == $this->session->userdata()['id_buyer']) {
        //             $this->db->select("eks.*, jp.nama_jenis_buyer, u.kbi_id");
        //         } else {
        //             $this->db->select("eks.id_buyer, eks.id_user, eks.id_jenis_buyer, eks.nama_buyer, eks.nama_pimpinan, eks.lok_buyer_full, eks.lok_buyer_kec, eks.lok_buyer_kabkot, eks.lok_unit_pengelolaan_full, eks.lok_unit_pengelolaan_kec, eks.lok_unit_pengelolaan_kabkot, lok_gudang_penyimpanan_full, eks.lok_gudang_penyimpanan_kec, eks.lok_gudang_penyimpanan_kabkot, eks.no_telepon, eks.email, jp.nama_jenis_buyer,  '-' as kbi_id ,  '-' as no_rek_bank ,  '-' as an_bank ,  '' as id_bank ");
        //         }
        //     } else {
        //         // $this->session->userdata();
        //         // var_dump($this->session->userdata()['id_role']);
        //         $this->db->select("eks.*, jp.nama_jenis_buyer, u.kbi_id as kbi_id");
        //     }
        // }
        // var_dump($filter);
        $this->db->select("eks.*, u.kbi_id, u.nama, b.nama_bank");
        $this->db->select("IF('{$this->session->userdata()['id_user']}' = eks.id_user , NULL, 'Bukan Buyer') as edit_buyer", FALSE);
        $this->db->from("buyer as eks");
        // $this->db->join('jenis_buyer as jp', "jp.id_jenis_buyer = eks.id_jenis_buyer");
        $this->db->join('user as u', "u.id_user = eks.id_user");
        $this->db->join('kode_bank as b', "b.id_bank = eks.id_bank", 'LEFT');
        if (!empty($filter['is_user'])) {
            $this->db->where("eks.id_user", $filter['id_user']);
            $res = $this->db->get();
            $res = $res->result_array();
            // var_dump($filter);
            return $res[0]['id_buyer'];
        }
        if (!empty($filter['id'])) $this->db->where("eks.id", $filter['id']);
        if (!empty($filter['id_user'])) $this->db->where("eks.id_user", $filter['id_user']);
        $res = $this->db->get();
        return DataStructure::keyValue($res->result_array(), 'id');
    }

    public function get($id = NULL)
    {
        $row = $this->getAll(['id' => $id]);
        if (empty($row)) {
            throw new UserException("Buyer yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
        }

        return $row[$id];
    }

    public function update($data)
    {

        if (!empty($data['id_bank'])) {
            $data['id_bank'] = explode(' -- ', $data['id_bank'])[1];
        }
        $this->db->set(DataStructure::slice($data, ['nama_perusahaan', 'alamat', 'no_telp', 'no_fax', 'email', 'id_bank', 'an_bank', 'no_rek_bank']));
        $this->db->where('id', $data['id']);
        $this->db->update('buyer');
        $this->updateModifedDate($data['id']);
        ExceptionHandler::handleDBError($this->db->error(), "Update Data Buyer", "buyer");

        return $data['id'];
    }
    public function addDokument($data)
    {

        $this->db->set('no_' . $data['tipe'], $data['no_dokumen']);
        $this->db->set($data['tipe'], $data[$data['tipe']]);
        $this->db->where('id', $data['id']);
        $this->db->update('buyer');
        ExceptionHandler::handleDBError($this->db->error(), "Update Data Buyer", "buyer");
        $this->updateModifedDate($data['id']);
        return $data['id'];
    }
}
