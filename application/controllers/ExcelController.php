<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelController extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("PerusahaanModel", "DokumenPerusahaanModel", "PengirimanModel", "PengirimanItemModel"));
        $this->load->helper(array('DataStructure', 'Validation'));
        $this->db->db_debug = FALSE;
    }

    public function laporan()
    {
        try{
        $filter = $this->input->get();
        $filter['exstatus_proposal'] = 'DIMULAI';
        $filter['download_laporan'] = 'true';
        $data = $this->input->get();
        $data = $this->PengirimanModel->getAll($filter);
        // echo json_encode($data );
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

        $spreadsheet->getProperties()->setCreator('Integrasi')
            ->setLastModifiedBy('Integrasi')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');
        // SETTING WIDTH 	
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(5);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(20);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('C')->setWidth(12);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('D')->setWidth(37);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('E')->setWidth(9);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('F')->setWidth(30);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('G')->setWidth(30);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('H')->setWidth(15);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('I')->setWidth(15);
        // Add some data
        $spreadsheet->getActiveSheet()->getStyle('A1:I5')->getAlignment()->setHorizontal('center')->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:I5')->getAlignment()->setVertical('center')->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A6:I999')->getAlignment()->setVertical('center')->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('A6:I999')->getAlignment()->setHorizontal('left')->setWrapText(true);
        $spreadsheet->setActiveSheetIndex(0)->getStyle('A5:I5')->applyFromArray(array(
            'borders' => array(
                'diagonaldirection' => \PhpOffice\PhpSpreadsheet\Style\Borders::DIAGONAL_BOTH,
                'allBorders' => array('borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
            ),
        ));

        $spreadsheet->setActiveSheetIndex(0)
            // ->mergeCells('A1:C1')
            ->mergeCells('A1:I1')
            ->setCellValue('A1', 'LAPORAN PERMOHONAN SETIFIKAT IG DAN UJI LAB ')
            ->mergeCells('A2:I2')
            ->setCellValue('A2', 'KANTOR PEMASARAN BERSAMA LADA BABEL')
            ->mergeCells('A3:I3')
            ->setCellValue('A3', 'TAHUN 2020');

        $spreadsheet->setActiveSheetIndex(0)
            // ->mergeCells('A1:C1')
            ->setCellValue('A5', 'No')
            ->setCellValue('B5', 'No Surat')
            ->setCellValue('C5', 'Tanggal Permohonan')
            ->setCellValue('D5', 'Nama Perusahaan')
            ->setCellValue('E5', 'Jumlah Partai')
            ->setCellValue('F5', 'Negara Tujuan')
            ->setCellValue('G5', 'Jenis Karung')
            ->setCellValue('H5', 'Mutu')
            ->setCellValue('I5', 'Status');
        $i = 6;
        foreach ($data as $key => $value) {
            // $tmp = $tmp . $itmp . $value['nama_jenis_dokumen_perusahaan'];
            // $itmp = ', ';
            $data_item = [];
            $filter['id_pengiriman'] = $value['id_pengiriman'];
            $data_item = $this->PengirimanItemModel->getAll($filter);
            $jenis_mutu = "";
            $nama_negara = "";
            $nama_jenis_pengemasan = "";
            foreach ($data_item as $key2 => $value2) {
                $jenis_mutu .= $value2['nama_jenis_mutu'] . " \n";
                $nama_negara .= $value2['nama_negara'] . " \n";
                $nama_jenis_pengemasan .= $value2['nama_jenis_pengemasan'] . " \n";
            }
            $jenis_mutu = substr($jenis_mutu, 0, -2);
            $nama_negara = substr($nama_negara, 0, -2);
            $nama_jenis_pengemasan = substr($nama_jenis_pengemasan, 0, -2);
            $spreadsheet->setActiveSheetIndex(0)
                // ->mergeCells('A1:C1')
                ->setCellValue('A' . $i, $i - 5)
                ->setCellValue('B' . $i, $value['no_surat'])
                ->setCellValue('C' . $i, explode(" ", $value['date_kpb'])[0])
                ->setCellValue('D' . $i, $value['nama_perusahaan'])
                ->setCellValue('E' . $i, $value['jumlah_partai'])
                ->setCellValue('F' . $i, $nama_negara)
                ->setCellValue('G' . $i, $nama_jenis_pengemasan)
                ->setCellValue('H' . $i, $jenis_mutu)
                ->setCellValue('I' . $i, $value['status_proposal']);
            $spreadsheet->setActiveSheetIndex(0)->getStyle('A' . $i . ':I' . $i)->applyFromArray(array(
                'borders' => array(
                    'diagonaldirection' => \PhpOffice\PhpSpreadsheet\Style\Borders::DIAGONAL_BOTH,
                    'allBorders' => array('borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
                ),
            ));
            $i++;
        }




        $writer = new Xlsx($spreadsheet); // instantiate Xlsx

        $filename = 'Laporan-SIM-KPB'; // set filename for excel file to be exported

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');    // download file 

    } catch (Exception $e){
        ExceptionHandler::handle($e);
      }

    }
    public function index()
    {

        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

        $sheet = $spreadsheet->getActiveSheet();

        // manually set table data value
        $sheet->setCellValue('A1', 'Gipsy Danger');
        $sheet->setCellValue('A2', 'Gipsy Avenger');
        $sheet->setCellValue('A3', 'Striker Eureka');

        $writer = new Xlsx($spreadsheet); // instantiate Xlsx

        $filename = 'list-of-jaegers'; // set filename for excel file to be exported

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');    // download file 
    }
}
