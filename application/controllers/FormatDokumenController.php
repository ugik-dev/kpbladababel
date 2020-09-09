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
    $pdf->Cell(50, 7, 'Nama Perusahaan', 0, 0);
    $pdf->Cell(50, 7, ': ' . ($data['nama_perusahaan'] ? $data['nama_perusahaan'] : '-'), 0, 1);
    $pdf->Cell(50, 7, 'Nama Pimpinan', 0, 0);
    $pdf->Cell(50, 7, ': ' . ($data['nama_pimpinan'] ? $data['nama_pimpinan'] : '-'), 0, 1);
    $pdf->Cell(50, 7, 'Jenis Perusahaan', 0, 0);
    $pdf->Cell(50, 7, ': ' . ($data['nama_jenis_perusahaan'] ? $data['nama_jenis_perusahaan'] : '-'), 0, 1);
    $pdf->Cell(50, 7, 'No Telepon', 0, 0);
    $pdf->Cell(50, 7, ': ' . ($data['no_telepon'] ? $data['no_telepon'] : '-'), 0, 1);
    $pdf->Cell(50, 7, 'Email', 0, 0);
    $pdf->Cell(50, 7, ': ' . ($data['email'] ? $data['email'] : '-'), 0, 1);
    $pdf->Cell(50, 7, 'Lokasi Perusahaan', 0, 0);
    $pdf->MultiCell(
      100,
      7,
      ': ' . ($data['lok_perusahaan_full'] ? $data['lok_perusahaan_full'] : '-') .
        ($data['lok_perusahaan_kec'] ? ', ' . $data['lok_perusahaan_kec'] : '-') .
        ($data['lok_perusahaan_kabkot'] ? ', ' . $data['lok_perusahaan_kabkot'] : '-'),
      0,
      1
    );
    $pdf->Cell(50, 7, 'Lokasi Unit', 0, 0);
    $pdf->MultiCell(
      100,
      7,
      ': ' . ($data['lok_unit_pengelolaan_full'] ? $data['lok_unit_pengelolaan_full'] : '-') .
        ($data['lok_unit_pengelolaan_kec'] ? ', ' . $data['lok_unit_pengelolaan_kec'] : '-') .
        ($data['lok_unit_pengelolaan_kabkot'] ? ', ' . $data['lok_unit_pengelolaan_kabkot'] : '-'),
      0,
      1
    );
    $pdf->Cell(50, 7, 'Lokasi Gudang', 0, 0);
    $pdf->MultiCell(
      100,
      7,
      ': ' . ($data['lok_gudang_penyimpanan_full'] ? $data['lok_gudang_penyimpanan_full'] : '-') .
        ($data['lok_gudang_penyimpanan_kec'] ? ', ' . $data['lok_gudang_penyimpanan_kec'] : '-') .
        ($data['lok_gudang_penyimpanan_kabkot'] ? ', ' . $data['lok_gudang_penyimpanan_kabkot'] : '-'),
      0,
      1
    );
    $pdf->Cell(50, 7, 'Dokumen', 0, 0);
    $tmp = ':';

    $itmp = ' ';
    foreach ($dok as $key => $value) {
      $tmp = $tmp . $itmp . $value['nama_jenis_dokumen_perusahaan'];
      $itmp = ', ';
    }
    $pdf->Cell(50, 7, $tmp, 0, 1);

    foreach ($dok as $key => $value) {
      $pdf->Cell(50, 7, '  NO ' . $value['nama_jenis_dokumen_perusahaan'], 0, 0);
      $pdf->Cell(50, 7, ': ' . ($value['no_dokumen_perusahaan'] ? $value['no_dokumen_perusahaan'] : '-'), 0, 1);
    }
    $pdf->Cell(50, 7, ' ', 0, 1);
    $pdf->Cell(50, 7, 'Jumlah Pengiriman', 0, 0);
    $i = 0;
    foreach ($pengiriman as $key => $value) {
      $i++;
    }
    $pdf->Cell(50, 7, ': ' . $i . 'x', 0, 1);
    foreach ($pengiriman as $key => $value) {
      $pdf->Cell(50, 7, 'Tanggal Pengusulan ', 0, 0);
      $pdf->Cell(50, 7, ': ' . ($value['created_at'] ? $value['created_at'] : '-'), 0, 1);
      $pdf->Cell(50, 7, '    Item ', 0, 0);
      $pdf->MultiCell(130, 7, ': ' . ($value['item_v2'] ? $value['item_v2'] : '-'), 0, 1);
    }

    $pdf->SetFont('Arial', '', 10);

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
    // try{
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

    echo json_encode($logo_img);
    echo json_encode($no_nib);
    echo json_encode($siup);
    echo json_encode($pengiriman);
    echo json_encode($pengirimanItem);
    echo json_encode($perusahaan);

    return 0;
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
      // $fancyTableStyle = array('borderSize' => 1, 'borderColor' => '000000', 'height' => 200, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));

      // $fancyTableStyle = array('lineStyle' => 'no border', 'borderColor' => 'no border', 'height' => 300, 'cellMargin' => 40, 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      // $cellVCentered = array('valign' => 'center', 'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0));
      // $spanTableStyleName = 'Colspan Rowspan';
      // $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
      // $table = $section->addTable($spanTableStyleName, array('spaceAfter' => 0));
      // $table->addRow();
      // $table->addCell(2000, $cellVCentered)->addImage(base_url('uploads/dokumen_perusahaan/') . $logo_img, array('height' => 75, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,  'spaceAfter' => 0));;
      // $myCell1 = $table->addCell(7400, $cellVCentered);
      // $myCell1->addText($perusahaan['nama_perusahaan'], array('name' => 'Times New Roman', 'size' => 12, 'color' => '000000', 'bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 10));
      // $myCell1->addText($perusahaan['lok_perusahaan_full'] . ', ' . $perusahaan['lok_perusahaan_kec'] . ' - ' . $perusahaan['lok_perusahaan_kabkot'], array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      // $myCell1->addText('Provinsi Kepulauan Bangka Belitung', array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      // $myCell1->addText('Email : ' . $perusahaan['email'] . ' Telp : ' . $perusahaan['no_telepon'], array('name' => 'Times New Roman', 'size' => 11, 'color' => '000000', 'bold' => false), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 0));
      // $section->addLine(array('weight' => 1.25, 'width' => 465, 'height' => 0, 'color' => '38c172'), array('spaceAfter' => 0));
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
    $textrun->addText("Nomor\t  : \t(no surat perusahaan)", 'paragraph');
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
    $table->addCell(4000, $cellVCentered)->addText('Negara Tujuan', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($negara_tujuan, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nama Importir', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nama_importir, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Nomor Kontrak', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nomor_kontrak, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Keterangan Marking', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($keterangan_marking, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Rencana Mutu', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($nama_jenis_mutu, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Netto', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($berat, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Gross', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($berat_gross, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jenis Pengemasan', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($jenis_pengemasan, 'paragraph', $noSpace);
    $table->addRow();
    $table->addCell(4000, $cellVCentered)->addText('Jumlah Karung', 'paragraph', $noSpace);
    $table->addCell(1, $cellVCentered)->addText(':', 'paragraph', $noSpace);
    $table->addCell(5000, $cellVCentered)->addText($jumlah_karung, 'paragraph', $noSpace);
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
      $resultshipping_mark = str_replace(array("\n"), "<w:br/>", $pi['shipping_mark']);
      // $shipping_mark = "{$resultshipping_mark}, <w:br/>";
      $textrun->addText("$resultshipping_mark", 'paragraph');
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
      $resulket_produk = str_replace(array("\n"), "<w:br/>", $pi['keterangan_penggunaan_produk']);
      // $shipping_mark = "{$resultshipping_mark}, <w:br/>";
      $textrun->addText("$resulket_produk", 'paragraph');
      $i++;
    }


    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    // FileIO::headerDownloadDocx('Form Pengajuan Mutu - ' . $pengiriman['nama_pengiriman']);
    FileIO::headerDownloadDocx($filename);

    $objWriter->save("php://output");
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
