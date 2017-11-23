<?php
include "connection.php";
$question=$_REQUEST['question'];
//echo $question;
$select="select * from quest where question='".$question."'";
//echo $select;
$ret=mysqli_query($con,$select);
while($val=mysqli_fetch_assoc($ret))
{ $id= $val['id'];
   // echo $id;
}
?>
<html>
<head>
    <title>Answer</title>
    <link rel="stylesheet" href="library/bootstrap.css">
    <link rel="stylesheet" href="library/dropdown.css">
    <script src="library/bootstrap.min.js"></script>
    <Script src="library/jquery-1.9.1.js"></Script>
</head>
<body>
<div class="container">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo $question ?>
                </div>
            <div class="panel-body">
        <form action="answer_feed.php" method="get">
            <title>answer</title>
            <textarea name="answer" class="form-control" placeholder="answer">
                            </textarea>
            <title>id</title>
            <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="submit" value="answer">
        </form>
        </div>
            </div>

    </div>
    </div>

</body>
</html>