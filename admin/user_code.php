<?php
$url = 'user';
if (isset($_GET['userDelete'])) {
    $id = $_GET['userDelete'];
    if ($id == $user_login['id_user']) {
        $text = 'ไม่สามารถลบข้อมูลของตัวเองได้ !';
        include('../includes/includes/errorA.php');
    }
    if ($db_->delete_user($id)) {
        $text = 'ลบข้อมูลเรียบร้อย';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาดในการลบข้อมูล !';
        include('../includes/includes/errorA.php');
    }
}

if (isset($_POST['saveSubmit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $agency = $_POST['agency'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $role = $_POST['role'];
    $id_pos = $_POST['id_pos'];

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
    } elseif (empty($password)) {
        $text = 'กรุณากรอกรหัสผ่าน !';
        include('../includes/includes/errorA.php');
    } elseif (empty($password2)) {
        $text = 'กรุณากรอกยืนยันรหัสผ่าน !';
        include('../includes/includes/errorA.php');
    } elseif (empty($role)) {
        $text = 'กรุณาเลือกสถานะผู้ใช้ !';
        include('../includes/includes/errorA.php');
    } elseif (empty($id_pos)) {
        $text = 'กรุณาเลือกตำแหน่ง !';
        include('../includes/includes/errorA.php');
    }

    if ($password != $password2) {
        $text = 'กรุณากรอกรหัสผ่านให้เหมือนกัน !';
        include('../includes/includes/errorA.php');
    }

    if ($db_->checkUsername($username)->rowCount() > 0) {
        $text = 'มี Username นี้อยู่ในระบบแล้ว !';
        include('../includes/includes/errorA.php');
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = $db_->insertUser(
        $name,
        $phone,
        $email,
        $username,
        $agency,
        $password,
        $role,
        $id_pos,
    );
    if ($sql) {
        $text = 'บันทึกข้อมูลเรียบร้อย';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาดในการบันทึกข้อมูล !';
        include('../includes/includes/errorA.php');
    }
}

if (isset($_POST['updateSubmit'])) {
    $id_user = $_POST['id_user'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $agency = $_POST['agency'];
    $role = $_POST['role'];
    $id_pos = $_POST['id_pos'];

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
    } elseif (empty($id_pos)) {
        $text = 'กรุณาเลือกตำแหน่ง !';
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
        $id_pos,
    );
    if ($sql) {
        $text = 'แก้ไขข้อมูลเรียบร้อย';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}
