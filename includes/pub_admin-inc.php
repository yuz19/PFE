<?php

if(isset($_POST['submit']))
{  
$nsas=$_POST['nss'];
 
$titre=htmlspecialchars($_POST['titre']);
$contenu=nl2br(htmlspecialchars($_POST['contenu']));
$bg_img=$_FILES['bg_img'];
$upload_file=$_FILES['upload_file'];
include ('../classes/dbh.classes.php');
include ("../classes/administrateur/publication.classes.php");
include ("../classes/administrateur/publication-contr.classes.php");

$publication=new publication_contr($nsas,$titre,$contenu,$bg_img,$upload_file);
$publication->addPub();
header('Location: ../templates/administrateur/acceuil.php?error=none');
}
