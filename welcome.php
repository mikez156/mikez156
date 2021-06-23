<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="jsfiles/shwdivs.js"></script>
    <style>
        input[type=text] {
  width: 100%;
  padding: 3px 3px;
  margin: 0px 0;
  box-sizing: border-box;
}
.meme td,th{
    text-align:left;
}
.meme th{
    text-align:center;
}
table,td,th{
    border: 1px solid black;
}
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
        background:white;
    }
    .result p:hover{
        background: #f2f2f2;
    }


    
    .cdjc td{
        white-space: nowrap;
    }
#accbal td{
    width:50%;
}
#accbal{
    width:100%;
}


#loantbl td {cursor: pointer;}

.selectedrow {
    background-color: brown;
    color: #FFF;
}
.ledgbtn{
    background-color:#90EE90;
}
.ledgbtn:hover{
    background-color:#31A231;
    cursor: pointer;
}
.ped{
    margin: 5px;
    cursor: pointer;
    border: solid black 1px;
    min-width: 100px;
    height: 50px;
    background-color: lightgreen;
text-align: center;
padding: 10px;
}
.ped:hover,.pedi:hover{
    background-color: greenyellow;
}
.pedi{
    margin: 5px;
    cursor: pointer;
}
    </style>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
        <br>
        <!--=========calendar========-->
        <label for="datetoday">Date:</label>
        <input type="date" id="datetoday" name="datetoday"  value="<?php echo date("Y-m-d"); ?>">

            <!--==================Butttoonnnsss==-->
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#membership">Membership</button>
                <div id="membership" class="collapse">
                    <div style="margin-left: 50px">
                        <button type="button" id="newmem" class="btn btn-success">New Member</button>
                        <button type="button" id="upmem" class="btn btn-success">Update Member</button>
                    </div>
                </div>

            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#report">Reports</button>
                <div id="report" class="collapse">
                    <div style="margin-left: 50px">
                        <button type="button" class="btn btn-success" id="agingbtn">Aging</button>
                        <button type="button" class="btn btn-success" id="schedbtn">Schedule</button>
                        <button type="submit" class="btn btn-success">Transaction</button>
                        <button type="submit" class="btn btn-success" id="memshow">Members</button>
                        <button type="submit" class="btn btn-success" id="Staffshow">Staffs</button>
                        <button type="submit" class="btn btn-success" id="bookshow">Books</button>
                    </div>
                </div>
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#trans" id="transac">Transaction</button>
                <div id="trans" class="collapse">
                    <div style="margin-left: 50px">
                        <button type="button" class="btn btn-success" id="crj">CRJ</button>
                        <button type="button" class="btn btn-success" id="cdj">CDJ</button>
                        <button type="submit" class="btn btn-success" id="jv">JV</button>
                    </div>
                </div>
                <form action="dtrphp.php" method="get">
                <button type="submit" class="btn btn-primary" id="dtrbtn">DTR</button>
                </form>

                <div style="border: 1px solid #f00;">
<table id = "accbal">
<tr>
<td>Savings</td>
<td><h5 id="savbal" name="savbal">0.00</h5></td>
<tr>
<tr>
<td>Share Capiltal</td>
<td><h5 id="sharebal" name="sharebal">0.00</h5></td>
<tr>
<tr>
<td>Loans</td>
<td><h5 id="loanbal" name="loanbal">0.00</h5></td>
<tr>
</table>
                </div>
                <br>
<table class="ledgerbtn" style="border:none;">
<tr style="border:none;"><td style="border:none;"><p class="ledgbtn"> &nbsp &nbsp Ledger &nbsp  &nbsp  </p></td></tr>
</table>

                <br><br>
                <a href="register.php">Create account</a>
        </div>


