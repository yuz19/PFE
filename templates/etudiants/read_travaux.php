<?php
include('../../includes/list_travaux_etudiant-inc.php');


$id=$_GET['id'];
$travail=$listravaux->get_travaux($id);


  // Header Content Type
  $file = "../../uploads/travaux/file-".$travail[0]['NSS']."-".$id.".pdf"; 
 
  header ('Content-type:application/pdf');
  header('Content-Description:inline; filename="'.$file.'"');
  header('Content-Transfer-Encoding:binary');
  header('Accept-Ranges:bytes');
 
  // Send the file to the browser.
  @readfile($file);