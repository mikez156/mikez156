<?php
include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
<style>
tr td{
    border:1px;
    border-style: solid;
    height:15px;
}

input[type="text"] {
    box-sizing: border-box;
    padding: 2px;

}
form input[type='submit']  {
        display: inline-block;
        width: 70px;
    }
</style>
<script>
function submitBday() {
    var Q4A;
    var Bdate = document.getElementById('birthdate').value;
    var Bday = +new Date(Bdate);
    Q4A = ~~ ((Date.now() - Bday) / (31557600000));
    document.getElementById("age").value = Q4A;
}
</script>
<body>
<div class="container">
<div id="newmember">
                <br>
                <form action="newmemqry.php" method="POST">
                <div class="row">
                        <div class="col-lg-6 so">
                        <table style="width:100%">
            
                <tr>
                    <td>Last name:</td>
                    <td colspan="3"><input type="text" name="lastn" id="lastn" required></td>

                </tr>
                <tr>
                    <td>Middle name:</td>
                    <td colspan="3"><input type="text" name="midn" id="midn" required></td>

                </tr>
                <tr>
                    <td>First name:</td>
                    <td colspan="3"><input type="text" name="firstn" id="firstn" required></td>

                </tr>
                <tr>
                    <td>Permanent Address:</td>
                    <td colspan="3"><input type="text" name="permaadd" id="permaadd" required></td>

                </tr>
                <tr>
                    <td>Current Address:</td>
                    <td colspan="3"><input type="text" name="curadd" id="curadd" ></td>
                </tr>
                <tr>
                    <td>Birt Date:</td>
                    <td><input type="date" name="birthdate" id="birthdate" onchange="submitBday()"></td>
                    <td>Age:</td>
                    <td><input type="text" name="age" id="age" style="width:100%"></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td colspan="3"><select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Organization">Organization</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Civil Status</td>
                    <td colspan="3"><select name="cstatus" id="cstatus">
                        <option value="Single">Single</option>
                        <option value="Maried">Maried</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Occupation:</td>
                    <td colspan="3"><input type="text" name="occupation"  id="occupation" ></td>
                </tr>
                <tr>
                    <td>Classification:</td>
                    <td colspan="3"><select name="classi" id="classi">
                        <option value="Government">Government</option>
                        <option value="NonGovernment">NonGovernment</option>
                        <option value="Both">Both</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Spouse:</td>
                    <td colspan="3"><input type="text" name="spouse" id="spouse"></td>

                <tr>
                    <td>Spouse Occupation:</td>
                    <td colspan="3"><input type="text" name="spouseocc" id="spouseocc"></td>
                </tr>

                </table>
                        </div>
                        <div class="col-lg-6 so">
                        <table style="width:100%">
                
                <tr>
                    <td>Date of Membership:</td>
                    <td><input type="date" name="memdate" id="memdate"  value="<?php echo date("Y-m-d");?>"></td></td>
                </tr>
                <tr>
                    <td>TIN:</td>
                    <td><input type="text" name="tin" id="tin"></td></td>
                </tr>
                <tr>
                    <td>Number of Dependent:</td>
                    <td><input type="text" name="nodep" id="nodep"></td></td>
                </tr>
                <tr>
                    <td>Highest Edu. Att.:</td>
                    <td><input type="text" name="educ" id="educ"></td></td>
                </tr>
                <tr>
                    <td>Religion:</td>
                    <td><input type="text" name="religion" id="religion"></td></td>
                </tr>
                <tr>
                    <td>Annual Income:</td>
                    <td><input type="text" name="anualinc" id="anualinc"></td></td>
                </tr>
                <tr>
                    <td>Contact Number:</td>
                    <td><input type="text" name="cp" id="cp"></td></td>
                </tr>
                <tr>
                    <td>Name of Father:</td>
                    <td><input type="text" name="father" id="father"></td></td>
                </tr>
                <tr>
                    <td>Name of Mother:</td>
                    <td><input type="text" name="mother" id="mother"></td></td>
                </tr>
                <tr>
                    <td>Beneficiary:</td>
                    <td colspan="2"><input type="text" name="beneficiary" id="beneficiary"></td>
                </tr>
                <tr>
                        <td>Relation:</td>
                    <td colspan="2"><input type="text" name="relation" id="relation"></td>
                </tr>
               


                </table>
                        </div>
                        <br>
                        <div class="container" style="text-align: center">
                <input type="submit" class="btn btn-success" id="subinsert" name="subinsert" value="Submit"></button>
                </div>
                </div>
        

                </form>
                </div>
</div>
</body>
</html>