<?php
require_once 'connection.php';
$editarr[] = array();

$orcd = $_POST["orcd"];
//$idnum = $_POST["idnum"];
//function one(){
    $query = "SELECT * FROM `all_ledger` where orcdjv = '$orcd';";
    $result = mysqli_query($link,$query);
    while($row = mysqli_fetch_array($result))
    {
        $editarr[] = array("id" => $row['id'],
                        "member_id" => $row['member_id'],
                        "date" => $row['date'],
                        "orcd" => $row['orcdjv'],
                        "crj" => $row['crj'],
                        "cdv" => $row['cdv'],
                        "jv" => $row['jv'],
                        "type" => $row['type'],
                        "terms" => $row['terms'],
                        "kindsofloan" => $row['kindsofloan'],
                        "idofloan" => $row['id_of_loan'],
                        "cdvmark" => $row['cdv_mark'],
                        "remark" => $row['remark'],
                        "branch" => $row['branch'],
                    );             
    }

    if(isset($_POST['dele'])) {
        $idnum = $_POST["idnum"];
        if($_POST['dele'] == 'del') {
            $sql = "DELETE FROM all_ledger WHERE id='$idnum'";

            if ($link->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $link->error;
            }
        }
         
    }
    if(isset($_POST['updet'])) {
        $idnum = $_POST["idnum"];
        $orcds= $_POST["orcds"];
        $deyt= $_POST["deyt"];
        $crjs= $_POST["crjs"];
        $cdvs= $_POST["cdvs"];
        $jvs= $_POST["jvs"];
        $typs= $_POST["typs"];
        $kols= $_POST["kols"];
        $terms= $_POST["terms"];
        $loanis= $_POST["loanis"];
        $cdvms= $_POST["cdvms"];
        $rems= $_POST["rems"];

        if($_POST['updet'] == 'updet') {
            $sql = "UPDATE all_ledger set orcdjv='$orcds', date='$deyt',crj='$crjs',cdv='$cdvs',
            jv='$jvs',type='$typs',terms='$terms',kindsofloan='$kols',id_of_loan='$loanis', 
            cdv_mark='$cdvms',remark='$rems' WHERE id='$idnum';";

            if ($link->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $link->error;
            }
        }
         
    }

//}
/*function two(){return 2;}

    if(isset($_POST['functionsi'])) {
        if($_POST['functionsi'] == 'one') {
            one();
        }
         elseif($_POST['functionsi'] == 'two') {
            //function two() // call function two
        }

    }*/
   echo json_encode($editarr); 
?>
