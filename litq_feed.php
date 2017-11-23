<?php
include "connection.php";
session_start();
if(!isset($_SESSION['lid']))
{ header("location:tutor_login_student.php");
}
else {
    $table = " create table quest
     ( id int auto_increment,
     question varchar(300),
     email varchar(50),
     category varchar(30),
     primary key(id)
     )";

    //echo $table;
    mysqli_query($con, $table);
    $question = $_REQUEST['question'];
    $category = $_REQUEST['category'];
    $select = "select * from quest where question='" . $question . "'and category='" . $category . "'";
   // echo $select;
    $ret = mysqli_query($con, $select);
    $check = mysqli_num_rows($ret);
//$val=mysqli_fetch_assoc($run);
    if ($check > 0) {
        echo "<script>
alert('Question already asked for this category');
window.location='tutor_home.php';
</script>";


    } else {

        //$category = $_REQUEST['category'];
        $select = "select email from login where id=" . $_SESSION['lid'];
        //echo $select;
        $ret = mysqli_query($con, $select);
        $value = mysqli_fetch_assoc($ret);
        $email = $value['email'];
//    echo $email;
        $insert = "insert into quest(question,email,category)values('" . $question . "','" . $email . "','" . $category . "')";
        if (mysqli_query($con, $insert)) {
            $id = $id = mysqli_insert_id($con);
        }
        //  echo $id;
        $answer = " ";
        $upvote = 0;
        $table = "create table solution
(id int auto_increment,
queId int,
category varchar(20),
answer varchar(500),
upvote int,
primary key(id)
)";
        mysqli_query($con, $table);
        $insert = "insert into solution(queId,category,answer,upvote)values('" . $id . "','" . $category . "','" . $answer . "','" . $upvote . "')";
        mysqli_query($con, $insert);

       header("location:tutor_home.php");
    }
}
?>