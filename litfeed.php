<?php
include "connection.php";


/**$aselect="select * from solution where category='science'";
$qselect="select * from quest where category='science'";

//echo $select;
$retq = mysqli_query($con, $qselect);
$reta=mysqli_query($con,$aselect);
while($valq = mysqli_fetch_assoc($retq))
{echo "q".$valq['id']."<br>";
    while ($vala = mysqli_fetch_assoc($reta))
    { echo "a".$vala['queId']."<br>";
        if ($valq['id'] == $vala['queId'])
        {
            $question=$valq['question'] ;
            echo $question;
            $answer=$vala['queId'];
            echo "<br>".$answer ."<br>";

        }
    }
}*/
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
