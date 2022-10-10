<?php

if(isset($_POST['submit'])){
session_start();
date_default_timezone_set('Africa/Algiers');
$nom=htmlspecialchars($_POST['nom']);
 
$NSS=$_SESSION['id'];
$section=htmlspecialchars($_POST['section']);
$file=$_FILES['cour'];
$date= date("Y-m-d H:i:s");
 
/*
$temp=explode('T',$temp);
$deadline=[
  'date'=>array_shift($temp),
  'heur'=>end($temp)
];
print_r($deadline);
exit();*/
include '../classes/dbh.classes.php';
include '../classes/prof/poster_cour.classes.php';
include '../classes/prof/poster_cour-contr.classes.php';

  #   <input type="hidden" name="NSS" value="<?=$_SESSION['id']
$cours=new ajouter_cour($nom,$date,$section,$file,$NSS);
$cours->ajoute();
header('Location: ../templates/Prof/prof_cours.php?error=none');

}