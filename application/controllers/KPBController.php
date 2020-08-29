<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KPBController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // $this->load->model(array('KPBModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }

  public function index()
  {
    $this->SecurityModel->roleOnlyGuard('kpb');
    $pageData = array(
      'title' => 'Beranda',
      'content' => 'kpb/DashboardPage',
    );
    $this->load->view('Page', $pageData);
  }


  public function daftar_req_kpb()
  {
    $this->SecurityModel->userOnlyGuard();
    $pageData = array(
      'title' => "Daftar Permohonan KPB",
      'content' => 'kpb/DaftarReqKPBPage',
      "contentData" => []
    );
    $this->load->view('Page', $pageData);
  }
  public function jadwal_pengambilan_sampel()
  {
    $this->SecurityModel->userOnlyGuard();
    $pageData = array(
      'title' => "Jadwal Pengambilan Sampel",
      'content' => 'JadwalPengambilanSampel',
      "contentData" => []
    );
    $this->load->view('Page', $pageData);
  }


  public function panduan()
  {
    $this->SecurityModel->roleOnlyGuard('kpb');
    $pageData = array(
      'title' => 'Panduan',
      'content' => 'bp3l/PanduanPage',
    );
    $this->load->view('Page', $pageData);
  }
}
