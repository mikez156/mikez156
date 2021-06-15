<?php
$currentDirectory = getcwd();
$uploadDirectory = "/dtrupload/";

$errors = []; // Store errors here

$fileExtensionsAllowed = ['dat']; // These will be the only file extensions allowed 

$fileName = $_FILES['attlog_file']['name'];
$fileSize = $_FILES['attlog_file']['size'];
$fileTmpName  = $_FILES['attlog_file']['tmp_name'];
$fileType = $_FILES['attlog_file']['type'];
$tmp = explode('.',$fileName);
$fileExtension = strtolower(end($tmp));

$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

if (isset($_POST['submit'])) {

  if (! in_array($fileExtension,$fileExtensionsAllowed)) {
    $errors[] = "This file extension is not allowed. Please upload a dat file";
  }

  if ($fileSize > 4000000) {
    $errors[] = "File exceeds maximum size (4MB)";
  }

  if (empty($errors)) {
    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

    if ($didUpload) {
        // ========================after upload ===============================================
//$names=file($_POST["attlog_file"]);
//$getfile=file("dtrupload/1_attlog.dat");
$names= file("dtrupload/1_attlog.dat");
session_start();
$_SESSION["branch"] = $_POST['branch'];
$_SESSION["mos"] = $_POST['mos'];
$_SESSION["mont"] = $_POST['mont'];

require_once 'connection.php';
for($x = 1; $x <= 31; $x++){
$sqlzer = "update employee_dtr set amin".$x." = 0,amout".$x."=0";
if(mysqli_query($link,$sqlzer)){
               
}else{
    echo mysqli_error($link);
}
}
foreach($names as $name){
$id = substr($name,5,strpos($name, ' ')+5);
$dates =  DateTime::createFromFormat("Y-m-d H:i:s",substr($name,strpos($name, ' ') + 10,19));
    // echo $id.'<br>';
     $dete = substr($name,strpos($name, ' ') + 10,19); //date
     $sss =substr($name,strpos($name, ' ') + 15,2); //month
     $inout = substr($name,strpos($name, ' ') + 31 ,2); // in out bool
     $times = substr($name,strpos($name, ' ') + 20 ,10); // time
      $bionum =  substr($name,2,strpos($name, ' ')+8); // bio number

      $year =  $dates->format("Y");
      $mont =  $dates->format("M");
      $day =  $dates->format("d");
      $moss = $_POST['mont'];
      $sel = isset($_POST['mos']);

if($year == date("Y") && $sss + 0 === $moss + 0){
    //echo $dete;
    //echo $moss .'<br>';
    
    if (isset($_POST['mos']) && $_POST['mos'] == 1){
   for($x = 1; $x <= 15; $x++){
    
        if($x==$day && $inout==0 && strtotime($times) < strtotime('11:50:00')){
        $sql = "update employee_dtr set amin".$x." = '".$dete."' where biometric = '".$bionum."'";
            if(mysqli_query($link,$sql)){
               
            }else{
                echo mysqli_error($link);
            }
        }
        if($x==$day && $inout==1 && (strtotime($times) > strtotime('09:00:00') && strtotime($times) < strtotime('14:00:00'))){
            $sql = "update employee_dtr set amout".$x." = '".$dete."' where biometric = '".$bionum."'";
                if(mysqli_query($link,$sql)){
                   
                }else{
                    echo mysqli_error($link);
                }
            }
            if($x==$day && $inout==0 && (strtotime($times) > strtotime('9:00:00') && strtotime($times) < strtotime('14:00:00'))){
                $sql = "update employee_dtr set pmin".$x." = '".$dete."' where biometric = '".$bionum."'";
                    if(mysqli_query($link,$sql)){
                       
                    }else{
                        echo mysqli_error($link);
                    }
                }
                if($x==$day && $inout==1 && (strtotime($times) > strtotime('14:01:00') && strtotime($times) < strtotime('24:00:00'))){
                    $sql = "update employee_dtr set pmout".$x." = '".$dete."' where biometric = '".$bionum."'";
                        if(mysqli_query($link,$sql)){
                           
                        }else{
                            echo mysqli_error($link);
                        }
                    }
    
}
} 

}
}
header('location:dtrprint.php');


//========================upload file========================================================
} else {
    echo "An error occurred. Please contact the administrator.";
  }
} else {
  foreach ($errors as $error) {
    echo $error . "These are the errors" . "\n";
  }
}

}
?>