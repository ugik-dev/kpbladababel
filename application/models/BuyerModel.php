<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BuyerModel extends CI_Model
{


    public function updateModifedDate($data)
    {
        ini_set('date.timezone', 'Asia/Jakarta');
        $date = date("Y-m-d h:i:s");
        $this->db->set('date_modified', $date);
        $this->db->where('id', $data);
        $this->db->update('buyer');
        ExceptionHandler::handleDBError($this->db->error(), "Update Data Buyer", "buyer");
    }

    public function acc_buyer($data)
    {
        ini_set('date.timezone', 'Asia/Jakarta');
        $date = date("Y-m-d h:i:s");
        $this->db->set('date_modified', $date);
        $this->db->set('verificated', $data['verificated']);
        $this->db->where('id', $data['id']);
        $this->db->update('buyer');
        ExceptionHandler::handleDBError($this->db->error(), "Update Data Buyer", "buyer");
    }


    public function reqeust_verifikasi($data)
    {

        $this->db->set('verificated', 'R');
        $this->db->where('id', $data['id']);
        $this->db->update('buyer');
        ExceptionHandler::handleDBError($this->db->error(), "Update Data Buyer", "buyer");
    }

    public function getAll($filter)
    {
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
        // var_dump($filter);
        if (!empty($filter['id'])) $this->db->where("eks.id", $filter['id']);
        if (!empty($filter['id_user'])) $this->db->where("eks.id_user", $filter['id_user']);
        if (!empty($filter['verificated'])) $this->db->where("eks.verificated", $filter['verificated']);
        if (!empty($filter['region'])) $this->db->where("eks.region", $filter['region']);
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

    public function cekUserByEmailBuyer($data)
    {
        $this->db->select("count(email) as count");
        $this->db->from('buyer as u');
        $this->db->where('u.email', $data['email']);
        $res = $this->db->get();
        $row = $res->result_array();
        if ($row[0]['count'] > 0) {
            throw new UserException("Email yang kamu daftarkan sudah ada", USER_NOT_FOUND_CODE);
        }
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


    public function cekUserByEmailSeller2($data)
    {

        $this->db->select("count(email) as count");
        $this->db->from('perusahaan as u');
        $this->db->where('u.email', $data['email']);
        $res = $this->db->get();
        $row = $res->result_array();
        if ($row[0]['count'] > 1) {
            throw new UserException("Email yang kamu daftarkan sudah ada", USER_NOT_FOUND_CODE);
        }
    }

    public function update($data)
    {
        $this->cekUserByEmailBuyer2($data);
        $this->cekUserByEmailSeller2($data);
        if (!empty($data['id_bank'])) {
            $data['id_bank'] = explode(' -- ', $data['id_bank'])[1];
        }

        $data['verificated'] = 'N';
        $this->db->set(DataStructure::slice($data, ['nama_perusahaan', 'alamat', 'no_telp', 'no_fax', 'email', 'id_bank', 'an_bank', 'no_rek_bank', 'verificated', 'f_bank']));
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
        $this->db->set('verificated', 'N');
        $this->db->where('id', $data['id']);
        $this->db->update('buyer');
        ExceptionHandler::handleDBError($this->db->error(), "Update Data Buyer", "buyer");
        $this->updateModifedDate($data['id']);
        return $data['id'];
    }
}
