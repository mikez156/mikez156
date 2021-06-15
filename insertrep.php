<?php
require_once "connection.php";
if (isset($_POST["comment"]))
{
    $ques = mysqli_real_escape_string($link, $_POST["comment"]);
    $idd = mysqli_real_escape_string($link, $_POST["reply_of"]);

    $sql= "INSERT INTO faq(ans, date,qid) VALUES ('" . $ques . "', NOW(),'".$idd."')";

    if (mysqli_query($link, $sql)) {
        header("Location: faqfront.php");
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}
?>