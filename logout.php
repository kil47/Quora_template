<?php
session_start();
session_destroy("$lid");
header("location:tutor_login_student.php");
?>
