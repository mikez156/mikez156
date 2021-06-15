<?php

require 'connection.php';
$branchsrjsched=$_POST["branchsrjsched"];
$datetoday=$_POST["datetoday"];
$sharesched_arr = array();

$deyt = strtotime($datetoday);
$yir = date("Y",$deyt);
$mos = date("m",$deyt);
$bining = date("Y-m-d", strtotime("-3 months",$deyt));
$sub2mos = $mos - 2;// date("Y-m-d", strtotime("-2 months",$deyt));
$sub1mos = $mos - 1;//date("Y-m-d", strtotime("-1 months",$deyt));

$stmt = $link->prepare("truncate table share_schedule;");
$stmt->execute();

$stmt = $link->prepare("insert into share_schedule(member_id,account,name,address) select member_id,account,concat(lname,' ',fname,' ',mname),current_address from members where branch = '".$branchsrjsched."';");
$stmt->execute();

$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) < '$yir' group by member_id) x on c.member_id = x.member_id set c.share_0 = x.share_tot;");
$stmt->execute();

$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) = '$yir' and month(date) = 1 group by member_id) x on c.member_id = x.member_id set c.bal_1 = x.share_tot;");
$stmt->execute();

$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) = '$yir' and month(date) = 2 group by member_id) x on c.member_id = x.member_id set c.bal_2 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) = '$yir' and month(date) = 3 group by member_id) x on c.member_id = x.member_id set c.bal_3 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) = '$yir' and month(date) = 4 group by member_id) x on c.member_id = x.member_id set c.bal_4 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) = '$yir' and month(date) = 5 group by member_id) x on c.member_id = x.member_id set c.bal_5 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) = '$yir' and month(date) = 6 group by member_id) x on c.member_id = x.member_id set c.bal_6 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) = '$yir' and month(date) = 7 group by member_id) x on c.member_id = x.member_id set c.bal_7 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) = '$yir' and month(date) = 8 group by member_id) x on c.member_id = x.member_id set c.bal_8 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) = '$yir' and month(date) = 9 group by member_id) x on c.member_id = x.member_id set c.bal_9 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) = '$yir' and month(date) = 10 group by member_id) x on c.member_id = x.member_id set c.bal_10 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) = '$yir' and month(date) = 11 group by member_id) x on c.member_id = x.member_id set c.bal_11 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update share_schedule c inner join (select member_id,(ifnull(sum(all_ledger.crj),0) - ifnull(sum(all_ledger.cdv),0))as share_tot from all_ledger where type = 'Share Capital' and year(date) = '$yir' and month(date) = 12 group by member_id) x on c.member_id = x.member_id set c.bal_12 = x.share_tot;");
$stmt->execute();

$stmt = $link->prepare("update share_schedule set share_1 = share_0 + bal_1,share_2 = share_1 + bal_2,share_3 = share_2 + bal_3,
share_4 = share_3 + bal_4,share_5 = share_4 + bal_5,share_6 = share_5 + bal_6,share_7 = share_6 + bal_7,
share_8 = share_7 + bal_8,share_9 = share_8 + bal_9,share_10 = share_9 + bal_10,share_11 = share_10 + bal_11,
share_12 = share_11 + bal_12;");
$stmt->execute();

$query = "SELECT * FROM `share_schedule`;";

$result = mysqli_query($link,$query);

while($row = mysqli_fetch_array($result)){
    $acc = $row['account'];
    $name = $row['name'];
    $address = $row['address'];
    $sharesched_arr[] = array("account" => $acc,
                    "name" => $name,
                    "address" => $address,
                    "share0" => $row['share_0'],
                    "share1" => $row['share_1'],
                    "share2" => $row['share_2'],
                    "share3" => $row['share_3'],
                    "share4" => $row['share_4'],
                    "share5" => $row['share_5'],
                    "share6" => $row['share_6'],
                    "share7" => $row['share_7'],
                    "share8" => $row['share_8'],
                    "share9" => $row['share_9'],
                    "share10" => $row['share_10'],
                    "share11" => $row['share_11'],
                    "share12" => $row['share_12'],
                );             
}
// Encoding array in JSON format
echo json_encode($sharesched_arr);

?>