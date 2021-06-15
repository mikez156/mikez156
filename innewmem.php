<?php
require_once "connection.php";
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$cbut = $_POST['subinsert'];
$idnums = mysqli_real_escape_string($link, $_REQUEST['idnum']);

$account = mysqli_real_escape_string($link, $_REQUEST['account']);
$lastname = mysqli_real_escape_string($link, $_REQUEST['lastn']);
$midname = mysqli_real_escape_string($link, $_REQUEST['midn']);
$firstname = mysqli_real_escape_string($link, $_REQUEST['firstn']);
$permaadd = mysqli_real_escape_string($link, $_REQUEST['permaadd']);
$curadd = mysqli_real_escape_string($link, $_REQUEST['curadd']);
$birth = mysqli_real_escape_string($link, $_REQUEST['birthdate']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$occ = mysqli_real_escape_string($link, $_REQUEST['occupation']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$cstatus = mysqli_real_escape_string($link, $_REQUEST['cstatus']);
$spouse = mysqli_real_escape_string($link, $_REQUEST['spouse']);
$sposeocc = mysqli_real_escape_string($link, $_REQUEST['spouseocc']);
$memdate = mysqli_real_escape_string($link, $_REQUEST['memdate']);
$tin = mysqli_real_escape_string($link, $_REQUEST['tin']);
$nodep = mysqli_real_escape_string($link, $_REQUEST['nodep']);
$educ = mysqli_real_escape_string($link, $_REQUEST['educ']);
$dateofmem = mysqli_real_escape_string($link, $_REQUEST['memdate']);
$religion = mysqli_real_escape_string($link, $_REQUEST['religion']);
$annual = mysqli_real_escape_string($link, $_REQUEST['anualinc']);
$cp = mysqli_real_escape_string($link, $_REQUEST['cp']);
$father = mysqli_real_escape_string($link, $_REQUEST['father']);
$mother = mysqli_real_escape_string($link, $_REQUEST['mother']);
$beneficiary = mysqli_real_escape_string($link, $_REQUEST['beneficiary']);
$relation = mysqli_real_escape_string($link, $_REQUEST['relation']);
$spouseocc = mysqli_real_escape_string($link, $_REQUEST['spouseocc']);
$branch = mysqli_real_escape_string($link, $_REQUEST['branch']);
$classi = mysqli_real_escape_string($link, $_REQUEST['classi']);

if($cbut=="Add"){

  
// Attempt insert query execution
$sql = "INSERT INTO members (`account`, `lname`, `fname`, `mname`,`address`,`birth_date`,
        `age`,`current_address`,`permanent_address`,`gender`,`occupation`,`spouse`,`spouse_occupation`,
        `nearest_relative`,`relation`,`date_of_membership`,`edducational_attainment`,`civil_status`,
        `religion`,`annual_income`,`contact_number`,`name_of_father`,`name_of_mother`,`branch`,`tin`,
        `company_name`,`number_of_dependent`)
         VALUES ('$account', '$lastname', '$firstname', '$midname', '$permaadd', '$birth', '$age'
         , '$curadd', '$permaadd', '$gender', '$occ', '$spouse', '$spouseocc', '$beneficiary', '$relation'
         , '$dateofmem', '$educ', '$cstatus', '$religion', '$annual', '$cp'
         , '$father', '$mother', '$branch','$tin','$classi','$nodep')";
if(mysqli_query($link, $sql)){


    header("location: welcome.php");
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}


elseif($cbut=="Update"){
   $sql = "Update members set `account` = '$account', `lname`='$lastname', `fname`='$firstname', `mname`='$midname',`address`='$permaadd',`birth_date`='$birth',
        `age`='$age',`current_address`='$curadd',`permanent_address`='".$permaadd."',`gender`='$gender',`occupation`='$occ',`spouse`='$spouse',`spouse_occupation`='$spouseocc',
        `nearest_relative`='$beneficiary',`relation`='$relation',`date_of_membership`='$dateofmem',`edducational_attainment`='$educ',`civil_status`='$cstatus',
        `religion`='$religion',`annual_income`='$annual',`contact_number`='$cp',`name_of_father`='$father',`name_of_mother`='$mother',`branch`='$branch',`tin`='$tin',
        `company_name`='$classi',`number_of_dependent`='$nodep' where `member_id` = '$idnums'";
if($link->query($sql) === TRUE){
    header("location: welcome.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection 
mysqli_close($link);

}


?>