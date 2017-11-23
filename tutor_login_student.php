<html>
<head>
    <title>login_student</title>
<link rel="stylesheet" href="library/bootstrap.css">
    <script src="library/rdvalidation.js"></script>
</head>
<body>
<div class="container">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Student login</div>
            <div class="panel-body">
                <form action="tutor_check_student_login.php" method="get">

                        <title>email</title>
                    <input type="email" name="email" class="form-control" id="email" placeholder="email" required="required">
                    <title>password</title>
                    <br>                <input type="password" name="password" class="form-control" id="password" placeholder="password" required="required">
                <br><input type="submit" value="login">
                    </div>
                </form>

</div>
        </div>
    </div>
</body>

</html>