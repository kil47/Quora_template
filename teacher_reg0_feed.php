<?php
include "connection.php";
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$table="create table teacher_login
( id int auto_increment,
email varchar(50),
password varchar(30),
primary key(id)
)";
echo $table;
mysqli_query($con,$table);
$select="select * from teacher_login where email='".$email."'";
$ret=mysqli_query($con,$select);
$check=mysqli_num_rows($ret);
if($check>0)
{
    echo
    "<script>
alert('email already in existence');
</script>";
    header("location:teacher_reg0.php");
}
else {
    $insert = "insert into teacher_login(email,password)values('" . $email . "','" . $password . "')";
    if (mysqli_query($con, $insert))
    {
        $id = mysqli_insert_id($con);
        //$_SESSION['te-id'] = $id;
       // print $_session['te-id'];
        header("location:teacher_reg1.php");
    }
}
?>