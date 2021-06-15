<?php
require_once "connection.php";
if (isset($_POST["quest"]))
{
    $ques = mysqli_real_escape_string($link, $_POST["quest"]);
    $reply_of = 0;
 
    mysqli_query($link, "INSERT INTO faq(quest, date) VALUES ('" . $ques . "', NOW())");
    header("Location: faqfront.php");
}
?>