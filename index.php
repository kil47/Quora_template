<html>
<head>
    <title>Port</title>
    <link rel="stylesheet" href="library/bootstrap.css">
    <link rel="stylesheet" href="library/dropdown.css">
    <link rel="stylesheet" href="library/format.css">
    <script src="library/bootstrap.min.js"></script>
    <script src="library/jquery-1.9.1.js"></script>
</head>
<body>
<div class="header">Million dollar questions</div>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div classs="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Menu</a>
            </div>
            <div>
                <ul class="nav navbar-nav">

                    <div class="dropdown">
                        <button onclick="drop()" class="dropbtn">Login</button>
                        <div id="myDropdown" class="dropdown-content">

                            <a href="tutor_login_student.php">student</a>
                            <a href="teacher_login.php">Teacher</a>

                        </div>
                    </div>
                    </li>


                <li><a href="tutor_reg0_student.php">registration</a></li>
              <li><a href="#" id="about">about us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
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
<div class="container"id="gap">
    <div class="col-md-5">
        <div class="panel panel-primary">
            <div class="panel-heading">Trending</div>
            <div class="panel-body" id="trend"></div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-default" id="ab">
            <div class="panel-heading" id="ahead"></div>
            <div class="panel-body" id="hhead"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function()
    {$("#ab").hide();
        $("#trend").load("trending.php");
        $("#about").click(function()
    { $("#ab").show();
        $("#ahead").text("About us");
        $("#hhead").load("about.php");
    });
    });

</script>
</body>
</html>
