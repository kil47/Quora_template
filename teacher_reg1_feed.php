<?php
include "connection.php";
$fname=$_REQUEST['fname'];
$mname=$_REQUEST['mname'];
$lname=$_REQUEST['lname'];
$domain=$_REQUEST['domain'];
$cabin=$_REQUEST['cabin_no'];
$table="create table teacher_details
( id int auto_increment,
fname varchar(30),
mname varchar (40),
lname varchar (50),
domain varchar(20),
cabin varchar(30),
 primary key(id)
 )";
mysqli_query($con,$table);
?>

