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
                $tam = $row[2];
                $am = $row[4];
                $mu = ($row[7] != null) ? $row[7] : '0';
                $name_mu = ($row[8] != '') ? $row[8] : '';

                if (
                    $tam == null and $am == null
                    and $mu == null and $name_mu == null
                ) {
                    $text = 'อัพโหลดข้อมูลเรียบร้อย';
                    $url = 'vil';
                    include('../includes/includes/successA.php');
                    exit();
                // } elseif (
                //     $tam == null or $am == null
                // ) {
                //     $db_->insert_vil_rq(
                //         $name_mu,
                //         $mu,
                //         $am,
                //         $tam
                //     );
                } else {
                    $tam = $db_->tam_wherename($tam)->fetch(PDO::FETCH_ASSOC)['idtm'];
                    $am = $db_->am_wherename($am)->fetch(PDO::FETCH_ASSOC)['idam'];

                    $db_->insert_vil(
                        $name_mu,
                        $mu,
                        $am,
                        $tam
                    );
                }
            }
            $text = 'อัพโหลดข้อมูลเรียบร้อย';
            $url = 'vil';
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
