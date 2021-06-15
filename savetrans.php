<?php
include 'connection.php';
$crjsaving = mysqli_real_escape_string($link, $_POST["crjsaving"]);
$idnumer = mysqli_real_escape_string($link, $_POST["idnum"]);
$orcdv = mysqli_real_escape_string($link, $_POST["orcd"]);
$datetoday = mysqli_real_escape_string($link, $_POST["datetoday"]);
$crjshare = mysqli_real_escape_string($link, $_POST["crjshare"]);
$crjsaving = mysqli_real_escape_string($link, $_POST["crjsaving"]);
$crjtd = mysqli_real_escape_string($link, $_POST["crjtd"]);
$crjlrecieve = mysqli_real_escape_string($link, $_POST["crjlrecieve"]);
$crjintloan = mysqli_real_escape_string($link, $_POST["crjintloan"]);
$crjsf = mysqli_real_escape_string($link, $_POST["crjsf"]);
$crjlrf = mysqli_real_escape_string($link, $_POST["crjlrf"]);
$crjlf = mysqli_real_escape_string($link, $_POST["crjlf"]);
$crjfines = mysqli_real_escape_string($link, $_POST["crjfines"]);
$crjmf = mysqli_real_escape_string($link, $_POST["crjmf"]);
$crjmas = mysqli_real_escape_string($link, $_POST["crjmas"]);
$crjpassbook = mysqli_real_escape_string($link, $_POST["crjpassbook"]);
$crjotherstxt = mysqli_real_escape_string($link, $_POST["crjotherstxt"]);
$crjothers = mysqli_real_escape_string($link, $_POST["crjothers"]);
$loanid = mysqli_real_escape_string($link, $_POST["loanid"]);
$termstxt = mysqli_real_escape_string($link, $_POST["termstxt"]);
$lonkind = mysqli_real_escape_string($link, $_POST["lonkind"]);

$dloan = mysqli_real_escape_string($link, $_POST["dloan"]);
$dsaving = mysqli_real_escape_string($link, $_POST["dsaving"]);
$dtd = mysqli_real_escape_string($link, $_POST["dtd"]);
$dshare = mysqli_real_escape_string($link, $_POST["dshare"]);
$dintloan = mysqli_real_escape_string($link, $_POST["dintloan"]);
$dsf = mysqli_real_escape_string($link, $_POST["dsf"]);
$daf = mysqli_real_escape_string($link, $_POST["daf"]);
$dlrf = mysqli_real_escape_string($link, $_POST["dlrf"]);
$dlegal = mysqli_real_escape_string($link, $_POST["dlegal"]);
$dannual = mysqli_real_escape_string($link, $_POST["dannual"]);
$dfines = mysqli_real_escape_string($link, $_POST["dfines"]);
$dot = mysqli_real_escape_string($link, $_POST["dot"]);
$dcoh = mysqli_real_escape_string($link, $_POST["dcoh"]);
$cotxt = mysqli_real_escape_string($link, $_POST["cotxt"]);

$cloan = mysqli_real_escape_string($link, $_POST["cloan"]);
$csaving = mysqli_real_escape_string($link, $_POST["csaving"]);
$ctd = mysqli_real_escape_string($link, $_POST["ctd"]);
$cshare = mysqli_real_escape_string($link, $_POST["cshare"]);
$cintloan = mysqli_real_escape_string($link, $_POST["cintloan"]);
$csf = mysqli_real_escape_string($link, $_POST["csf"]);
$caf = mysqli_real_escape_string($link, $_POST["caf"]);
$clrf = mysqli_real_escape_string($link, $_POST["clrf"]);
$clegal = mysqli_real_escape_string($link, $_POST["clegal"]);
$cannual = mysqli_real_escape_string($link, $_POST["cannual"]);
$cfines = mysqli_real_escape_string($link, $_POST["cfines"]);
$cot = mysqli_real_escape_string($link, $_POST["cot"]);
$ccoh = mysqli_real_escape_string($link, $_POST["ccoh"]);

$jvfrom = mysqli_real_escape_string($link, $_POST["jvfrom"]);
$jvremark = mysqli_real_escape_string($link, $_POST["jvremark"]);
$selectfrom = mysqli_real_escape_string($link, $_POST["selectfrom"]);
$selectto = mysqli_real_escape_string($link, $_POST["selectto"]);


