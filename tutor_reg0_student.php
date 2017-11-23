<?php
include "connection.php";
?>
<html>
<head>
    <title>reg1</title>
    <link rel="stylesheet" href="library/bootstrap.css">
    <link rel="stylesheet" href="library/format.css">

</head>
<body class="format">
<div class="header">
    <h1>Million Dollar Questions</h1>
</div>

<div class="container">
    <div class="col-md-6">
        <div class="panel panel-primary pan">
            <div class="panel-heading">registration-I</div>
            <div class="panel-body">
                <form action="tutor_feed_reg0_student.php" metthod="get">
                    <title>email</title>
                    <input type="email" name="email" placeholder="email" required="required" class="form-control">
                    <title>password</title>
                    <br><input type="password" name="password" placeholder="password" required="required" class="form-control">

                    <br><input type="submit" value="proceed">
                                   </form>

</div>
</div>
        </div>
    </div>
</body>
</html>
