<?php
// error_reporting(0);
include('../includes/includes/html.php');
include('../includes/includes/function.php');
include('../includes/controller/funtion.php');
$db_ = new DB_();

require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_POST['importSubmit'])) {
    $excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    if (!empty($_FILES['file_upload']['name']) && in_array($_FILES['file_upload']['type'], $excelMimes)) {
        if (is_uploaded_file($_FILES['file_upload']['tmp_name'])) {
            $reader = new Xlsx();
            $spreadsheet = $reader->load($_FILES['file_upload']['tmp_name']);
            $worksheet = $spreadsheet->getActiveSheet();
            $worksheet_arr = $worksheet->toArray();
            unset($worksheet_arr[0]);
            foreach ($worksheet_arr as $row) {
                $name_pro = $row[0];
                $user_pro = 157;
                $start_pro = date('Y-m-d');
                $end_pro = date('Y-m-d');
                $type_pro = 1;
                $agency_id = 1;

                $db_->insertProject(
                    $name_pro,
                    $user_pro,
                    $agency_id,
                    $start_pro,
                    $end_pro,
                    $type_pro,
                );
            }
            $text = 'อัพโหลดข้อมูลเรียบร้อย';
            $url = 'project';
            include('../includes/includes/successA.php');
        } else {
            $text = 'เกิดข้อผิดพลาดในการอัพโหลด !';
            include('../includes/includes/errorA.php');
        }
    } else {
        $text = 'กรุณาอัพโหลดไฟล์ MS-Excel !';
        include('../includes/includes/errorA.php');
    }
}