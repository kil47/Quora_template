<?php
session_start();
session_destroy("$tid");
header("location:teacher_login.php");

?>