<div class="col-lg-9">
        <div class="row ">
        
        <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search ..." name="srchtxt" id="srchtxt"/>
        <div class="result"></div>
        
    </div>
    
        <input type="submit" class="btn btn-primary" style="width: 100px;" name="searchbtn" id="searchbtn" value="Search">
        
        <H4 name="namemem" id="namemem" style="text-indent: 50px;"></H4>
        
        </div>

        <hr>
                <div id="newmember">
                <br>
                <form action="innewmem.php" method="POST">
                <input type="hidden" name="idnum" id="idnum">
                <table style="width:100%">
                
                <tr>
                    <td>Account:</td>
                    <td><input type="text" name="account" id="account"></td>
                    <td colspan="2"></td>
                    <td style="width:30px; border: 0;"></td>
                    <td>Date of Membership:</td>
                    <td><input type="date" name="memdate" id="memdate"></td></td>
                </tr>
                <tr>
                    <td>Last name:</td>
                    <td colspan="3"><input type="text" name="lastn" id="lastn"></td>
                    <td style="width:30px; border: 0;"></td>
                    <td>TIN:</td>
                    <td><input type="text" name="tin" id="tin"></td></td>
                </tr>
                <tr>
                    <td>Middle name:</td>
                    <td colspan="3"><input type="text" name="midn" id="midn"></td>
                    <td style="width:30px; border: none;"></td>
                    <td>Number of Dependent:</td>
                    <td><input type="text" name="nodep" id="nodep"></td></td>
                </tr>
                <tr>
                    <td>First name:</td>
                    <td colspan="3"><input type="text" name="firstn" id="firstn"></td>
                    <td style="width:30px; border: none;"></td>
                    <td>Highest Edu. Att.:</td>
                    <td><input type="text" name="educ" id="educ"></td></td>
                </tr>
                <tr>
                    <td>Permanent Address:</td>
                    <td colspan="3"><input type="text" name="permaadd" id="permaadd"></td>
                    <td style="width:30px; border: none;"></td>
                    <td>Religion:</td>
                    <td><input type="text" name="religion" id="religion"></td></td>
                </tr>
                <tr>
                    <td>Current Address:</td>
                    <td colspan="3"><input type="text" name="curadd" id="curadd" ></td>
                    <td style="width:30px; border: none;"></td>
                    <td>Annual Income:</td>
                    <td><input type="text" name="anualinc" id="anualinc"></td></td>
                </tr>
                <tr>
                    <td>Birt Date:</td>
                    <td><input type="date" name="birthdate" id="birthdate"  onchange="submitBday()"></td>
                    <td>Age:</td>
                    <td><input type="text" name="age" id="age" style="width:100%"></td>
                    <td style="width:30px; border: none;"></td>
                    <td>Contact Number:</td>
                    <td><input type="text" name="cp" id="cp"></td></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td colspan="3"><select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Organization">Organization</option>
                        </select></td>
                        <td style="width:30px; border: none;"></td>
                    <td>Name of Father:</td>
                    <td><input type="text" name="father" id="father"></td></td>
                </tr>
                <tr>
                    <td>Civil Status</td>
                    <td colspan="3"><select name="cstatus" id="cstatus">
                        <option value="Single">Single</option>
                        <option value="Maried">Maried</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                        </select></td>
                        <td style="width:30px; border: none;"></td>
                    <td>Name of Mother:</td>
                    <td><input type="text" name="mother" id="mother"></td></td>
                </tr>
                <tr>
                    <td>Occupation:</td>
                    <td colspan="3"><input type="text" name="occupation"  id="occupation" ></td>
                    <td style="width:30px; border: none;"></td>
                    <td>Beneficiary:</td>
                    <td colspan="2"><input type="text" name="beneficiary" id="beneficiary"></td>
                </tr>
                <tr>
                    <td>Classification:</td>
                    <td colspan="3"><select name="classi" id="classi">
                        <option value="Government">Government</option>
                        <option value="NonGovernment">NonGovernment</option>
                        <option value="Both">Both</option>
                        </select></td>
                        <td style="width:30px; border: none;"></td>
                        <td>Relation:</td>
                    <td colspan="2"><input type="text" name="relation" id="relation"></td>
                </tr>
                <tr>
                    <td>Spouse:</td>
                    <td colspan="3"><input type="text" name="spouse" id="spouse"></td>
                    <td style="width:30px; border: none;"></td>
                    <td>Branch:</td>
                    <td colspan="3"><select name="branch" id="branch">
                        <option value="Main Office">Main Office</option>
                        <option value="Lagawe">Lagawe</option>
                        <option value="Solano">Solano</option>
                        <option value="Bambang">Bambang</option>
                        <option value="Diadi">Diadi</option>
                        <option value="Diffun">Diffun</option>
                        <option value="Maddela">Maddela</option>
                        <option value="Baguio">Baguio</option>
                        <option value="Maria Aurora">Maria Aurora</option>
                        <option value="Dipaculao">Dipaculao</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Spouse Occupation:</td>
                    <td colspan="3"><input type="text" name="spouseocc" id="spouseocc"></td>
                </tr>

                </table>
                <br>
                <input type="submit" class="btn btn-success" id="subinsert" name="subinsert" value="Add"></button>
                </form>
                </div>

    <div class="row" style="border-style: double;" id="crjdiv" name="crjdiv">
        

        <div class="col-lg-6">
        <div>
        <label>OR</label><input type="text" style="width:100px;" id="orcd" name="orcd">
        </div>
        <div id="crjcon">
        <table>
            <tr>
                <th>Share Capital</th>
                <td><input type="text" name="crjshare" id="crjshare" style="text-align: right" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Savings</th>
                <td><input type="text" name="crjsaving" id="crjsaving" style="text-align: right" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Time Deposit</th>
                <td><input type="text" name="crjtd" id="crjtd" style="text-align: right" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Loan Recievables</th>
                <td><input type="text" name="crjlrecieve" id="crjlrecieve" style="text-align: right" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Interest on Loan</th>
                <td><input type="text" name="crjintloan" id="crjintloan" style="text-align: right" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Service Fee</th>
                <td><input type="text" name="crjsf" id="crjsf" style="text-align: right" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Loan Redemption Fund</th>
                <td><input type="text" name="crjlrf" id="crjlrf" style="text-align: right" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Legal Fund</th>
                <td><input type="text" name="crjlf" id="crjlf" style="text-align: right" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Fines</th>
                <td><input type="text" name="crjfines" id="crjfines" style="text-align: right" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Membership Fee</th>
                <td><input type="text" name="crjmf" id="crjmf" style="text-align: right" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Mortuary Aid</th>
                <td><input type="text" name="crjmas" id="crjmas" style="text-align: right" autocomplete="off"></td>
            </tr>
            <tr>
                <th>Passbook</th>
                <td><input type="text" name="crjpassbook" id="crjpassbook" style="text-align: right" autocomplete="off"></td>
            </tr>
            <tr>
                <td><input type="text" name="crjotherstxt" id="crjotherstxt" placeholder="Others.." autocomplete="off"></td>
                <td><input type="text" name="crjothers" id="crjothers" style="text-align: right" autocomplete="off"></td>
            </tr>

        </table>
        </div>
        <div id="cdjcon">
            <table class="cdjc">
            <thead>
                <tr>
                    <th>Debit</th><th>Account</th><th>Credit</th>
                <tr>
            </thead>
            <tbody>
                <tr><td><input type="text" id="dloan" autocomplete="off"></td><td>Loan</td><td><input type="text" id="cloan" autocomplete="off"></td></tr>
                <tr><td><input type="text" id="dsaving" autocomplete="off"></td><td>Savings</td><td><input type="text" id="csaving" autocomplete="off"></td></tr>
                <tr><td><input type="text" id="dtd" autocomplete="off"></td><td>Time Deposit</td><td><input type="text" id="ctd" autocomplete="off"></td></tr>
                <tr><td><input type="text" id="dshare" autocomplete="off"></td><td>Share Capital/Fixed</td><td><input type="text" id="cshare" autocomplete="off"></td></tr>
                <tr><td><input type="text" id="dintloan" autocomplete="off"></td><td>Interest on Loan</td><td><input type="text" id="cintloan" autocomplete="off"></td></tr>
                <tr><td><input type="text" id="dsf" autocomplete="off"></td><td>Service Fee</td><td><input type="text" id="csf" autocomplete="off"></td></tr>
                <tr><td><input type="text" id="daf" autocomplete="off"></td><td>Aplication Fee</td><td><input type="text" id="caf" autocomplete="off"></td></tr>
                <tr><td><input type="text" id="dlrf" autocomplete="off"></td><td>Loan Redemption Fund</td><td><input type="text" id="clrf" autocomplete="off"></td></tr>
                <tr><td><input type="text" id="dlegal" autocomplete="off"></td><td>Legal Fund</td><td><input type="text" id="clegal" autocomplete="off"></td></tr>
                <tr><td><input type="text" id="dannual" autocomplete="off"></td><td>Annual Due</td><td><input type="text" id="cannual" autocomplete="off"></td></tr>
                <tr><td><input type="text" id="dfines" autocomplete="off"></td><td>Fines</td><td><input type="text" id="cfines" autocomplete="off"></td></tr>
                <tr><td><input type="text" id="dot" autocomplete="off"></td><td><input type="text" id="cotxt" placeholder="Others" autocomplete="off"></td><td><input type="text" id="cot"></td></tr>
                <tr><td><input type="text" id="dcoh" autocomplete="off"></td><td>Cash on Hand</td><td><input type="text" id="ccoh" autocomplete="off"></td></tr>
                <tr><td></td><th>Total</th><td></td></tr>
            </tbody>
            </table>
        </div>
        <div id="jvcon">
            <table>
            <thead>
                <tr>
                    <th>From</th>
                    <th>To</th>
                <tr>
            </thead>
            <tbody>
            <tr>
            <td><select name="selectfrom" id="selectfrom">
                        <option value="Share Capital">Share Capital</option>
                        <option value="Saving">Saving</option>
                        <option value="Loan">Loan</option>
                        <option value="Time Deposit">Time Deposit</option>
                        <option value="Int. on TD">Int. on TD</option>
    </select></td>
    <td><select name="selectto" id="selectto">
                        <option value="Share Capital">Share Capital</option>
                        <option value="Saving">Saving</option>
                        <option value="Loan">Loan Payment</option>
                        <option value="Time Deposit">Time Deposit</option>
    </select></td>
            </tr>
            <tr>
            <td colspan=2><input style="width:100%;" type="text" name="jvfrom" id="jvfrom"></td>
            </tr>
            <tr>
            <td>Remark</td>
            <td><input style="width:100%;" type="text" name="jvremark" id="jvremark"></td>
            </tr>
            </tbody>
            </table>
        </div>
