<?php
include('../../includes/list_cour-inc.php');


$id=$_GET['id'];
$cour=$liscours->getcour($id);


  // Header Content Type
  $file = "../../uploads/cours/file-".$cour[0]['NSS']."-".$id.".pdf"; 
 
  header ('Content-type:application/pdf');
  header('Content-Description:inline; filename="'.$file.'"');
  header('Content-Transfer-Encoding:binary');
  header('Accept-Ranges:bytes');
 
  // Send the file to the browser.
  @readfile($file);