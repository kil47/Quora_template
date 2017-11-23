<?php
include "connection.php";
session_start();
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$table=" create table login
     ( id int auto_increment,
     email varchar(30),
     password varchar(30),
     primary key(id)
     )";
echo $table;
mysqli_query($con,$table);
$exist="select * from login where email='".$email."'";
echo $exist;
$val=mysqli_query($con,$exist);
$check=mysqli_num_rows($val);
if($check>0)
{ 
header("location:tutor_reg0_student.php");
}
else {
    $insert = "insert into login(email,password)values('" . $email . "','" . $password . "')";

//echo $insert;
    if (mysqli_query($con, $insert)) {
        $id = mysqli_insert_id($con);
        $_SESSION['rid']=$id;
        header("location:tutor_reg_student.php?id=" . $id);

    }

}
?>