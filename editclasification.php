
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Classification</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>

</style>
<body>
<div class="container">
<div class="row" style="display: flex; padding:10px;margin:10px; height:30px;justify-content: center;align-items: center;">
<p style="margin-right:20px;">Branch:</p>
    <select name="branchedit" id="branchedit" style="margin-right:20px;">
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
    <input type="submit" class="btn btn-success" id="viewclass" name="viewclass" value="View">
</div>
</div>
<table class='table table-striped' id="editable">
<thead>
<tr>
<th>mem id</th><th>Account</th><th>Name</th><th>Loan Balance</th><th>Kind of Loan</th><th>Security</th><th>About The Borrower</th><th>What to do</th><th>When to Do</th><th>Remarks</th>
</tr>
</thead>
<tbody>

</tbody>
</table>
</body>
<script>
$(document).ready(function(){
    $(document).on("click", "#viewclass", function(){
    //alert("fcfcfc cfchh");
    $("#editable tbody").empty();

    $.ajax({
            url: "setaging.php",
            dataType: "json",
            type: "post",
            data:{branchedit: $("#branchedit").val(),datetoday: $("#datetoday").val()},
            success: function(response){
            var len = response.length;
            for(var i=0; i<len; i++){
                var tr_strs = "<tr id='row1'>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].memid + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].account + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].name + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan_balance + "</td>" +
                "<td align='center' style='white-space: nowrap;'><select name='branchedit' id='branchedit'>" +
                        "<option value='With Collateral'>With Collateral</option>"+
                        "<option value='Without Collateral'>Without Collateral</option>"+
                        "</select></td>" +

                    "</tr>";

                $("#editable tbody").append(tr_strs);
            }

        }
            
        });
});
});
</script>
</html>
