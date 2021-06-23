<?php
include 'connection.php';


$branchsrjage=$_POST["branchsrjage"];
$datetoday=$_POST["datetoday"];
$deyt = strtotime($datetoday);


if(isset($_POST["loanvartxt"])){
    if($_POST["loanvartxt"] == 'computeaging'){


$stmt = $link->prepare("truncate table aging;");
$stmt->execute();

$stmt = $link->prepare("insert into aging(member_id,release_date,loan_amount,mpast,id_of_loan,kindsofloan) select member_id,date,cdv,terms,id,kindsofloan from all_ledger where cdv > 0 and type = 'Loan';");
$stmt->execute();

$stmt = $link->prepare("update aging c inner join members b on c.member_id = b.member_id set c.account = b.account, c.name = concat(b.lname,' ',b.fname,' ',b.mname), c.address = b.current_address,c.classification=b.classification,c.remarks = b.remarks,c.recomendation = b.recomendation,c.branch = b.branch,c.collection_type = b.collecting,c.collector = b.collector;");
$stmt->execute();
$stmt = $link->prepare("update aging c inner join (select id_of_loan,(ifnull(sum(all_ledger.crj),0))as loan_tot from all_ledger where type = 'Loan' and crj > 0 group by id_of_loan) x on c.id_of_loan = x.id_of_loan set c.total_payment = x.loan_tot;");
$stmt->execute();
$stmt = $link->prepare("update aging c inner join (select id_of_loan,type,date,terms from all_ledger where type = 'Restructure' and crj > 0 ) x on c.id_of_loan = x.id_of_loan set c.restructure = 1,c.release_date = x.date,c.mpast=x.terms;");
$stmt->execute();
$stmt = $link->prepare("update aging set due_date = date_add(release_date,interval mpast month),loan_balance = loan_amount - total_payment,no_of_month_due = timestampdiff(month,due_date,'$datetoday');");
$stmt->execute();

$loanaging_arr = array();

$query = "SELECT * FROM aging";
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result)){
    $account = $row['account'];
    $name = $row['name'];
    $address = $row['address'];
    $release_date = $row['release_date'];
    $due_date = $row['due_date'];

    $loanaging_arr[] = array("account" => $account,
                    "name" => $name,
                    "address" => $address,
                    "release_date" => $release_date,
                    "due_date" => $due_date,
                    "loan_amount" => $row['loan_amount'],
                    "loan_balance" => $row['loan_balance'],
                    "security" => $row['security'],
                    "oboutheborower" => $row['oboutheborower'],
                    "whattodo" => $row['whattodo'],
                    "whentodo" => $row['whentodo'],
                    "collector" => $row['collector'],
                    "remark" => $row['remarks'],
                    "kindsofloan" => $row['kindsofloan'],
                    "no_of_month_due" => $row['no_of_month_due'],
                    "branch" => $row['branch'],
                );
                    
}

echo json_encode($loanaging_arr);


    }
}
//=====================================All Loans==============================
if(isset($_POST["loanvartxt"])){
    if($_POST["loanvartxt"] == 'allloan' && $branchsrjage == 'All'){
$loanaging_arr = array();

$query = "SELECT * FROM aging";
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result)){
    $account = $row['account'];
    $name = $row['name'];
    $address = $row['address'];
    $release_date = $row['release_date'];
    $due_date = $row['due_date'];

    $loanaging_arr[] = array("account" => $account,
                    "name" => $name,
                    "address" => $address,
                    "release_date" => $release_date,
                    "due_date" => $due_date,
                    "loan_amount" => $row['loan_amount'],
                    "loan_balance" => $row['loan_balance'],
                    "security" => $row['security'],
                    "oboutheborower" => $row['oboutheborower'],
                    "whattodo" => $row['whattodo'],
                    "whentodo" => $row['whentodo'],
                    "collector" => $row['collector'],
                    "remark" => $row['remarks'],
                    "kindsofloan" => $row['kindsofloan'],
                    "no_of_month_due" => $row['no_of_month_due'],
                    "branch" => $row['branch'],
                );
                    
}

echo json_encode($loanaging_arr);


    }
}
if(isset($_POST["loanvartxt"])){
    if($_POST["loanvartxt"] == 'allloan' && $branchsrjage != 'All'){
$loanaging_arr = array();

$query = "SELECT * FROM aging where branch = '$branchsrjage'";
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result)){
    $account = $row['account'];
    $name = $row['name'];
    $address = $row['address'];
    $release_date = $row['release_date'];
    $due_date = $row['due_date'];

    $loanaging_arr[] = array("account" => $account,
                    "name" => $name,
                    "address" => $address,
                    "release_date" => $release_date,
                    "due_date" => $due_date,
                    "loan_amount" => $row['loan_amount'],
                    "loan_balance" => $row['loan_balance'],
                    "security" => $row['security'],
                    "oboutheborower" => $row['oboutheborower'],
                    "whattodo" => $row['whattodo'],
                    "whentodo" => $row['whentodo'],
                    "collector" => $row['collector'],
                    "remark" => $row['remarks'],
                    "kindsofloan" => $row['kindsofloan'],
                    "no_of_month_due" => $row['no_of_month_due'],
                    "branch" => $row['branch'],
                );
                    
}

