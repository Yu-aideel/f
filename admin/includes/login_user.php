<?php
include('../includes/controller/funtion.php');
$db_ = new DB_();


session_start();
if (isset($_SESSION['admin_login'])) {
    $session = $_SESSION['admin_login'];
    $user_login = $db_->user_login($session)->fetch(PDO::FETCH_ASSOC);
} else {
    header('location: ../login/index');
}