</div>
<div class="col-lg-6">
<table id="loantbl">
<thead>
            <tr>
                <th style="display:none">loanid</th>
                <th>LOAN Bal.</th>
                <th>Loan Kind</th>
                <th>Released</th>
                <th>Due Date</th>
                <th>Release Date</th>
                <th>Terms</th>
                <th style='display:none'>payments</th>

            </tr>
        </thead>
        <tbody>
        </tbody>
</table>
<input type="hidden" name="loanid" id="loanid">
<div>
<br>
<table>
<tr>
<td colspan=2><input type="checkbox" value="Restructure" id="restruct" name="restruct"><label for="restruct">Restructure</label></td>
</tr>
<tr>
<td>Terms(Mos)</td>
<td>Kinds of Loan</td>
</tr>
<tr>
<td><input style="width:100px;" type="text" name="termstxt" id="termstxt"></td>
<td><select name="lonkind" id="lonkind">
                        <option value="REGULAR">REGULAR</option>
                        <option value="SPECIAL">SPECIAL</option>
                        <option value="SALARY">SALARY</option>
                        <option value="BUSINESS">BUSINESS</option>
                        <option value="PENSION">PENSION</option>
                        <option value="HABLAG">HABLAG</option>
                        <option value="EMERGENCY">EMERGENCY</option>
                        <option value="SHARECAPITAL">SHARECAPITAL</option>
                        <option value="HOUSING">HOUSING</option>
                        <option value="VEHICLE">VEHICLE</option>
                        <option value="MICRO-LOAN">MICRO-LOAN</option>
                        <option value="CONTRACTORS">CONTRACTORS</option>
                        <option value="DEP-ED">DEP-ED</option>
                        <option value="AGRICULTURAL">AGRICULTURAL</option>
                        <option value="HOUSING">HOUSING</option>

    </select></td>