echo json_encode($loanaging_arr);


    }
}
// ===================current Loan==========================================================
//=====================================current Loans==============================
if(isset($_POST["loanvartxt"])){
    if($_POST["loanvartxt"] == 'currentloan' && $branchsrjage == 'All'){
$loanaging_arr = array();

$query = "SELECT * FROM aging where no_of_month_due <=0 ";
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result)){
    $account = $row['account'];
    $name = $row['name'];
    $address = $row['address'];
    $release_date = $row['release_date'];
    $due_date = $row['due_date'];

    $loanaging_arr[] = array("account" => $account,
                    "name" => $name,
                    "address" => $address,
                    "release_date" => $release_date,
                    "due_date" => $due_date,
                    "loan_amount" => $row['loan_amount'],
                    "loan_balance" => $row['loan_balance'],
                    "security" => $row['security'],
                    "oboutheborower" => $row['oboutheborower'],
                    "whattodo" => $row['whattodo'],
                    "whentodo" => $row['whentodo'],
                    "collector" => $row['collector'],
                    "remark" => $row['remarks'],
                    "kindsofloan" => $row['kindsofloan'],
                    "no_of_month_due" => $row['no_of_month_due'],
                    "branch" => $row['branch'],
                );
                    
}

echo json_encode($loanaging_arr);


    }
}

if(isset($_POST["loanvartxt"])){
    if($_POST["loanvartxt"] == 'currentloan' && $branchsrjage != 'All'){
$loanaging_arr = array();

$query = "SELECT * FROM aging where branch = '$branchsrjage' and no_of_month_due <=0";
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result)){
    $account = $row['account'];
    $name = $row['name'];
    $address = $row['address'];
    $release_date = $row['release_date'];
    $due_date = $row['due_date'];

    $loanaging_arr[] = array("account" => $account,
                    "name" => $name,
                    "address" => $address,
                    "release_date" => $release_date,
                    "due_date" => $due_date,
                    "loan_amount" => $row['loan_amount'],
                    "loan_balance" => $row['loan_balance'],
                    "security" => $row['security'],
                    "oboutheborower" => $row['oboutheborower'],
                    "whattodo" => $row['whattodo'],
                    "whentodo" => $row['whentodo'],
                    "collector" => $row['collector'],
                    "remark" => $row['remarks'],
                    "kindsofloan" => $row['kindsofloan'],
                    "no_of_month_due" => $row['no_of_month_due'],
                    "branch" => $row['branch'],
                );
                    
}

echo json_encode($loanaging_arr);


    }
}
// ===================Past Due Loan==========================================================
//=====================================all past due Loans==============================
if(isset($_POST["loanvartxt"])){
    if($_POST["loanvartxt"] == 'pastdue' && $branchsrjage == 'All'){
$loanaging_arr = array();

$query = "SELECT * FROM aging where no_of_month_due >0 ";
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result)){
    $account = $row['account'];
    $name = $row['name'];
    $address = $row['address'];
    $release_date = $row['release_date'];
    $due_date = $row['due_date'];

    $loanaging_arr[] = array("account" => $account,
                    "name" => $name,
                    "address" => $address,
                    "release_date" => $release_date,
                    "due_date" => $due_date,
                    "loan_amount" => $row['loan_amount'],
                    "loan_balance" => $row['loan_balance'],
                    "security" => $row['security'],
                    "oboutheborower" => $row['oboutheborower'],
                    "whattodo" => $row['whattodo'],
                    "whentodo" => $row['whentodo'],
                    "collector" => $row['collector'],
                    "remark" => $row['remarks'],
                    "kindsofloan" => $row['kindsofloan'],
                    "no_of_month_due" => $row['no_of_month_due'],
                    "branch" => $row['branch'],
                );
                    
}

echo json_encode($loanaging_arr);


    }
}

if(isset($_POST["loanvartxt"])){
    if($_POST["loanvartxt"] == 'pastdue' && $branchsrjage != 'All'){
$loanaging_arr = array();

$query = "SELECT * FROM aging where branch = '$branchsrjage' and no_of_month_due > 0";
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result)){
    $account = $row['account'];
    $name = $row['name'];
    $address = $row['address'];
    $release_date = $row['release_date'];
    $due_date = $row['due_date'];

    $loanaging_arr[] = array("account" => $account,
                    "name" => $name,
                    "address" => $address,
                    "release_date" => $release_date,
                    "due_date" => $due_date,
                    "loan_amount" => $row['loan_amount'],
                    "loan_balance" => $row['loan_balance'],
                    "security" => $row['security'],
                    "oboutheborower" => $row['oboutheborower'],
                    "whattodo" => $row['whattodo'],
                    "whentodo" => $row['whentodo'],
                    "collector" => $row['collector'],
                    "remark" => $row['remarks'],
                    "kindsofloan" => $row['kindsofloan'],
                    "no_of_month_due" => $row['no_of_month_due'],
                    "branch" => $row['branch'],
                );
                    
}

echo json_encode($loanaging_arr);


    }
}
//=====================================edidit classification==================================

if(isset($_POST["branchedit"])){
    $branchs = $_POST["branchedit"];
$loanedit_arr = array();

$query = "SELECT * FROM aging";
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result)){
    $memid = $row['member_id'];
    $account = $row['account'];
    $name = $row['name'];
    $address = $row['address'];
    $release_date = $row['release_date'];
    $due_date = $row['due_date'];

    $loanedit_arr[] = array("account" => $account,
                    "memid" => $memid,
                    "name" => $name,
                    "address" => $address,
                    "release_date" => $release_date,
                    "due_date" => $due_date,
                    "loan_amount" => $row['loan_amount'],
                    "loan_balance" => $row['loan_balance'],
                    "security" => $row['security'],
                    "oboutheborower" => $row['oboutheborower'],
                    "whattodo" => $row['whattodo'],
                    "whentodo" => $row['whentodo'],
                    "collector" => $row['collector'],
                    "remark" => $row['remarks'],
                    "kindsofloan" => $row['kindsofloan'],
                    "no_of_month_due" => $row['no_of_month_due'],
                    "branch" => $row['branch'],
                );
                    
}

echo json_encode($loanedit_arr);

}
?>