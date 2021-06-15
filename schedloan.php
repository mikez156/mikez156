<?php

require 'connection.php';
$branchsrjsched=$_POST["branchsrjsched"];
$datetoday=$_POST["datetoday"];
$loansched_arr = array();

$deyt = strtotime($datetoday);
$yir = date("Y",$deyt);
$mos = date("m",$deyt);
$bining = date("Y-m-d", strtotime("-3 months",$deyt));
$sub2mos = $mos - 2;// date("Y-m-d", strtotime("-2 months",$deyt));
$sub1mos = $mos - 1;//date("Y-m-d", strtotime("-1 months",$deyt));

$stmt = $link->prepare("truncate table loan_schedule;");
$stmt->execute();

$stmt = $link->prepare("insert into loan_schedule(member_id,account,name,address) select member_id,account,concat(lname,' ',fname,' ',mname),current_address from members where branch = '".$branchsrjsched."';");
$stmt->execute();

$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) < '$yir' and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.begining = x.share_tot;");
$stmt->execute();

$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) = '$yir' and month(date) = 1 and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.bal_1 = x.share_tot;");
$stmt->execute();

$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) = '$yir' and month(date) = 2 and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.bal_2 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) = '$yir' and month(date) = 3 and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.bal_3 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) = '$yir' and month(date) = 4 and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.bal_4 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) = '$yir' and month(date) = 5 and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.bal_5 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) = '$yir' and month(date) = 6 and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.bal_6 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) = '$yir' and month(date) = 7 and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.bal_7 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) = '$yir' and month(date) = 8 and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.bal_8 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) = '$yir' and month(date) = 9 and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.bal_9 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) = '$yir' and month(date) = 10 and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.bal_10 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) = '$yir' and month(date) = 11 and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.bal_11 = x.share_tot;");
$stmt->execute();
$stmt = $link->prepare("update loan_schedule c inner join (select member_id,(ifnull(sum(all_ledger.cdv),0) - ifnull(sum(all_ledger.crj),0))as share_tot from all_ledger where type = 'Loan' and year(date) = '$yir' and month(date) = 12 and branch = '".$branchsrjsched."' group by member_id) x on c.member_id = x.member_id set c.bal_12 = x.share_tot;");
$stmt->execute();

$stmt = $link->prepare("update loan_schedule set loan_1 = begining + bal_1,loan_2 = loan_1 + bal_2,loan_3 = loan_2 + bal_3,
loan_4 = loan_3 + bal_4,loan_5 = loan_4 + bal_5,loan_6 = loan_5 + bal_6,loan_7 = loan_6 + bal_7,
loan_8 = loan_7 + bal_8,loan_9 = loan_8 + bal_9,loan_10 = loan_9 + bal_10,loan_11 = loan_10 + bal_11,
loan_12 = loan_11 + bal_12;");
$stmt->execute();

$stmt = $link->prepare(" update loan_schedule set total = begining + loan_1 + loan_2 + loan_3 + loan_4 + loan_5 + loan_6 + loan_7 + loan_8 + loan_9 + loan_10 + loan_11 + loan_12;");
$stmt->execute();

$query = "SELECT * FROM `loan_schedule`;";

$result = mysqli_query($link,$query);

while($row = mysqli_fetch_array($result)){
    $acc = $row['account'];
    $name = $row['name'];
    $address = $row['address'];
    $loansched_arr[] = array("account" => $acc,
                    "name" => $name,
                    "address" => $address,
                    "begining" => $row['begining'],
                    "loan1" => $row['loan_1'],
                    "loan2" => $row['loan_2'],
                    "loan3" => $row['loan_3'],
                    "loan4" => $row['loan_4'],
                    "loan5" => $row['loan_5'],
                    "loan6" => $row['loan_6'],
                    "loan7" => $row['loan_7'],
                    "loan8" => $row['loan_8'],
                    "loan9" => $row['loan_9'],
                    "loan10" => $row['loan_10'],
                    "loan11" => $row['loan_11'],
                    "loan12" => $row['loan_12'],
                );             
}
// Encoding array in JSON format
echo json_encode($loansched_arr);

?>