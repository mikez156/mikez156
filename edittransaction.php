<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
include 'nav.php';
if(isset($_POST["srchtxt"])){
  $varnam = $_POST["srchtxt"];
}
else{
  $varnam = '';
}
echo $varnam;
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <title>Edit</title>

  <style>
#edittab, tr, td, th{
  border: 1px solid black;
}
#edittab tr td:nth-child(1), #edittab th:nth-child(1),
#edittab td:nth-child(2), #edittab th:nth-child(2),
#edittab td:nth-child(7), #edittab th:nth-child(7),
#edittab td:nth-child(9), #edittab th:nth-child(9),
#edittab td:nth-child(10), #edittab th:nth-child(10),
#edittab td:nth-child(11), #edittab th:nth-child(11),
#edittab td:nth-child(12), #edittab th:nth-child(12)
{
    display: none;
}

input[type="text"]
{
    font-size:15px;
}
#dettxt{
  outline: none;
    border: 0px;
}
input.txt {
    font-family: "segoe ui";
    font-size: 15px;
    height: 20px;
    padding: 0px;
    margin: 0px;
    outline: none;
    border: 0px;
    vertical-align: baseline;
    width:100px;
}
.tabtoedit td,tr{
  border: 1px solid red;
}
#edittab td {cursor: pointer;}

.selectedrow {
    background-color: brown;
    color: #FFF;
}

  </style>
</head>
<body>
<br>
<div class="container">

  <div class="row">
  <div class="search-box" style="width:175px;">
        <input type="text" autocomplete="off" placeholder="Search OR/CDV/JV" name="srchtxt" id="srchtxt" style="width:150px; height:35px;"/>
        <div class="result"></div> 
  </div>
    <input type="submit" class="" name="serchbtn" id="serchbtn" value="Search" style="width:80px; height:40px;">
  </div>
<hr>

  <div class="row">
  <div class="col-lg-6">
 <table id="edittab">
<thead>
<tr>
<th>ID</th>
<th>member_id</th>
<th>Date</th>
<th>OR/CD/JV</th>
<th>CRJ</th>
<th>CDV</th>
<th>JV</th>
<th>Type</th>
<th>Terms</th>
<th>kinds of Loan</th>
<th>Id of loan</th>
<th>Cdv mark</th>
<th>Remark</th>
</tr>
</thead>

<tbody>
</tbody>
</table>
  </div>
  <div class="col-lg-6">
<div class="row">
<div class="container-fluid">
<table id="editor" name="editor">
<tr>
<td>ORCD</td>
<td><input type="text" id="orcdtxt" name="orcdtxt" class="txt"></td>
<td>Date</td>
<td><input type="date" id="dettxt" name="dettxt"></td>
</tr>
<tr>
<td>CRJ</td>
<td><input type="text" id="crjtxt" name="crjtxt" class="txt"></td>
<td>CDV</td>
<td><input type="text" id="cdvtxt" name="cdvtxt" class="txt"></td>
</tr>
<tr>
<td>JV</td>
<td><input type="text" id="jvtxt" name="jvtxt" class="txt"></td>
<td>TYPE</td>
<td><input type="text" id="typtxt" name="typtxt" class="txt"></td>
</tr>
<tr>
<td>Kinds of Loan</td>
<td><input type="text" id="koltxt" name="koltxt" class="txt"></td>
<td>Terms</td>
<td><input type="text" id="termtxt" name="termtxt" class="txt"></td>
</tr>
<td>Loan ID</td>
<td><input type="text" id="lonidtxt" name="lonidtxt" class="txt"></td>
<td>CDv Mark</td>
<td><input type="text" id="cdvmtxt" name="cdvmtxt" class="txt"></td>
</tr>
<tr>
<td>Remark</td>
<td colspan="3"><input type="text" id="remtxt" name="remtxt" class="txt" style="width:100%"></td>
</tr>
</table>
<input type="hidden" id="ledgeid">

<br>
<table style="border:none">
<tr style="border:none">
<td><input type="submit" value="Delete" id="del"></td>
<td style="width:100px;border:none"></td>
<td><input type="submit" value="Update" id="upd"></td>
</tr>
</table>


</div>

</div>


  
  </div>
  </div>
</div>
</body>

<script>
$(document).ready(function(){

  $(document).on("click", "#serchbtn", function(){
    $("#edittab tbody").empty();
    $.ajax({
      url: "editqry.php",
      dataType: "json",
			type: "POST",
			data:  {orcd:$("#srchtxt").val()},
			success: function(response){
       
		  var len = response.length;
                for(var i=0; i<len; i++){
                    var tr_str = "<tr id='row1'>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].id + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].member_id + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].date + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].orcd + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].crj + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].cdv + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].jv + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].type + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].terms + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].kindsofloan + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].idofloan + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].cdvmark + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].remark + "</td>" +

                        "</tr>";
    
                    $("#edittab tbody").append(tr_str);
                }
                
    }
		});

});

$(document).on("click", "#del", function(){
    $.ajax({
      url: "editqry.php",
      dataType: "json",
			type: "POST",
			data:  {idnum:$("#ledgeid").val(),dele:"del"},
			success: function(response){
     alert("Transaction Deleted");
    }
		});

});

$(document).on("click", "#upd", function(){
    $.ajax({
      url: "editqry.php",
      dataType: "json",
			type: "POST",
			data:  {idnum:$("#ledgeid").val(),updet:"updet",orcds:$("#orcdtxt").val(),deyt:$("#dettxt").val(),
        crjs:$("#crjtxt").val(),cdvs:$("#cdvtxt").val(),jvs:$("#jvtxt").val(),
        typs:$("#typtxt").val(),kols:$("#koltxt").val(),terms:$("#termtxt").val()
        ,loanis:$("#lonidtxt").val(),cdvms:$("#cdvmtxt").val(),rems:$("#remtxt").val()},
			success: function(response){
     alert("Transaction Updated");
    }
		});

});

$(document).on("click", "#edittab > tbody > tr", function() {
    $(this).addClass('selectedrow').siblings().removeClass('selectedrow');  
    var id = $(this).find('td:first').html();
    var deyt = $(this).find('td:eq(2)').html();
    var orcd = $(this).find('td:eq(3)').html();
    var crj = $(this).find('td:eq(4)').html();
    var cdv = $(this).find('td:eq(5)').html();
    var jv = $(this).find('td:eq(6)').html();
    var type = $(this).find('td:eq(7)').html();
    var terms = $(this).find('td:eq(8)').html();
    var kindofloan = $(this).find('td:eq(9)').html();
    var idofloan = $(this).find('td:eq(10)').html();
    var cdmark = $(this).find('td:eq(11)').html();
    var remark = $(this).find('td:eq(12)').html();


    $("#ledgeid").prop("value", id);
    $("#dettxt").prop("value", deyt);
    $("#orcdtxt").prop("value", orcd);
    $("#crjtxt").prop("value", crj);
    $("#cdvtxt").prop("value", cdv);
    $("#jvtxt").prop("value", jv);
    $("#typtxt").prop("value", type);
    $("#koltxt").prop("value", kindofloan);
    $("#termtxt").prop("value", terms);
    $("#lonidtxt").prop("value", idofloan);
    $("#cdvmtxt").prop("value", cdmark);
    $("#remtxt").prop("value", remark);

    });
  });

</script>

</html>

