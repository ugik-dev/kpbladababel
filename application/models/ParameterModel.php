<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParameterModel extends CI_Model {
  public function getAllRole($filter = []){
    $this->db->select('*');
    $this->db->from('role');
    if(isset($filter['except_ids'])) $this->db->where_not_in('id_role', $filter['except_ids']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_role');
  }

  public function getAllNegara($filter = []){
    $this->db->select('*');
    $this->db->from('negara');
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_negara');
  }

  public function getAllJenisDokumenPerusahaan($filter = []){
    $this->db->select('*');
    $this->db->from('jenis_dokumen_perusahaan');
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_jenis_dokumen_perusahaan');
  }

  public function getAllJenisPerusahaan($filter = []){
    $this->db->select('*');
    $this->db->from('jenis_perusahaan');
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_jenis_perusahaan');
  }
}
