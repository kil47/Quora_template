<?php
include "connection.php";
session_start();
//echo $_SESSION['lid'];
if(!isset($_SESSION['lid']))
{ header("location:tutor_login_student.php");
}
$select="select email from login where id='".$_SESSION['lid']."'";
//echo $select;
$ret=mysqli_query($con,$select);
$val=mysqli_fetch_assoc($ret);
$email=$val['email'];
//echo $email;
$select="select * from quest where email='".$email."'";
//echo $select;
$ret=mysqli_query($con,$select);
echo "<b>Questions asked by you</b>";
echo "<br>"."<hr>";
while($val=mysqli_fetch_assoc($ret))
{
    echo $val['question'];
echo "<br>";
    echo "<hr>";
}

?>