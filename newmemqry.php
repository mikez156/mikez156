<?php
require_once "connection.php";
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

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
$classi = mysqli_real_escape_string($link, $_REQUEST['classi']);

// Attempt insert query execution
$sql = "INSERT INTO members (`account`, `lname`, `fname`, `mname`,`address`,`birth_date`,
        `age`,`current_address`,`permanent_address`,`gender`,`occupation`,`spouse`,`spouse_occupation`,
        `nearest_relative`,`relation`,`date_of_membership`,`edducational_attainment`,`civil_status`,
        `religion`,`annual_income`,`contact_number`,`name_of_father`,`name_of_mother`,`tin`,
        `company_name`,`number_of_dependent`)
         VALUES ('$account', '$lastname', '$firstname', '$midname', '$permaadd', '$birth', '$age'
         , '$curadd', '$permaadd', '$gender', '$occ', '$spouse', '$spouseocc', '$beneficiary', '$relation'
         , '$dateofmem', '$educ', '$cstatus', '$religion', '$annual', '$cp'
         , '$father', '$mother','$tin','$classi','$nodep')";
if(mysqli_query($link, $sql)){


    echo "Please Proceed To your nearest PMPC office for payment and confirmation";


} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);




?>