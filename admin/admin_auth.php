<?php
session_start();
require_once "../components/connect.php";

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>
