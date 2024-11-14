<?php

if (isset($_POST['saveSubmit'])) {
    $name_vil = $_POST['name_vil'];
    $mu_vil = $_POST['mu_vil'];
    $am_vil = $_POST['am_vil'];
    $tam_vil = $_POST['tam_vil'];

    $sql = $db_->insert_vil(
        $name_vil,$mu_vil,$am_vil,$tam_vil
    );

    if ($sql) {
        $text = 'บันทึกข้อมูลเรียบร้อย';
        $url = 'vil';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}
if (isset($_POST['editSubmit'])) {
    $id_vil = $_POST['id_vil'];
    $name_vil = $_POST['name_vil'];
    $mu_vil = $_POST['mu_vil'];
    $am_vil = $_POST['am_vil'];
    $tam_vil = $_POST['tam_vil'];

    $sql = $db_->update_vil(
        $id_vil,$name_vil,$mu_vil,$am_vil,$tam_vil
    );

    if ($sql) {
        $text = 'แก้ไขข้อมูลเรียบร้อย';
        $url = 'vil';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}

if (isset($_GET['Delete'])) {
    $id_vil = $_GET['Delete'];

    $sql = $db_->delete_vil($id_vil);
    if ($sql) {
        $text = 'ลบข้อมูลเรียบร้อย';
        $url = 'vil';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}
