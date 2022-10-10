<?php
session_start();
include('../../includes/list_reponse_devoir-inc.php');



$matricule=$_GET['matricule'];
$id=$_GET['id'];
$repdevoir=$repdevoir->Inforeponsedevoir($id,$matricule);
 
  // Header Content Type
  $file = "../../uploads/reponse_devoir/file-".$repdevoir[0]['matricule']."-".$id.".pdf"; 
 
  header ('Content-type:application/pdf');
  header('Content-Description:inline; filename="'.$file.'"');
  header('Content-Transfer-Encoding:binary');
  header('Accept-Ranges:bytes');
 
  // Send the file to the browser.
  @readfile($file);