$(document).ready(function(){
    $(".ledgbtn").click(function(){
        $("#newmember").hide();
        $("#crjdiv").hide();
        $("#mems").hide();
        $("#Schedulediv").hide();
        $("#ledgerdiv").show();
        
    });
    $("#savingledgebtn").click(function(){
        $("#shwsavingtbl").show();
        $("#shwsharetble").hide();
        $("#shwloantble").hide();
        $.when(shwsavingldgertbl()).then(setsavbal);
       
    });
    $("#shareledgebtn").click(function(){
        $("#shwsavingtbl").hide();
        $("#shwsharetble").show();
        $("#shwloantble").hide();
        //shwshareldgertbl();
        $.when(shwshareldgertbl()).then(setsavbal);
    });
    $("#loanledgebtn").click(function(){
        $("#shwsavingtbl").hide();
        $("#shwsharetble").hide();
        $("#shwloantble").show();
        //shwloanldgertbl();
        $.when(shwloanldgertbl()).then(setsavbal);
    });
    $("#svngschedbtn").click(function(){
        $("#savingschedtble").show();
        $("#shareschedtble").hide();
        $("#loanschedtble").hide();
        shwsavingscdtbl();
    });
    $("#shareschedbtn").click(function(){
        $("#savingschedtble").hide();
        $("#shareschedtble").show();
        $("#loanschedtble").hide();
        shwsharescdtbl();
    });
    $("#loanschedbtn").click(function(){
        $("#savingschedtble").hide();
        $("#shareschedtble").hide();
        $("#loanschedtble").show();
        shwloanscdtbl();
    });
    $("#editledg").click(function(){
     //   alert("gvghvghvh vjvj");
        edittrans();
    });
    $("#sendtoexcel").click(function (e) {
        expotoexcelsched();
});
$("#computeAging").click(function (e) {
    alert("setrtrtr");
   // agingcomp();
});

 });
function shwsavingldgertbl(){
    //alert("hgfghfhgs jvhjv");
    $("#shwsavingtbl tbody").empty();
        var table = $("#ledgertble tbody");
        
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
             
                if(type == 'Savings'){
                    $("#shwsavingtbl tbody").append("<tr><td>"+deyt+"</td><td>"+orcd+"</td><td>"+crj+"</td><td>"+cdv+"</td><td></td></tr>")
                }

            // do something with productId, product, Quantity
            
        
        });
     
    }
    function setsavbal(){
       var savingbal = 0;
       if($("#shwsavingtbl > tbody > tr").length > 0){
         $("#shwsavingtbl tbody").find('tr').each(function (i) {
            var $tds = $(this).find('td'),
                deyt = $tds.eq(2).text(),
                orcd = $tds.eq(3).text();

                $tds.eq(4).html(savingbal + (parseFloat(deyt)-parseFloat(orcd)));
                savingbal =savingbal + (parseFloat(deyt)-parseFloat(orcd));
        });

    }
  
       var sharebal = 0;
        $("#shwsharetble tbody").find('tr').each(function (i) {
            var $tds = $(this).find('td'),
                deyt = $tds.eq(2).text(),
                orcd = $tds.eq(3).text();
             
                $tds.eq(4).html(sharebal + (parseFloat(deyt)-parseFloat(orcd)));
                sharebal =sharebal + (parseFloat(deyt)-parseFloat(orcd));
            // do something with productId, product, Quantity
        });

        var loanbal = 0;
        $("#shwloantble tbody").find('tr').each(function (i) {
           // var $tds = $(this).find('td'),
           //     deyt = $tds.eq(3).text(),
           //     orcd = $tds.eq(4).text();
             
               // if(deyt > 0){
                 //   $tds.eq(4).html(deyt);
               // }
            // do something with productId, product, Quantity

            var $tds = $(this).find('td'),
                crj = $tds.eq(2).text(),
                cdj = $tds.eq(3).text();

                $tds.eq(4).html(loanbal + (parseFloat(crj)-parseFloat(cdj)));
            loanbal =loanbal + (parseFloat(crj)-parseFloat(cdj));
        });
      




    }
