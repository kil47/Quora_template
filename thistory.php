<?php
include "connection.php";
session_start();
if(!isset($_SESSION['lid']))
{ header("location:teacher_login.php");
}
$select="select email  from login where id='".$_SESSION['lid']."'";
$ret=mysqli_query($con,$select);
$val=mysqli_fetch_assoc($ret);
echo $val['email'];

?>