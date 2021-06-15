<?php

require_once "connection.php";
$srchtxt=$_POST["srchtxt"];
$fill1 = array();
$fill2 = array();
$sql = "SELECT * FROM members where concat(lname,' ',fname,' ',mname,' ',account) = '".$srchtxt."'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
     
        while($row = mysqli_fetch_array($result)){
            $fill1 = array(
                'idnum' => $row["member_id"],
                'account' => $row["account"],
                'firstname' => $row["fname"],
                'lastname' => $row["lname"],
                'midn' => $row["mname"],
                'memdate' => $row["date_of_membership"],
                'tin' => $row["tin"],
                'nodep' => $row["number_of_dependent"],
                'educ' => $row["edducational_attainment"],
                'permaadd' => $row["permanent_address"],
                'religion' => $row["religion"],
                'curadd' => $row["current_address"],
                'anualinc' => $row["annual_income"],
                'birthdate' => $row["birth_date"],
                'age' => $row["age"],
                'cp' => $row["contact_number"],
                'gender' => $row["gender"],
                'father' => $row["name_of_father"],
                'cstatus' => $row["civil_status"],
                'mother' => $row["name_of_mother"],
                'occupation' => $row["occupation"],
                'beneficiary' => $row["nearest_relative"],
                'classi' => $row["company_name"],
                'relation' => $row["relation"],
                'spouse' => $row["spouse"],
                'branch' => $row["branch"],
                'spouseocc' => $row["spouse_occupation"],
                
                 );
            
        }
        // Free result set
        echo json_encode($fill1);
       // echo json_encode($loanarr);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
// Close connection
?>
