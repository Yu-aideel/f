<?php
if (isset($_GET['userDelete'])) {
    $id = $_GET['userDelete'];
    if ($db_->delete_pos($id)) {
        $text = 'ลบข้อมูลเรียบร้อย';
        $url = 'position';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}

if (isset($_POST['saveSubmit'])) {
    $name_pos = $_POST['name_pos'];

    if (empty($name_pos)) {
        $text = 'กรุณากรอกชื่อตำแหน่ง !';
        include('../includes/includes/errorA.php');
    } 

    $sql = $db_->insertpos(
        $name_pos,
    );
    if ($sql) {
        $text = 'บันทึกข้อมูลเรียบร้อย';
        $url = 'position';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}

if (isset($_POST['updateSubmit'])) {
    $id_pos = $_POST['id_pos'];
    $name_pos = $_POST['name_pos'];

    if (empty($name_pos)) {
        $text = 'กรุณากรอกชื่อตำแหน่ง !';
        include('../includes/includes/errorA.php');
    } 

    $sql = $db_->updatepos(
        $id_pos,
        $name_pos,
    );
    if ($sql) {
        $text = 'แก้ไขข้อมูลเรียบร้อย';
        $url = 'position';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}
