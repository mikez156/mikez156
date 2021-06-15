<?php

require 'connection.php';
$branchsrj=$_POST["branchsrj"];
$return_arr = array();

$query = "SELECT * FROM members where branch = '".$branchsrj."'";

$result = mysqli_query($link,$query);

while($row = mysqli_fetch_array($result)){
    $id = $row['member_id'];
    $lname = $row['lname'];
    $account = $row['account'];
    $fname = $row['fname'];
    $mname = $row['mname'];

    $return_arr[] = array("id" => $id,
                    "account" => $account,
                    "lname" => $lname,
                    "fname" => $fname,
                    "mname" => $mname,
                    "curadd" => $row['current_address'],
                    "peradd" => $row['permanent_address'],
                    "tin" => $row['tin'],
                    "gender" => $row['gender'],
                    "birtday" => $row['birth_date'],
                    "age" => $row['age'],
                    "occ" => $row['occupation'],
                    "spouse" => $row['spouse'],
                    "spouseocc" => $row['spouse_occupation'],
                    "cono" => $row['contact_number'],
                    "cstat" => $row['civil_status'],
                    "bene" => $row['nearest_relative'],
                    "rela" => $row['relation'],
                    "dayofmem" => $row['date_of_membership'],
                    "fatname" => $row['name_of_father'],
                    "motname" => $row['name_of_mother'],
                    "edu" => $row['edducational_attainment'],
                    "share" => $row['share'],
                    "saving" => $row['saving'],
                    "loan" => $row['loan'],
                    
                );
                    
}

// Encoding array in JSON format
echo json_encode($return_arr);
?>