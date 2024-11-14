<?php
if (isset($_GET['userDelete'])) {
    $id = $_GET['userDelete'];
    if ($db_->delete_agency($id)) {
        $text = 'ลบข้อมูลเรียบร้อย';
        $url = 'user_agency';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}

if (isset($_POST['saveSubmit'])) {
    $name_agency = $_POST['name_agency'];

    if ($db_->checkname_agency($name_agency)->rowCount() > 0) {
        $text = 'มีชื่อหน่วยงานนี้อยู่ในระบบแล้ว !';
        include('../includes/includes/errorA.php');
    }

    $sql = $db_->insertAgency(
        $name_agency,
    );
    if ($sql) {
        $text = 'บันทึกข้อมูลเรียบร้อย';
        $url = 'user_agency';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}

if (isset($_POST['updateSubmit'])) {
    $id_agency = $_POST['id_agency'];
    $name_agency = $_POST['name_agency'];

    $sql = $db_->updateAgency(
        $id_agency,
        $name_agency,
    );
    if ($sql) {
        $text = 'แก้ไขข้อมูลเรียบร้อย';
        $url = 'user_agency';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}
