<?php
session_start();
require_once "../components/connect.php";

session_destroy();
header("Location: login.php");
