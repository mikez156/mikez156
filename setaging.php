<?php
include 'connection.php';
$branchsrjsched=$_POST["branchsrjage"];
$datetoday=$_POST["datetoday"];
$loanaging_arr = array();

$deyt = strtotime($datetoday);

$stmt = $link->prepare("truncate table aging;");
$stmt->execute();

$stmt = $link->prepare("insert into aging(member_id,release_date,loan_amount,mpast,id_of_loan,kindsofloan) select member_id,date,cdv,terms,id,kindsofloan from all_ledger where cdv > 0 and type = 'Loan' and branch = '$branchsrjsched';");
$stmt->execute();
$stmt = $link->prepare("update aging c inner join members b on c.member_id = b.member_id set c.account = b.account, c.name = concat(b.lname,' ',b.fname,' ',b.mname), c.address = b.current_address,c.classification=b.classification,c.remarks = b.remarks,c.recomendation = b.recomendation,c.collection_type = b.collecting,c.collector = b.collector;");
$stmt->execute();
$stmt = $link->prepare("update aging c inner join (select id_of_loan,(ifnull(sum(all_ledger.crj),0))as loan_tot from all_ledger where type = 'Loan' and crj > 0 group by id_of_loan) x on c.id_of_loan = x.id_of_loan set c.total_payment = x.loan_tot;");
$stmt->execute();
$stmt = $link->prepare("update aging c inner join (select id_of_loan,type,date,terms from all_ledger where type = 'Restructure' and crj > 0 ) x on c.id_of_loan = x.id_of_loan set c.restructure = 1,c.release_date = x.date,c.mpast=x.terms;");
$stmt->execute();
$stmt = $link->prepare("update aging set due_date = date_add(release_date,interval mpast month),loan_balance = loan_amount - total_payment,no_of_month_due = timestampdiff(month,due_date,'$deyt');");
$stmt->execute();


$query = "SELECT `aging_id`, `member_id`, `account`, `name`, `address`, `release_date`, `due_date`, `no_of_month_due`, `loan_amount`, `loan_balance`, `restructure`, `month_1`, `month_3`, `month_9`, `month_1yr`, `month_above1yr`, `classification`, `remarks`, `recomendation`, `collection_type`, `collector`, `kindsofloan`, `mcurrent`, `mpast`, `id_of_loan`, `total_payment` FROM `aging` where loan_balance > 0 order by name asc;";
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result)){
    $acc = $row['account'];
    $name = $row['name'];
    $address = $row['address'];
    $loanaging_arr[] = array("account" => $acc,
                    "name" => $name,
                    "address" => $address,
                    "releasedate" => $row['release_date'],
                    "due_date" => $row['due_date'],
                    "no_of_month_due" => $row['no_of_month_due'],
                    "loan_amount" => $row['loan_amount'],
                    "loan_balance" => $row['loan_balance'],
                    "restructure" => $row['restructure'],
                    "classification" => $row['classification'],
                    "recomendation" => $row['recomendation'],
                    "collection_type" => $row['collection_type'],
                    "collector" => $row['collector'],
                    "kindsofloan" => $row['kindsofloan'],
                    "mpast" => $row['mpast'],
                    "total_payment" => $row['total_payment'],
                );             
}
echo json_encode($loanaging_arr);
?>