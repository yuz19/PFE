<?php
include('../../includes/list_cour_etudiant-inc.php');


$id=$_GET['id'];
$cour=$liscours->getcour($id);
echo $cour;
exit();

  // Header Content Type
  $file = "../../uploads/devoir/file-".$cour[0]['NSS']."-".$id.".pdf"; 
 
  header ('Content-type:application/pdf');
  header('Content-Description:inline; filename="'.$file.'"');
  header('Content-Transfer-Encoding:binary');
  header('Accept-Ranges:bytes');
 
  // Send the file to the browser.
  @readfile($file);