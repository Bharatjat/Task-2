<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Download extends CI_Controller
{
    public function excelDownload()
    {
        require 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();

        /* set defolt font */
        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);

        /* set header */
        $spreadsheet->getActiveSheet()->setCellValue('A1', 'Subject Details');

        /* merging col for heading */
        $spreadsheet->getActiveSheet()->mergeCells("A1:F1");

        /* setting font */
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);

        /* cell allingment */
        $spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);

        /* setting column dimension */
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(13);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(13);

        /* set column name */
        $spreadsheet->getActiveSheet()->setCellValue('A2', 'Id');
        $spreadsheet->getActiveSheet()->setCellValue('B2', 'Name');
        $spreadsheet->getActiveSheet()->setCellValue('C2', 'Description');
        $spreadsheet->getActiveSheet()->setCellValue('D2', 'Time allocated');
        $spreadsheet->getActiveSheet()->setCellValue('E2', 'Number of student');
        $spreadsheet->getActiveSheet()->setCellValue('F2', 'Room no');

        //taking id and decoding it from json and store in a variable
        $id = json_decode($this->input->post('id'));

        /* getting data from database by passing id */
        $this->load->model('UserModel');
        $result =  $this->UserModel->getDataById($id);
        
        /* this variable starts from the position where we wont to store data in excel cell */
        $f = 3;

        /* loading data in the excel page */
        for ($i = 0; $i < sizeof($result); $i++) {
            $spreadsheet->getActiveSheet()->setCellValue("A$f", $result[$i]["id"]);
            $spreadsheet->getActiveSheet()->setCellValue("B$f", $result[$i]["name"]);
            $spreadsheet->getActiveSheet()->setCellValue("C$f", $result[$i]["description"]);
            $spreadsheet->getActiveSheet()->setCellValue("D$f", $result[$i]["time_allocated"]);
            $spreadsheet->getActiveSheet()->setCellValue("E$f", $result[$i]["number_of_student"]);
            $spreadsheet->getActiveSheet()->setCellValue("F$f", $result[$i]["room_no"]);
            $f++;
        }

        /* creating  */
        $writer = new Xlsx($spreadsheet);

        /* storing file and assining file name to it but this method will store file in the project folder */
        $writer->save("subjects.xlsx");
    }

    public function pdfDownload()
    {
        //taking id and decoding it from json and store in a variable
        $id = json_decode($this->input->post('id'));

        /* getting data from database by passing id */
        $this->load->model('UserModel');
        $data['result'] =  $this->UserModel->getDataById($id);

        /* loading view to set the data and getting data in a string formate */
        $html = $this->load->view('subjectDetails/outputPdfDetailPage',$data,true);

        require 'vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Subjects.pdf'); // opens in browser

    }
}
