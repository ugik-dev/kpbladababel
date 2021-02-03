<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;

class FormatDokumenController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array("PerusahaanModel", "DokumenPerusahaanModel", "PengirimanModel", "PengirimanItemModel"));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = FALSE;
  }

  public function pdf_profile_perusahaan()
  {
    $this->SecurityModel->userOnlyGuard(TRUE);

    $filter = $this->input->get();

    $filter['status_proposal'] = 'DITERIMA';
    $data = $this->PerusahaanModel->get($filter['id_perusahaan']);
    $dok = $this->DokumenPerusahaanModel->getAll($filter);
    $pengiriman = $this->PengirimanModel->getAll($filter);
    // var_dump($data);
    // var_dump($dok);
    // var_dump($pengiriman);
    require('assets/fpdf/fpdf.php');

    $pdf = new FPDF('P', 'mm', 'A4');

    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(195, 7, 'DATA PERUSAHAAN', 0, 1, 'C');
    $pdf->Cell(10, 7, ' ', 0, 1);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(10, 10, ' ', 0, 1);
    // $pdf->Cell(250,7,'Pangkalpinang, '.$tmpdate[1].' '.getBulan($tmpdate[2]).' '.$tmpdate[3],0,1,'C'); 
    // $pdf->Cell(250,3,'Approval',0,1,'C'); 
    // $pdf->Cell(250,50,'(                                               )',0,1,'C');
    // // Setting spasi kebawah supaya tidak rapat
    // $pdf->Cell(50,7,'ID Perusahaan',0,0);
    // $pdf->Cell(50,7,': '.$data['id_perusahaan'],0,1);
    // $pdf->Cell(50, 7, 'Nama Perusahaan', 0, 0);
    // $pdf->Cell(50, 7, ': ' . ($data['nama_perusahaan'] ? $data['nama_perusahaan'] : '-'), 0, 1);
    // $pdf->Cell(50, 7, 'Nama Pimpinan', 0, 0);
    // $pdf->Cell(50, 7, ': ' . ($data['nama_pimpinan'] ? $data['nama_pimpinan'] : '-'), 0, 1);
    // $pdf->Cell(50, 7, 'Jenis Perusahaan', 0, 0);
    // $pdf->Cell(50, 7, ': ' . ($data['nama_jenis_perusahaan'] ? $data['nama_jenis_perusahaan'] : '-'), 0, 1);
    // $pdf->Cell(50, 7, 'No Telepon', 0, 0);
    // $pdf->Cell(50, 7, ': ' . ($data['no_telepon'] ? $data['no_telepon'] : '-'), 0, 1);
    // $pdf->Cell(50, 7, 'Email', 0, 0);
    // $pdf->Cell(50, 7, ': ' . ($data['email'] ? $data['email'] : '-'), 0, 1);
    // $pdf->Cell(50, 7, 'Lokasi Perusahaan', 0, 0);
    // $pdf->MultiCell(
    //   100,
    //   7,
    //   ': ' . ($data['lok_perusahaan_full'] ? $data['lok_perusahaan_full'] : '-') .
    //     ($data['lok_perusahaan_kec'] ? ', ' . $data['lok_perusahaan_kec'] : '-') .
    //     ($data['lok_perusahaan_kabkot'] ? ', ' . $data['lok_perusahaan_kabkot'] : '-'),
    //   0,
    //   1
    // );
    // $pdf->Cell(50, 7, 'Lokasi Unit', 0, 0);
    // $pdf->MultiCell(
    //   100,
    //   7,
    //   ': ' . ($data['lok_unit_pengelolaan_full'] ? $data['lok_unit_pengelolaan_full'] : '-') .
    //     ($data['lok_unit_pengelolaan_kec'] ? ', ' . $data['lok_unit_pengelolaan_kec'] : '-') .
    //     ($data['lok_unit_pengelolaan_kabkot'] ? ', ' . $data['lok_unit_pengelolaan_kabkot'] : '-'),
    //   0,
    //   1
    // );
    // $pdf->Cell(50, 7, 'Lokasi Gudang', 0, 0);
    // $pdf->MultiCell(
    //   100,
    //   7,
    //   ': ' . ($data['lok_gudang_penyimpanan_full'] ? $data['lok_gudang_penyimpanan_full'] : '-') .
    //     ($data['lok_gudang_penyimpanan_kec'] ? ', ' . $data['lok_gudang_penyimpanan_kec'] : '-') .
    //     ($data['lok_gudang_penyimpanan_kabkot'] ? ', ' . $data['lok_gudang_penyimpanan_kabkot'] : '-'),
    //   0,
    //   1
    // );
    // $pdf->Cell(50, 7, 'Dokumen', 0, 0);
    // $tmp = ':';

    // $itmp = ' ';
    // foreach ($dok as $key => $value) {
    //   $tmp = $tmp . $itmp . $value['nama_jenis_dokumen_perusahaan'];
    //   $itmp = ', ';
    // }
    // $pdf->Cell(50, 7, $tmp, 0, 1);

    // foreach ($dok as $key => $value) {
    //   $pdf->Cell(50, 7, '  NO ' . $value['nama_jenis_dokumen_perusahaan'], 0, 0);
    //   $pdf->Cell(50, 7, ': ' . ($value['no_dokumen_perusahaan'] ? $value['no_dokumen_perusahaan'] : '-'), 0, 1);
    // }
    // $pdf->Cell(50, 7, ' ', 0, 1);
    // $pdf->Cell(50, 7, 'Jumlah Pengiriman', 0, 0);
    // $i = 0;
    // foreach ($pengiriman as $key => $value) {
    //   $i++;
    // }
    // $pdf->Cell(50, 7, ': ' . $i . 'x', 0, 1);
    // foreach ($pengiriman as $key => $value) {
    //   $pdf->Cell(50, 7, 'Tanggal Pengusulan ', 0, 0);
    //   $pdf->Cell(50, 7, ': ' . ($value['created_at'] ? $value['created_at'] : '-'), 0, 1);
    //   $pdf->Cell(50, 7, '    Item ', 0, 0);
    //   $pdf->MultiCell(130, 7, ': ' . ($value['item_v2'] ? $value['item_v2'] : '-'), 0, 1);
    // }

    // $pdf->SetFont('Arial', '', 10);

    $filename = 'Informasi Perusahaan_' . ($data['nama_perusahaan'] ? $data['nama_perusahaan'] : 'NONAME') . '_ID' . $data['id_perusahaan'];
    $pdf->Output('', $filename, false);
  }

  public function pdf_pengiriman()
  {
    $this->SecurityModel->userOnlyGuard(TRUE);

    $input = $this->input->get();
    if (empty($input['id_pengiriman'])) throw new UserException("Parameter 'id_pengiriman' tidak ada", 0);

    $pengiriman = $this->PengirimanModel->get($input['id_pengiriman']);
    $pengirimanItem = $this->PengirimanItemModel->getAll(['id_pengiriman' => $input['id_pengiriman']]);
    $data = $this->PerusahaanModel->get($pengiriman['id_perusahaan']);
    $siup = array_values($this->DokumenPerusahaanModel->getAll(['id_perusahaan' => $pengiriman['id_perusahaan'], 'id_jenis_dokumen_perusahaan' => 2]));
    $no_siup = !empty($siup) ? $siup[0]['no_dokumen_perusahaan'] : NULL;
    $filename = 'Permohonan Kepada KPB_' . ($data['nama_perusahaan'] ? $data['nama_perusahaan'] : 'NONAME') . '_ID' . $data['id_perusahaan'] . $pengiriman['id_pengiriman'];

    // $filter['status_proposal'] = 'DITERIMA';
    // $data = $this->PerusahaanModel->get($filter['id_perusahaan']);
    $dok = $this->DokumenPerusahaanModel->getAll($data);
    // $pengiriman = $this->PengirimanModel->getAll($filter);
    // var_dump($data);
    // var_dump($dok);
    // var_dump($pengiriman);
    require('assets/fpdf/fpdf.php');

    $pdf = new FPDF('P', 'mm', 'A4');
    // $pdf->Cell(50,7,'Dokumen',0,0);
    // $tmp = ':';

    // $itmp = ' ';
    // foreach ($dok as $key => $value){
    //   $tmp = $tmp .$itmp . $value['nama_jenis_dokumen_perusahaan'];
    //   $itmp = ', ';  
    // }
    // $pdf->Cell(50,7,$tmp,0,1);

    // foreach ($dok as $key => $value){
    //   $pdf->Cell(50,7,'  NO '.$value['nama_jenis_dokumen_perusahaan'],0,0);
    //   $pdf->Cell(50,7,': '.($value['no_dokumen_perusahaan'] ? $value['no_dokumen_perusahaan'] : '-') ,0,1);
    // }
    // $pdf->Cell(50,7,' ',0,1);
    // $pdf->Cell(50,7,'Jumlah Pengiriman',0,0);
    // $i=0;
    // foreach ($pengiriman as $key => $value){
    //  $i++;
    // }
    // $pdf->Cell(50,7,': '.$i. 'x',0,1);
    // foreach ($pengiriman as $key => $value){
    //   $pdf->Cell(50,7,'Tanggal Pengusulan ',0,0);
    //   $pdf->Cell(50,7,': '.($value['created_at'] ? $value['created_at'] : '-') ,0,1);
    //   $pdf->Cell(50,7,'    Item ',0,0);
    //   $pdf->MultiCell(130,7,': '.($value['item_v2'] ? $value['item_v2'] : '-') ,0,1);
    // }

    $pdf->SetFont('Arial', '', 10);

    foreach ($pengirimanItem as $pi) {

      $pdf->AddPage();
      $pdf->SetFont('Arial', 'B', 14);
      $pdf->Cell(195, 7, 'DATA PENGIRIMAN', 0, 1, 'C');
      $pdf->Cell(10, 7, ' ', 0, 1);

      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(10, 10, ' ', 0, 1);
      $pdf->Cell(50, 7, 'Nama Perusahaan', 0, 0);
      $pdf->Cell(50, 7, ': ' . ($data['nama_perusahaan'] ? $data['nama_perusahaan'] : '-'), 0, 1);
      $pdf->Cell(50, 7, 'Nama Pimpinan', 0, 0);
      $pdf->Cell(50, 7, ': ' . ($data['nama_pimpinan'] ? $data['nama_pimpinan'] : '-'), 0, 1);
      $pdf->Cell(50, 7, 'Jenis Perusahaan', 0, 0);
      $pdf->Cell(50, 7, ': ' . ($data['nama_jenis_perusahaan'] ? $data['nama_jenis_perusahaan'] : '-'), 0, 1);
      $pdf->Cell(50, 7, 'Dokumen', 0, 0);
      $pdf->Cell(3, 7, ':', 0, 0);
      $tmp = '';
      foreach ($dok as $key => $value) {
        $tmp = $tmp . $value['nama_jenis_dokumen_perusahaan'] . ' : ' . $value['no_dokumen_perusahaan'] . "\n";
      }
      $tmp = substr($tmp, 0, -2);
      $pdf->MultiCell(100, 7, $tmp, 0, 1);
      $pdf->Cell(50, 7, 'No Telepon', 0, 0);
      $pdf->Cell(50, 7, ': ' . ($data['no_telepon'] ? $data['no_telepon'] : '-'), 0, 1);
      $pdf->Cell(50, 7, 'Email', 0, 0);
      $pdf->Cell(50, 7, ': ' . ($data['email'] ? $data['email'] : '-'), 0, 1);
      $pdf->Cell(50, 7, 'Lokasi Perusahaan', 0, 0);
      $pdf->Cell(3, 7, ':', 0, 0);
      $pdf->MultiCell(
        120,
        7,
        ($data['lok_perusahaan_full'] ? $data['lok_perusahaan_full'] : '-') .
          ($data['lok_perusahaan_kec'] ? ', ' . $data['lok_perusahaan_kec'] : '-') .
          ($data['lok_perusahaan_kabkot'] ? ', ' . $data['lok_perusahaan_kabkot'] : '-'),
        0,
        1
      );
      $pdf->Cell(50, 7, 'Lokasi Unit', 0, 0);
      $pdf->Cell(3, 7, ':', 0, 0);
      $pdf->MultiCell(
        120,
        7,
        ($data['lok_unit_pengelolaan_full'] ? $data['lok_unit_pengelolaan_full'] : '-') .
          ($data['lok_unit_pengelolaan_kec'] ? ', ' . $data['lok_unit_pengelolaan_kec'] : '-') .
          ($data['lok_unit_pengelolaan_kabkot'] ? ', ' . $data['lok_unit_pengelolaan_kabkot'] : '-'),
        0,
        1
      );
      $pdf->Cell(50, 7, 'Lokasi Gudang', 0, 0);
      $pdf->Cell(3, 7, ':', 0, 0);
      $pdf->MultiCell(
        120,
        7,
        ($data['lok_gudang_penyimpanan_full'] ? $data['lok_gudang_penyimpanan_full'] : '-') .
          ($data['lok_gudang_penyimpanan_kec'] ? ', ' . $data['lok_gudang_penyimpanan_kec'] : '-') .
          ($data['lok_gudang_penyimpanan_kabkot'] ? ', ' . $data['lok_gudang_penyimpanan_kabkot'] : '-'),
        0,
        1
      );
      $negara_tujuan = "{$pi['city']} - {$pi['nama_negara']}, ";
      $berat = "{$pi['netto']} KG ";
      $berat_gross = "{$pi['gross']} KG ";
      $nama_jenis_mutu = "{$pi['nama_jenis_mutu']} ";
      $berat_total = $pi['netto'];
      $berat_total_gross = $pi['gross'];
      // $jenis_pengemasan = "{$pi['nama_jenis_pengemasan']} ";
      $jumlah_karung = "{$pi['jumlah_pengemasan']} Bags";

      $nama_importir = "{$pi['nama_importir']}";
      if (!empty($pi['keterangan_marking'])) {
        $keterangan_marking = "{$pi['keterangan_marking']}, ";
      } else {
        $keterangan_marking = "-";
      }
      $shipping_mark = $pi['shipping_mark'];

      // if(!empty($pi['shipping_mark'])){
      //   $resultshipping_mark = str_replace(array("\n"),"<w:br/>",$pi['shipping_mark']);
      //   $shipping_mark .= "{$resultshipping_mark}, <w:br/>";
      // }else{
      //   // $keterangan_marking .= " ";
      // } 
      // $nomor_kontrak .= "{$pi['nomor_kontrak']}, ";

      $pdf->Cell(50, 7, 'Rencana Mutu', 0, 0);
      $pdf->Cell(100, 7, ': ' . $nama_jenis_mutu, 0, 1);

      $pdf->Cell(50, 7, 'Jumlah Berat', 0, 0);
      $pdf->Cell(100, 7, ': ' . ($pi['netto'] / 1000) . ' M. Tons.', 0, 1);

      $pdf->Cell(50, 7, 'Jumlah Partai', 0, 0);
      $pdf->Cell(100, 7, ': ' . $pengiriman['jumlah_partai'] . ' Partai', 0, 1);

      $pdf->Cell(50, 7, 'Nama Importir', 0, 0);
      $pdf->MultiCell(130, 7, ': ' . $nama_importir, 0, 1);

      $pdf->Cell(50, 7, 'Jenis Kemasan', 0, 0);
      $pdf->Cell(100, 7, ': ' . $pi['nama_jenis_pengemasan'], 0, 1);

      $pdf->Cell(50, 7, 'Rencana Pengapalan', 0, 0);
      $pdf->Cell(100, 7, ': ' . $pengiriman['rencana_pengapalan'], 0, 1);

      $pdf->Cell(50, 7, 'Shipping Mark', 0, 0);
      $pdf->Cell(3, 7, ':', 0, 0);
      $pdf->MultiCell(130, 7, $shipping_mark, 0, 1);


      $pdf->Cell(50, 7, 'Keterangan Marking', 0, 0);
      $pdf->Cell(3, 7, ':', 0, 0);
      $pdf->MultiCell(130, 7, $pi['keterangan_marking'], 0, 1);

      $pdf->Cell(50, 7, 'Nomor Kontrak', 0, 0);
      $pdf->Cell(100, 7, ': ' . $pi['nomor_kontrak'], 0, 1);

      $pdf->Cell(50, 7, 'Tujuan', 0, 0);
      $pdf->Cell(100, 7, ': ' . $negara_tujuan, 0, 1);

      $pdf->Cell(50, 7, 'Jumlah Karung', 0, 0);
      $pdf->Cell(100, 7, ': ' . $jumlah_karung, 0, 1);

      $pdf->Cell(50, 7, 'Netto', 0, 0);
      $pdf->Cell(3, 7, ':', 0, 0);
      $pdf->MultiCell(100, 7, $berat_total . " Kg \n" . $berat_total_gross . ' Kg', 0, 1);
    }

    $filename = 'Ringkasan Pengiriman_' . ($data['nama_perusahaan'] ? $data['nama_perusahaan'] : 'NONAME') . '_ID' . $data['id_perusahaan'];
    $pdf->Output('', $filename, false);
  }

  public function format_permohonan_pergub()
  {
    // try {
    $this->SecurityModel->userOnlyGuard(TRUE);

    $input = $this->input->get();
    if (empty($input['id_pengiriman'])) throw new UserException("Parameter 'id_pengiriman' tidak ada", 0);

    $pengiriman = $this->PengirimanModel->get($input['id_pengiriman']);
    $pengirimanItem = $this->PengirimanItemModel->getAll(['id_pengiriman' => $input['id_pengiriman']]);
    $perusahaan = $this->PerusahaanModel->get($pengiriman['id_perusahaan']);
    $siup = $this->DokumenPerusahaanModel->getAll(['id_perusahaan' => $pengiriman['id_perusahaan'], 'clue' => 'siup']);
    $no_siup = !empty($siup) ? $siup['no_dokumen_perusahaan'] : NULL;
    $nib = $this->DokumenPerusahaanModel->getAll(['id_perusahaan' => $pengiriman['id_perusahaan'], 'clue' => 'nib']);
    $no_nib = !empty($nib) ? $nib['no_dokumen_perusahaan'] : NULL;
    $logo = $this->DokumenPerusahaanModel->getAll(['id_perusahaan' => $pengiriman['id_perusahaan'], 'clue' => 'logo']);
    $logo_img = !empty($logo) ? $logo['dokumen_perusahaan'] : NULL;
    $filename = 'Surat_Permohonan_IDX_' . $input['id_pengiriman'];

    // echo json_encode($logo_img);
    // echo json_encode($no_nib);
    // echo json_encode($siup);
    // echo json_encode($pengiriman);
    // echo json_encode($pengirimanItem);
    // echo json_encode($perusahaan);

    // return 0;
    // var_dump($pengirimanItem);
    // $pengiriman = 'nama pengirim';
    // $pengirimanItem = 'nama pengirim';
    // $perusahaan = 'nama pengirim';
    // $siup = 'nama pengirim';
    // $no_siup = 'nama pengirim';


    $phpWord = new PhpOffice\PhpWord\PhpWord();
    $phpWord->addFontStyle('h3', array('name' => 'Times New Roman', 'size' => 10, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph', array('name' => 'Times New Roman', 'size' => 10, 'color' => '000000', 'spaceAfter' => 0));
    // $PHPWord->addParagraphStyle('p3Style', array('align'=>'center', 'spaceAfter'=>100));
    $phpWord->addFontStyle('paragraph_bold', array('name' => 'Times New Roman', 'size' => 10, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph2', array('name' => 'Times New Roman', 'size' => 9, 'color' => '000000', 'underline' => 'single'));
    $phpWord->addFontStyle('paragraph3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true, 'underline' => 'single'));
    $phpWord->addFontStyle('paragraph4', array('name' => 'Times New Roman', 'size' => 13, 'color' => '000000', 'bold' => true, 'underline' => 'single'));
    $noSpace = array('spaceAfter' => 0);

    $paragraphStyleName = 'pStyle';
    $phpWord->addParagraphStyle($paragraphStyleName, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));
    $phpWord->addParagraphStyle('pS2', array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 50));

    $section = $phpWord->addSection(array(
      'marginLeft' => 1200, 'marginRight' => 600,
      'marginTop' => 600, 'marginBottom' => 600
    ));
    if (!empty($logo_img)) {
      $fancyTableStyle = array('borderSize' => 1, 'borderColor' => '000000', 'height' => 200, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));

      $fancyTableStyle = array('lineStyle' => 'no border', 'borderColor' => 'no border', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $spanTableStyleName = 'Colspan Rowspan';
      $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
      $table = $section->addTable($spanTableStyleName, array('spaceAfter' => 0));
      $table->addRow();
      $table->addCell(2000, $cellVCentered)->addImage(base_url('uploads/dokumen_perusahaan/') . $logo_img, array('height' => 75, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,  'spaceAfter' => 0));;
      $myCell1 = $table->addCell(7400, $cellVCentered);
      $myCell1->addText($perusahaan['nama_perusahaan'], array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000', 'bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 10));
      $myCell1->addText($perusahaan['lok_perusahaan_full'] . ', ' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot'], array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $myCell1->addText('Provinsi Kepulauan Bangka Belitung', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $myCell1->addText('Email : ' . $perusahaan['email'] . ' Telp : ' . $perusahaan['no_telepon'], array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $section->addLine(array('weight' => 1.25, 'width' => 465, 'height' => 0, 'color' => '38c172'), array('spaceAfter' => 0));
    } else {
      $section->addText('KOP SURAT', "paragraph3", $paragraphStyleName);
      $textrun = $section->addTextRun();
      $textrun->addTextBreak();
    }
    if (file_exists('./assets/qrcode/' . $pengiriman['id_pengiriman'] . '.png')) {
      // $pdf->Image(base_url('assets/qrcode/'.$data['id_record'].'.png'), 170, 160, -300);
      $section->addImage(base_url('assets/qrcode/' . $pengiriman['id_pengiriman'] . '.png'), array(
        'height'           => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(2.4)),
        'positioning'      => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
        'posHorizontal' => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
        'posVertical' => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
        'marginLeft'       => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(9)),
        'marginTop'        => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(15)),
      ));
    }


    // $textrun->addTextBreak();
    // $textrun->addTextBreak();
    $tanggal = CustomFunctions::tanggal_indonesia(date("Y-m-d"));
    $section->addText("\t\t\t\t\t\t\t\t\tPanngkalpinang, {$tanggal}", "paragraph", array('spaceBefore' => 0));

    $section = $phpWord->addSection(['breakType' => 'continuous', 'colsNum' => 2]);
    $textrun = $section->addTextRun();
    $year = explode("-", $pengiriman['created_at'])[0];
    $textrun->addText("Nomor\t  : \t" . $pengiriman['no_surat'], 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Lampiran : \t1 lembar", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addTextBreak();
    $textrun->addTextBreak();
    $textrun->addText("Perihal\t  : \tPengajuan Penggunaan IG dan", 'paragraph');
    $textrun->addText("\t\tUji Lab Lada ", 'paragraph');

    $textrun->addTextBreak();

    $textrun->addText("Yth.", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("          1.\t KPB Lada Prov. Kep. Bangka Belitung.", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("          2.\t BP3L Prov. Kep. Bangka Belitung.", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("          3.\t Lab BPSMB Prov. Kep. Bangka Belitung.", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("di -", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("\tTempat", 'paragraph');

    $section = $phpWord->addSection(['breakType' => 'continuous', 'colsNum' => 1]);


    $section->addText("Dengan hormat,", 'paragraph', array('spaceAfter' => 0));
    $section->addText("Sesuai dengan Peraturan Gubernur nomor 63 tahun 2019 dalam menyelenggarakan pemasaran lada putih penugasan BUMD PT BBBS sebagai dan Peraturan Gubernur nomor 19 tahun 2020 tentang tata kelolah perdagangan lada putih Muntok White Papper maka bersama ini kami mengajukan penggunaan IG dan Uji Laboratorium serta kami lampirkan rencana ekspor/Perdagangan lada antar Pulau dengan data sebagai berikut :", 'paragraph', 'pS2');
    $fancyTableStyle = array('lineStyle' => 'no border', 'borderColor' => 'no border', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $spanTableStyleName = 'Colspan Rowspan';
    $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
    $table = $section->addTable($spanTableStyleName);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Perusahaan', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['nama_perusahaan'], 'paragraph', $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Alamat Perusahaan', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_perusahaan_full'] . ' ,' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot'], 'paragraph', $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Alamat Gudang', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_gudang_penyimpanan_full'] . ' ,' . $perusahaan['lok_gudang_penyimpanan_kec'] . ' - ' . $perusahaan['lok_gudang_penyimpanan_kabkot'], 'paragraph', $noSpace);


    // $table->addRow();
    // $table->addCell(4000, $cellVCentered)->addText('Nomor SIUP Perusahaan', 'paragraph', $noSpace);
    // $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    // $table->addCell(5000, $cellVCentered)->addText($no_siup, 'paragraph', $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nomor Induk Berusaha (NIB)', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($no_nib, 'paragraph', $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Komoditi', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_komoditi'], 'paragraph', $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Berat', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['jumlah_berat'] . ' Metric Ton', 'paragraph', $noSpace);


    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Partai', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['jumlah_partai'], 'paragraph', $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Pengiriman', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_pengiriman'], 'paragraph', $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Rencana Pengapalan', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['rencana_pengapalan'], 'paragraph', $noSpace);

    $negara_tujuan = '';
    $berat = '';
    $berat_gross = '';
    $berat_total = 0;
    $berat_total_gross = 0;
    $berat_karung = '';
    $berat_gross_karung = '';
    $berat_total_karung = 0;
    $berat_total_gross_karung = 0;
    $jenis_pengemasan = '';
    $jumlah_karung = '';
    $shipping_mark = '';
    $pod = '';
    $poo = '';
    $nama_jenis_mutu = '';
    $nama_importir = '';
    $nama_buyer = '';
    $alamat_buyer = '';
    $keterangan_marking = '';
    $nomor_kontrak = '';
    $i = 1;
    $j = 0;
    $antar_pulau = false;
    $xantar_pulau = false;
    $ar_nama_importir = [];
    foreach ($pengirimanItem as $pi) {
      if ($pi['id_negara'] == 'ID') {
        $antar_pulau = true;
      }

      if ($pi['id_negara'] != 'ID') {
        $xantar_pulau = true;
      }

      $pod .= "{$i}) {$pi['port_of_destination']} , <w:br/>";;
      $poo .= "{$i}) {$pi['nama_port_of_origin']} , <w:br/>";;
      $nama_buyer .= "{$i}) {$pi['nama_buyer']} , <w:br/>";;
      $alamat_buyer .= "{$i}) {$pi['alamat_buyer']} , <w:br/>";;
      $negara_tujuan .= "{$i}) {$pi['city']} - {$pi['nama_negara']}, <w:br/>";
      $berat .= "{$i}) {$pi['netto']} KG + ";
      $berat_gross .= "{$i}) {$pi['gross']} KG + ";
      $berat_karung .= "{$i}) {$pi['netto_karung']} KG + ";
      $berat_gross_karung .= "{$i}) {$pi['gross_karung']} KG + ";
      $nama_jenis_mutu .= "{$i}) {$pi['nama_jenis_mutu']}, ";
      $berat_total += $pi['netto'];
      $berat_total_gross += $pi['gross'];
      $jenis_pengemasan .= "{$i}) {$pi['nama_jenis_pengemasan']}, ";
      $jumlah_karung .= "{$i}) {$pi['jumlah_pengemasan']} {$pi['nama_jenis_pengemasan']}, ";
      // $ar_nama_importir[$j] = $pi['nama_importir'];
      $nama_importir .= "{$i}) " . htmlspecialchars($pi['nama_importir']) . ", <w:br/>";
      if (!empty($pi['keterangan_marking'])) {
        $keterangan_marking .= "{$i}) {$pi['keterangan_marking']}, <w:br/>";
      } else {
        $keterangan_marking .= "- , ";
      }

      $nomor_kontrak .= "{$i}) {$pi['nomor_kontrak']}, ";
      $i++;
      $j++;
    }
    $poo = substr($poo, 0, -9);
    $pod = substr($pod, 0, -9);
    $alamat_buyer = substr($alamat_buyer, 0, -9);
    $nama_buyer = substr($nama_buyer, 0, -9);
    $negara_tujuan = substr($negara_tujuan, 0, -9);
    $keterangan_marking = substr($keterangan_marking, 0, -9);
    $nomor_kontrak = substr($nomor_kontrak, 0, -2);
    $berat = substr($berat, 0, -3);
    $berat_gross = substr($berat_gross, 0, -3);
    $berat_karung = substr($berat_karung, 0, -3);
    $berat_gross_karung = substr($berat_gross_karung, 0, -3);
    $nama_jenis_mutu = substr($nama_jenis_mutu, 0, -2);
    $shipping_mark = substr($shipping_mark, 0, -9);
    $nama_importir = substr($nama_importir, 0, -9);
    $jenis_pengemasan = substr($jenis_pengemasan, 0, -2);
    $jumlah_karung = substr($jumlah_karung, 0, -2);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Negara Tujuan', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($negara_tujuan, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Pelabuhan Tujuan', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pod, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Pelabuhan Muat', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($poo, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Buyer', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nama_buyer, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Alamat Buyer', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($alamat_buyer, 'paragraph', $noSpace);
    if ($antar_pulau == true) {
      // $antar_pulau = true;
    }

    if ($xantar_pulau == true) {
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nama Importir', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($nama_importir, 'paragraph', $noSpace);
    }

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Keterangan Marking', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($keterangan_marking, 'paragraph', $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nomor Kontrak', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nomor_kontrak, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Rencana Mutu', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nama_jenis_mutu, 'paragraph', $noSpace);
    // $table->addRow();
    // $table->addCell(4000, $cellVCentered)->addText('Netto Karung', 'paragraph', $noSpace);
    // $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    // $table->addCell(5000, $cellVCentered)->addText($berat_karung, 'paragraph', $noSpace);
    // $table->addRow();
    // $table->addCell(4000, $cellVCentered)->addText('Gross Karung', 'paragraph', $noSpace);
    // $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    // $table->addCell(5000, $cellVCentered)->addText($berat_gross_karung, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jenis Pengemasan', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($jenis_pengemasan, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Karung', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($jumlah_karung, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Netto', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($berat, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Gross', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($berat_gross, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Shipping Mark', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText("TERLAMPIR", 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Keterangan Penggunaan Produk', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText("TERLAMPIR", 'paragraph', $noSpace);
    $textrun = $section->addTextRun();
    $textrun->addText("Demikian permohonan kami, atas bantuan dan kerjasamanya kami ucapkan terima kasih.", 'paragraph');
    $textrun->addTextBreak();

    $textrun = $section->addTextRun();
    $textrun->addText("Hormat Kami,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText($perusahaan['nama_perusahaan'], 'paragraph');
    $textrun->addTextBreak(4);
    $textrun->addText($perusahaan['nama_pimpinan'], 'paragraph');
    $textrun->addTextBreak();

    $section = $phpWord->addSection(array(
      'marginLeft' => 1200, 'marginRight' => 600,
      'marginTop' => 600, 'marginBottom' => 600
    ));
    $textrun = $section->addTextRun();
    $section->addText("Lampiran surat permohonan No. \t\t\t\t\t\t\tPanngkalpinang, {$tanggal}", "paragraph2");
    $textrun = $section->addTextRun();
    if (file_exists('./assets/qrcode/' . $pengiriman['id_pengiriman'] . '.png')) {
      // $pdf->Image(base_url('assets/qrcode/'.$data['id_record'].'.png'), 170, 160, -300);
      $section->addImage(base_url('assets/qrcode/' . $pengiriman['id_pengiriman'] . '.png'), array(
        'height'           => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(2.4)),
        'positioning'      => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
        'posHorizontal' => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
        'posVertical' => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
        'marginLeft'       => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(10)),
        'marginTop'        => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(14)),
      ));
    }
    $section->addText('SHIPPING MARK', "paragraph3", $paragraphStyleName);
    $textrun = $section->addTextRun();
    $i = 1;
    foreach ($pengirimanItem as $pi) {
      $textrun = $section->addTextRun();
      $textrun->addText("({$i})", 'paragraph');
      $textrun->addTextBreak();
      $resultshipping_mark = str_replace(array("\n"), "<w:br/>", htmlspecialchars($pi['shipping_mark']));
      $ketresultshipping_mark = "<w:br/> Gross \t\t: " . $pi['gross_karung'];
      $ketresultshipping_mark .= "<w:br/> Net \t\t: " . $pi['netto_karung'];
      $ketresultshipping_mark .= "<w:br/> Destin \t\t: " . $pi['province'] . ' - ' . $pi['nama_negara'];
      $ketresultshipping_mark .= "<w:br/> Gross \t\t: " . $pi['gross'];
      $ketresultshipping_mark .= "<w:br/> Net \t\t: " . $pi['netto'];
      $ketresultshipping_mark .= "<w:br/> Packing \t: " . $pi['jumlah_pengemasan'] . ' ' . $pi['nama_jenis_pengemasan'];

      // $shipping_mark = "{$resultshipping_mark}, <w:br/>";
      $textrun->addText("$resultshipping_mark", 'paragraph', $paragraphStyleName);
      $textrun->addText("$ketresultshipping_mark", 'paragraph');
      $i++;
    }
    $textrun = $section->addTextRun();

    $section->addText('KETERANGAN PENGGUNAAN PRODUK', "paragraph3", $paragraphStyleName);
    $textrun = $section->addTextRun();
    $i = 1;
    foreach ($pengirimanItem as $pi) {
      $textrun = $section->addTextRun();
      $textrun->addText("({$i})", 'paragraph');
      $textrun->addTextBreak();
      $resulket_produk = str_replace(array("\n"), "<w:br/>", htmlspecialchars($pi['keterangan_penggunaan_produk']));
      // $shipping_mark = "{$resultshipping_mark}, <w:br/>";
      $textrun->addText("$resulket_produk", 'paragraph');
      $i++;
    }


    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    // FileIO::headerDownloadDocx('Form Pengajuan Mutu - ' . $pengiriman['nama_pengiriman']);
    FileIO::headerDownloadDocx($filename);

    $objWriter->save("php://output");
    // } catch (Exception $e) {
    //   ExceptionHandler::handle($e);
    // }
  }

  public function format_permohonan_to_kpb()
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
    $filename = 'Permohonan Kepada KPB_' . ($perusahaan['nama_perusahaan'] ? $perusahaan['nama_perusahaan'] : 'NONAME') . '_ID' . $perusahaan['id_perusahaan'] . $pengiriman['id_pengiriman'];

    // var_dump($pengirimanItem);
    // $pengiriman = 'nama pengirim';
    // $pengirimanItem = 'nama pengirim';
    // $perusahaan = 'nama pengirim';
    // $siup = 'nama pengirim';
    // $no_siup = 'nama pengirim';


    $phpWord = new PhpOffice\PhpWord\PhpWord();
    $phpWord->addFontStyle('h3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000'));
    // $PHPWord->addParagraphStyle('p3Style', array('align'=>'center', 'spaceAfter'=>100));
    $phpWord->addFontStyle('paragraph_bold', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));

    $section = $phpWord->addSection(array(
      'marginLeft' => 1200, 'marginRight' => 600,
      'marginTop' => 600, 'marginBottom' => 600
    ));
    // $section->addImage(base_url('assets/img/head_bp3l.png'),array('height' => 70, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

    $tanggal = CustomFunctions::tanggal_indonesia(date("Y-m-d"));
    $section->addText("Panngkalpinang, {$tanggal}", "paragraph");

    $textrun = $section->addTextRun();
    $year = explode("-", $pengiriman['created_at'])[0];

    $textrun->addText("Lampiran\t: -", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Perihal\t\t: ", 'paragraph');
    $textrun->addText(" ", 'paragraph_bold');
    $textrun->addTextBreak();

    $textrun = $section->addTextRun();
    $textrun->addText("Kepada Yth,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Kepala Kantor Pemasaran Bersama (KPB)", 'paragraph_bold');
    $textrun->addTextBreak();
    $textrun->addText("Provinsi Kepulauan Bangka Belitung", 'paragraph_bold');
    $textrun->addTextBreak();
    $textrun->addText("Di", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("\t\tPangkalpinang", 'paragraph_bold');

    $textrun = $section->addTextRun();
    $textrun->addText("Dengan hormat,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Bersama ini kami dari perusahaan {$perusahaan['nama_perusahaan']} untuk melakukan pengajuan  dengan data sebagai berikut:", 'paragraph');
    $noSpace = array('spaceAfter' => 0);
    $fancyTableStyle = array('borderSize' => 1, 'borderColor' => '000000', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $spanTableStyleName = 'Colspan Rowspan';
    $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
    $table = $section->addTable($spanTableStyleName);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Perusahaan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['nama_perusahaan'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Alamat Perusahaan');
    $table->addCell(1, $cellVCentered)->addText(':');
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_perusahaan_full'] . ' ,' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot']);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Alamat Gudang', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_gudang_penyimpanan_full'] . ' ,' . $perusahaan['lok_gudang_penyimpanan_kec'] . ' - ' . $perusahaan['lok_gudang_penyimpanan_kabkot'], array(), $noSpace);


    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nomor SIUP Perusahaan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($no_siup, array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Komoditi', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_komoditi'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Berat', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['jumlah_berat'] . ' Metric Ton', array(), $noSpace);


    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Partai', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['jumlah_partai'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Pengiriman', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_pengiriman'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Rencana Pengapalan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['rencana_pengapalan'], array(), $noSpace);

    $negara_tujuan = '';
    $berat = '';
    $berat_gross = '';
    $berat_total = 0;
    $berat_total_gross = 0;
    $jenis_pengemasan = '';
    $jumlah_karung = '';
    $shipping_mark = '';
    $nama_jenis_pengemasan = '';
    $nama_jenis_mutu = '';
    $nama_importir = '';
    $keterangan_marking = '';
    $nomor_kontrak = '';
    $i = 1;
    foreach ($pengirimanItem as $pi) {

      $negara_tujuan .= "{$i}) {$pi['city']} - {$pi['nama_negara']}, <w:br/>";
      $berat .= "{$i}) {$pi['netto']} KG + ";
      $berat_gross .= "{$i}) {$pi['gross']} KG + ";
      $nama_jenis_mutu .= "{$i}) {$pi['nama_jenis_mutu']}, ";
      $berat_total += $pi['netto'];
      $berat_total_gross += $pi['gross'];
      $jenis_pengemasan .= "{$i}) {$pi['nama_jenis_pengemasan']}, ";
      $jumlah_karung .= "{$i}) {$pi['jumlah_pengemasan']} {$pi['nama_jenis_pengemasan']}, ";

      $nama_importir .= "{$i}) {$pi['nama_importir']}, <w:br/>";
      if (!empty($pi['keterangan_marking'])) {
        $keterangan_marking .= "{$i}) {$pi['keterangan_marking']}, <w:br/>";
      } else {
        $keterangan_marking .= "- , ";
      }

      $nomor_kontrak .= "{$i}) {$pi['nomor_kontrak']}, ";
      $i++;
    }
    $negara_tujuan = substr($negara_tujuan, 0, -9);
    $keterangan_marking = substr($keterangan_marking, 0, -9);
    $nomor_kontrak = substr($nomor_kontrak, 0, -2);
    $berat = substr($berat, 0, -3);
    $berat_gross = substr($berat_gross, 0, -3);
    $nama_jenis_mutu = substr($nama_jenis_mutu, 0, -2);
    $shipping_mark = substr($shipping_mark, 0, -9);
    $nama_importir = substr($nama_importir, 0, -9);
    $jenis_pengemasan = substr($jenis_pengemasan, 0, -2);
    $jumlah_karung = substr($jumlah_karung, 0, -2);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Negara Tujuan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($negara_tujuan, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Importir', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nama_importir, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nomor Kontrak', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nomor_kontrak, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Keterangan Marking', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($keterangan_marking, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Rencana Mutu', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nama_jenis_mutu, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Netto', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    // $table->addCell(5000, $cellVCentered)->addText($berat_total .' KG ( '.$berat .' )', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($berat, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Gross', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($berat_gross, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jenis Pengemasan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($jenis_pengemasan, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Karung', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($jumlah_karung, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Shipping Mark', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    // $table->addCell(5000, $cellVCentered)->addText($shipping_mark, array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText("TERLAMPIR", array(), $noSpace);

    $textrun = $section->addTextRun();
    $textrun->addText("Demikianlah surat permohonan ini kami buat. Atas perhatian dan kerjasamanya kami ucapkan terima kasih.", 'paragraph');
    $textrun->addTextBreak();

    $textrun = $section->addTextRun();
    $textrun->addText("Hormat Kami,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("KETUA " . $perusahaan['nama_perusahaan'], 'paragraph');
    $textrun->addTextBreak(6);
    $textrun->addText($perusahaan['nama_pimpinan'], 'paragraph_bold');
    $textrun->addTextBreak();
    //  ================
    $section = $phpWord->addSection(array(
      'marginLeft' => 1200, 'marginRight' => 600,
      'marginTop' => 600, 'marginBottom' => 600
    ));
    $phpWord->addFontStyle('paragraph2', array('name' => 'Times New Roman', 'size' => 10, 'color' => '000000', 'underline' => 'single'));
    $phpWord->addFontStyle('paragraph3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true, 'underline' => 'single'));

    $textrun = $section->addTextRun();
    $section->addText("Lampiran surat permohonan No. \t\t\t\tPanngkalpinang, {$tanggal}", "paragraph2");
    $paragraphStyleName = 'pStyle';
    $phpWord->addParagraphStyle($paragraphStyleName, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));


    $textrun = $section->addTextRun();

    $section->addText('SHIPPING MARK', "paragraph3", $paragraphStyleName);
    $textrun = $section->addTextRun();
    $i = 1;
    foreach ($pengirimanItem as $pi) {
      $textrun = $section->addTextRun();
      $textrun->addText("({$i})");
      $textrun->addTextBreak();
      $resultshipping_mark = str_replace(array("\n"), "<w:br/>", $pi['shipping_mark']);
      // $shipping_mark = "{$resultshipping_mark}, <w:br/>";
      $textrun->addText("$resultshipping_mark");
      $i++;
    }
    $textrun = $section->addTextRun();


    //===

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    // FileIO::headerDownloadDocx('Form Pengajuan Mutu - ' . $pengiriman['nama_pengiriman']);
    FileIO::headerDownloadDocx($filename);

    $objWriter->save("php://output");
  }


  function tgl_indo()
  {
    $tanggal = date('Y-m-d');
    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
  }

  function tgl_eng()
  {
    $tanggal = date('Y-m-d');
    $bulan = array(
      1 =>   'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'July',
      'August',
      'September',
      'October',
      'November',
      'December'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
  }

  function getRomawi()
  {
    $bln = date('n');
    $year = date('Y');
    // $romawi = getRomawi($bulan);
    switch ($bln) {
      case 1:
        return "I/" . $year;
        break;
      case 2:
        return "II/" . $year;
        break;
      case 3:
        return "III/" . $year;
        break;
      case 4:
        return "IV/" . $year;
        break;
      case 5:
        return "V/" . $year;
        break;
      case 6:
        return "VI/" . $year;
        break;
      case 7:
        return "VII/" . $year;
        break;
      case 8:
        return "VIII/" . $year;
        break;
      case 9:
        return "IX/" . $year;
        break;
      case 10:
        return "X/" . $year;
        break;
      case 11:
        return "XI/" . $year;
        break;
      case 12:
        return "XII/" . $year;
        break;
    }
  }

  public function format_sk_transaksi()
  {
    // try {
    $this->SecurityModel->userOnlyGuard(TRUE);

    $input = $this->input->get();
    if (empty($input['id_pengiriman'])) throw new UserException("Parameter 'id_pengiriman' tidak ada", 0);

    $pengiriman = $this->PengirimanModel->get($input['id_pengiriman']);
    $pengirimanItem = $this->PengirimanItemModel->getAll(['id_pengiriman' => $input['id_pengiriman']]);
    $perusahaan = $this->PerusahaanModel->get($pengiriman['id_perusahaan']);
    $siup = $this->DokumenPerusahaanModel->getAll(['id_perusahaan' => $pengiriman['id_perusahaan'], 'clue' => 'terdaftar']);
    $npult = !empty($siup) ? $siup['no_dokumen_perusahaan'] : NULL;
    $nib = $this->DokumenPerusahaanModel->getAll(['id_perusahaan' => $pengiriman['id_perusahaan'], 'clue' => 'nib']);
    $no_nib = !empty($nib) ? $nib['no_dokumen_perusahaan'] : NULL;
    $logo = $this->DokumenPerusahaanModel->getAll(['id_perusahaan' => $pengiriman['id_perusahaan'], 'clue' => 'logo']);
    $logo_img = !empty($logo) ? $logo['dokumen_perusahaan'] : NULL;
    $filename = 'SKT_' . $perusahaan['nama_perusahaan'] . '_' . $input['id_pengiriman'];



    $phpWord = new PhpOffice\PhpWord\PhpWord();
    $phpWord->addFontStyle('h3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0));
    // $PHPWord->addParagraphStyle('p3Style', array('align'=>'center', 'spaceAfter'=>100));
    $phpWord->addFontStyle('paragraph_bold', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph2', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'underline' => 'single'));
    $phpWord->addFontStyle('paragraph3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true, 'underline' => 'single'));
    $phpWord->addFontStyle('paragraph4', array('name' => 'Times New Roman', 'size' => 13, 'color' => '000000', 'bold' => true, 'underline' => 'single'));
    $noSpace = array('spaceAfter' => 0);

    $paragraphStyleName = 'pStyle';
    $phpWord->addParagraphStyle($paragraphStyleName, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));
    $phpWord->addParagraphStyle('pS2', array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 50));

    foreach ($pengirimanItem as $pi) {

      $section = $phpWord->addSection(array(
        'marginLeft' => 1200, 'marginRight' => 600,
        'marginTop' => 600, 'marginBottom' => 600
      ));

      $fancyTableStyle = array('borderSize' => 1, 'borderColor' => '000000', 'height' => 200, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));

      $fancyTableStyle = array('lineStyle' => 'no border', 'borderColor' => 'no border', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $spanTableStyleName = 'Colspan Rowspan';
      $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
      $table = $section->addTable($spanTableStyleName, array('spaceAfter' => 0));
      $table->addRow();
      $table->addCell(1500, $cellVCentered)->addImage(base_url('assets/img/logo-kpb.png'), array('height' => 75, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,  'spaceAfter' => 0));;
      $myCell1 = $table->addCell(8800, $cellVCentered);
      $myCell1->addText('KANTOR PEMASARAN BERSAMA (KPB)-LADA', array('name' => 'Times New Roman', 'size' => 13, 'color' => '000000', 'bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 10));
      $myCell1->addText('PROVINSI KEPULAUAN BANGKA BELITUNG', array('name' => 'Times New Roman', 'size' => 13, 'color' => '000000', 'bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 10));

      // $myCell1->addText($perusahaan['lok_perusahaan_full'] . ', ' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot'], array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $myCell1->addText('Alamat : Jl. Pulau Bangka Kompleks Perkantoran Pemprov Babel, Ruko City Hall Blok I-10', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $myCell1->addText('Kota Pangkalpinang, Provinsi Kepulauan Bangka Belitung', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $myCell1->addText('Telp. 0717 9112195, Email : kpb.ladababel@gmail.com', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));

      $section->addLine(array('weight' => 1.25, 'width' => 500, 'height' => 0, 'color' => '38c172'), array('spaceAfter' => 0));

      //   if (file_exists('./assets/qrcode/' . $pengiriman['id_pengiriman'] . '.png')) {
      //   // $pdf->Image(base_url('assets/qrcode/'.$data['id_record'].'.png'), 170, 160, -300);
      //   $section->addImage(base_url('assets/qrcode/' . $pengiriman['id_pengiriman'] . '.png'), array(
      //     'height'           => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(2.4)),
      //     'positioning'      => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
      //     'posHorizontal' => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
      //     'posVertical' => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
      //     'marginLeft'       => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(9)),
      //     'marginTop'        => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(15)),
      //   ));
      // }


      // $textrun->addTextBreak();
      // $textrun->addTextBreak();

      $tanggal = CustomFunctions::tanggal_indonesia(date("Y-m-d"));
      // $section->addText("\t\t\t\t\t\t\t\t\tPanngkalpinang, {$tanggal}", "paragraph", array('spaceBefore' => 0));
      $section->addText('SURAT KETERANGAN TRANSAKSI PERDAGANGAN LADA', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false, 'underline' => 'single'), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $section->addText("Nomor : \t/SKT-MWP/BABEL/" . $this->getRomawi(), array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));

      // $section = $phpWord->addSection(['breakType' => 'continuous', 'colsNum' => 2]);
      $textrun = $section->addTextRun();
      $year = explode("-", $pengiriman['created_at'])[0];
      $section->addText("Berdasarkan Peraturan Gubernur nomor 19 tahun 2020 tentang Tata Kelolah Perdagangan Lada Putih Muntok White Papper, KPB Lada menyatakan keterangan transaksi perdagangan lada :", 'paragraph', 'pS2');
      $fancyTableStyle = array('lineStyle' => 'no border', 'borderColor' => 'no border', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $spanTableStyleName = 'Colspan Rowspan';
      $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
      $table = $section->addTable($spanTableStyleName);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nama Perusahaan', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($perusahaan['nama_perusahaan'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Alamat Perusahaan', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_perusahaan_full'] . ' ,' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nomor Pelaku Usaha Lada Terdaftar', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($npult, 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nomor Induk Berusaha (NIB)', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($no_nib, 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nama Komoditi', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_komoditi'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Kualitas', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['nama_hasil_mutu'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Pelabuhan Muatan', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['nama_port_of_origin'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Pelabuhan Tujuan', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['port_of_destination'], 'paragraph', $noSpace);



      // $table->addRow();
      // $table->addCell(4000, $cellVCentered)->addText('Jumlah Berat', 'paragraph', $noSpace);
      // $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      // $table->addCell(5000, $cellVCentered)->addText($pengiriman['jumlah_berat'] . ' Metric Ton', 'paragraph', $noSpace);


      // $table->addRow();
      // $table->addCell(4000, $cellVCentered)->addText('Jumlah Partai', 'paragraph', $noSpace);
      // $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      // $table->addCell(5000, $cellVCentered)->addText($pengiriman['jumlah_partai'], 'paragraph', $noSpace);

      $negara_tujuan = '';
      $berat = '';
      $berat_gross = '';
      $berat_total = 0;
      $berat_total_gross = 0;
      $berat_karung = '';
      $berat_gross_karung = '';
      $berat_total_karung = 0;
      $berat_total_gross_karung = 0;
      $jenis_pengemasan = '';
      $jumlah_karung = '';
      $shipping_mark = '';
      $ket_penggunaan = '';
      $nama_jenis_pengemasan = '';
      $nama_jenis_mutu = '';
      $nama_importir = '';
      $keterangan_marking = '';
      $nomor_kontrak = '';
      $i = 1;
      $j = 0;
      $ar_nama_importir = [];
      // foreach ($pengirimanItem as $pi) {

      $negara_tujuan = " {$pi['city']} - {$pi['nama_negara']}";
      $berat = "{$pi['netto']} KG  ";
      $berat_gross = "{$pi['gross']} KG  ";
      $berat_karung = "{$pi['netto_karung']} KG  ";
      $berat_gross_karung = "{$pi['gross_karung']} ";
      $nama_jenis_mutu = "{$pi['nama_jenis_mutu']} ";
      $berat_total += $pi['netto'];
      $berat_total_gross += $pi['gross'];
      $jenis_pengemasan .= "{$pi['nama_jenis_pengemasan']}";
      $jumlah_karung .= "{$pi['jumlah_pengemasan']} {$pi['nama_jenis_pengemasan']} ";
      // $ar_nama_importir[$j] = $pi['nama_importir'];
      $nama_importir = "" . htmlspecialchars($pi['nama_importir']);
      if (!empty($pi['keterangan_marking'])) {
        $keterangan_marking .= "{$pi['keterangan_marking']}";
      } else {
        $keterangan_marking .= "- ";
      }

      $nomor_kontrak .= "{$pi['nomor_kontrak']} ";
      $i++;
      // $js++;
      // }
      // $negara_tujuan = substr($negara_tujuan, 0, -9);
      // $keterangan_marking = substr($keterangan_marking, 0, -9);
      // $nomor_kontrak = substr($nomor_kontrak, 0, -2);
      // $berat = substr($berat, 0, -3);
      // $berat_gross = substr($berat_gross, 0, -3);
      // $berat_karung = substr($berat_karung, 0, -3);
      // $berat_gross_karung = substr($berat_gross_karung, 0, -3);
      // $nama_jenis_mutu = substr($nama_jenis_mutu, 0, -2);
      // $shipping_mark = substr($shipping_mark, 0, -9);
      // $nama_importir = substr($nama_importir, 0, -9);
      // $jenis_pengemasan = substr($jenis_pengemasan, 0, -2);
      // $jumlah_karung = substr($jumlah_karung, 0, -2);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Negara Tujuan', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($negara_tujuan, 'paragraph', $noSpace);

      if ($pi['id_negara'] == 'ID') {

        //untuk antar pulau
        $table->addRow();
        $table->addCell(4000, $cellVCentered)->addText('Nama Buyer', 'paragraph', $noSpace);
        $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
        $table->addCell(5000, $cellVCentered)->addText($pi['nama_buyer'], 'paragraph', $noSpace);

        $table->addRow();
        $table->addCell(4000, $cellVCentered)->addText('Alamat Buyer', 'paragraph', $noSpace);
        $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
        $table->addCell(5000, $cellVCentered)->addText($pi['alamat_buyer'], 'paragraph', $noSpace);
      } else {


        // untuk expor
        $table->addRow();
        $table->addCell(4000, $cellVCentered)->addText('Nama Importir', 'paragraph', $noSpace);
        $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
        $table->addCell(5000, $cellVCentered)->addText($nama_importir, 'paragraph', $noSpace);
      }



      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Keterangan Marking', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($keterangan_marking, 'paragraph', $noSpace);

      // $table->addRow();
      // $table->addCell(4000, $cellVCentered)->addText('Nomor Kontrak', 'paragraph', $noSpace);
      // $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      // $table->addCell(5000, $cellVCentered)->addText($nomor_kontrak, 'paragraph', $noSpace);
      // $table->addRow();
      // $table->addCell(4000, $cellVCentered)->addText('Rencana Mutu', 'paragraph', $noSpace);
      // $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      // $table->addCell(5000, $cellVCentered)->addText($nama_jenis_mutu, 'paragraph', $noSpace);
      // $table->addRow();
      // $table->addCell(4000, $cellVCentered)->addText('Netto Karung', 'paragraph', $noSpace);
      // $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      // $table->addCell(5000, $cellVCentered)->addText($berat_karung, 'paragraph', $noSpace);
      // $table->addRow();
      // $table->addCell(4000, $cellVCentered)->addText('Gross Karung', 'paragraph', $noSpace);
      // $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      // $table->addCell(5000, $cellVCentered)->addText($berat_gross_karung, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Jenis Pengemasan', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($jenis_pengemasan, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Jumlah Karung', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($jumlah_karung, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Netto', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($berat, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Gross', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($berat_gross, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Keterangan Penggunaan Produk', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['keterangan_penggunaan_produk'], 'paragraph', $noSpace);
      if ($pi['id_negara'] == 'ID') {

        //untuk antar pulau
        $table->addRow();
        $table->addCell(4000, $cellVCentered)->addText('No Manifest Domestic', 'paragraph', $noSpace);
        $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
        $table->addCell(5000, $cellVCentered)->addText($pi['no_manifest'], 'paragraph', $noSpace);
      }
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('No Sertifikat IG MWP', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['no_sertifikat_ig'], 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('No Sertifikat Uji Mutu (Sertificate of Confirmity)', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['no_hasil_mutu'], 'paragraph', $noSpace);
      $textrun = $section->addTextRun();
      $textrun->addTextBreak();
      $textrun->addText("Surat keterangan ini diberikan untuk menjelaskan perdagangan Lada Putih telah dilakukan sesuai peraturan dalam upaya menciptakan perdagangan lada yang baik.", 'paragraph');
      $textrun->addTextBreak();

      $textrun = $section->addTextRun();
      $textrun->addText("Pangkalpinang, " . $this->tgl_indo(), 'paragraph');

      $textrun->addTextBreak();
      $textrun->addText("KANTOR PEMASARAN BERSAMA,", array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0, 'bold' => true));

      $textrun->addTextBreak();
      $textrun->addText('General Manager', 'paragraph');
      $textrun->addTextBreak(5);
      $textrun->addText('Deki Susanto ST', 'paragraph');
      $textrun->addTextBreak();
    }

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    // FileIO::headerDownloadDocx('Form Pengajuan Mutu - ' . $pengiriman['nama_pengiriman']);
    FileIO::headerDownloadDocx($filename);

    $objWriter->save("php://output");
    // } catch (Exception $e) {
    //   ExceptionHandler::handle($e);
    // }
  }

  public function format_sk_transaksi_2()
  {
    // try {
    $this->SecurityModel->userOnlyGuard(TRUE);

    $input = $this->input->get();
    if (empty($input['id_pengiriman'])) throw new UserException("Parameter 'id_pengiriman' tidak ada", 0);

    $pengiriman = $this->PengirimanModel->get($input['id_pengiriman']);
    $pengirimanItem = $this->PengirimanItemModel->getAll(['id_pengiriman' => $input['id_pengiriman']]);
    $perusahaan = $this->PerusahaanModel->get($pengiriman['id_perusahaan']);
    $siup = $this->DokumenPerusahaanModel->getAll(['id_perusahaan' => $pengiriman['id_perusahaan'], 'clue' => 'terdaftar']);
    $npult = !empty($siup) ? $siup['no_dokumen_perusahaan'] : NULL;
    $nib = $this->DokumenPerusahaanModel->getAll(['id_perusahaan' => $pengiriman['id_perusahaan'], 'clue' => 'nib']);
    $no_nib = !empty($nib) ? $nib['no_dokumen_perusahaan'] : NULL;
    $logo = $this->DokumenPerusahaanModel->getAll(['id_perusahaan' => $pengiriman['id_perusahaan'], 'clue' => 'logo']);
    $logo_img = !empty($logo) ? $logo['dokumen_perusahaan'] : NULL;
    $filename = 'SKT_' . $perusahaan['nama_perusahaan'] . '_' . $input['id_pengiriman'];



    $phpWord = new PhpOffice\PhpWord\PhpWord();
    $phpWord->addFontStyle('h3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0));
    // $PHPWord->addParagraphStyle('p3Style', array('align'=>'center', 'spaceAfter'=>100));
    $phpWord->addFontStyle('paragraph_bold', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph_bold_c', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph2', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'underline' => 'single'));
    $phpWord->addFontStyle('paragraph3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true, 'underline' => 'single'));
    $phpWord->addFontStyle('paragraph4', array('name' => 'Times New Roman', 'size' => 13, 'color' => '000000', 'bold' => true, 'underline' => 'single'));
    $noSpace = array('spaceAfter' => 0);
    $noSpace_center = array('spaceAfter' => 0, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);

    $paragraphStyleName = 'pStyle';
    $phpWord->addParagraphStyle($paragraphStyleName, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));
    $phpWord->addParagraphStyle('pS2', array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH, 'spaceAfter' => 50));

    foreach ($pengirimanItem as $pi) {

      $section = $phpWord->addSection(array(
        'marginLeft' => 1200, 'marginRight' => 600,
        'marginTop' => 600, 'marginBottom' => 600
      ));

      $fancyTableStyle = array('borderSize' => 1, 'borderColor' => '000000', 'height' => 200, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));

      $fancyTableStyle = array('lineStyle' => 'no border', 'borderColor' => 'no border', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $spanTableStyleName = 'Colspan Rowspan';
      $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
      $table = $section->addTable($spanTableStyleName, array('spaceAfter' => 0));
      $table->addRow();
      $table->addCell(1500, $cellVCentered)->addImage(base_url('assets/img/logo-kpb.png'), array('height' => 75, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,  'spaceAfter' => 0));;
      $myCell1 = $table->addCell(8800, $cellVCentered);
      $myCell1->addText('KANTOR PEMASARAN BERSAMA (KPB)-LADA', array('name' => 'Times New Roman', 'size' => 13, 'color' => '000000', 'bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 10));
      $myCell1->addText('PROVINSI KEPULAUAN BANGKA BELITUNG', array('name' => 'Times New Roman', 'size' => 13, 'color' => '000000', 'bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 10));

      // $myCell1->addText($perusahaan['lok_perusahaan_full'] . ', ' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot'], array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $myCell1->addText('Alamat : Jl. Pulau Bangka Kompleks Perkantoran Pemprov Babel, Ruko City Hall Blok I-10', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $myCell1->addText('Kota Pangkalpinang, Provinsi Kepulauan Bangka Belitung', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $myCell1->addText('Telp. 0717 9112195, Email : kpb.ladababel@gmail.com', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));

      $section->addLine(array('weight' => 1.25, 'width' => 500, 'height' => 0, 'color' => '38c172'), array('spaceAfter' => 0));

      $tanggal = CustomFunctions::tanggal_indonesia(date("Y-m-d"));
      $section->addText('SURAT KETERANGAN TRANSAKSI PERDAGANGAN LADA', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false, 'underline' => 'single'), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $section->addText("Nomor : \t/SKT-MWP/BABEL/" . $this->getRomawi(), array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));

      $textrun = $section->addTextRun();
      $year = explode("-", $pengiriman['created_at'])[0];
      $section->addText("Berdasarkan Peraturan Gubernur nomor 19 tahun 2020 tentang Tata Kelolah Perdagangan Lada Putih Muntok White Papper, KPB Lada menyatakan keterangan transaksi perdagangan lada :", 'paragraph', 'pS2');
      $fancyTableStyle = array('lineStyle' => 'no border', 'borderColor' => 'no border', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $spanTableStyleName = 'Colspan Rowspan';
      $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
      $table = $section->addTable($spanTableStyleName);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nama Perusahaan', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($perusahaan['nama_perusahaan'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Alamat Perusahaan', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_perusahaan_full'] . ' ,' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nomor Pelaku Usaha Lada Terdaftar', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($npult, 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nomor Induk Berusaha (NIB)', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($no_nib, 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Nama Komoditi', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_komoditi'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Kualitas', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['nama_hasil_mutu'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Pelabuhan Muatan', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['nama_port_of_origin'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Pelabuhan Tujuan', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['port_of_destination'], 'paragraph', $noSpace);

      $negara_tujuan = '';
      $berat = '';
      $berat_gross = '';
      $berat_total = 0;
      $berat_total_gross = 0;
      $berat_karung = '';
      $berat_gross_karung = '';
      $berat_total_karung = 0;
      $berat_total_gross_karung = 0;
      $jenis_pengemasan = '';
      $jumlah_karung = '';
      $shipping_mark = '';
      $ket_penggunaan = '';
      $nama_jenis_pengemasan = '';
      $nama_jenis_mutu = '';
      $nama_importir = '';
      $keterangan_marking = '';
      $nomor_kontrak = '';
      $i = 1;
      $j = 0;
      $ar_nama_importir = [];
      // foreach ($pengirimanItem as $pi) {

      $negara_tujuan = " {$pi['city']} - {$pi['nama_negara']}";
      $berat = "{$pi['netto']} KG  ";
      $berat_gross = "{$pi['gross']} KG  ";
      $berat_karung = "{$pi['netto_karung']} KG  ";
      $berat_gross_karung = "{$pi['gross_karung']} ";
      $nama_jenis_mutu = "{$pi['nama_jenis_mutu']} ";
      $berat_total += $pi['netto'];
      $berat_total_gross += $pi['gross'];
      $jenis_pengemasan .= "{$pi['nama_jenis_pengemasan']}";
      $jumlah_karung .= "{$pi['jumlah_pengemasan']} {$pi['nama_jenis_pengemasan']} ";
      // $ar_nama_importir[$j] = $pi['nama_importir'];
      $nama_importir = "" . htmlspecialchars($pi['nama_importir']);
      if (!empty($pi['keterangan_marking'])) {
        $keterangan_marking .= "{$pi['keterangan_marking']}";
      } else {
        $keterangan_marking .= "- ";
      }

      $nomor_kontrak .= "{$pi['nomor_kontrak']} ";
      $i++;
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Negara Tujuan', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($negara_tujuan, 'paragraph', $noSpace);

      if ($pi['id_negara'] == 'ID') {

        //untuk antar pulau
        $table->addRow();
        $table->addCell(4000, $cellVCentered)->addText('Nama Buyer', 'paragraph', $noSpace);
        $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
        $table->addCell(5000, $cellVCentered)->addText($pi['nama_buyer'], 'paragraph', $noSpace);

        $table->addRow();
        $table->addCell(4000, $cellVCentered)->addText('Alamat Buyer', 'paragraph', $noSpace);
        $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
        $table->addCell(5000, $cellVCentered)->addText($pi['alamat_buyer'], 'paragraph', $noSpace);
      } else {


        // untuk expor
        $table->addRow();
        $table->addCell(4000, $cellVCentered)->addText('Nama Importir', 'paragraph', $noSpace);
        $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
        $table->addCell(5000, $cellVCentered)->addText($nama_importir, 'paragraph', $noSpace);
      }



      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Keterangan Marking', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($keterangan_marking, 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Jenis Pengemasan', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($jenis_pengemasan, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Jumlah Karung', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($jumlah_karung, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Netto', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($berat, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Gross', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($berat_gross, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Keterangan Penggunaan Produk', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['keterangan_penggunaan_produk'], 'paragraph', $noSpace);
      if ($pi['id_negara'] == 'ID') {

        //untuk antar pulau
        $table->addRow();
        $table->addCell(4000, $cellVCentered)->addText('No Manifest Domestic', 'paragraph', $noSpace);
        $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
        $table->addCell(5000, $cellVCentered)->addText($pi['no_manifest'], 'paragraph', $noSpace);
      }
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('No Sertifikat IG MWP', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['no_sertifikat_ig'], 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('No Sertifikat Uji Mutu (Sertificate of Confirmity)', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['no_hasil_mutu'], 'paragraph', $noSpace);
      $textrun = $section->addTextRun();
      $textrun->addTextBreak();
      $textrun->addText("Surat keterangan ini diberikan untuk menjelaskan perdagangan Lada Putih telah dilakukan sesuai peraturan dalam upaya menciptakan perdagangan lada yang baik.", 'paragraph');
      $textrun->addTextBreak();

      $textrun = $section->addTextRun();
      $textrun->addText("Pangkalpinang, " . $this->tgl_indo(), 'paragraph');

      $textrun->addTextBreak();
      $textrun->addText("KANTOR PEMASARAN BERSAMA,", array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0, 'bold' => true));

      $textrun->addTextBreak();
      $textrun->addText('General Manager', 'paragraph');
      $textrun->addTextBreak(5);
      $textrun->addText('Deki Susanto ST', 'paragraph');
      $textrun->addTextBreak();

      // Englis SKT


      $section = $phpWord->addSection(array(
        'marginLeft' => 1200, 'marginRight' => 600,
        'marginTop' => 600, 'marginBottom' => 600
      ));

      $fancyTableStyle = array('borderSize' => 1, 'borderColor' => '000000', 'height' => 200, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));

      $fancyTableStyle = array('lineStyle' => 'no border', 'borderColor' => 'no border', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $spanTableStyleName = 'Colspan Rowspan';
      $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
      $table = $section->addTable($spanTableStyleName, array('spaceAfter' => 0));
      $table->addRow();
      $table->addCell(1500, $cellVCentered)->addImage(base_url('assets/img/logo-kpb.png'), array('height' => 75, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,  'spaceAfter' => 0));;
      $myCell1 = $table->addCell(8800, $cellVCentered);
      $myCell1->addText('KANTOR PEMASARAN BERSAMA (KPB)-LADA', array('name' => 'Times New Roman', 'size' => 13, 'color' => '000000', 'bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 10));
      $myCell1->addText('PROVINSI KEPULAUAN BANGKA BELITUNG', array('name' => 'Times New Roman', 'size' => 13, 'color' => '000000', 'bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 10));

      // $myCell1->addText($perusahaan['lok_perusahaan_full'] . ', ' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot'], array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $myCell1->addText('Alamat : Jl. Pulau Bangka Kompleks Perkantoran Pemprov Babel, Ruko City Hall Blok I-10', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $myCell1->addText('Kota Pangkalpinang, Provinsi Kepulauan Bangka Belitung', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $myCell1->addText('Telp. 0717 9112195, Email : kpb.ladababel@gmail.com', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));

      $section->addLine(array('weight' => 1.25, 'width' => 500, 'height' => 0, 'color' => '38c172'), array('spaceAfter' => 0));

      $tanggal = CustomFunctions::tanggal_indonesia(date("Y-m-d"));
      $section->addText('WHITE PEPPER TRADE TRANSACTION CERTIFICATE', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false, 'underline' => 'single'), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      $section->addText("Number : \t/SKT-MWP/BABEL/" . $this->getRomawi(), array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));

      $textrun = $section->addTextRun();
      $year = explode("-", $pengiriman['created_at'])[0];
      $section->addText("Base on Governor Regulation OF Bangka Belitung nuber 19 of 2020 concerning The Governance of White Pepper Trading Muntok White Pepper, KPB Lada states the description of pepper trade transaction :", 'paragraph', 'pS2');
      $fancyTableStyle = array('lineStyle' => 'no border', 'borderColor' => 'no border', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $spanTableStyleName = 'Colspan Rowspan';
      $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
      $table = $section->addTable($spanTableStyleName);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Company Name', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($perusahaan['nama_perusahaan'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Address of Company', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_perusahaan_full'] . ' ,' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Registered Pepper Business Number', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($npult, 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Attempted Parent Number (NIB)', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($no_nib, 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Commodity Name', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_komoditi'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Quality', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['nama_hasil_mutu'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Loading Port', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['nama_port_of_origin'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Destination Port', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['port_of_destination'], 'paragraph', $noSpace);

      $negara_tujuan = '';
      $berat = '';
      $berat_gross = '';
      $berat_total = 0;
      $berat_total_gross = 0;
      $berat_karung = '';
      $berat_gross_karung = '';
      $berat_total_karung = 0;
      $berat_total_gross_karung = 0;
      $jenis_pengemasan = '';
      $jumlah_karung = '';
      $shipping_mark = '';
      $ket_penggunaan = '';
      $nama_jenis_pengemasan = '';
      $nama_jenis_mutu = '';
      $nama_importir = '';
      $keterangan_marking = '';
      $nomor_kontrak = '';
      $i = 1;
      $j = 0;
      $ar_nama_importir = [];
      // foreach ($pengirimanItem as $pi) {

      $negara_tujuan = " {$pi['city']} - {$pi['nama_negara']}";
      $berat = "{$pi['netto']} KG  ";
      $berat_gross = "{$pi['gross']} KG  ";
      $berat_karung = "{$pi['netto_karung']} KG  ";
      $berat_gross_karung = "{$pi['gross_karung']} ";
      $nama_jenis_mutu = "{$pi['nama_jenis_mutu']} ";
      $berat_total += $pi['netto'];
      $berat_total_gross += $pi['gross'];
      $jenis_pengemasan .= "{$pi['nama_jenis_pengemasan']}";
      $jumlah_karung .= "{$pi['jumlah_pengemasan']} {$pi['nama_jenis_pengemasan']} ";
      // $ar_nama_importir[$j] = $pi['nama_importir'];
      $nama_importir = "" . htmlspecialchars($pi['nama_importir']);
      if (!empty($pi['keterangan_marking'])) {
        $keterangan_marking .= "{$pi['keterangan_marking']}";
      } else {
        $keterangan_marking .= "- ";
      }

      $nomor_kontrak .= "{$pi['nomor_kontrak']} ";
      $i++;
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Destination Country', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($negara_tujuan, 'paragraph', $noSpace);

      if ($pi['id_negara'] == 'ID') {

        //untuk antar pulau
        $table->addRow();
        $table->addCell(4000, $cellVCentered)->addText('Buyer Name', 'paragraph', $noSpace);
        $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
        $table->addCell(5000, $cellVCentered)->addText($pi['nama_buyer'], 'paragraph', $noSpace);

        $table->addRow();
        $table->addCell(4000, $cellVCentered)->addText('Buyer Address', 'paragraph', $noSpace);
        $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
        $table->addCell(5000, $cellVCentered)->addText($pi['alamat_buyer'], 'paragraph', $noSpace);
      } else {


        // untuk expor
        $table->addRow();
        $table->addCell(4000, $cellVCentered)->addText('Name Importer', 'paragraph', $noSpace);
        $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
        $table->addCell(5000, $cellVCentered)->addText($nama_importir, 'paragraph', $noSpace);
      }

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Marking Description', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($keterangan_marking, 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Packaging Type', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($jenis_pengemasan, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Number of Sacks', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($jumlah_karung, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Net', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($berat, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Gross', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($berat_gross, 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('Product Usage Description', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['keterangan_penggunaan_produk'], 'paragraph', $noSpace);
      if ($pi['id_negara'] == 'ID') {

        //untuk antar pulau
        $table->addRow();
        $table->addCell(4000, $cellVCentered)->addText('No Manifest Domestic', 'paragraph', $noSpace);
        $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
        $table->addCell(5000, $cellVCentered)->addText($pi['no_manifest'], 'paragraph', $noSpace);
      }
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('No Certificate IG MWP', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['no_sertifikat_ig'], 'paragraph', $noSpace);
      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('No Certificate of Confirmity', 'paragraph', $noSpace);
      $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
      $table->addCell(5000, $cellVCentered)->addText($pi['no_hasil_mutu'], 'paragraph', $noSpace);
      $textrun = $section->addTextRun();
      $textrun->addTextBreak();
      $textrun->addText("This detail report was given to explain the trade of White Pepper has been carried out according to the regulations in an effort to create a good pepper trade.", 'paragraph');
      $textrun->addTextBreak();

      $textrun = $section->addTextRun();
      $textrun->addText("Pangkalpinang, " . $this->tgl_eng(), 'paragraph');

      $textrun->addTextBreak();
      $textrun->addText("KANTOR PEMASARAN BERSAMA,", array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'spaceAfter' => 0, 'bold' => true));

      $textrun->addTextBreak();
      $textrun->addText('General Manager', 'paragraph');
      $textrun->addTextBreak(5);
      $textrun->addText('Deki Susanto ST', 'paragraph');
      $textrun->addTextBreak();

     
      // Test Result
      $section = $phpWord->addSection(array(
        'marginLeft' => 1200, 'marginRight' => 600,
        'marginTop' => 600, 'marginBottom' => 600
      ));

      $section->addText("TEST RESULT :", 'paragraph_bold', 'pS2');
      // $fancyTableStyle = array('cellMargin'=>80, 'borderStyle' => 'dotted', 'borderSize' => 6, 'borderColor' => '000000', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $fancyTableStyle = array('cellMargin' => 100, 'borderStyle' => 'solid', 'borderSize' => 6);
      $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(1));
      $spanTableStyleName = 'Colspan Rowspan';
      $phpWord->addTableStyle('requestorContactTbl', [
        'borderSize' => 6,
        'borderColor' => '00000',
        'afterSpacing' => 2,
        'Spacing' => 10,
        'cellMargin' => 50
      ]);
      $table = $section->addTable('requestorContactTbl');
      // array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100)

      $table->addRow();
      $table->addCell(400, $cellVCentered)->addText('No.', 'paragraph_bold', $noSpace_center);
      $table->addCell(3000, $cellVCentered)->addText('Caracteristic', 'paragraph_bold', $noSpace_center);
      $table->addCell(2000, $cellVCentered)->addText('Unit', 'paragraph_bold', $noSpace_center);
      $table->addCell(2000, $cellVCentered)->addText('Grade II Limit', 'paragraph_bold', $noSpace_center);
      $table->addCell(3000, $cellVCentered)->addText('Mean Test Result', 'paragraph_bold', $noSpace_center);
      $table->addCell(3000, $cellVCentered)->addText('Method of Test', 'paragraph_bold', $noSpace_center);

      $table->addRow();
      $table->addCell(null, $cellVCentered)->addText('1.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Cleanliness', 'paragraph', $noSpace);
      $table->addCell(null, $cellVCentered)->addText('--', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Free from living and dead insects, also free from insects fragments.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Free from living and dead insects, also free from insects fragments.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('SNI. 0004;2013.5.1', 'paragraph', $noSpace_center);
     
      $table->addRow();
      $table->addCell(null, $cellVCentered)->addText('2.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Bulk Density', 'paragraph', $noSpace);
      $table->addCell(null, $cellVCentered)->addText('g/l', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Min. 600', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('665', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('SNI. 0004;2013.7.2.1', 'paragraph', $noSpace_center);
     
      $table->addRow();
      $table->addCell(null, $cellVCentered)->addText('3.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Extraneius matter, (w/w) max', 'paragraph', $noSpace);
      $table->addCell(null, $cellVCentered)->addText('%', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('2,0', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('0,2', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('SNI. 0004;2013.7.2.4', 'paragraph', $noSpace_center);

      $table->addRow();
      $table->addCell(null, $cellVCentered)->addText('4.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Light barries, (w/w) max', 'paragraph', $noSpace);
      $table->addCell(null, $cellVCentered)->addText('%', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('2,0', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('0,2', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('SNI. 0004;2013.7.2.3', 'paragraph', $noSpace_center);
      
      $table->addRow();
      $table->addCell(null, $cellVCentered)->addText('5.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Mouldy barries, (w/w) max', 'paragraph', $noSpace);
      $table->addCell(null, $cellVCentered)->addText('%', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('3', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('0', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('SNI. 0004;2013.7.2.6', 'paragraph', $noSpace_center);

      $table->addRow();
      $table->addCell(null, $cellVCentered)->addText('6.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Darkcoloured barries, (w/w) max', 'paragraph', $noSpace);
      $table->addCell(null, $cellVCentered)->addText('%', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('2,0', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('0,9', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('SNI. 0004;2013.7.2.5', 'paragraph', $noSpace_center);

      $table->addRow();
      $table->addCell(null, $cellVCentered)->addText('7.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Moisture content, (w/w) max', 'paragraph', $noSpace);
      $table->addCell(null, $cellVCentered)->addText('%', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('15,0', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('13,6', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('SNI. 0004;2013.7.2.2', 'paragraph', $noSpace_center);

      $table->addRow();
      $table->addCell(null, $cellVCentered)->addText('8.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Salmonella', 'paragraph', $noSpace);
      $table->addCell(null, $cellVCentered)->addText('Detection/25g', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Negatif', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('-', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('SNI. 0004;2013.7.2.7', 'paragraph', $noSpace_center);

      $table->addRow();
      $table->addCell(null, $cellVCentered)->addText('9.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('E coli', 'paragraph', $noSpace);
      $table->addCell(null, $cellVCentered)->addText('MPN/g', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText(htmlspecialchars('< 3'), 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('-', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('SNI. 0004;2013.7.2.8', 'paragraph', $noSpace_center);

      $table->addRow();
      $table->addCell(null, $cellVCentered)->addText('10.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Piperine content, (w/w) max', 'paragraph', $noSpace);
      $table->addCell(null, $cellVCentered)->addText('%', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('As the test result', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('4,9', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('SNI. 0004;2013.10.2', 'paragraph', $noSpace_center);

      $table->addRow();
      $table->addCell(null, $cellVCentered)->addText('11.', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('Essential Oil content, (w/w) max', 'paragraph', $noSpace);
      $table->addCell(null, $cellVCentered)->addText('%', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('As the test result', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('2,4', 'paragraph', $noSpace_center);
      $table->addCell(null, $cellVCentered)->addText('SNI. 0004;2013.10.3', 'paragraph', $noSpace_center);
      
      // Detail Report
      $section = $phpWord->addSection(array(
        'marginLeft' => 1200, 'marginRight' => 600,
        'marginTop' => 600, 'marginBottom' => 600, 'orientation' => 'landscape'
      ));

      $section->addText("DETAILS OF REPORT :", 'paragraph', 'pS2');
      // $fancyTableStyle = array('cellMargin'=>80, 'borderStyle' => 'dotted', 'borderSize' => 6, 'borderColor' => '000000', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $fancyTableStyle = array('cellMargin' => 0, 'borderStyle' => 'solid', 'borderSize' => 6, 'height' => 100);
      $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      $spanTableStyleName = 'Colspan Rowspan';
      $phpWord->addTableStyle('requestorContactTbl', [
        'borderSize' => 6,
        'borderColor' => '00000',
        'afterSpacing' => 0,
        'Spacing' => 0,
        'cellMargin' => 0
      ]);
      $table = $section->addTable('requestorContactTbl');
      // array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100)

      $table->addRow();
      $table->addCell(10000, $cellVCentered)->addText('Tolak Ukur', 'paragraph_bold', $noSpace_center);
      $table->addCell(10000, array('gridSpan' => 7, 'align' => 'center'))->addText('Uraian', 'paragraph_bold', $noSpace_center);
      // $table->addCell(5000, $cellVCentered)->addText($perusahaan['nama_perusahaan'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('   Jenis Barang', 'paragraph', $noSpace);
      $table->addCell(10000, array('gridSpan' => 7, 'align' => 'center'))->addText('Biji Lada', 'paragraph', $noSpace);
      // $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_perusahaan_full'] . ' ,' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot'], 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('   Asal Gelondong', 'paragraph', $noSpace);
      $table->addCell(10000, array('gridSpan' => 7, 'align' => 'center'))->addText('Petani dan Pengepul', 'paragraph', $noSpace);
      // $table->addCell(5000, $cellVCentered)->addText($npult, 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('   Tanggal Terima', 'paragraph', $noSpace);
      $table->addCell(10000, array('gridSpan' => 7, 'align' => 'center'))->addText('', 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('   Lama Penyimpanan', 'paragraph', $noSpace);
      $table->addCell(10000, array('gridSpan' => 7, 'align' => 'center'))->addText('            Bulan', 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('   Jumlah Berat', 'paragraph', $noSpace);
      $table->addCell(10500, array('gridSpan' => 7, 'align' => 'center'))->addText('', 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('', 'paragraph_bold', $noSpace);
      $table->addCell(7800, array('gridSpan' => 6, 'align' => 'center'))->addText('Standar', 'paragraph_bold', $noSpace_center);
      $table->addCell(4000, $cellVCentered)->addText('Hasil Pemeriksaan', 'paragraph_bold', $noSpace_center);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('A. Cita Rasa', 'paragraph_bold', $noSpace);
      $table->addCell(7800, array('gridSpan' => 6, 'align' => 'center'))->addText('', 'paragraph', $noSpace);
      $table->addCell(4000, $cellVCentered)->addText(' ', 'paragraph', $noSpace);


      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('   Bebas Kontainasi', 'paragraph', $noSpace);
      $table->addCell(7800, array('gridSpan' => 6, 'align' => 'center'))->addText('N/A', 'paragraph', $noSpace);
      $table->addCell(4000, $cellVCentered)->addText('N/A', 'paragraph', $noSpace);


      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('   Bebas cacat cita rasa utama', 'paragraph', $noSpace);
      $table->addCell(7800, array('gridSpan' => 6, 'align' => 'center'))->addText('N/A', 'paragraph', $noSpace);
      $table->addCell(4000, $cellVCentered)->addText('N/A', 'paragraph', $noSpace);


      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('   Cita rasa aromatic', 'paragraph', $noSpace);
      $table->addCell(7800, array('gridSpan' => 6, 'align' => 'center'))->addText('N/A', 'paragraph', $noSpace);
      $table->addCell(4000, $cellVCentered)->addText('N/A', 'paragraph', $noSpace);

      $table->addRow();
      $table->addCell(4000, $cellVCentered)->addText('   Tingkat kepedesan', 'paragraph', $noSpace);
      $table->addCell(7800, array('gridSpan' => 6, 'align' => 'center'))->addText('N/A', 'paragraph', $noSpace);
      $table->addCell(4000, $cellVCentered)->addText('N/A', 'paragraph', $noSpace);


      $table->addRow();
      $table->addCell(5000, $cellVCentered)->addText('B. Kimiawi', 'paragraph_bold', $noSpace);
      // $table->addCell(10000, array('gridSpan' => 6, 'align' => 'center'))->addText('', 'paragraph', $noSpace);
      $table->addCell(1300, $cellVCentered)->addText('SNI 1', 'paragraph_bold', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('SNI 2', 'paragraph_bold', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('ASTA', 'paragraph_bold', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('ESA', 'paragraph_bold', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('IPC', 'paragraph_bold', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('ISO', 'paragraph_bold', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph_bold', $noSpace_center);


      $table->addRow();
      $table->addCell(5000, $cellVCentered)->addText('   Kerapatan (Bulk density), g/l min', 'paragraph', $noSpace);
      // $table->addCell(10000, array('gridSpan' => 6, 'align' => 'center'))->addText('', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('630', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('600', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('450', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);



      $table->addRow();
      $table->addCell(9000, $cellVCentered)->addText('   Kadar air (b/b), % maks', 'paragraph', $noSpace);
      // $table->addCell(10000, array('gridSpan' => 6, 'align' => 'center'))->addText('', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('13', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('14', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('13', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('12', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('13', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('13', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);
      $table->addRow();
      $table->addCell(6000, $cellVCentered)->addText('   Kadar biji enteng (b/b), % maks', 'paragraph', $noSpace);
      $table->addCell(1300, $cellVCentered)->addText('1', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('2', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('1', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);

      $table->addRow();
      $table->addCell(6000, $cellVCentered)->addText('   Kadar benda asing (b/b), % maks', 'paragraph', $noSpace);
      $table->addCell(1300, $cellVCentered)->addText('1', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('2', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('1', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('1,5', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);


      $table->addRow();
      $table->addCell(6000, $cellVCentered)->addText('   Kadar biji kehitaman (b/b), % maks', 'paragraph', $noSpace);
      $table->addCell(1300, $cellVCentered)->addText('1', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('2', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('1', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('4', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);


      $table->addRow();
      $table->addCell(6000, $cellVCentered)->addText('   Kadar cemaran kapang (b/b), % maks', 'paragraph', $noSpace);
      $table->addCell(1300, $cellVCentered)->addText('1', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('1', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('1', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('1', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('1', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);

      $table->addRow();
      $table->addCell(6000, $cellVCentered)->addText('   Kadar abu (b/b), % maks', 'paragraph', $noSpace);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('3,5', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('3,5', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('3,5', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);


      $table->addRow();
      $table->addCell(6000, $cellVCentered)->addText('   Kadar abu larut asam (b/b), % maks', 'paragraph', $noSpace);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('0,3', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('0,3', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('0,3', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);


      $table->addRow();
      $table->addCell(6000, $cellVCentered)->addText('   Kadar piperin (b/b), % maks', 'paragraph', $noSpace);
      $table->addCell(1300, $cellVCentered)->addText('hasil', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('hasil', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('4', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('4', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);

      $table->addRow();
      $table->addCell(6000, $cellVCentered)->addText('   Kadar minyak atsiry (v/b), % maks', 'paragraph', $noSpace);
      $table->addCell(1300, $cellVCentered)->addText('hasil', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('hasil', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('1,5', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('1,5', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('0,65', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);


      $table->addRow();
      $table->addCell(6000, $cellVCentered)->addText('   Salmonela sp, detection/25 gr', 'paragraph', $noSpace);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('negatif', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('negatif', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('negatif', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('negatif', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);


      $table->addRow();
      $table->addCell(6000, $cellVCentered)->addText('   E coli, MPN/gr', 'paragraph', $noSpace);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(htmlspecialchars('< 3'), 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('Nil', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(htmlspecialchars('< 3'), 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('Nil', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);



      $table->addRow();
      $table->addCell(7000, $cellVCentered)->addText('   Cemaran serangga, By count maks', 'paragraph', $noSpace);
      $table->addCell(1300, $cellVCentered)->addText('bebas', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('bebas', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('2', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('Nil', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('Ipc', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText('*', 'paragraph', $noSpace_center);
      $table->addCell(1300, $cellVCentered)->addText(' ', 'paragraph', $noSpace_center);
    }

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    // FileIO::headerDownloadDocx('Form Pengajuan Mutu - ' . $pengiriman['nama_pengiriman']);
    FileIO::headerDownloadDocx($filename);

    $objWriter->save("php://output");
    // } catch (Exception $e) {
    //   ExceptionHandler::handle($e);
    // }
  }


  public function format_permohonan_to_bp3l()
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
    $filename = 'Permohonan Kepada BP3L_' . ($perusahaan['nama_perusahaan'] ? $perusahaan['nama_perusahaan'] : 'NONAME') . '_ID' . $perusahaan['id_perusahaan'] . $pengiriman['id_pengiriman'];

    // var_dump($pengirimanItem);
    // $pengiriman = 'nama pengirim';
    // $pengirimanItem = 'nama pengirim';
    // $perusahaan = 'nama pengirim';
    // $siup = 'nama pengirim';
    // $no_siup = 'nama pengirim';


    $phpWord = new PhpOffice\PhpWord\PhpWord();
    $phpWord->addFontStyle('h3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000'));
    $phpWord->addFontStyle('paragraph_bold', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));

    $section = $phpWord->addSection(array(
      'marginLeft' => 1200, 'marginRight' => 600,
      'marginTop' => 600, 'marginBottom' => 600
    ));
    // $section->addImage(base_url('assets/img/head_bp3l.png'),array('height' => 70, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

    $tanggal = CustomFunctions::tanggal_indonesia(date("Y-m-d"));
    $section->addText("Panngkalpinang, {$tanggal}", "paragraph");

    $textrun = $section->addTextRun();
    $year = explode("-", $pengiriman['created_at'])[0];
    $textrun->addText("Nomor\t\t: ", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Lampiran\t: -", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Perihal\t\t: Pengajuan Penggunaan IG dan Pengambilan contoh {$pengiriman['nama_komoditi']} ", 'paragraph');
    $textrun->addTextBreak();

    $textrun = $section->addTextRun();
    $textrun->addText("Kepada Yth,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Ketua Badan Pengolahan, Pengembangan dan", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Pemasaran Lada (BP3L)", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Provinsi Kepulauan Bangka Belitung", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Di", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("\tPangkalpinang", 'paragraph');

    $textrun = $section->addTextRun();
    $textrun->addText("Dengan hormat,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("\tSehubungan dengan rencana kegiatan Ekspor yang dilakukan perusahaan kami untuk produk {$pengiriman['nama_komoditi']}, dengan data sebagai berikut :", 'paragraph');
    $noSpace = array('spaceAfter' => 0);
    $fancyTableStyle = array('borderSize' => 1, 'borderColor' => '000000', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $spanTableStyleName = 'Colspan Rowspan';
    $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
    $table = $section->addTable($spanTableStyleName);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Perusahaan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['nama_perusahaan'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Alamat Perusahaan');
    $table->addCell(1, $cellVCentered)->addText(':');
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_perusahaan_full'] . ' ,' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot']);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Alamat Gudang', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_gudang_penyimpanan_full'] . ' ,' . $perusahaan['lok_gudang_penyimpanan_kec'] . ' - ' . $perusahaan['lok_gudang_penyimpanan_kabkot'], array(), $noSpace);


    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nomor SIUP Perusahaan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($no_siup, array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Komoditi', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_komoditi'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Berat', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['jumlah_berat'] . ' Metric Ton', array(), $noSpace);


    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Partai', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['jumlah_partai'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Pengiriman', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_pengiriman'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Rencana Pengapalan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['rencana_pengapalan'], array(), $noSpace);

    $negara_tujuan = '';
    $berat = '';
    $berat_gross = '';
    $berat_total = 0;
    $berat_total_gross = 0;
    $jenis_pengemasan = '';
    $jumlah_karung = '';
    $shipping_mark = '';
    $nama_jenis_pengemasan = '';
    $nama_jenis_mutu = '';
    $nama_importir = '';
    $keterangan_marking = '';
    $nomor_kontrak = '';
    $i = 1;
    foreach ($pengirimanItem as $pi) {

      $negara_tujuan .= "{$i}) {$pi['city']} - {$pi['nama_negara']}, <w:br/>";
      $berat .= "{$i}) {$pi['netto']} KG + ";
      $berat_gross .= "{$i}) {$pi['gross']} KG + ";
      $nama_jenis_mutu .= "{$i}) {$pi['nama_jenis_mutu']}, ";
      $berat_total += $pi['netto'];
      $berat_total_gross += $pi['gross'];
      $jenis_pengemasan .= "{$i}) {$pi['nama_jenis_pengemasan']}, ";
      $jumlah_karung .= "{$i}) {$pi['jumlah_pengemasan']} {$pi['nama_jenis_pengemasan']}, ";

      $nama_importir .= "{$i}) {$pi['nama_importir']}, <w:br/>";
      if (!empty($pi['keterangan_marking'])) {
        $keterangan_marking .= "{$i}) {$pi['keterangan_marking']}, <w:br/>";
      } else {
        $keterangan_marking .= "- , ";
      }

      $nomor_kontrak .= "{$i}) {$pi['nomor_kontrak']}, ";
      $i++;
    }
    $negara_tujuan = substr($negara_tujuan, 0, -9);
    $keterangan_marking = substr($keterangan_marking, 0, -9);
    $nomor_kontrak = substr($nomor_kontrak, 0, -2);
    $berat = substr($berat, 0, -3);
    $berat_gross = substr($berat_gross, 0, -3);
    $nama_jenis_mutu = substr($nama_jenis_mutu, 0, -2);
    $shipping_mark = substr($shipping_mark, 0, -9);
    $nama_importir = substr($nama_importir, 0, -9);
    $jenis_pengemasan = substr($jenis_pengemasan, 0, -2);
    $jumlah_karung = substr($jumlah_karung, 0, -2);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Negara Tujuan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($negara_tujuan, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Importir', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nama_importir, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nomor Kontrak', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nomor_kontrak, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Keterangan Marking', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($keterangan_marking, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Rencana Mutu', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nama_jenis_mutu, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Netto', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    // $table->addCell(5000, $cellVCentered)->addText($berat_total .' KG ( '.$berat .' )', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($berat, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Gross', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($berat_gross, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jenis Pengemasan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($jenis_pengemasan, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Karung', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($jumlah_karung, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Shipping Mark', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    // $table->addCell(5000, $cellVCentered)->addText($shipping_mark, array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText("TERLAMPIR", array(), $noSpace);

    $textrun = $section->addTextRun();
    $textrun->addText("Demikian permohonan kami, atas bantuan dan kerjasamanya kami ucapkan terima kasih.", 'paragraph');
    $textrun->addTextBreak();

    // $textrun = $section->addTextRun();
    // $textrun->addText("Hormat Kami,", 'paragraph');
    // $textrun->addTextBreak();
    // $textrun->addText("KETUA KPB PROV KEP BABEL", 'paragraph');
    // $textrun->addTextBreak(6);
    // $textrun->addText("(                                       )", 'paragraph_bold');
    // $textrun->addTextBreak();

    $textrun = $section->addTextRun();
    $textrun->addText("Hormat Kami,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("KETUA " . $perusahaan['nama_perusahaan'], 'paragraph');
    $textrun->addTextBreak(6);
    $textrun->addText($perusahaan['nama_pimpinan'], 'paragraph_bold');
    $textrun->addTextBreak();

    $section = $phpWord->addSection(array(
      'marginLeft' => 1200, 'marginRight' => 600,
      'marginTop' => 600, 'marginBottom' => 600
    ));
    $phpWord->addFontStyle('paragraph2', array('name' => 'Times New Roman', 'size' => 10, 'color' => '000000', 'underline' => 'single'));
    $phpWord->addFontStyle('paragraph3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true, 'underline' => 'single'));

    $textrun = $section->addTextRun();
    $section->addText("Lampiran surat permohonan No. \t\t\t\tPanngkalpinang, {$tanggal}", "paragraph2");
    $paragraphStyleName = 'pStyle';
    $phpWord->addParagraphStyle($paragraphStyleName, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));


    $textrun = $section->addTextRun();

    $section->addText('SHIPPING MARK', "paragraph3", $paragraphStyleName);
    $textrun = $section->addTextRun();
    $i = 1;
    foreach ($pengirimanItem as $pi) {
      $textrun = $section->addTextRun();
      $textrun->addText("({$i})");
      $textrun->addTextBreak();
      $resultshipping_mark = str_replace(array("\n"), "<w:br/>", $pi['shipping_mark']);
      // $shipping_mark = "{$resultshipping_mark}, <w:br/>";
      $textrun->addText("$resultshipping_mark");
      $i++;
    }
    $textrun = $section->addTextRun();



    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    // FileIO::headerDownloadDocx('Form Pengajuan Mutu - ' . $pengiriman['nama_pengiriman']);
    FileIO::headerDownloadDocx($filename);

    $objWriter->save("php://output");
    // } catch(Exception $e){
    //   ExceptionHandler::handle($e);
    // }
  }
  public function format_permohonan_to_bpsmb_mutu()
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
    $filename = 'Permohonan Kepada BPSMB_' . ($perusahaan['nama_perusahaan'] ? $perusahaan['nama_perusahaan'] : 'NONAME') . '_ID' . $perusahaan['id_perusahaan'] . $pengiriman['id_pengiriman'];

    // $pengiriman = 'nama pengirim';
    // $pengirimanItem = 'nama pengirim';
    // $perusahaan = 'nama pengirim';
    // $siup = 'nama pengirim';
    // $no_siup = 'nama pengirim';


    $phpWord = new PhpOffice\PhpWord\PhpWord();
    $phpWord->addFontStyle('h3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000'));
    $phpWord->addFontStyle('paragraph_bold', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));

    $section = $phpWord->addSection(array(
      'marginLeft' => 1200, 'marginRight' => 600,
      'marginTop' => 600, 'marginBottom' => 600
    ));
    // $section->addImage(base_url('assets/img/head_bp3l.png'),array('height' => 70, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

    $tanggal = CustomFunctions::tanggal_indonesia(date("Y-m-d"));
    $section->addText("Panngkalpinang, {$tanggal}", "paragraph");

    $textrun = $section->addTextRun();
    $year = explode("-", $pengiriman['created_at'])[0];
    $textrun->addText("Nomor\t\t: ", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Lampiran\t: -", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Perihal\t\t: Pengajuan Penggunaan IG dan Pengambilan contoh {$pengiriman['nama_komoditi']} ", 'paragraph');
    // $textrun->addText("Pengajuan Penggunaan IG & Pengambilan contoh {$pengiriman['nama_komoditi']} ", 'paragraph');
    $textrun->addTextBreak();

    $textrun = $section->addTextRun();
    $textrun->addText("Kepada Yth,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Kepala Balai Pengujian dan Sertifikasi Mutu Barang (BPSMB)", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Provinsi Kepulauan Bangka Belitung", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Di", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("\tPANGKALPINANG", 'paragraph');

    $textrun = $section->addTextRun();
    $textrun->addText("Dengan hormat,", 'paragraph');
    $textrun->addTextBreak();
    // $textrun->addText("Bersama ini kami BP3L meneruskan permohonan dari {$perusahaan['nama_perusahaan']} untuk melakukan pengambilan contoh (sampling) dalam rangka uji mutu barang terkait pengajuan IG MWP dengan data sebagai berikut:", 'paragraph');
    $textrun->addText("\tSehubungan dengan rencana kegiatan Ekspor yang dilakukan perusahaan kami untuk produk {$pengiriman['nama_komoditi']}, dengan data sebagai berikut :", 'paragraph');

    $noSpace = array('spaceAfter' => 0);
    $fancyTableStyle = array('borderSize' => 1, 'borderColor' => '000000', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $spanTableStyleName = 'Colspan Rowspan';
    $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
    $table = $section->addTable($spanTableStyleName);


    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Perusahaan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['nama_perusahaan'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Alamat Perusahaan');
    $table->addCell(1, $cellVCentered)->addText(':');
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_perusahaan_full'] . ' ,' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot']);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Alamat Gudang', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_gudang_penyimpanan_full'] . ' ,' . $perusahaan['lok_gudang_penyimpanan_kec'] . ' - ' . $perusahaan['lok_gudang_penyimpanan_kabkot'], array(), $noSpace);


    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nomor SIUP Perusahaan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($no_siup, array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Komoditi', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_komoditi'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Berat', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['jumlah_berat'] . ' Metric Ton', array(), $noSpace);


    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Partai', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['jumlah_partai'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Pengiriman', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_pengiriman'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Rencana Pengapalan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['rencana_pengapalan'], array(), $noSpace);

    $negara_tujuan = '';
    $berat = '';
    $berat_gross = '';
    $berat_total = 0;
    $berat_total_gross = 0;
    $jenis_pengemasan = '';
    $jumlah_karung = '';
    $shipping_mark = '';
    $nama_jenis_pengemasan = '';
    $nama_jenis_mutu = '';
    $nama_importir = '';
    $keterangan_marking = '';
    $nomor_kontrak = '';
    $i = 1;
    foreach ($pengirimanItem as $pi) {

      $negara_tujuan .= "{$i}) {$pi['city']} - {$pi['nama_negara']}, <w:br/>";
      $berat .= "{$i}) {$pi['netto']} KG + ";
      $berat_gross .= "{$i}) {$pi['gross']} KG + ";
      $nama_jenis_mutu .= "{$i}) {$pi['nama_jenis_mutu']}, ";
      $berat_total += $pi['netto'];
      $berat_total_gross += $pi['gross'];
      $jenis_pengemasan .= "{$i}) {$pi['nama_jenis_pengemasan']}, ";
      $jumlah_karung .= "{$i}) {$pi['jumlah_pengemasan']} {$pi['nama_jenis_pengemasan']}, ";

      $nama_importir .= "{$i}) {$pi['nama_importir']}, <w:br/>";
      if (!empty($pi['keterangan_marking'])) {
        $keterangan_marking .= "{$i}) {$pi['keterangan_marking']}, <w:br/>";
      } else {
        $keterangan_marking .= "- , ";
      }

      $nomor_kontrak .= "{$i}) {$pi['nomor_kontrak']}, ";
      $i++;
    }
    $negara_tujuan = substr($negara_tujuan, 0, -9);
    $keterangan_marking = substr($keterangan_marking, 0, -9);
    $nomor_kontrak = substr($nomor_kontrak, 0, -2);
    $berat = substr($berat, 0, -3);
    $berat_gross = substr($berat_gross, 0, -3);
    $nama_jenis_mutu = substr($nama_jenis_mutu, 0, -2);
    $shipping_mark = substr($shipping_mark, 0, -9);
    $nama_importir = substr($nama_importir, 0, -9);
    $jenis_pengemasan = substr($jenis_pengemasan, 0, -2);
    $jumlah_karung = substr($jumlah_karung, 0, -2);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Negara Tujuan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($negara_tujuan, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Importir', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nama_importir, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nomor Kontrak', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nomor_kontrak, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Keterangan Marking', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($keterangan_marking, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Rencana Mutu', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nama_jenis_mutu, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Netto', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    // $table->addCell(5000, $cellVCentered)->addText($berat_total .' KG ( '.$berat .' )', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($berat, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Gross', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($berat_gross, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jenis Pengemasan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($jenis_pengemasan, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Karung', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($jumlah_karung, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Shipping Mark', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    // $table->addCell(5000, $cellVCentered)->addText($shipping_mark, array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText("TERLAMPIR", array(), $noSpace);

    $textrun = $section->addTextRun();
    $textrun->addText("Demikianlah surat permohonan ini kami buat. Atas perhatian dan kerjasamanya kami ucapkan terima kasih.", 'paragraph');
    $textrun->addTextBreak();

    // $textrun = $section->addTextRun();
    // $textrun->addText("Hormat Kami,", 'paragraph');
    // $textrun->addTextBreak();
    // $textrun->addText("KETUA BP3L PROV KEP BABEL", 'paragraph');
    // $textrun->addTextBreak(5);
    // $textrun->addText("RAFKI HARISKA, SKM", 'paragraph_bold');
    // $textrun->addTextBreak();

    $textrun = $section->addTextRun();
    $textrun->addText("Hormat Kami,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("KETUA " . $perusahaan['nama_perusahaan'], 'paragraph');
    $textrun->addTextBreak(6);
    $textrun->addText($perusahaan['nama_pimpinan'], 'paragraph_bold');
    $textrun->addTextBreak();

    $section = $phpWord->addSection(array(
      'marginLeft' => 1200, 'marginRight' => 600,
      'marginTop' => 600, 'marginBottom' => 600
    ));
    $phpWord->addFontStyle('paragraph2', array('name' => 'Times New Roman', 'size' => 10, 'color' => '000000', 'underline' => 'single'));
    $phpWord->addFontStyle('paragraph3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true, 'underline' => 'single'));

    $textrun = $section->addTextRun();
    $section->addText("Lampiran surat permohonan No. \t\t\t\tPanngkalpinang, {$tanggal}", "paragraph2");
    $paragraphStyleName = 'pStyle';
    $phpWord->addParagraphStyle($paragraphStyleName, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));


    $textrun = $section->addTextRun();

    $section->addText('SHIPPING MARK', "paragraph3", $paragraphStyleName);
    $textrun = $section->addTextRun();
    $i = 1;
    foreach ($pengirimanItem as $pi) {
      $textrun = $section->addTextRun();
      $textrun->addText("({$i})");
      $textrun->addTextBreak();
      $resultshipping_mark = str_replace(array("\n"), "<w:br/>", $pi['shipping_mark']);
      // $shipping_mark = "{$resultshipping_mark}, <w:br/>";
      $textrun->addText("$resultshipping_mark");
      $i++;
    }
    $textrun = $section->addTextRun();


    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    // FileIO::headerDownloadDocx('Form Pengajuan Mutu - ' . $pengiriman['nama_pengiriman']);
    FileIO::headerDownloadDocx($filename);

    $objWriter->save("php://output");
    // } catch(Exception $e){
    //   ExceptionHandler::handle($e);
    // }
  }

  public function format_permohonan_bp3l_to_bpsmb()
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
    $filename = 'Permohonan Kepada BPSMB__' . ($perusahaan['nama_perusahaan'] ? $perusahaan['nama_perusahaan'] : 'NONAME') . '_ID' . $perusahaan['id_perusahaan'] . $pengiriman['id_pengiriman'];

    // $pengiriman = 'nama pengirim';
    // $pengirimanItem = 'nama pengirim';
    // $perusahaan = 'nama pengirim';
    // $siup = 'nama pengirim';
    // $no_siup = 'nama pengirim';


    $phpWord = new PhpOffice\PhpWord\PhpWord();
    $phpWord->addFontStyle('h3', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));
    $phpWord->addFontStyle('paragraph', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000'));
    $phpWord->addFontStyle('paragraph_bold', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => true));

    $section = $phpWord->addSection(array(
      'marginLeft' => 1200, 'marginRight' => 600,
      'marginTop' => 600, 'marginBottom' => 600
    ));
    // $section->addImage(base_url('assets/img/head_bp3l.png'),array('height' => 70, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

    $tanggal = CustomFunctions::tanggal_indonesia(date("Y-m-d"));
    $section->addText("Panngkalpinang, {$tanggal}", "paragraph");

    $textrun = $section->addTextRun();
    $year = explode("-", $pengiriman['created_at'])[0];
    $textrun->addText("Nomor\t\t: ", 'paragraph');
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
    $textrun->addText("\tPANGKALPINANG", 'paragraph_bold');

    $textrun = $section->addTextRun();
    $textrun->addText("Dengan hormat,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("Bersama ini kami BP3L meneruskan permohonan dari {$perusahaan['nama_perusahaan']} untuk melakukan pengambilan contoh (sampling) dalam rangka uji mutu barang terkait pengajuan IG MWP dengan data sebagai berikut:", 'paragraph');
    // $textrun->addText("\tSehubungan dengan rencana kegiatan Ekspor yang dilakukan perusahaan kami untuk produk {$pengiriman['nama_komoditi']}, dengan data sebagai berikut :", 'paragraph');

    $noSpace = array('spaceAfter' => 0);
    $fancyTableStyle = array('borderSize' => 1, 'borderColor' => '000000', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
    $spanTableStyleName = 'Colspan Rowspan';
    $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
    $table = $section->addTable($spanTableStyleName);


    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Perusahaan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['nama_perusahaan'], array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Alamat Perusahaan');
    $table->addCell(1, $cellVCentered)->addText(':');
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_perusahaan_full'] . ' ,' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot']);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Alamat Gudang', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($perusahaan['lok_gudang_penyimpanan_full'] . ' ,' . $perusahaan['lok_gudang_penyimpanan_kec'] . ' - ' . $perusahaan['lok_gudang_penyimpanan_kabkot'], array(), $noSpace);


    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nomor SIUP Perusahaan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($no_siup, array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Komoditi', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['nama_komoditi'], array(), $noSpace);


    $negara_tujuan = '';
    $berat = '';
    $berat_gross = '';
    $berat_total = 0;
    $berat_total_gross = 0;
    $jenis_pengemasan = '';
    $jumlah_karung = '';
    $shipping_mark = '';
    $nama_jenis_pengemasan = '';
    $nama_jenis_mutu = '';
    $nama_importir = '';
    $keterangan_marking = '';
    $nomor_kontrak = '';
    $i = 1;
    foreach ($pengirimanItem as $pi) {

      $negara_tujuan .= "{$i}) {$pi['city']} - {$pi['nama_negara']}, <w:br/>";
      $berat .= "{$i}) {$pi['netto']} KG + ";
      $berat_gross .= "{$i}) {$pi['gross']} KG + ";
      $nama_jenis_mutu .= "{$i}) {$pi['nama_jenis_mutu']}, ";
      $berat_total += $pi['netto'];
      $berat_total_gross += $pi['gross'];
      $jenis_pengemasan .= "{$i}) {$pi['nama_jenis_pengemasan']}, <w:br/>";
      $jumlah_karung .= "{$i}) {$pi['jumlah_pengemasan']} {$pi['nama_jenis_pengemasan']}, <w:br/>";

      $nama_importir .= "{$i}) {$pi['nama_importir']}, <w:br/>";
      if (!empty($pi['keterangan_marking'])) {
        $keterangan_marking .= "{$i}) {$pi['keterangan_marking']}, <w:br/>";
      } else {
        $keterangan_marking .= "- , ";
      }

      $nomor_kontrak .= "{$i}) {$pi['nomor_kontrak']}, ";
      $i++;
    }
    $negara_tujuan = substr($negara_tujuan, 0, -9);
    $keterangan_marking = substr($keterangan_marking, 0, -9);
    $nomor_kontrak = substr($nomor_kontrak, 0, -2);
    $berat = substr($berat, 0, -3);
    $berat_gross = substr($berat_gross, 0, -3);
    $nama_jenis_mutu = substr($nama_jenis_mutu, 0, -2);
    $shipping_mark = substr($shipping_mark, 0, -9);
    $nama_importir = substr($nama_importir, 0, -9);
    $jenis_pengemasan = substr($jenis_pengemasan, 0, -9);
    $jumlah_karung = substr($jumlah_karung, 0, -9);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Negara Tujuan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($negara_tujuan, array(), $noSpace);

    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Netto', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    // $table->addCell(5000, $cellVCentered)->addText($berat_total .' KG ( '.$berat .' )', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($berat, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Gross', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($berat_gross, array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jenis Pengemasan', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($jenis_pengemasan, array(), $noSpace);
    $table->addRow();

    $table->addCell(4000, $cellVCentered)->addText('Jumlah Partai/Lot', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($pengiriman['jumlah_partai'], array(), $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Karung', array(), $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', array(), $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($jumlah_karung, array(), $noSpace);


    $textrun = $section->addTextRun();
    $textrun->addText("Demikianlah surat permohonan ini kami buat. Atas perhatian dan kerjasamanya kami ucapkan terima kasih.", 'paragraph');
    $textrun->addTextBreak();

    // $textrun = $section->addTextRun();
    // $textrun->addText("Hormat Kami,", 'paragraph');
    // $textrun->addTextBreak();
    // $textrun->addText("KETUA BP3L PROV KEP BABEL", 'paragraph');
    // $textrun->addTextBreak(5);
    // $textrun->addText("RAFKI HARISKA, SKM", 'paragraph_bold');
    // $textrun->addTextBreak();

    $textrun = $section->addTextRun();
    $textrun->addText("Hormat Kami,", 'paragraph');
    $textrun->addTextBreak();
    $textrun->addText("KETUA BP3L PROV.KEP.BABEL", 'paragraph');
    $textrun->addTextBreak(6);
    $textrun->addText('RAFKI HARISKA, SKM', 'paragraph_bold');
    $textrun->addTextBreak();

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    // FileIO::headerDownloadDocx('Form Pengajuan Mutu - ' . $pengiriman['nama_pengiriman']);
    FileIO::headerDownloadDocx($filename);

    $objWriter->save("php://output");
    // } catch(Exception $e){
    //   ExceptionHandler::handle($e);
    // }
  }
}
