<?php
include 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vafbut = $_POST['sub'];
    
    $bionum = mysqli_real_escape_string($link, $_POST["bionum"]);
    $last = mysqli_real_escape_string($link, $_POST["last"]);
    $first = mysqli_real_escape_string($link, $_POST["first"]);
    $position = mysqli_real_escape_string($link, $_POST["position"]);
    $incharge = mysqli_real_escape_string($link, $_POST["incharge"]);
    $posincharge = mysqli_real_escape_string($link, $_POST["inchargepos"]);
    $checker = mysqli_real_escape_string($link, $_POST["check"]);
    $poschecker = mysqli_real_escape_string($link, $_POST["checkpos"]);
    $branch = mysqli_real_escape_string($link, $_POST["branch"]);
    $memidd = mysqli_real_escape_string($link, $_POST["mem_id"]);

    if($vafbut == 'Add'){
    $sql= "INSERT INTO employee_dtr(biometric,last, first,position,nameoffirst,positionoffirst,nameofsecond,positionofsecond,branch)
     VALUES ('" . $bionum . "', '".$last."','".$first."','".$position."','".$incharge."','".$posincharge."','".$checker."','".$poschecker."','".$branch."')";

    if (mysqli_query($link, $sql)) {
        if($sql)
            {
                echo "<script> alert('Staff added'); </script>";
            }
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}
if($vafbut == 'Update'){
    $sql= "UPDATE employee_dtr set biometric = '" . $bionum . "',last='".$last."', first='".$first."',position='".$position."',nameoffirst='".$incharge."',
    positionoffirst='".$posincharge."',nameofsecond='".$checker."',positionofsecond='".$poschecker."',branch='".$branch."' where id_number = '".$memidd."'";

   if (mysqli_query($link, $sql)) {
               echo "<script> alert('Staff updated'); </script>";
     } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }
}
if($vafbut == 'Delete'){
    $sql = "delete from employee_dtr where id_number = '".$memidd."'";
    if (mysqli_query($link, $sql)) {
        echo "<script> alert('Staff Deleted'); </script>";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Set Staff</title>
<style>
td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}

.selected {
    background-color: brown;
    color: #FFF;
}
#table td:nth-child(1), td:nth-child(5), td:nth-child(6), td:nth-child(7), td:nth-child(8), td:nth-child(9), td:nth-child(10){
    display: none
}
</style>

</head>

<body>
    <div class="container">
        <input type="submit" value="New" name="addbtn" id="addbtn"> 
        <input type = "submit" value= "Update" name="updatebtn" id="updatebtn">
        <input type = "submit" value= "Delete" name="delbtn" id="delbtn">
    </div>
    <div class= "container">
            <div class="row"> 
            <div class="col-lg-6" name="addstaff" id="addstaff">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <table>
                        <tr>
                            <td>Biometric Number</td>
                            <td><input type="text" name="bionum" id="bionum"></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><input type="text" name="last" id="last"></td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td><input type="text" name="first" id="first"></td>
                        </tr>
                        <tr>
                            <td>Position</td>
                            <td><input type="text" name="position" id="position"></td>
                        </tr>
                        <tr>
                            <td>Incharge</td>
                            <td><input type="text" name="incharge" id="incharge"></td>
                        </tr>
                        <tr>
                            <td>Incharge Position</td>
                            <td><input type="text" name="inchargepos" id="inchargepos"></td>
                        </tr>
                        <tr>
                            <td>Checked By</td>
                            <td><input type="text" name="check" id="check"></td>
                        </tr>
                        <tr>
                            <td>Checked Position</td>
                            <td><input type="text" name="checkpos" id="checkpos"></td>
                        </tr>
                        <tr>
                        <td>Branch</td>
                        <td>
                        <select name="branch" id="branch">
                                <option value="Main">Main</option>
                                <option value="Solano">Solano</option>
                                <option value="Bambang">Bambang</option>
                                <option value="Diadi">Diadi</option>
                                <option value="Diffun">Diffun</option>
                                <option value="Baguio">Baguio</option>
                                <option value="Maddela">Maddela</option>
                                <option value="Maria Aurora">Maria Aurora</option>
                                <option value="Dipaculao">Dipaculao</option>

                        </select>
                        </td>
                        </tr>
                    </table>
                
               <div>
                    <input type = "submit" value="Add" name="sub" id="sub">
                </div>
                <input type="hidden" name="mem_id" id="mem_id">
            </form>
            </div>

            <div class="col-lg-6">
                        <table id="table">
                            <thead>
                            <tr><td></td><th>Last Name</th><th>First Name</th>
                            <th>BioNo!</th><tr>
                            </thead>
                            <tbody>
                            
                                <?php
                                $sql = "select * from employee_dtr";
                                $result = mysqli_query($link, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr><td>".$row["id_number"]."</td>
                                        <td>".$row["last"]."</td>
                                        <td>".$row["first"]."</td>
                                        <td>".$row["biometric"]."</td>
                                        <td>".$row["position"]."</td>
                                        <td>".$row["nameoffirst"]."</td>
                                        <td>".$row["positionoffirst"]."</td>
                                        <td>".$row["nameofsecond"]."</td>
                                        <td>".$row["positionofsecond"]."</td>
                                        <td>".$row["branch"]."</td>
                                        
                                        </tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                
                </div>


        </div>
    </div>
</body>
<script>
$(document).ready(function(){
    $("#addbtn").click(function(){
        $("#sub").prop("value", "Add");
    });
    $("#updatebtn").click(function(){
        $("#sub").prop("value", "Update");
    });
    $("#delbtn").click(function(){
        $("#sub").prop("value", "Delete");
    });
    $("#table tr").click(function(){
   $(this).addClass('selected').siblings().removeClass('selected');    
   var value=$(this).find('td:first').html();
   var bionum=$(this).find('td:eq(3)').html();
   var lastn=$(this).find('td:eq(1)').html();
   var firstn=$(this).find('td:eq(2)').html();
   var posi=$(this).find('td:eq(4)').html();
   var inchar=$(this).find('td:eq(5)').html();
   var charepos=$(this).find('td:eq(6)').html();
   var chek=$(this).find('td:eq(7)').html();
   var chekpos=$(this).find('td:eq(8)').html();
   var banch=$(this).find('td:eq(9)').html();
   //alert(value);
   $("#mem_id").prop("value", value);
   $("#bionum").prop("value", bionum);
   $("#last").prop("value", lastn);
   $("#first").prop("value", firstn);
   $("#position").prop("value", posi);
   $("#incharge").prop("value", inchar);
   $("#inchargepos").prop("value", charepos);
   $("#check").prop("value", chek);
   $("#checkpos").prop("value", chekpos);
   $("#branch").prop("value", banch);
   
});


});
</script>
</html>