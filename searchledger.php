<?php

require_once "connection.php";
$srchtxt=$_POST["srchtxt"];
$fill2 = array();
$qry = "select * from all_ledger where member_id = (SELECT member_id FROM members where concat(lname,' ',fname,' ',mname,' ',account) = '".$srchtxt."')";
if($result = mysqli_query($link, $qry)){
    if(mysqli_num_rows($result) > 0){
     
        while($row = mysqli_fetch_array($result)){
            $fill2[] = array(
                'lid' => $row["id"],
                'mimid' => $row["member_id"],
                'deyt' => $row["date"],
                'orcdjv' => $row["orcdjv"],
                'crj' => $row["crj"],
                'cdv' => $row["cdv"],
                'jv' => $row["jv"],
                'type' => $row["type"],
                'terms' => $row["terms"],
                'kindsofloan' => $row["kindsofloan"],
                'interest' => $row["interest"],
                'id_of_loan' => $row["id_of_loan"],
                'cdv_mark' => $row["cdv_mark"],
                'remark' => $row["remark"],
            );      
        }
        // Free result set
        echo json_encode($fill2);
       // echo json_encode($loanarr);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>