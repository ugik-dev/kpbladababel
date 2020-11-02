<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;

class PengirimanController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array("PerusahaanModel", "DokumenPerusahaanModel", "PengirimanModel", "PengirimanItemModel"));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = FALSE;
  }

  public function detail()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $input = $this->input->get();
      $data = $this->PengirimanModel->get($input['id_pengiriman']);
      $pageData = array(
        'title' => "Pengiriman {$data['nama_pengiriman']} - {$data['nama_perusahaan']}",
        'content' => 'DetailPengirimanPage',
        "contentData" => ['id_pengiriman' => $input['id_pengiriman']]
      );
      $this->load->view('Page', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function info_fragment()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $pageData = array(
        "contentData" => ['id_pengiriman' => $this->input->get()['id_pengiriman']]
      );
      $this->load->view('detail_pengiriman_fragment/InfoFragment', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function permohonan_ig_word()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);

      $input = $this->input->get();
      if (empty($input['id_pengiriman'])) throw new UserException("Parameter 'id_pengiriman' tidak ada", 0);

      $data = $this->PengirimanModel->get($input['id_pengiriman']);
      $perusahaan = $this->PerusahaanModel->get($data['id_perusahaan']);

      $phpWord = new \PhpOffice\PhpWord\PhpWord();
      $phpWord->addFontStyle('cover', array('name' => 'Times New Roman', 'size' => 16, 'color' => '000000', 'bold' => true));
      $phpWord->addParagraphStyle('pcover', array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));
      $phpWord->addFontStyle('h3', array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000', 'bold' => true));
      $phpWord->addFontStyle('h2', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));
      $phpWord->addFontStyle('h1', array('name' => 'Times New Roman', 'size' => 17, 'color' => '000000', 'bold' => true));

      $phpWord->addFontStyle('paragraph', array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000'));

      $section = $phpWord->addSection();
      // $section->addImage('assets\img\head_bp3l.png',array('height' => 70, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

      $section->addText("FORM PENGAJUAN IG MUNTOK WHITE PEPPER", 'h3', 'pcover');

      $section->addTextBreak();

      $phpWord->addFontStyle('t1', array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000', 'bold' => true));
      $fancyTableStyle = array('borderSize' => 1, 'borderColor' => '000000', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'FFFF00');
      $cellRowContinue = array('vMerge' => 'continue');
      $cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
      $cellHCentered = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
      $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $spanTableStyleName = 'Colspan Rowspan';
      $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
      $table = $section->addTable($spanTableStyleName);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nama Perusahaan');
      $table->addCell(5000, $cellVCentered)->addText($perusahaan['nama_perusahaan']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Alamat Perusahaan');
      $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_perusahaan_full']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Alamat Gudang');
      $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_gudang_penyimpanan_full']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nama Komoditi');
      $table->addCell(5000, $cellVCentered)->addText($data['nama_komoditi']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Rencana Mutu');
      $table->addCell(5000, $cellVCentered)->addText($data['rencana_mutu']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Jumlah Berat');
      $table->addCell(5000, $cellVCentered)->addText($data['jumlah_berat']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Jumlah partai/ Lot');
      $table->addCell(5000, $cellVCentered)->addText($data['jumlah_partai']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nama Importir');
      $table->addCell(5000, $cellVCentered)->addText($data['nama_importir']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Jenis Kemasan');
      $table->addCell(5000, $cellVCentered)->addText($data['jenis_kemasan']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Rencana Pengapalan');
      $table->addCell(5000, $cellVCentered)->addText($data['rencana_pengapalan']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Shipping Mark');
      $table->addCell(5000, $cellVCentered)->addText($data['shipping_mark']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Keterangan Marking');
      $table->addCell(5000, $cellVCentered)->addText($data['keterangan_marking']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nomor Kontrak');
      $table->addCell(5000, $cellVCentered)->addText($data['nomor_kontrak']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Tujuan');
      $table->addCell(5000, $cellVCentered)->addText($data['tujuan']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Jumlah Karung');
      $table->addCell(5000, $cellVCentered)->addText($data['jumlah_karung']);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Netto');
      $table->addCell(5000, $cellVCentered)->addText($data['jumlah_pengiriman'] . ' Kg');

      $styleTable = array('borderColor' => 'none', 'borderSize' => 'none', 'cellMargin' => 10, 'valign' => 'center');
      $styleFirstRow = array('bgColor' => '#CCC', 'bold' => true, 'size' => 11, 'valign' => 'center');
      $styleCell = array('valign' => 'center');
      $fontStyle = array('bold' => false, 'align' => 'center', 'color' => 'ccc');
      $cellHCentered = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
      $cellVCentered = array('valign' => 'center');
      $table = $section->addTable('myTable4');
      $phpWord->addFontStyle('t1', array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000', 'bold' => true));
      $table->addRow();
      $table->addCell(5000, $styleCell)->addText(" ", null, $cellHCentered);
      $table->addCell(5000, $styleCell)->addText(" ", null, $cellHCentered);
      $table->addRow();
      $table->addCell(5000, $styleCell)->addText(' ', null, $cellHCentered);
      $table->addCell(5000, $styleCell)->addText("Pangkalpinang,      " . $data['tanggal_pengiriman'], null, $cellHCentered);
      $table->addRow();
      $table->addCell(5000, $styleCell)->addText(" ", null, $cellHCentered);
      $table->addCell(5000, $styleCell)->addText(strtoupper($perusahaan['nama_perusahaan']), null, $cellHCentered);
      $table->addRow();
      $table->addCell(5000, $styleCell)->addText(" ", null, $cellHCentered);
      $table->addCell(5000, $styleCell)->addText(" ", null, $cellHCentered);
      $table->addRow();
      $table->addCell(5000, $styleCell)->addText(" ", null, $cellHCentered);
      $table->addCell(5000, $styleCell)->addText(" ", null, $cellHCentered);
      $table->addRow();
      $table->addCell(5000, $styleCell)->addText(" ", null, $cellHCentered);
      $table->addCell(5000, $styleCell)->addText(" ", null, $cellHCentered);
      $table->addRow();
      $table->addCell(5000, $styleCell)->addText(" ", null, $cellHCentered);
      $table->addCell(5000, $styleCell)->addText(strtoupper("({$perusahaan['nama_pimpinan']})"), null, $cellHCentered);
      $table->addRow();
      $table->addCell(5000, $styleCell)->addText(" ", null, $cellHCentered);
      $table->addCell(5000, $styleCell)->addText(strtoupper("Pimpinan"), null, $cellHCentered);

      $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
      FileIO::headerDownloadDocx('Form Pengajuan IG BP3L - ' . $data['nama_pengiriman']);

      $objWriter->save("php://output");
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function permohonan_bpsmb_mutu()
  {
    // try{
    $this->SecurityModel->userOnlyGuard(TRUE);

    $input = $this->input->get();
    if (empty($input['id_pengiriman'])) throw new UserException("Parameter 'id_pengiriman' tidak ada", 0);

    $pengiriman = $this->PengirimanModel->get($input['id_pengiriman']);
    $pengirimanItem = $this->PengirimanItemModel->getAll(['id_pengiriman' => $input['id_pengiriman']]);
    $perusahaan = $this->PerusahaanModel->get($pengiriman['id_perusahaan']);
    $siup = array_values($this->DokumenPerusahaanModel->getAll(['id_perusahaan' => $pengiriman['id_perusahaan'], 'id_jenis_dokumen_perusahaan' => 2]));
    $no_siup = !empty($siup) ? $siup[0]['no_dokumen_perusahaan'] : NULL;

    // $pengiriman = 'nama pengirim';
    // $pengirimanItem = 'nama pengirim';
    // $perusahaan = 'nama pengirim';
    // $siup = 'nama pengirim';
    // $no_siup = 'nama pengirim';


    $phpWord = new PhpOffice\PhpWord\PhpWord();
    $phpWord->addFontStyle('h3', array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph', array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000'));
    $phpWord->addFontStyle('paragraph_bold', array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000', 'bold' => true));

    $section = $phpWord->addSection();
    // $section->addImage(base_url('assets/img/head_bp3l.png'),array('height' => 70, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

    $tanggal = CustomFunctions::tanggal_indonesia(date("Y-m-d"));
    $section->addText("Panngkalpinang, {$tanggal}", "paragraph");

    $textrun = $section->addTextRun();
    $year = explode("-", $pengiriman['created_at'])[0];
    $textrun->addText("Nomor\t\t: {$pengiriman['id_pengiriman']}/BP3L/UM/I/{$year}", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Lampiran\t: -", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Perihal\t\t: ", 'paragraph');
    $textrun->addText("Permohonan Pengambilan Sampel Uji Mutu", 'paragraph_bold');
    $textrun->addTextBreak();

    $textrun = $section->addTextRun();
    $textrun->addText("Kepada Yth,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Kepala Balai Pengujian dan Sertifikasi Mutu Barang (BPSMB)", 'paragraph_bold');
    $textrun->addTextBreak();
    $textrun->addText("Provinsi Kepulauan Bangka Belitung", 'paragraph_bold');
    $textrun->addTextBreak();
    $textrun->addText("Di", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("         PANGKALPINANG", 'paragraph_bold');

    $textrun = $section->addTextRun();
    $textrun->addText("Dengan hormat,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Bersama ini kami BP3L meneruskan permohonan dari {$perusahaan['nama_perusahaan']} untuk melakukan pengambilan contoh (sampling) dalam rangka uji mutu barang terkait pengajuan IG MWP dengan data sebagai berikut:", 'paragraph');

    $fancyTableStyle = array('borderSize' => 1, 'borderColor' => '000000', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $spanTableStyleName = 'Colspan Rowspan';
    $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
    $table = $section->addTable($spanTableStyleName);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Perusahaan');
    $table->addCell(1, $cellVCentered)->addText(':');
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['nama_perusahaan']);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Alamat Perusahaan');
    $table->addCell(1, $cellVCentered)->addText(':');
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_perusahaan_full']);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nomor SIUP Perusahaan');
    $table->addCell(1, $cellVCentered)->addText(':');
    $table->addCell(5000, $cellVCentered)->addText($no_siup);

    $negara_tujuan = '';
    $berat = '';
    $berat_total = 0;
    $jenis_pengemasan = '';
    $jumlah_karung = '';

    foreach ($pengirimanItem as $pi) {
      $negara_tujuan .= "{$pi['city']} {$pi['nama_negara']}, ";
      $berat .= "{$pi['netto']} KG + ";
      $berat_total += $pi['netto'];
      $jenis_pengemasan .= "{$pi['nama_jenis_pengemasan']}, ";
      $jumlah_karung .= "{$pi['jumlah_pengemasan']} {$pi['nama_jenis_pengemasan']}, ";
    }
    $negara_tujuan = substr($negara_tujuan, 0, -2);
    $berat = substr($berat, 0, -3);
    $jenis_pengemasan = substr($jenis_pengemasan, 0, -2);
    $jumlah_karung = substr($jumlah_karung, 0, -2);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Negara Tujuan');
    $table->addCell(1, $cellVCentered)->addText(':');
    $table->addCell(5000, $cellVCentered)->addText($negara_tujuan);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Komoditi');
    $table->addCell(1, $cellVCentered)->addText(':');
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_komoditi']);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Berat Bersih');
    $table->addCell(1, $cellVCentered)->addText(':');
    $table->addCell(5000, $cellVCentered)->addText($berat . ' = ' . $berat_total . ' KG');

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jenis Pengemasan');
    $table->addCell(1, $cellVCentered)->addText(':');
    $table->addCell(5000, $cellVCentered)->addText($jenis_pengemasan);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Karung');
    $table->addCell(1, $cellVCentered)->addText(':');
    $table->addCell(5000, $cellVCentered)->addText($jumlah_karung);

    $textrun = $section->addTextRun();
    $textrun->addText("Demikianlah surat permohonan ini kami buat. Atas perhatian dan kerjasamanya kami ucapkan terima kasih.", 'paragraph');
    $textrun->addTextBreak();

    $textrun = $section->addTextRun();
    $textrun->addText("Hormat Kami,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("KETUA BP3L PROV KEP BABEL", 'paragraph');
    $textrun->addTextBreak(6);
    $textrun->addText("RAFKI HARISKA, SKM", 'paragraph_bold');
    $textrun->addTextBreak();

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    // FileIO::headerDownloadDocx('Form Pengajuan Mutu - ' . $pengiriman['nama_pengiriman']);
    FileIO::headerDownloadDocx('Form Pengajuan Mutu - ');

    $objWriter->save("php://output");
    // } catch(Exception $e){
    //   ExceptionHandler::handle($e);
    // }
  }

  public function permohonan_disperindag_izin()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);

      $input = $this->input->get();
      if (empty($input['id_pengiriman'])) throw new UserException("Parameter 'id_pengiriman' tidak ada", 0);

      echo json_encode(['message' => 'Method PengirimanController/permohonan_disperindag_izin belum diimplementasikan']);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function dokumen_fragment()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $pageData = array(
        "contentData" => ['id_pengiriman' => $this->input->get()['id_pengiriman']]
      );
      $this->load->view('detail_pengiriman_fragment/DokumenFragment', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function disperindag_fragment()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $pageData = array(
        "contentData" => ['id_pengiriman' => $this->input->get()['id_pengiriman']]
      );
      $this->load->view('detail_pengiriman_fragment/DisperindagFragment', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function mutu_fragment()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $pageData = array(
        "contentData" => ['id_pengiriman' => $this->input->get()['id_pengiriman']]
      );
      $this->load->view('detail_pengiriman_fragment/MutuFragment', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function karantina_fragment()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $pageData = array(
        "contentData" => ['id_pengiriman' => $this->input->get()['id_pengiriman']]
      );
      $this->load->view('detail_pengiriman_fragment/KarantinaFragment', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function bp3l_fragment()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $pageData = array(
        "contentData" => ['id_pengiriman' => $this->input->get()['id_pengiriman']]
      );
      $this->load->view('detail_pengiriman_fragment/BP3LFragment', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function ksop_fragment()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $pageData = array(
        "contentData" => ['id_pengiriman' => $this->input->get()['id_pengiriman']]
      );
      $this->load->view('detail_pengiriman_fragment/KSOPFragment', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function bea_fragment()
  {
    $this->SecurityModel->userOnlyGuard();
    try {
      $pageData = array(
        "contentData" => ['id_pengiriman' => $this->input->get()['id_pengiriman']]
      );
      $this->load->view('detail_pengiriman_fragment/BeaFragment', $pageData);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAll()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PengirimanModel->getAll($this->input->get());
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function get()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PengirimanModel->get($this->input->get()['id_pengiriman']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function addQRCode($id_pengiriman)
  {

    $this->load->library('ciqrcode'); //pemanggilan library QR CODE

    $config['cacheable']    = false; //boolean, the default is true
    $config['cachedir']     = './assets/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '600'; //interger, the default is 1024
    $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
    $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);

    $image_name = $id_pengiriman . '.png'; //buat name dari qr code sesuai dengan nim

    $params['data'] = site_url() . 'PengirimanController/detail?id_pengiriman=' . $id_pengiriman; //data yang akan di jadikan QR CODE
    $params['level'] = 'S'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
  }


  public function duplikat()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->PengirimanModel->get($this->input->get()['id_pengiriman']);
      $newdata = array(
        'id_perusahaan' => $data['id_perusahaan'],
        'nama_pengiriman' => $data['nama_pengiriman'],
        'nama_komoditi' => $data['nama_komoditi'],
        'jumlah_partai' => $data['jumlah_partai'],
        'jumlah_berat' => $data['jumlah_berat'],
        'nama_pengiriman' => $data['nama_pengiriman']


      );
      $newdata['id_pengiriman'] = $this->PengirimanModel->add($newdata);

      $pengirimanItem = $this->PengirimanItemModel->getAll(['id_pengiriman' => $data['id_pengiriman']]);
      foreach ($pengirimanItem as $pi) {
        $pi['id_pengiriman_item'] = null;
        $pi['id_pengiriman'] = $newdata['id_pengiriman'];
        $this->PengirimanItemModel->add($pi);
      };
      $this->addQRCode($newdata['id_pengiriman']);
      $newdata = $this->PengirimanModel->get($newdata['id_pengiriman']);
      echo json_encode(array("data" => $newdata));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function add()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_pengiriman'] = $this->PengirimanModel->add($data);
      $this->addQRCode($data['id_pengiriman']);
      $data = $this->PengirimanModel->get($data['id_pengiriman']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function edit()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $dataOld = $this->PengirimanModel->get($data['id_pengiriman']);
      if (!empty($dataOld['edit_perusahaan_eks'])) throw new UserException($dataOld['edit_perusahaan_eks'], 0);
      $data['id_pengiriman'] = $this->PengirimanModel->edit($data);
      $data = $this->PengirimanModel->get($data['id_pengiriman']);
      if ($data['id_tahap_proposal'] != '0') $this->email_send($data);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function dok_permohonan_upload()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $dataOld = $this->PengirimanModel->get($data['id_pengiriman']);

      $data['dokumen_permohonan'] = FileIO::genericUpload('dokumen_permohonan', 'pdf', $dataOld, $data);
      $data['id_pengiriman'] = $this->PengirimanModel->dok_permohonan_upload($data);
      $data = $this->PengirimanModel->get($data['id_pengiriman']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function re_upload()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $dataOld = $this->PengirimanModel->get($data['id_pengiriman']);

      // if (!empty($dataOld['bp3l_rek_edit'])) throw new UserException($dataOld['bp3l_rek_edit'], 0);
      // $data['dokumen_bp3l_rek'] = FileIO::genericUpload('dokumen_bp3l_rek', 'pdf', "", $data);

      // $data[$data['parm']] = $data['re_upload_dokumen'];
      $data['filename'] = FileIO::genericReUpload($data['parm'], 'pdf', "", $data);
      $data['id_pengiriman'] = $this->PengirimanModel->re_upload($data);
      // $data = $this->PengirimanModel->get($data['id_pengiriman']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }




  public function dok_permohonan_upload_bpsmb()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $dataOld = $this->PengirimanModel->get($data['id_pengiriman']);

      $data['dokumen_bpsmb_mutu'] = FileIO::genericUpload('dokumen_bpsmb_mutu', 'pdf', $dataOld, $data);

      $data['id_pengiriman'] = $this->PengirimanModel->dok_permohonan_upload_bpsmb($data);
      $data = $this->PengirimanModel->get($data['id_pengiriman']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function dok_permohonan_upload_bp3l()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $dataOld = $this->PengirimanModel->get($data['id_pengiriman']);

      $data['dokumen_bp3l'] = FileIO::genericUpload('dokumen_bp3l', 'pdf', $dataOld, $data);

      $data['id_pengiriman'] = $this->PengirimanModel->dok_permohonan_upload_bp3l($data);
      $data = $this->PengirimanModel->get($data['id_pengiriman']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function bp3l_rek()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $dataOld = $this->PengirimanModel->get($data['id_pengiriman']);
      if (!empty($dataOld['bp3l_rek_edit'])) throw new UserException($dataOld['bp3l_rek_edit'], 0);
      $data['dokumen_bp3l_rek'] = FileIO::genericUpload('dokumen_bp3l_rek', 'pdf', $dataOld, $data);
      if (!empty($dataOld['bp3l_sertifikat_ig_edit'])) throw new UserException($dataOld['bp3l_sertifikat_ig_edit'], 0);
      $data['dokumen_bp3l_sertifikat_ig'] = FileIO::genericUpload('dokumen_bp3l_sertifikat_ig', 'pdf', $dataOld, $data);

      //   for($i=1;$i<=$data['jumlah_item'];$i++){
      //     $tmp['id_pengiriman_item'] = $data['id_pengiriman_'.$i];
      //     $tmp['no_sertifikat_ig'] = $data['no_sertifikat_ig_'.$i];
      // // var_dump($tmp);
      //     $this->PengirimanItemModel->edit_hasil_ig($tmp);
      //   }

      $data['id_pengiriman'] = $this->PengirimanModel->bp3l_rek($data);
      $data = $this->PengirimanModel->get($data['id_pengiriman']);
      $this->email_send($data);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function kpb_rek()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $dataOld = $this->PengirimanModel->get($data['id_pengiriman']);
      // if (!empty($dataOld['kpb_rek_edit'])) throw new UserException($dataOld['kpb_rek_edit'], 0);
      $data['dokumen_kpb_rek'] = FileIO::genericUpload('dokumen_kpb_rek', 'pdf', $dataOld, $data);
      // if(!empty($dataOld['kpb_sertifikat_ig_edit'])) throw new UserException($dataOld['kpb_sertifikat_ig_edit'], 0);
      // $data['dokumen_kpb_sertifikat_ig'] = FileIO::genericUpload('dokumen_kpb_sertifikat_ig', 'pdf', $dataOld, $data);
      $data['id_pengiriman'] = $this->PengirimanModel->kpb_rek($data);
      $data = $this->PengirimanModel->get($data['id_pengiriman']);
      $this->email_send($data);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function bpsmb_mutu()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $dataOld = $this->PengirimanModel->get($data['id_pengiriman']);
      if (!empty($dataOld['bpsmb_mutu_edit'])) throw new UserException($dataOld['bpsmb_mutu_edit'], 0);
      $data['dokumen_hasil_mutu'] = FileIO::genericUpload('dokumen_hasil_mutu', 'pdf', $dataOld, $data);
      // // if(!empty($dataOld['bp3l_sertifikat_ig_edit'])) throw new UserException($dataOld['bp3l_sertifikat_ig_edit'], 0);
      // // $data['dokumen_bp3l_sertifikat_ig'] = FileIO::genericUpload('dokumen_bp3l_sertifikat_ig', 'pdf', $dataOld, $data);
      $data['id_pengiriman'] = $this->PengirimanModel->bpsmb_mutu($data);
      for ($i = 1; $i <= $data['jumlah_item']; $i++) {
        $tmp['id_pengiriman_item'] = $data['id_pengiriman_' . $i];
        $tmp['hasil_mutu'] = $data['hasil_item_' . $i];
        $tmp['no_hasil_mutu'] = $data['no_hasil_mutu_' . $i];

        $this->PengirimanItemModel->edit_hasil($tmp);
      }
      $data = $this->PengirimanModel->get($data['id_pengiriman']);
      $this->email_send($data);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function manifest_upload()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $dataOld = $this->PengirimanModel->get($data['id_pengiriman']);
      // if (!empty($dataOld['bpsmb_mutu_edit'])) throw new UserException($dataOld['bpsmb_mutu_edit'], 0);
      $data['dokumen_manifest'] = FileIO::genericUpload('dokumen_manifest', 'pdf', $dataOld, $data);
      // // if(!empty($dataOld['bp3l_sertifikat_ig_edit'])) throw new UserException($dataOld['bp3l_sertifikat_ig_edit'], 0);
      // // $data['dokumen_bp3l_sertifikat_ig'] = FileIO::genericUpload('dokumen_bp3l_sertifikat_ig', 'pdf', $dataOld, $data);
      $data['id_pengiriman'] = $this->PengirimanModel->upload_manifest($data);
      for ($i = 1; $i <= $data['jumlah_item']; $i++) {
        $tmp['id_pengiriman_item'] = $data['id_pengiriman_' . $i];
        $tmp['no_manifest'] = $data['no_manifest_' . $i];

        $this->PengirimanItemModel->edit_manifest($tmp);
      }
      $data = $this->PengirimanModel->get($data['id_pengiriman']);
      // $this->email_send($data);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function disperindag_izin()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $dataOld = $this->PengirimanModel->get($data['id_pengiriman']);
      if (!empty($dataOld['disperindag_izin_edit'])) throw new UserException($dataOld['disperindag_izin_edit'], 0);
      $data['dokumen_disperindag_izin'] = FileIO::genericUpload('dokumen_disperindag_izin', 'pdf', $dataOld, $data);
      $data['id_pengiriman'] = $this->PengirimanModel->disperindag_izin($data);
      $data = $this->PengirimanModel->get($data['id_pengiriman']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function delete()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $dataOld = $this->PengirimanModel->get($data['id_pengiriman']);
      if (!empty($dataOld['edit_perusahaan_eks'])) throw new UserException($dataOld['edit_perusahaan_eks'], 0);
      $this->PengirimanModel->delete($data);
      echo json_encode([]);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getEmailConfig()
  {
    $serv = $this->PengirimanModel->getEmailConfig();
    var_dump($serv);
  }
  public function email_send($data)
  {
    // $email = $registerData['email'];
    // var_dump($data);
    // echo  $data['email'];
    //    var_dump($data);
    $serv = $this->PengirimanModel->getEmailConfig();
    // var_dump($serv);

    if ($data['id_tahap_proposal'] == '1') {
      $send['to'] = $serv['kpb']['username']; //KPB
      $send['subject'] = $subject = 'Permohonan Sertifikat IG dan Pengujian Mutu ' . $data['nama_perusahaan'];
      $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= '';
      $emailContent .= '<br> Dengan ini kami menginfokan bahwa ada pemohonan baru kepada anda. ';
      $emailContent .= '<br> Diharapkan untuk cek pada website KPB LADA BABEL. ';
      // $emailContent .= '<br> Waktu : '.$this->convertDateTime2($data['tanggal_record']);
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
      $send['message'] = $emailContent;
    } else if ($data['id_tahap_proposal'] == '2') {
      $send['to'] = $serv['bp3l']['username']; //BP3L

      $send['subject'] = $subject = 'Permohonan Sertifikat IG ' . $data['nama_perusahaan'];
      $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= '';
      $emailContent .= '<br> Dengan ini kami menginfokan bahwa ada pemohonan baru kepada anda. ';
      $emailContent .= '<br> Diharapkan untuk cek pada website KPB LADA BABEL. ';
      // $emailContent .= '<br> Waktu : '.$this->convertDateTime2($data['tanggal_record']);
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
      $send['message'] = $emailContent;
      if ($data['status_kpb_rek'] == 'DITOLAK') {
        $send['to'] = $data['email']; //PERUSAHAAN
        $send['subject'] = $subject = 'Pemberitahun Permohonan Ditolak';
        $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
        $emailContent .= '<tr><td style="height:20px"></td></tr>';
        $emailContent .= '';
        $emailContent .= '<br> Dengan ini kami menginfokan bahwa permohonan anda ditolak. ';
        $emailContent .= '<br> Diharapkan untuk cek pada website KPB LADA BABEL. ';
        // $emailContent .= '<br> Waktu : '.$this->convertDateTime2($data['tanggal_record']);
        $emailContent .= '<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
        $send['message'] = $emailContent;
      }
    } else if ($data['id_tahap_proposal'] == '3') {
      $send['to'] = $serv['bpsmb']['username']; //MUTU

      $send['subject'] = $subject = 'Permohonan Pengujian Mutu ' . $data['nama_perusahaan'];
      $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= '';
      $emailContent .= '<br> Dengan ini kami menginfokan bahwa ada pemohonan baru kepada anda. ';
      $emailContent .= '<br> Diharapkan untuk cek pada website KPB LADA BABEL. ';
      // $emailContent .= '<br> Waktu : '.$this->convertDateTime2($data['tanggal_record']);
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
      $send['message'] = $emailContent;
      if ($data['status_bp3l_rek'] == 'DITOLAK') {
        $send['to'] = $data['email']; //PERUSAHAAN
        $send['subject'] = $subject = 'Pemberitahun Permohonan Ditolak';
        $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
        $emailContent .= '<tr><td style="height:20px"></td></tr>';
        $emailContent .= '';
        $emailContent .= '<br> Dengan ini kami menginfokan bahwa permohonan anda ditolak. ';
        $emailContent .= '<br> Diharapkan untuk cek pada website KPB LADA BABEL. ';
        // $emailContent .= '<br> Waktu : '.$this->convertDateTime2($data['tanggal_record']);
        $emailContent .= '<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
        $send['message'] = $emailContent;
      }
    } else if ($data['id_tahap_proposal'] == '4') {
      $send['to'] = $serv['bp3l']['username'] . ',' . $serv['bpsmb']['username'] . ',' . $serv['kpb']['username']; //kpb bp3l bpsmb
      if (!empty($data['email']))  $send['to'] .= ', ' . $data['email'];
      $send['subject'] = $subject = 'Pemberitahun Pengambilan Sampel';
      $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= '';
      $emailContent .= '<br> Dengan ini kami menginfokan bahwa untuk melakukan pengambilan sampel; ';
      $emailContent .= '<br> Tanggal : ' . $data['tgl_sampel'];
      $emailContent .= '<br> Alamat Gudang : ' . $data['nama_perusahaan'] . ', ' . $data['lok_gudang_penyimpanan_full'] . ', ' . $data['lok_gudang_penyimpanan_kec'] . ', ' . $data['lok_gudang_penyimpanan_kabkot'];
      if (!empty($data['catatan_bpsmb_mutu'])) $emailContent .= '<br>  ' . $data['catatan_bpsmb_mutu'];
      $emailContent .= '<br> ';
      $emailContent .= '<br> Diharapkan untuk cek pada website KPB LADA BABEL. ';
      // $emailContent .= '<br> Waktu : '.$this->convertDateTime2($data['tanggal_record']);
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
      $send['message'] = $emailContent;

      if ($data['status_bpsmb_mutu'] == 'DITOLAK') {
        $send['to'] = $data['email']; //PERUSAHAAN
        $send['subject'] = $subject = 'Pemberitahun Permohonan Ditolak';
        $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
        $emailContent .= '<tr><td style="height:20px"></td></tr>';
        $emailContent .= '';
        $emailContent .= '<br> Dengan ini kami menginfokan bahwa permohonan anda ditolak. ';
        $emailContent .= '<br> Diharapkan untuk cek pada website KPB LADA BABEL. ';
        // $emailContent .= '<br> Waktu : '.$this->convertDateTime2($data['tanggal_record']);
        $emailContent .= '<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
        $send['message'] = $emailContent;
      }
    } else if ($data['id_tahap_proposal'] == '5') {
      $send['to'] = 'bp3l.babel.indonesia@gmail.com'; //BP3L

      $send['subject'] = $subject = 'Pemberitahun Hasil Uji Mutu';
      $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= '';
      $emailContent .= '<br> Dengan ini kami menginfokan bahwa ada hasil uji mutu dari BPSMB yang sudah keluar. ';
      $emailContent .= '<br> Diharapkan untuk cek pada website KPB LADA BABEL. ';
      // $emailContent .= '<br> Waktu : '.$this->convertDateTime2($data['tanggal_record']);
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
      $send['message'] = $emailContent;
    } else if ($data['id_tahap_proposal'] == '6') {
      $send['to'] = 'kpb.ladababel@gmail.com'; //KPB

      $send['subject'] = $subject = 'Pemberitahun Hasil Uji Mutu dan Sertifikat IG';
      $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= '';
      $emailContent .= '<br> Dengan ini kami menginfokan bahwa ada hasil uji mutu dan sertifikat IG yang sudah keluar. ';
      $emailContent .= '<br> Diharapkan untuk cek pada website KPB LADA BABEL. ';
      // $emailContent .= '<br> Waktu : '.$this->convertDateTime2($data['tanggal_record']);
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
      $send['message'] = $emailContent;
    } else if ($data['id_tahap_proposal'] == '99') {
      $send['to'] = $data['email']; //PERUSAHAAN

      $send['subject'] = $subject = 'Pemberitahun KPB LADA BABEL';
      $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= '';
      $emailContent .= '<br> Dengan ini kami menginfokan bahwa hasil uji mutu dan sertifikat IG anda sudah keluar. ';
      $emailContent .= '<br> Diharapkan untuk cek pada website KPB LADA BABEL. ';
      // $emailContent .= '<br> Waktu : '.$this->convertDateTime2($data['tanggal_record']);
      $emailContent .= '<tr><td style="height:20px"></td></tr>';
      $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
      $send['message'] = $emailContent;
    }




    $config['protocol']    = 'smtp';
    $config['smtp_host']    = $serv['stmp_mail']['url_'];
    $config['smtp_port']    = '587';
    $config['smtp_timeout'] = '60';
    $config['smtp_user']    = $serv['stmp_mail']['username'];    //Important
    $config['smtp_pass']    = $serv['stmp_mail']['key'];  //Important
    $config['charset']    = 'utf-8';
    $config['newline']    = '\r\n';
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not 
    $send['config'] = $config;

    $this->email->initialize($send['config']);
    $this->email->set_mailtype("html");
    $this->email->from($serv['stmp_mail']['username']);
    $this->email->to($send['to']);
    $this->email->subject($send['subject']);
    $this->email->message($send['message']);
    $this->email->send();
    // echo $this->email->print_debugger();
    return $send;
  }
}