</tr>
</table>
</div>
<br><br>
            <input type="submit" class="btn btn-success" id="savetransbtn" name="savetransbtn" value="Save">

</div>
        </div>

        <!--=================Show ledger========-->
<div id ="ledgerdiv">
<div>
<input type="submit" id="savingledgebtn" value="Saving">
<input type="submit" id="shareledgebtn" value="Share Capital">
<input type="submit" id="loanledgebtn" value="Loan">

</div>
<div class="row">
<!--======== =============== Saving============-->
<table id="shwsavingtbl">
<thead>
<tr>
<th>Date</th>
<th>OrCdJv</th>
<th>CRJ</th>
<th>CDV</th>
<th>Balance</th>

</tr>
</thead>
<tbody>
</tbody>
</table>
<!--========================Share===================-->
<table id="shwsharetble">
<thead>
<tr>
<th>Date</th>
<th>OrCdJv</th>
<th>CRJ</th>
<th>CDV</th>
<th>Balance</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
<!--==========================Loan=======================-->
<table id="shwloantble">
<thead>
<tr>
<th>Date</th>
<th>OrcdJv</th>
<th>CRJ</th>
<th>CDV</th>
<th>Balance</th>
<th>Kinds of Loan</th>
<th>Terms</th>
</tr>
</thead>
<tbody>
</tbody>
</table>

</div>
<br>
&nbsp;&nbsp;&nbsp; <p id="editledg">Edit Ledger</p>
</div>

<!--==================show ledger=====================-->

<!--=================Show membership========-->
<div class="row" name="mems" id="mems">
<div class="row">
    <p>Branch</p>
    <select name="branchsrj" id="branchsrj">
                        <option value="Main Office">Main Office</option>
                        <option value="Lagawe">Lagawe</option>
                        <option value="Solano">Solano</option>
                        <option value="Bambang">Bambang</option>
                        <option value="Diadi">Diadi</option>
                        <option value="Diffun">Diffun</option>
                        <option value="Maddela">Maddela</option>
                        <option value="Baguio">Baguio</option>
                        <option value="Maria Aurora">Maria Aurora</option>
                        <option value="Dipaculao">Dipaculao</option>
    </select>
    <input type="submit" class="btn btn-success" id="viewmem" name="viewmem" value="View">
    <input type="submit" id="btnExport" style="width:150x;" value="Excel">
    <div class="container-fluid">
            <table id="userTable" border="1" class="meme">
                <thead>
                    <tr>
                        <th width="10px">No!</th>
                        <th>Account</th>
                        <th>Name</th>
                        <th>Current Address</th>
                        <th>Permanent Address</th>
                        <th>TIN</th>
                        <th>Gender</th>
                        <th>Birth Date</th>
                        <th>Age</th>
                        <th>Occupation</th>
                        <th>Spouse</th>
                        <th>Spouse Occupation</th>
                        <th>Contact Number</th>
                        <th>Civil Status</th>
                        <th>Beneficiary</th>
                        <th>Relation</th>
                        <th>Date of Membership</th>
                        <th>Fathers Name</th>
                        <th>Mothers Name</th>
                        <th>Educational Attainment</th>
                        <th>Share</th>
                        <th>Savings</th>
                        <th>Loan</th>
                        
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>


    </div>
    </div>





    <!--                end of second row                               -->
    <div class="container-fluid" id="ledger" style="display:none">
<div class="row">
<div class="container">
<table name="ledgertble" id="ledgertble">
<thead>
<tr>
<th>id</th>
<th>member_id</th>
<th>date</th>
<th>orcdjv</th>
<th>crj</th>
<th>cdv</th>
<th>jv</th>
<th>type</th>
<th>terms</th>
<th>kindsofloan</th>
<th>inerest</th>
<th>id_of_loan</th>
<th>cdv_mark</th>
<th>coshared</th>
<th>remark</th>
</tr>
</thead>
<tbody>

