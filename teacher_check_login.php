<?php
include "connection.php";
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$select="select * from login where email='".$email."'and password='".$password."'";
$ret=mysqli_query($con,$select);
$check=mysqli_num_rows($ret);
$val=mysqli_fetch_assoc($ret);
if($check>0)
{session_start();
    $_SESSION['tid'] = $val['id'];
    //echo $_SESSION['tid'];
   header("location:teacher_home.php");
}
else
    header("location:teacher_login.php");
?>