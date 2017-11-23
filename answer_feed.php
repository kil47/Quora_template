<?php
include "connection.php";
session_start();
$id=$_REQUEST['id'];
echo $id;
$answer=$_REQUEST['answer'];
echo $answer;
echo "<br>";
$update="update solution set answer='".$answer."'where queId='".$id."'";
//echo $update;
mysqli_query($con,$update);
header("location:teacher_home.php");

?>