// saving===============================================
if($crjsaving > 0){
$sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`)
         VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjsaving', 'Savings')";
if(mysqli_query($link, $sql)){
   // $setty = "Saving inserted";
} else{
    //$setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// share capital===============================================
if($crjshare > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjshare', 'Share Capital')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Time Deposit===============================================
if($crjtd > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjtd', 'Time Deposit')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Loan recievable===============================================
if($crjlrecieve > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`id_of_loan`,`remark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjlrecieve', 'Loan','$loanid','Loan Payment')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Loan interest===============================================
if($crjintloan > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjintloan', 'Loan Interest')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Service Fee===============================================
if($crjsf > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjsf', 'SF')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================LRF===============================================
if($crjlrf > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjlrf', 'LRF')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================LF===============================================
if($crjlf > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjlf', 'LRF')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Fines==============================================
if($crjfines > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjfines', 'LRF')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================MF==============================================
if($crjmf > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjmf', 'LRF')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================MAS==============================================
if($crjmas > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjmas', 'LRF')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Passbook==============================================
if($crjpassbook > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjpassbook', 'LRF')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Passbook==============================================
if($crjothers > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$crjothers', 'Others')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}




// ========================================Loan==============================================
if($dloan > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`terms`,`kindsofloan`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$dloan', 'Loan','$termstxt','$lonkind',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Svings cdv==============================================
if($dsaving > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$dsaving', 'Savings',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================TD cdv==============================================
if($dtd > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$dtd', 'Time Deposit',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================TD cdv==============================================
if($dshare > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`cdv_mark`,`remark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$dshare', 'Share Capital',1,'Withdrawal of Share')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Loan interest cdv==============================================
if($dintloan > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`cdv_mark`,`id_of_loan`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$dintloan', 'Loan Interest',1,'$loanid')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================SF cdv==============================================
if($dsf > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$dsf', 'SF',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================AF cdv==============================================
if($daf > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$daf', 'AF',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================AF cdv==============================================
if($dlrf > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$dlrf', 'LRF',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Legal cdv==============================================
if($dlegal > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$dlegal', 'LF',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Anual Due cdv==============================================
if($dannual > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$dannual', 'Annual Due',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Fines cdv==============================================
if($dfines > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$dfines', 'Fines',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================other cdv==============================================
if($dot > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`cdv_mark`,`remarks`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$dot', 'others',1,'$cotxt')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}




// ========================================Loan crj==============================================
if($cloan > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`terms`,`kindsofloan`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$cloan', 'Loan','$termstxt','$lonkind',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Svings crj==============================================
if($csaving > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$csaving', 'Savings',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================TD crj==============================================
if($ctd > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$ctd', 'Time Deposit',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================TD crj==============================================
if($cshare > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$cshare', 'Share Capital',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Loan interest crj==============================================
if($cintloan > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`cdv_mark`,`id_of_loan`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$cintloan', 'Loan Interest',1,'$loanid')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================SF crj==============================================
if($csf > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$csf', 'SF',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================AF crj==============================================
if($caf > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$caf', 'AF',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================AF crj==============================================
if($clrf > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$clrf', 'LRF',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Legal crj==============================================
if($clegal > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$clegal', 'LF',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Anual Due crj==============================================
if($cannual > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$cannual', 'Annual Due',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================Fines crj==============================================
if($cfines > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`cdv_mark`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$cfines', 'Fines',1)";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================other crj==============================================
if($cot > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`cdv_mark`,`remarks`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$cot', 'others',1,'$cotxt')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// ========================================JV from==============================================
if($jvfrom > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `cdv`,`type`,`jv`,`remarks`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$jvfrom', '$selectfrom',1,'$jvremark')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
if($jvfrom > 0){
    $sql = "INSERT INTO all_ledger (`member_id`, `date`, `orcdjv`, `crj`,`type`,`jv`,`remarks`)
             VALUES ('$idnumer', '$datetoday', '$orcdv', '$jvfrom', '$selectto',1,'$jvremark')";
    if(mysqli_query($link, $sql)){

    } else{
       // $setty = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
echo json_encode($setty);
?>