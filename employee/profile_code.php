<?php
$url = 'profile';

if (isset($_POST['updateSubmit'])) {
    $id_user = $_POST['id_user'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $agency = $_POST['agency'];
    $role = $_POST['role'];

    if (empty($name)) {
        $text = 'กรุณากรอกชื่อ-นามสกุล !';
        include('../includes/includes/errorA.php');
    } elseif (empty($phone)) {
        $text = 'กรุณากรอกเบอร์โทรศัพท์ !';
        include('../includes/includes/errorA.php');
    } elseif (empty($email)) {
        $text = 'กรุณากรอกอีเมล !';
        include('../includes/includes/errorA.php');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $text = 'กรุณากรอกอีเมล ตามรูปแบบของอีเมลให้ถูกต้อง !';
        include('../includes/includes/errorA.php');
    } elseif (empty($username)) {
        $text = 'กรุณากรอก Username !';
        include('../includes/includes/errorA.php');
    } elseif (empty($agency)) {
        $text = 'กรุณาเลือกหน่วยงาน !';
        include('../includes/includes/errorA.php');
    } elseif (empty($role)) {
        $text = 'กรุณาเลือกสถานะผู้ใช้ !';
        include('../includes/includes/errorA.php');
    }

    if (!empty($_POST['password']) and !empty($_POST['password2'])) {
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        if ($password != $password2) {
            $text = 'กรุณากรอกรหัสผ่านให้เหมือนกัน !';
            include('../includes/includes/errorA.php');
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $password = $_POST['datapassword'];
    }

    $sql = $db_->updateUser(
        $id_user,
        $name,
        $phone,
        $email,
        $username,
        $agency,
        $role,
        $password,
    );
    if ($sql) {
        $text = 'แก้ไขข้อมูลเรียบร้อย';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}
