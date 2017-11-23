<?php
include "connection.php";
session_start();
//echo $_SESSION['lid'];
if(!isset($_SESSION['lid']))
{ header("location:tutor_login_student.php");
}
?>
<html>
<head>
    <title>Learn it All</title>
    <link rel="stylesheet" href="library/bootstrap.css">
    <link rel="stylesheet" href="library/dropdown.css">
    <script src="library/jquery-1.9.1.js"></script>
    <script src="library/bootstrap.min.js"></script>
    <script src="library/rdajaxform.js"></script>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#demo" id="history">History</button>
        <div class="modal fade" id="demo" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" id="hhead">history</div>
                    <div class="modal-body" id="hbody">h</div>
                </div>
            </div>
        </div>

        <li class="list"><h3><a id="Notification">Notification</h3></li>
        <li class="list"><h3><a href="logout.php" id="logout">Logout</a></h3></li>
    </ul>
</div>
<div class="container spc">
<div class="col-md-5">
            <form action="litq_feed.php" method="get">
            <title>category</title>
            <select name="category" class="form-control">
                <option>science</option>
                <option>Army</option>
                <option>Politics</option>
                <option>Environment</option>
                <option>Technology</option>
                <option>Neuroscience</option>
                <option>Psychology</option>
                <option>Biology</option>
                <option>Physical Science</option>
            </select>
                <title>question</title>
            <textarea name="question" class="form-control" id="que" placeholder="question"></textarea>
            <input type="submit" value="submit">

    </form>
</div>
</div>
<div class="container">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">Topics of interests</div>
            <div class="panel-body pan">
                <ul  class="left" >
                    <li><a  href="#" id="lit">Literature</a></li>
                    <li>Science</li>
                    <li>Army</li>
                    <li>Politics</li>
                    <li>Environment</li>
                    <li>Technology</li>
                    <li>Neuroscience</li>
                    <li>Psychology</li>
                    <li>Biolgy</li>
                    <li>Physical science</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading" id="head1">d</div>
            <div class="panel-body" id="body1">b</div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading" id="head2">Trending Questions</div>
            <div class="panel-body" id="body2"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function()
    { $("#lit").click(function()
    { $("#head1").text("Literature");
        $("#body1").load("litfeed.php");
        $("#body2").load("litimages.php");
        $("#head2").text("Literature");
    });
    });
</script>
<script>
    function drop() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

</script>
<script>
    $(document).ready(function()
    {$("#history").click(function()
    { $("#hhead").text("HISTORY");
    $("#hbody").load("shistory.php");
    });
    });
</script>
</body>
</html>