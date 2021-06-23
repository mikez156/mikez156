<?php
require_once 'connection.php';
$whereval = "";

if(isset($_POST["branchsrjage"])){
  if($_POST["branchsrjage"] == 'All'){

$whereval = "";
  }else{
    $whereval = "and branch= '".$_POST["branchsrjage"]."'";
  }
  
$stmt = $link->prepare("update sumloan set salary=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SALARY' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set regular=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'REGULAR' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set micro=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'MICRO-LOAN' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set sharecap=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SHARECAPITAL' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set emergency=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'EMERGENCY' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set hablag=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HABLAG' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set pension=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'PENSION' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set car=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'VEHICLE' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set special=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SPECIAL' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set agricultural=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'AGRICULTURAL' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set business=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'BUSINESS' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set contractor=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'CONTRACTORS' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set deped=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'DEP-ED' ".$whereval.") where id = 2");
$stmt->execute();
$stmt = $link->prepare("update sumloan set housing=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HOUSING' ".$whereval.") where id = 2");
$stmt->execute();
//$stmt = $link->prepare("update sumloan set total=(select ifnull(sum(loan_balance),0) from aging '') where id = 2");
//$stmt->execute();
//==================================current Loan=================================================
$stmt = $link->prepare("update sumloan set salary=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SALARY' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set regular=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'REGULAR' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set micro=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'MICRO-LOAN' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set sharecap=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SHARECAPITAL' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set emergency=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'EMERGENCY' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set hablag=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HABLAG' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set pension=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'PENSION' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set car=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'VEHICLE' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set special=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SPECIAL' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set agricultural=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'AGRICULTURAL' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set business=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'BUSINESS' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set contractor=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'CONTRACTORS' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set deped=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'DEP-ED' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
$stmt = $link->prepare("update sumloan set housing=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HOUSING' and no_of_month_due <= 0 ".$whereval.") where id = 4");
$stmt->execute();
//==================================Past due Loan=================================================
$stmt = $link->prepare("update sumloan set salary=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SALARY' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set regular=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'REGULAR' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set micro=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'MICRO-LOAN' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set sharecap=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SHARECAPITAL' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set emergency=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'EMERGENCY' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set hablag=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HABLAG' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set pension=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'PENSION' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set car=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'VEHICLE' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set special=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SPECIAL' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set agricultural=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'AGRICULTURAL' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set business=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'BUSINESS' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set contractor=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'CONTRACTORS' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set deped=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'DEP-ED' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
$stmt = $link->prepare("update sumloan set housing=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HOUSING' and no_of_month_due > 0 ".$whereval.") where id = 6");
$stmt->execute();
//================================== 1 month=================================================
$stmt = $link->prepare("update sumloan set salary=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SALARY' and no_of_month_due = 1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set regular=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'REGULAR' and no_of_month_due = 1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set micro=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'MICRO-LOAN' and no_of_month_due = 1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set sharecap=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SHARECAPITAL' and no_of_month_due = 1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set emergency=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'EMERGENCY' and no_of_month_due = 1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set hablag=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HABLAG' and no_of_month_due = 1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set pension=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'PENSION' and no_of_month_due = 1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set car=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'VEHICLE' and no_of_month_due = 1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set special=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SPECIAL' and no_of_month_due = 1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set agricultural=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'AGRICULTURAL' and no_of_month_due =1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set business=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'BUSINESS' and no_of_month_due = 1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set contractor=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'CONTRACTORS' and no_of_month_due > 1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set deped=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'DEP-ED' and no_of_month_due > 1 ".$whereval.") where id = 7");
$stmt->execute();
$stmt = $link->prepare("update sumloan set housing=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HOUSING' and no_of_month_due > 1 ".$whereval.") where id = 7");
$stmt->execute();
//================================== 2-3 month=================================================
$stmt = $link->prepare("update sumloan set salary=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SALARY' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set regular=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'REGULAR' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set micro=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'MICRO-LOAN' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set sharecap=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SHARECAPITAL' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set emergency=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'EMERGENCY' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set hablag=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HABLAG' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set pension=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'PENSION' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set car=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'VEHICLE' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set special=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SPECIAL' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set agricultural=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'AGRICULTURAL' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set business=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'BUSINESS' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set contractor=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'CONTRACTORS' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set deped=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'DEP-ED' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
$stmt = $link->prepare("update sumloan set housing=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HOUSING' and no_of_month_due between 2 and 3 ".$whereval.") where id = 8");
$stmt->execute();
//================================== 180 month=================================================
$stmt = $link->prepare("update sumloan set salary=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SALARY' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set regular=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'REGULAR' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set micro=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'MICRO-LOAN' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set sharecap=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SHARECAPITAL' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set emergency=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'EMERGENCY' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set hablag=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HABLAG' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set pension=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'PENSION' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set car=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'VEHICLE' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set special=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SPECIAL' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set agricultural=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'AGRICULTURAL' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set business=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'BUSINESS' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set contractor=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'CONTRACTORS' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set deped=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'DEP-ED' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
$stmt = $link->prepare("update sumloan set housing=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HOUSING' and no_of_month_due between 4 and 6 ".$whereval.") where id = 9");
$stmt->execute();
//================================== 7-12 month=================================================
$stmt = $link->prepare("update sumloan set salary=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SALARY' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set regular=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'REGULAR' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set micro=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'MICRO-LOAN' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set sharecap=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SHARECAPITAL' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set emergency=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'EMERGENCY' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set hablag=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HABLAG' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set pension=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'PENSION' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set car=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'VEHICLE' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set special=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SPECIAL' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set agricultural=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'AGRICULTURAL' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set business=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'BUSINESS' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set contractor=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'CONTRACTORS' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set deped=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'DEP-ED' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
$stmt = $link->prepare("update sumloan set housing=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HOUSING' and no_of_month_due between 7 and 12 ".$whereval.") where id = 10");
$stmt->execute();
//==================================  > 12 month=================================================
$stmt = $link->prepare("update sumloan set salary=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SALARY' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set regular=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'REGULAR' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set micro=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'MICRO-LOAN' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set sharecap=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SHARECAPITAL' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set emergency=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'EMERGENCY' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set hablag=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HABLAG' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set pension=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'PENSION' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set car=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'VEHICLE' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set special=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'SPECIAL' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set agricultural=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'AGRICULTURAL' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set business=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'BUSINESS' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set contractor=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'CONTRACTORS' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set deped=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'DEP-ED' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();
$stmt = $link->prepare("update sumloan set housing=(select ifnull(sum(loan_balance),0) from aging where kindsofloan = 'HOUSING' and no_of_month_due > 12 ".$whereval.") where id = 11");
$stmt->execute();

//========================= ajax ====================================




$sumarry_arr = array();

$query = "SELECT * FROM sumloan";
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result)){

    $sumarry_arr[] = array("title" => $row['title'],
                    "salary" => $row['salary'],
                    "regular" => $row['regular'],
                    "micro" => $row['micro'],
                    "sharecap" => $row['sharecap'],
                    "emergency" => $row['emergency'],
                    "hablag" => $row['hablag'],
                    "pension" => $row['pension'],
                    "CAR" => $row['CAR'],
                    "special" => $row['special'],
                    "agricultural" => $row['agricultural'],
                    "business" => $row['business'],
                    "contractor" => $row['contractor'],
                    "housing" => $row['housing'],
                    "deped" => $row['deped'],
                );             
}
echo json_encode($sumarry_arr);
   }

?>