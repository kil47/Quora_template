<?php
include "connection.php";
$select="select * from solution,quest where solution.queId=quest.id";
$ret=mysqli_query($con,$select);
while($val=mysqli_fetch_assoc($ret)) {

    $question = $val['question'];
    $answer = $val['answer'];
    if ($answer != ' ')
    {
        $email = $val['email'];
        echo "<div class='container email'>" . $email . "</div>";

        echo $question . "<br>";
        echo $answer . "<br>";
        echo "<hr>";
    }
}
?>
