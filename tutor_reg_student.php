<?php
include "connection.php";
session_start();
//echo $_SESSION['rid'];
if(!isset($_SESSION['rid']))
{
    echo"
<script>
window.location='tutor_reg0_student.php';
</script>";
}
?>
<html>
<head>
    <title>reg_Student</title>
<link rel="stylesheet" href="library/bootstrap.css";>
    <link rel="stylesheet" href="library/format.css";>
    </head>
<body >
<div class="header">
<h1>e-tutoring</h1>
    <?php
    $id=$_REQUEST['id'];
    //echo $id;
    ?>
</div>
<div class="container">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Registration form</div>
            <div class="panel-body">
                <form action="tutor_feed_reg_student.php" method="get">
                    <title>first name</title>
                    <br><input type="text" name="fname" class="form-control" required="required" placeholder="first name">
                    <title>middle name</title>
                    <br><input type="text" name="mname" class="form-control" placeholder="middle name">
                    <title>last name</title>
                    <br><input type="text" name="lname" class="form-control" placeholder="last name">
                    <title>dob</title>
                    <br><input type="date" name="dob" class="form-control" placeholder="dob">
                    <title>Nationality</title>
                    <br><select name="country" class="form-control">
                        <option>India</option>
                        <option>Usa</option>
                        <option>Pakistan</option>
                        <option>England</option>
                        <option>canada</option>
                        <option>Sri Lanka</option>

                    </select>
                    <br><select name="domain" class="form-control">
                        <option>computer science</option>
                        <option>physical science</option>
                        <option>political science</option>
                        <option>social studies</option>
                        <option>english</option>
                        <option>neurology</option>
                    </select>
                    <br><input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br><input type="submit" value="register">
                     </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>