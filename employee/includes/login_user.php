<?php
include('../includes/controller/funtion.php');
$db_ = new DB_();


session_start();
if (isset($_SESSION['employee_login'])) {
    $session = $_SESSION['employee_login'];
    $user_login = $db_->user_login($session)->fetch(PDO::FETCH_ASSOC);
} else {
    header('location: ../login/index');
}

$project = $db_->select_project()->fetch(PDO::FETCH_ASSOC);