function shwshareldgertbl(){
   
        $("#shwsharetble tbody").empty();
            var table = $("#ledgertble tbody");
            
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
                        $("#shwsharetble tbody").append("<tr><td>"+deyt+"</td><td>"+orcd+"</td><td>"+crj+"</td><td>"+cdv+"</td><td></td></tr>")
                    }
    
                // do something with productId, product, Quantity
               
            });
}
function shwloanldgertbl(){
   
            $("#shwloantble tbody").empty();
                var table = $("#ledgertble tbody");
                
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
                     
                        if(type == 'Loan' || type == 'Loan Payment'){
                            $("#shwloantble tbody").append("<tr><td>"+deyt+"</td><td>"+orcd+"</td><td>"+crj+"</td><td>"+cdv+"</td><td></td><td> "+kindsofloan+" </td><td> "+terms+" </td></tr>")
                        }
        
                    // do something with productId, product, Quantity
                   
                });
}
function shwsavingscdtbl(){
        $("#savingschedtble tbody").empty();

        $.ajax({
                url: "schedsaving.php",
                dataType: "json",
                type: "post",
                data:{branchsrjsched: $("#branchsrjsched").val(),datetoday: $("#datetoday").val()},
                success: function(response){
                var len = response.length;
                for(var i=0; i<len; i++){
                    var tr_str = "<tr id='row1'>" +
                    "<td align='center' style='white-space: nowrap;'>" + (i+1) + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].id + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].lname + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].address + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].account + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].fname + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].mname + "</td>" +
                    "<td align='center' style='white-space: nowrap;'>" + response[i].mos3 + "</td>" +
                        "</tr>";
    
                    $("#savingschedtble tbody").append(tr_str);
                }
    
            }
                
            });
}
function shwsharescdtbl(){
    $("#shareschedtble tbody").empty();

    $.ajax({
            url: "schedshare.php",
            dataType: "json",
            type: "post",
            data:{branchsrjsched: $("#branchsrjsched").val(),datetoday: $("#datetoday").val()},
            success: function(response){
            var len = response.length;
            for(var i=0; i<len; i++){
                var share_str = "<tr id='row1'>" +
                "<td align='center' style='white-space: nowrap;'>" + (i+1) + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].account + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].name + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].address + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share0 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share1 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share2 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share3 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share4 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share5 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share6 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share7 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share8 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share9 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share10 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share11 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].share12 + "</td>" +

                    "</tr>";

                $("#shareschedtble tbody").append(share_str);
            }

        }
            
        });
}

function shwloanscdtbl(){
    $("#loanschedtble tbody").empty();

    $.ajax({
            url: "schedloan.php",
            dataType: "json",
            type: "post",
            data:{branchsrjsched: $("#branchsrjsched").val(),datetoday: $("#datetoday").val()},
            success: function(response){
            var len = response.length;
            for(var i=0; i<len; i++){
                var share_str = "<tr id='row1'>" +
                "<td align='center' style='white-space: nowrap;'>" + (i+1) + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].account + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].name + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].address + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].begining + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan1 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan2 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan3 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan4 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan5 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan6 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan7 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan8 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan9 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan10 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan11 + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan12 + "</td>" +

                    "</tr>";

                $("#loanschedtble tbody").append(share_str);
            }

        }
            
        });

       
} 
function edittrans(){

 window.location = "edittransaction.php";

}
function expotoexcelsched(){
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;

    tab = document.getElementById('savingschedtble'); // id of table

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
function agingcomp(){
    $("#agingtblrpt tbody").empty();

    $.ajax({
            url: "setaging.php",
            dataType: "json",
            type: "post",
            data:{branchsrjage: $("#branchsrjage").val(),datetoday: $("#datetoday").val()},
            success: function(response){
            var len = response.length;
            for(var i=0; i<len; i++){
                var tr_str = "<tr id='row1'>" +
                "<td align='center' style='white-space: nowrap;'>" + (i+1) + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].account + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].name + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].address + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].releasedate + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].due_date + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].no_of_month_due + "</td>" +
                "<td align='center' style='white-space: nowrap;'>" + response[i].loan_amount + "</td>" +
                    "</tr>";

                $("#agingtblrpt tbody").append(tr_str);
            }

        }
            
        });
}