</tbody>
</table>
</div>
</div>
</div>
<!--=================Show Schedule========-->
<!-- ============================================= Schedule================--->
<div id="Schedulediv">
<div class="container-fluid">
<div class="row">
<label for="branchsrjsched">Branch</label>
<select name="branchsrjsched" id="branchsrjsched">
                        <option value="Main Office">Main Office</option>
                        <option value="Lagawe">Lagawe</option>
                        <option value="Solano">Solano</option>
                        <option value="Bambang">Bambang</option>
                        <option value="Diadi">Diadi</option>
                        <option value="Diffun">Diffun</option>
                        <option value="Maddela">Maddela</option>
                        <option value="Baguio">Baguio</option>
                        <option value="Maria Aurora">Maria Aurora</option>
                        <option value="Dipaculao">Dipaculao</option>
    </select>
<input type="submit" value ="Savings" id="svngschedbtn" name="svngschedbtn">
<input type="submit" value ="Share Capital" id="shareschedbtn">
<input type="submit" value ="Loan" id="loanschedbtn">
<input type="submit" value ="Time Deposit" id="tdschedbtn">
<input type="submit" value ="EXCEL" id="sendtoexcel">
</div>
<div class="row">
<!--==================saving schedule table=============-->
<table id="savingschedtble" name="savingschedtble">
<thead>
<tr>
<th>No!</th>
<th>Account</th>
<th>Name</th>
<th>Address</th>
<th>Begining</th>
<th>1st Month</th>
<th>2nd Month</th>
<th>3rd Month</th>
</tr>
</thead>
<tbody>

</tbody>
</table>
<!--==========================share schedule table============-->
<table id="shareschedtble" name="shareschedtble">
<thead>
<tr>
<th>No!</th>
<th>Account</th>
<th>Name</th>
<th>Address</th>
<th>Begining</th>
<th>January</th>
<th>Febuary</th>
<th>March</th>
<th>April</th>
<th>May</th>
<th>June</th>
<th>July</th>
<th>August</th>
<th>September</th>
<th>October</th>
<th>November</th>
<th>December</th>
<th>Total</th>
</tr>
</thead>
<tbody>

</tbody>
</table>
<!--==========================share schedule table============-->
<table id="loanschedtble" name="loanschedtble">
<thead>
<tr>
<th>No!</th>
<th>Account</th>
<th>Name</th>
<th>Address</th>
<th>Begining</th>
<th>January</th>
<th>Febuary</th>
<th>March</th>
<th>April</th>
<th>May</th>
<th>June</th>
<th>July</th>
<th>August</th>
<th>September</th>
<th>October</th>
<th>November</th>
<th>December</th>
<th>Total</th>
</tr>
</thead>
<tbody>

</tbody>
</table>
</div>
</div>
</div>
<!--============================Aging Div===================-->
<div class="row" id="agingDiv">
<div class="container">
<div class="row">
<div>Branch</div>
<div>
<select name="branchsrjage" id="branchsrjage">
                        <option value="All">All Branch</option>
                        <option value="Main Office">Main Office</option>
                        <option value="Lagawe">Lagawe</option>
                        <option value="Solano">Solano</option>
                        <option value="Bambang">Bambang</option>
                        <option value="Diadi">Diadi</option>
                        <option value="Diffun">Diffun</option>
                        <option value="Maddela">Maddela</option>
                        <option value="Baguio">Baguio</option>
                        <option value="Maria Aurora">Maria Aurora</option>
                        <option value="Dipaculao">Dipaculao</option>
    </select>
</div>
<div>Clasification</div>
<div>
<select name="classi" id="classi">
                        <option value="Select">Select</option>
                        <option value="Easy Collection">Easy Collection</option>
                        <option value="For Negotiation">For Negotiation</option>
                        <option value="For Barangay Court">For Barangay Court</option>
                        <option value="For Litigation">For Litigation</option>
    </select>
</div>
</div>


</div>
<div class="d-flex flex-row ">
<div class="ped"  id="computeAging"><p>Compute</p></div>
<div class="ped"  id="all_loans"> ALL Loans </div>
<div class="ped"  id="current_loan"> Current Loans </div>
<div class="ped"  id="past_due"> Past Due Loans </div>
<div class="ped"  id="sumary"> Summary </div>
<div class="ped"  id="excelit"> Excel </div>
<div  id="edit" style="padding:10px"> <p class="pedi" id ="pedil">Edit Classification </p></div>

</div>
<table id="agingtblrpt">
<thead>
<tr>
<td>No!</td>
<td>Account</td>
<td>Name</td>
<td>Address</td>
<td>Release Date</td>
<td>Due Date</td>
<td>Loan Amount</td>
<td>Loan Balance</td>
<td>Security</td>
<td>About the Borrower</td>
<td>What To do</td>
<td>When To do It</td>
<td>Person Responsible</td>
<td>Remarks</td>
<td>Kinds of Loan</td>
<td>Mos. Due</td>
<td>Branch</td>
</tr>
</thead>
<tbody>
    
