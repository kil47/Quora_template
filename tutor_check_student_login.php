<?php
include "connection.php";

$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
//echo $email;
//echo $password;
$select="select * from login where email="."'".$email."'and password="."'".$password."'";
//echo $select;
$run=mysqli_query($select,$con);
$check=mysqli_num_rows($run);
$val=mysqli_fetch_assoc($run);
if($check>0)
{session_start();
    $_SESSION['lid'] = $val['id'];
//echo $_SESSION['lid'];
    header("location:tutor_home.php");
}
else {
echo "password not found";
header("location:tutor_login_student.php?msg=err");
}
?>