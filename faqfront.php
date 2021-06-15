
<?php
 include "nav.php";
 // connect with database
require_once "connection.php";
  
 // get all comments of post
 $result = mysqli_query($link, "SELECT * FROM faq where quest != '';");
  
 // save all records from database in an array
 $comments = array();
 while ($row = mysqli_fetch_object($result))
 {
     array_push($comments, $row);
 }
  

  
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<style>
li {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
</style>
<body>
<div class="container">
<div class="row">
<div class="container">
<table style="width:100%">
<tr>
<form method="post" action="insertcom.php">
<td><input type="text" name="quest" id="quest" placeholder="What is your question" require></td>
<td><input type="submit" value="Ask" class="btn btn-primary"></td>
</form>
</tr>
</table>
</div>
</div>
<hr>
<ul class="comments">
    <?php foreach ($comments as $comment): ?>
        <li>

            <h4 style="background-color:#c1ffc1">
                <?php echo $comment->quest; ?>
            </h4>
            <!--===================================================-->
            <?php

     $results = mysqli_query($link, "SELECT * FROM faq WHERE qid = " . $comment->id);
     if (mysqli_num_rows($results) > 0)
     {
            while($rows=mysqli_fetch_assoc($results)){
                echo "<table style='width:100%;'>";
                echo "<tr><td style='width:70px;'></td><td style='border-bottom: 1px solid black !important'>".$rows["ans"]."</tr></td>";
                echo "</table>";
            }
     }

 ?>
            <!--===================================================-->
            <div data-id="<?php echo $comment->id; ?>" onclick="showReplyForm(this);" style="cursor: pointer; color: green;">Reply</div>
 
            <form action="insertrep.php" method="post" id="form-<?php echo $comment->id; ?>" style="display: none;">
                 
                <input type="hidden" name="reply_of" id="reply_of" value="<?php echo $comment->id; ?>" required>
                <input type="hidden" name="post_id" value="3" required>
                
                <p>
                    <label>Reply</label>
                    <textarea name="comment" style="width:100%" required></textarea>
                </p>
                    <input type="submit" value="Reply" name="do_reply" class="btn btn-primary">

            </form>
        </li>
    <?php endforeach; ?>
</ul>
</div>
</body>
<script>
 
function showReplyForm(self) {
    var commentId = self.getAttribute("data-id");
    if (document.getElementById("form-" + commentId).style.display == "") {
        document.getElementById("form-" + commentId).style.display = "none";
    } else {
        document.getElementById("form-" + commentId).style.display = "";
    }
}
 
</script>
</html>