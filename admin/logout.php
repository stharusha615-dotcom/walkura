<?php
session_start();

$_SESSION = array();
session_destroy();

header("http://172.20.10.2/walkura/walkura.html");
exit;
?>