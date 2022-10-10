<?php
include '../../includes/list_publication-inc.php';
  $file='C:\xampp\htdocs\pfe\uploads\publications\files\file-1962-3.pdf';
  // Header Content Type
 
  header ('Content-type:application/pdf');
  header('Content-Description:inline; filename="'.$file.'"');
  header('Content-Transfer-Encoding:binary');
  header('Accept-Ranges:bytes');
 
  // Send the file to the browser.
  @readfile($file);