<?php
include '../../includes/list_publication-inc.php';

$id=$_GET['id'];
$lPublications=$publications->getPublication($id);

  // Header Content Type
  $file = "../../uploads/publications/files/file-".$lPublications[0]['NSS']."-".$id.".pdf"; 
 
  header ('Content-type:application/pdf');
  header('Content-Description:inline; filename="'.$file.'"');
  header('Content-Transfer-Encoding:binary');
  header('Accept-Ranges:bytes');
 
  // Send the file to the browser.
  @readfile($file);