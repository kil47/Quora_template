<?php
include "connection.php";
session_start();
if(!isset($_SESSION['rid']))
{ echo"
<script>
window.location='tutor_reg0_student.php';
</script>";
}

$fname=$_REQUEST['fname'];
$mname=$_REQUEST['mname'];
$lname=$_REQUEST['lname'];
$dob=$_REQUEST['dob'];
$country=$_REQUEST['country'];
$field=$_REQUEST['domain'];
$id=$_REQUEST['id'];
$table="create table student_details
( id int auto_increment,
student_id int,
first_name varchar(45),
middle_name varchar(30),
last_name varchar(30),
dob varchar(30),
country varchar(30),
field varchar(30),
 primary key(id)
 )";
mysqli_query($con,$table);

$insert="insert into student_details(student_id,first_name,middle_name,last_name,dob,country,field)values('".$id."','".$fname."','".$mname."','".$lname."','".$dob."','".$country."','".$field."')";
mysqli_query($con,$insert);
session_destroy();
echo
"<script>
window.location='tutor_login_student.php';
</script>
";
?>