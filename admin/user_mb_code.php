<?php
$url = 'user_mb';
if (isset($_GET['userDelete'])) {
    $id = $_GET['userDelete'];
    if ($id == $user_login['id_user']) {
        $text = 'ไม่สามารถลบข้อมูลของตัวเองได้ !';
        include('../includes/includes/errorA.php');
    }
    $db_->delete_user_id($id);
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
    $id_pos = $_POST['id_pos'];
    $id_am = $_POST['id_am'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
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
    } elseif (empty($id_pos)) {
        $text = 'กรุณาเลือกตำแหน่ง !';
        include('../includes/includes/errorA.php');
    } elseif (empty($id_am)) {
        $text = 'กรุณาเลือกอำเภอ !';
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

    $sql = $db_->insertUser_mb(
        $name,
        $phone,
        $email,
        $username,
        $id_pos,
        $id_am,
        $password,
        $role,
    );

    $id_user = $db_->max_tbl_user()->fetch(PDO::FETCH_ASSOC)['id_user'];
    foreach ($_POST['id_tam'] as $key => $a) {
        $id_tam = $_POST['id_tam'][$key];
        $db_->insert_user_tam($id_tam,$id_user);
    }

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
    $id_pos = $_POST['id_pos'];
    $id_am = $_POST['id_am'];
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
    } elseif (empty($id_pos)) {
        $text = 'กรุณาเลือกตำแหน่ง !';
        include('../includes/includes/errorA.php');
    } elseif (empty($id_am)) {
        $text = 'กรุณาเลือกอำเภอ !';
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


    $sql = $db_->updateUser_mb(
        $id_user,
        $name,
        $phone,
        $email,
        $username,
        $id_pos,
        $id_am,
        $role,
        $password,
    );


    $db_->delete_user_id($id_user);
    foreach ($_POST['id_tam'] as $key => $a) {
        $id_tam = $_POST['id_tam'][$key];
        $db_->insert_user_tam($id_tam,$id_user);
    }

    if ($sql) {
        $text = 'แก้ไขข้อมูลเรียบร้อย';
        include('../includes/includes/successA.php');
    } else {
        $text = 'เกิดข้อผิดพลาด !';
        include('../includes/includes/errorA.php');
    }
}
