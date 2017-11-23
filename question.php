<?php
include "connection.php";

$select="select * from solution,quest where solution.queId=quest.id";
$ret=mysqli_query($con,$select);
//$num=mysqli_num_rows($ret);
while($val=mysqli_fetch_assoc($ret))
{
    $answer=$val['answer'];
    if($answer==' ') {
        $email = $val['email'];

        echo "<div class='container email'>" . $email . "</div>";
        $question = $val['question'];
        echo "<b>question</b>" . $question . "<br>";

        //echo "<b>answer</b>".$answer."<br>";
        echo "<form action='answer.php' method='get'>
    <input type='hidden' name='question' value='";
        echo $question . "'" . ">";
        echo "<input type='submit' value='answer'>";
        echo "</form>";
//        $count+=1;
        echo "<hr>";
    } }
?>
