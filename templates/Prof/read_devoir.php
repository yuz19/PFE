<?php
session_start();
include('../../includes/list_devoir_etudiant-inc.php');


$id=$_GET['id'];
$devoir=$lisdevoir->getDevoir($id);


  // Header Content Type
  $file = "../../uploads/devoir/file-".$devoir[0]['NSS']."-".$id.".pdf"; 
 
  header ('Content-type:application/pdf');
  header('Content-Description:inline; filename="'.$file.'"');
  header('Content-Transfer-Encoding:binary');
  header('Accept-Ranges:bytes');
 
  // Send the file to the browser.
  @readfile($file);