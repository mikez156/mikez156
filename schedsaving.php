

<?php

require 'connection.php';
$branchsrjsched=$_POST["branchsrjsched"];
$datetoday=$_POST["datetoday"];
$return_arr = array();

$deyt = strtotime($datetoday);
$yir = date("Y",$deyt);
$mos = date("m",$deyt);
$bining = date("Y-m-d", strtotime("-3 months",$deyt));
$sub2mos = $mos - 2;// date("Y-m-d", strtotime("-2 months",$deyt));
$sub1mos = $mos - 1;//date("Y-m-d", strtotime("-1 months",$deyt));

$stmt = $link->prepare("truncate table saving_schedule;");
$stmt->execute();

$stmt = $link->prepare("insert into saving_schedule(member_id,account,name,address) select member_id,account,concat(lname,' ',fname,' ',mname),current_address from members where branch = '".$branchsrjsched."';");
$stmt->execute();

$stmt = $link->prepare("update saving_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Savings' and date < '$bining' group by member_id) x on c.member_id = x.member_id set c.begining = x.share_tot;");
$stmt->execute();

$stmt = $link->prepare("update saving_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Savings' and year(date) = '$yir' and month(date) = '$sub2mos' group by member_id) x on c.member_id = x.member_id set c.month_4 = x.share_tot;");
$stmt->execute();

$stmt = $link->prepare("update saving_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Savings' and year(date) = '$yir' and month(date) = '$sub1mos' group by member_id) x on c.member_id = x.member_id set c.month_5 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update saving_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Savings' and year(date) = '$yir' and month(date) = '$mos' group by member_id) x on c.member_id = x.member_id set c.month_6 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update saving_schedule set month_1 = begining + month_4,month_2 = month_1 + month_5,month_3 = month_2 + month_4;");
$stmt->execute();

$query = "SELECT `savingsched_id`, `member_id`, `name`, `address`, `begining`, `month_1`, `month_2`, `month_3`, `month_4`, `month_5`, `month_6`, `month_7`, `month_8`, `month_9`, `month_10`, `month_11`, `month_12`, `total`, `average`, `computed_int`, `account`, `status` FROM `saving_schedule`;";

$result = mysqli_query($link,$query);

while($row = mysqli_fetch_array($result)){
    $id = $row['account'];
    $lname = $row['name'];
    $account = $row['begining'];
    $fname = $row['month_1'];
    $mname = $row['month_2'];
    $mos3 = $row['month_3'];
    $address = $row['address'];
    $return_arr[] = array("id" => $id,
                    "account" => $account,
                    "lname" => $lname,
                    "fname" => $fname,
                    "mname" => $mname,
                    "mos3" => $mos3,
                    "address" => $address,
                );
                    
}
// Encoding array in JSON format
echo json_encode($return_arr);

?>