</tbody>
</table>

<table id="sumarytbl">
<thead>
<tr>
<th></th>
<th></th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
<!-- =================End of Aging div====================================-->

</body>
<script>
$(document).ready(function(){
    $("#newmember").hide();
    $("#crjdiv").hide();
    $("#mems").hide();
    $("#Schedulediv").hide();
    $("#ledgerdiv").hide();
    $("#agingDiv").hide();
  $("#newmem").click(function(){
    $("#subinsert").prop("value", "Add");
    $("#newmember").show();
    $("#crjdiv").hide();
    $("#mems").hide();
    $("#Schedulediv").hide();
    $("#ledgerdiv").hide();
    $("#agingDiv").hide();
  });
  $("#upmem").click(function(){
    $("#subinsert").prop("value", "Update");
    $("#newmember").show();
    $("#crjdiv").hide();
    $("#mems").hide();
    $("#Schedulediv").hide();
    $("#ledgerdiv").hide();
    $("#agingDiv").hide();
  });
  $("#transac").click(function(){
    $("#subinsert").prop("value", "Update");
    $("#newmember").hide();
    $("#crjdiv").show();
    $("#mems").hide();
    $("#cdjcon").hide();
    $("#jvcon").hide();
    $("#Schedulediv").hide();
    $("#ledgerdiv").hide();
    $("#agingDiv").hide();
  });
  $("#memshow").click(function(){
    $("#newmember").hide();
    $("#crjdiv").hide();
    $("#mems").show();
    $("#Schedulediv").hide();
    $("#ledgerdiv").hide();
    $("#agingDiv").hide();
  });
  $("#dtrbtn").click(function(){
    $("#newmember").hide();
    $("#crjdiv").hide();
    $("#mems").hide();
    $("#Schedulediv").hide();
    $("#ledgerdiv").hide();
    $("#agingDiv").hide();
  });
  $("#schedbtn").click(function(){
    $("#newmember").hide();
    $("#crjdiv").hide();
    $("#mems").hide();
    $("#Schedulediv").show();
    $("#ledgerdiv").hide();
    $("#agingDiv").hide();
  });
  $("#agingbtn").click(function(){
    $("#newmember").hide();
    $("#crjdiv").hide();
    $("#mems").hide();
    $("#Schedulediv").hide();
    $("#ledgerdiv").hide();
    $("#agingDiv").show();
  });


  $("#viewmem").click(function(){
    //idnum

        serjmembersall();
   
    });
  $("#crj").click(function(){
    $("#crjcon").show();
    $("#cdjcon").hide();
    $("#jvcon").hide();
    
});
//===============ledger show=================
$("#savingledgebtn").click(function(){
    $("#shwsavingtbl").show();
    $("#shwsharetble").hide();
    $("#shwloantble").hide();
    
});
$("#shareledgebtn").click(function(){
    $("#shwsavingtbl").hide();
    $("#shwsharetble").show();
    $("#shwloantble").hide();
});
$("#loanledgebtn").click(function(){
    $("#shwsavingtbl").hide();
    $("#shwsharetble").hide();
    $("#shwloantble").show();
});


$("#cdj").click(function(){
    $("#crjcon").hide();
    $("#cdjcon").show();
    $("#jvcon").hide();
});
$("#jv").click(function(){
    $("#crjcon").hide();
    $("#cdjcon").hide();
    $("#jvcon").show();
});
  $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });

    $("#searchbtn").click(function(){
            serj();
            searchloanbal();
        });

    $("#savetransbtn").click(function(){
    if($("#idnum").val() != 0){
        savetransact();
    }else{
        alert("Please Search The Client Name");
    }

    });
    $("#btnExport").click(function (e) {
        expotoexcel();
});

$(document).on("click", "#loantbl > tbody > tr", function() {
    $(this).addClass('selectedrow').siblings().removeClass('selectedrow');  
    var lonid=$(this).find('td:first').html();
    $("#loanid").prop("value", lonid);
    });


  });

function serj(){
    
    $.ajax({
            url: "searchmem.php",
            cache: false,
            dataType: "json",
            type: "post",
            data:{srchtxt: $("#srchtxt").val()},
                success: function (result) {
                $("#idnum").val(result.idnum);
                $("#account").val(result.account);
                $("#memdate").val(result.memdate);
                $("#lastn").val(result.lastname);
                $("#midn").val(result.midn);
                $("#firstn").val(result.firstname);
                $("#memdate").val(result.memdate);
                $("#tin").val(result.tin);
                $("#nodep").val(result.nodep);
                $("#educ").val(result.educ);
                $("#permaadd").val(result.permaadd);
                $("#religion").val(result.religion);
                $("#curadd").val(result.curadd);
                $("#anualinc").val(result.anualinc);
                $("#birthdate").val(result.birthdate);
                $("#age").val(result.age);
                $("#cp").val(result.cp);
                $("#gender").val(result.gender);
                $("#father").val(result.father);
                $("#cstatus").val(result.cstatus);
                $("#mother").val(result.mother);
                $("#occupation").val(result.occupation);
                $("#beneficiary").val(result.beneficiary);
                $("#classi").val(result.classi);
                $("#relation").val(result.relation);
                $("#spouse").val(result.spouse);
                $("#branch").val(result.branch);
                $("#spouseocc").val(result.spouseocc);
                namemem.innerText = result.lastname+ ' ' +result.firstname+' '+result.midn+' #'+result.account;
                
    

            }
            
        });

        
}

