<?php
if (isset($_GET['userDelete'])) {
    $id = $_GET['userDelete'];
    if ($db_->delete_jb($id)) {
        $text = 'ลบข้อมูลเรียบร้อย';
        $url = 'user_jb';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}

if (isset($_POST['saveSubmit'])) {
    $name_jb = $_POST['name_jb'];

    if (empty($name_jb)) {
        $text = 'กรุณากรอกชื่อ-นามสกุล !';
        include('../includes/includes/errorA.php');
    } 

    if ($db_->checkname_jb($name_jb)->rowCount() > 0) {
        $text = 'มีชื่อ-นามสกุลนี้อยู่ในระบบแล้ว !';
        include('../includes/includes/errorA.php');
    }

    $sql = $db_->insertjb(
        $name_jb,
    );
    if ($sql) {
        $text = 'บันทึกข้อมูลเรียบร้อย';
        $url = 'user_jb';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}

if (isset($_POST['updateSubmit'])) {
    $id_jb = $_POST['id_jb'];
    $name_jb = $_POST['name_jb'];

    if (empty($name_jb)) {
        $text = 'กรุณากรอกชื่อ-นามสกุล !';
        include('../includes/includes/errorA.php');
    } 

    $sql = $db_->updatejb(
        $id_jb,
        $name_jb,
    );
    if ($sql) {
        $text = 'แก้ไขข้อมูลเรียบร้อย';
        $url = 'user_jb';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}
