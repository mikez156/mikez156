<?php
include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>DTR</title>
</head>
<body>
<form action='dtrqry.php' method='POST' enctype="multipart/form-data">

   <div class='container'>
   <input type="file" name="attlog_file" />
   <label for="mont">Select Month</label>

<select name="mont" id="mont">
  <option value="1">January</option>
  <option value="2">Febuary</option>
  <option value="3">March</option>
  <option value="4">April</option>
  <option value="5">May</option>
  <option value="6">June</option>
  <option value="7">July</option>
  <option value="8">August</option>
  <option value="9">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
</select>
   
<label for="mos">Select Month</label>

<select name="mos" id="mos">
  <option value="1">1-15</option>
  <option value="2">16-31</option>
  <option value="3">All</option>
</select>
<label for="branch">Select Month</label>

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
<input type="submit" name ="submit" value="Generate">
   </div>
   <div>
 
   
   </div>
   
</form>
</body>

</html>
