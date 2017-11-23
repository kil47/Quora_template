<?php
include "connection.php";
session_start();
if(!isset($_SESSION['tid']))
{ header("location:teacher_login.php");
}
?>

<html>
<head>
    <title>Teacher_home</title>
    <link rel="stylesheet" href="library/bootstrap.css">
    <link rel="stylesheet" href="library/dropdown.css">
    <script src="library/jquery-1.9.1.js"></script>
    <script src="library/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
        <ul class="menu active">

            <li class="list active"><h3><a href="tutor_home.php"  title="home" target="_blank">Home</a></h3></li>
            <div class="dropdown">
                <button onclick="drop()" class="dropbtn">Category</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="#">Teacher</a>
                    <a href="#">student</a>
                </div>
            </div>

            <button class="btn btn-primary" data-toggle="modal" data-target="#demo" id="que">Question</button>
                <div class="modal fade" id="demo" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" id="qhead">Question</div>
                            <div class="modal-body" id="qbody">h</div>
                        </div>
                    </div>
                </div>


            <li class="list"><h3><a href="teacher_logout.php" id="logout">Logout</a></h3></li>
        </ul>
</div>
<script>
    $(document).ready(function()
    { $("#que").click(function()
    { $("#qhead").text("Questions");
        $("#qbody").load("question.php");
            });
    });
</script>
<div class="container">
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Feeds from your category</div>
                <div class="panel-body" id="feed"></div>
                    </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Pic of the day</div>
            <div class="panel-body" id="images"></div>
            </div>
        </div>
    </div>

</body>
</html>
<script>
    $(document).ready(function() {
        $("#feed").load("litfeed.php");
        $("#images").load("litimages.php");
    });
</script>