function submitBday() {
    var Q4A;
    var Bdate = document.getElementById('birthdate').value;
    var Bday = +new Date(Bdate);
    Q4A = ~~ ((Date.now() - Bday) / (31557600000));
    document.getElementById("age").value = Q4A;
}
function serjmembersall(){
    $("#userTable tbody").empty();

    $.ajax({
            url: "showallmem.php",
            dataType: "json",
            type: "post",
            data:{branchsrj: $("#branchsrj").val()},
            success: function(response){
            var len = response.length;
            for(var i=0; i<len; i++){
                var id = response[i].id;
                var username = response[i].account;
                var lname = response[i].lname;
                var fname = response[i].fname;
                var mname = response[i].mname;

                var tr_str = "<tr id='row1'>" +
                    "<td align='center' style='white-space: nowrap;'>" + (i+1) + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + username + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + lname +" "+ fname +" "+ mname+ "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].curadd + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].peradd + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].tin + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].gender + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].birtday + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].age + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].occ + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].spouse + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].spouseocc + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].cono + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].cstat + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].bene + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].rela + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].dayofmem + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].fatname + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].motname + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].edu + "</td>" +
                    "<td align='center' style='white-space: nowrap; text-align:right;'>" + response[i].share + "</td>" +
                    "<td align='center' style='white-space: nowrap; text-align:right;'>" + response[i].saving + "</td>" +
                    "<td align='center' style='white-space: nowrap; text-align:right;'>" + response[i].loan + "</td>" +

                    "</tr>";

                $("#userTable tbody").append(tr_str);
            }

        }
            
        });
}
function savetransact(){
   
 $.ajax({
            url: "savetrans.php",
            dataType: "json",
            type: "post",
            data:{crjsaving: $("#crjsaving").val(),orcd: $("#orcd").val(),datetoday: $("#datetoday").val(),
                idnum: $("#idnum").val(),crjshare: $("#crjshare").val(),crjtd: $("#crjtd").val(),
                crjlrecieve: $("#crjlrecieve").val(),crjintloan: $("#crjintloan").val(),crjsf: $("#crjsf").val()
                ,crjlrf: $("#crjlrf").val(),crjlf: $("#crjlf").val(),crjfines: $("#crjfines").val()
                ,crjmf: $("#crjmf").val(),crjmas: $("#crjmas").val(),crjpassbook: $("#crjpassbook").val()
                ,crjotherstxt: $("#crjotherstxt").val(),crjothers: $("#crjothers").val(),loanid: $("#loanid").val()
                ,termstxt: $("#termstxt").val(),lonkind: $("#lonkind").val(),dloan: $("#dloan").val()
                ,dsaving: $("#dsaving").val(),dtd: $("#dtd").val(),dshare: $("#dshare").val()
                ,dintloan: $("#dintloan").val(),dsf: $("#dsf").val(),daf: $("#daf").val(),dlrf: $("#dlrf").val()
                ,dlegal: $("#dlegal").val(),dannual: $("#dannual").val(),dfines: $("#dfines").val()
                ,dot: $("#dot").val(),dcoh: $("#dcoh").val(),cloan: $("#cloan").val(),csaving: $("#csaving").val()
                ,ctd: $("#ctd").val(),cshare: $("#cshare").val(),cintloan: $("#cintloan").val(),csf: $("#csf").val()
                ,caf: $("#caf").val(),clrf: $("#clrf").val(),clegal: $("#clegal").val(),cannual: $("#cannual").val()
                ,cfines: $("#cfines").val(),cot: $("#cot").val(),ccoh: $("#ccoh").val(),cotxt: $("#cotxt").val()
                ,jvfrom: $("#jvfrom").val(),jvremark: $("#jvremark").val(),selectfrom: $("#selectfrom").val(),selectto: $("#selectto").val()},
            success: function(response){
               // alert response.fill;
               
            }    

        });
        alert("Transaction Save");
        cleartext()
}
function expotoexcel(){
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('userTable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
  


function cleartext() {
    namemem.innerText = "";
    $('#idnum').val('0');
    $('#orcd').val('');
    $('#crjshare').val('');
    $('#crjsaving').val('');
    $('#crjtd').val('');
    $('#crjlrecieve').val('');
    $('#crjintloan').val('');
    $('#crjsf').val('');
    $('#crjlrf').val('');
    $('#crjlf').val('');
    $('#crjfines').val('');
    $('#crjfines').val('');
    $('#crjmf').val('');
    $('#crjmas').val('');
    $('#crjpassbook').val('');
    $('#crjotherstxt').val('');
    $('#crjothers').val('');
    $('#dloan').val('');
    $('#dsaving').val('');
    $('#dtd').val('');
    $('#dshare').val('');
    $('#dintloan').val('');
    $('#dsf').val('');
    $('#daf').val('');
    $('#dlrf').val('');
    $('#dlegal').val('');
    $('#dannual').val('');
    $('#dfines').val('');
    $('#dot').val('');
    $('#dcoh').val('');
    $('#cloan').val('');
    $('#csaving').val('');
    $('#ctd').val('');
    $('#cshare').val('');
    $('#cintloan').val('');
    $('#csf').val('');
    $('#caf').val('');
    $('#clrf').val('');
    $('#clegal').val('');
    $('#cannual').val('');
    $('#cfines').val('');
    $('#cotxt').val('');
    $('#ccoh').val('');
    $('#termstxt').val('');
    $("#restruct").prop('checked', false); 
}
function searchloanbal(){
    $("#ledgertble tbody").empty();

    $.ajax({
            url: "searchledger.php",
            dataType: "json",
            type: "post",
            data:{srchtxt: $("#srchtxt").val()},
            success: function(response){
            var len = response.length;
            for(var i=0; i<len; i++){
                var id = response[i].lid;
                var memid = response[i].mimid;
                var orcd = response[i].orcdjv;


                var tr_str = "<tr id='row1'>" +
                    "<td align='center' style='white-space: nowrap;'>" + id + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + memid +"</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].deyt + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + orcd + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].crj + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].cdv + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].jv + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].type + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].terms + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].kindsofloan + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].interest + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].id_of_loan + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].cdv_mark + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].remark + "</td>" +
                    "</tr>";

                $("#ledgertble tbody").append(tr_str);
            }

        },
        complete: function (data) {
            //$.when(sumsav()).then(function() {fixloantab()}); 
            $.when(sumsav()).then(fixloantab()).then(setloanbal());
     }

        });

        
}
function sumsav(){
$("#loantbl tbody").empty();
    var table = $("#ledgertble tbody");
    
var crjshare = 0;
var cdjshare = 0;
var crjsaving = 0;
var cdjsaving = 0;
var crjloan = 0;
var cdjloan = 0;
var crjtd = 0;
var cdjtd = 0;
  table.find('tr').each(function (i) {
        var $tds = $(this).find('td'),
            Id = $tds.eq(0).text(),
            deyt = $tds.eq(2).text(),
            orcd = $tds.eq(3).text(),
            crj = $tds.eq(4).text(),
            cdv = $tds.eq(5).text(),
            jv = $tds.eq(6).text(),
            type = $tds.eq(7).text(),
            terms = $tds.eq(8).text(),
            kindsofloan = $tds.eq(9).text(),
            idofloan = $tds.eq(11).text(),
            cdvmrk = $tds.eq(12).text(),
            remark = $tds.eq(13).text();
            if(type == 'Share Capital'){
                crjshare += parseFloat(crj);
                cdjshare += parseFloat(cdv);
            }
            if(type == 'Savings'){
                crjsaving += parseFloat(crj);
                cdjsaving += parseFloat(cdv);
            }
            if(type == 'Loan' && cdv > 0){
                cdjloan += parseFloat(cdv);
                $("#loantbl tbody").append("<tr><td style='display:none'>"+Id+"</td><td></td><td>"+kindsofloan+"</td><td>"+cdv+"</td><td></td><td>"+deyt+"</td><td>"+terms+"</td><td style='display:none'></td></tr>")
            }
            if(type == 'Loan'){
                crjloan += parseFloat(crj);
            }
        // do something with productId, product, Quantity
       
    });
   sharebal.innerText = crjshare-cdjshare;
    savbal.innerText = crjsaving-cdjsaving;
    loanbal.innerText = cdjloan-crjloan; 
}
function fixloantab(){


$("#loantbl tbody").find('tr').each(function (i) {
var lpayment = 0;
//var cdjshare = 0;
      //  var loantbId = 485;
       var $tds = $(this).find('td'),
            loantbId = $tds.eq(0).html();
            $("#ledgertble tbody").find('tr').each(function (i) {
                
                var $ids = $(this).find('td'),
                    lcrj = $ids.eq(4).text(),
                    ledgerId = $ids.eq(11).html();
                    if(ledgerId == loantbId && $ids.eq(7).text() == 'Loan' && $ids.eq(4).text() >0){
                       lpayment += parseFloat(lcrj);
                       
                    }
               // alert (lpayment);
                
            });
          $tds.eq(7).html(lpayment);
    });

}
function setloanbal(){
    $("#loantbl tbody").find('tr').each(function (i) {
        
       var $tds = $(this).find('td');
       var loanrel = $tds.eq(3).text();
       var loanpay =$tds.eq(7).text();
        $tds.eq(1).html(parseFloat(loanrel) - parseFloat(loanpay));
      // alert("vhgvhvgh");
    });
}

</script>
</html>