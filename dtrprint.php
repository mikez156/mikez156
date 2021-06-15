
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style type="text/css">
table {
margin: 8px;
}
th.nama{
    background: none;
    height:70px;
    color:black;
    vertical-align: bottom;
}
th {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
background: #666;
color: #FFF;
padding: 2px 6px;
border-collapse: separate;
border: 1px solid #000;
}

td {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
border: 1px solid #DDD;
}
.namhieght{
    height:70px;
}
@media print {
    @page {
border: solid 1px #ccc;
    }


}
</style> 
<link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<table id="dtr">
<thead>
<tr><th colspan='6'>PIWONG MULTIPURPOSE COOPERATIVE</th></tr>
</thead>
<tbody>
<?php

session_start();
require 'connection.php';
$brnj = $_SESSION["branch"];
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 1;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$result_count = mysqli_query($link,"SELECT COUNT(*) As total_records FROM `employee_dtr` where branch = '".$brnj."'");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1



if($_SESSION["mos"] == 1){
    $smos = "1-15";
}
elseif($_SESSION["mos"] == 2){
    $smos = "16-31";
}
elseif($_SESSION["mos"] == 3){
    $smos = "1-31";
}
$monthnum = $_SESSION["mont"];
$monthName = date('F', mktime(0, 0, 0, $monthnum, 10));
$sql = "SELECT * FROM employee_dtr  where branch = '".$brnj."' LIMIT $offset, $total_records_per_page";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        for ($x = 1; $x <= 31; $x++) {
        if ($row["amin".$x] > 0){
            ${"amin$x"} = date('g:iA', strtotime($row["amin".$x]));
        }
        else{
            ${"amin$x"} ="";
        }
        if ($row["amout".$x] > 0){
            ${"amout$x"} = date('g:iA', strtotime($row["amout".$x]));
        }
        else{
            ${"amout$x"} ="";
        }
        if ($row["pmin".$x] > 0){
            ${"pmin$x"} = date('g:iA', strtotime($row["pmin".$x]));
        }
        else{
            ${"pmin$x"} ="";
        }
        if ($row["pmout".$x] > 0){
            ${"pmout$x"} = date('g:iA', strtotime($row["pmout".$x]));
        }
        else{
            ${"pmout$x"} ="";
        }
    }
      
      echo "<tr><td colspan='6'>DTR of ".$monthName." ".$smos."</td></tr>";
      echo "<tr><th colspan='6'>".$row["last"]." ".$row["first"]."</th></tr>";
      echo "<tr><td>Dy</td><td colspan='2'>AM</td><td colspan='2'>PM</td><td>Und. Time</td></tr>";
      echo "<tr><td></td><td>Log in</td><td>Log Out</td><td>Log in</td><td>Log out</td><td></td></tr>";
      echo "<tr><td>1</td><td>".$amin1."</td><td>".$amout1."</td><td>".$pmin1."</td><td>".$pmout1."</td><td></td></tr>";
      echo "<tr><td>2</td><td>".$amin2."</td><td>".$amout2."</td><td>".$pmin2."</td><td>".$pmout2."</td><td></td></tr>";
      echo "<tr><td>3</td><td>".$amin3."</td><td>".$amout3."</td><td>".$pmin3."</td><td>".$pmout3."</td><td></td></tr>";
      echo "<tr><td>4</td><td>".$amin4."</td><td>".$amout4."</td><td>".$pmin4."</td><td>".$pmout4."</td><td></td></tr>";
      echo "<tr><td>5</td><td>".$amin5."</td><td>".$amout5."</td><td>".$pmin5."</td><td>".$pmout5."</td><td></td></tr>";
      echo "<tr><td>6</td><td>".$amin6."</td><td>".$amout6."</td><td>".$pmin6."</td><td>".$pmout6."</td><td></td></tr>";
      echo "<tr><td>7</td><td>".$amin7."</td><td>".$amout7."</td><td>".$pmin7."</td><td>".$pmout7."</td><td></td></tr>";
      echo "<tr><td>8</td><td>".$amin8."</td><td>".$amout8."</td><td>".$pmin8."</td><td>".$pmout8."</td><td></td></tr>";
      echo "<tr><td>9</td><td>".$amin9."</td><td>".$amout9."</td><td>".$pmin9."</td><td>".$pmout9."</td><td></td></tr>";
      echo "<tr><td>10</td><td>".$amin10."</td><td>".$amout10."</td><td>".$pmin10."</td><td>".$pmout10."</td><td></td></tr>";
      echo "<tr><td>11</td><td>".$amin11."</td><td>".$amout11."</td><td>".$pmin11."</td><td>".$pmout11."</td><td></td></tr>";
      echo "<tr><td>12</td><td>".$amin12."</td><td>".$amout12."</td><td>".$pmin12."</td><td>".$pmout12."</td><td></td></tr>";
      echo "<tr><td>13</td><td>".$amin13."</td><td>".$amout13."</td><td>".$pmin13."</td><td>".$pmout13."</td><td></td></tr>";
      echo "<tr><td>14</td><td>".$amin14."</td><td>".$amout14."</td><td>".$pmin14."</td><td>".$pmout14."</td><td></td></tr>";
      echo "<tr><td>15</td><td>".$amin15."</td><td>".$amout15."</td><td>".$pmin15."</td><td>".$pmout15."</td><td></td></tr>";
      echo "<tr><td>16</td><td>".$amin16."</td><td>".$amout16."</td><td>".$pmin16."</td><td>".$pmout16."</td><td></td></tr>";
      echo "<tr><td>17</td><td>".$amin17."</td><td>".$amout17."</td><td>".$pmin17."</td><td>".$pmout17."</td><td></td></tr>";
      echo "<tr><td>18</td><td>".$amin18."</td><td>".$amout18."</td><td>".$pmin18."</td><td>".$pmout18."</td><td></td></tr>";
      echo "<tr><td>19</td><td>".$amin19."</td><td>".$amout19."</td><td>".$pmin19."</td><td>".$pmout19."</td><td></td></tr>";
      echo "<tr><td>20</td><td>".$amin20."</td><td>".$amout20."</td><td>".$pmin20."</td><td>".$pmout20."</td><td></td></tr>";
      echo "<tr><td>21</td><td>".$amin21."</td><td>".$amout21."</td><td>".$pmin21."</td><td>".$pmout21."</td><td></td></tr>";
      echo "<tr><td>22</td><td>".$amin22."</td><td>".$amout22."</td><td>".$pmin22."</td><td>".$pmout22."</td><td></td></tr>";
      echo "<tr><td>23</td><td>".$amin23."</td><td>".$amout23."</td><td>".$pmin23."</td><td>".$pmout23."</td><td></td></tr>";
      echo "<tr><td>24</td><td>".$amin24."</td><td>".$amout24."</td><td>".$pmin24."</td><td>".$pmout24."</td><td></td></tr>";
      echo "<tr><td>25</td><td>".$amin25."</td><td>".$amout25."</td><td>".$pmin25."</td><td>".$pmout25."</td><td></td></tr>";
      echo "<tr><td>26</td><td>".$amin26."</td><td>".$amout26."</td><td>".$pmin26."</td><td>".$pmout26."</td><td></td></tr>";
      echo "<tr><td>27</td><td>".$amin27."</td><td>".$amout27."</td><td>".$pmin27."</td><td>".$pmout27."</td><td></td></tr>";
      echo "<tr><td>28</td><td>".$amin28."</td><td>".$amout28."</td><td>".$pmin28."</td><td>".$pmout28."</td><td></td></tr>";
      echo "<tr><td>29</td><td>".$amin29."</td><td>".$amout29."</td><td>".$pmin29."</td><td>".$pmout29."</td><td></td></tr>";
      echo "<tr><td>30</td><td>".$amin30."</td><td>".$amout30."</td><td>".$pmin30."</td><td>".$pmout30."</td><td></td></tr>";
      echo "<tr><td>31</td><td>".$amin31."</td><td>".$amout31."</td><td>".$pmin31."</td><td>".$pmout31."</td><td></td></tr>";
      echo "<tr><th colspan='6' class='nama'>".$row["last"]." ".$row["first"]."</th></tr>";
      echo "<tr><td colspan='6' style='text-align:center'>Signature Over Printed Name</td></tr>";
      echo "<tr><td colspan='3'>Approved By:</td><td colspan='3'>Checked By:</td></tr>";
      echo "<tr><th colspan='3' class='nama'>".$row["nameoffirst"]."</th><th class='nama' colspan='3'>".$row["nameofsecond"]."</th></tr>";
      echo "<tr><td colspan='3' style='text-align:center'>".$row["positionoffirst"]."</td><td colspan='3' style='text-align:center'>".$row["positionofsecond"]."</td></tr>";
    }
  } else {
    echo "0 results";
  }

?>
</tbody>
</table>


<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
   <button id="pint" onclick="imprimir()">Print Dtr</button> 
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>

<a href="staffupdate.php" >Update employees</a>
</div>
<script type="text/javascript">

    function imprimir() {
        
        var divToPrint=document.getElementById("dtr");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
        
    }

</script>
</body>

</html>