<?php
include "connection.php";
session_start();
if(!isset($_SESSION['te-id']))
{ header("location:teacher_reg0.php");
}
else echo $_session['te-id'];
?>

<html>
<head>
    <title>Teacher_login</title>
    <link rel="stylesheet" href="library/bootstrap.css">
    <link rel="stylesheet" href="library/format.css">
    <script src="library/bootstrap.min.js"></script>
    <script src="library/jquery-1.9.1.js"></script>
</head>
<body>
<div class="container">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Teacher_login1</div>
            <div class="panel-body">
                <form action="teacher_reg1_feed.php" method="post">
                    <title>first_name</title>
                    <input type="text" name="fname" class="form-control" placeholder="first name" required="required">
                    <title>Middle name</title>
                    <input type="text" name="mname" class="form-control" placehlder="Middle name" required="required">
                    <title>last name</title>
                    <input type="text" name="lname" class="form-control" placeholder="last name" required="required">
                    <title>domain</title>
                    <select name="domain" class="form-control">
                        <option>Literature</option>
                        <option>Computer</option>
                        <option>General knowledge</option>
                        <option>Agriulture</option>
                        <option>civil</option>
                        <option>Mechanical</option>
                        <option>Electrical</option>
                    </select>
                    <title>Cabin no</title>
                    <input type="text" name="cabin_no" class="form-control" placeholder="47-201-12" required="required">
                     <input type="submit" value="Register">
                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>