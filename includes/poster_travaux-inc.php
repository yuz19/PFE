<?php

if(isset($_POST['submit'])){
 session_start();
$nom=htmlspecialchars($_POST['nom']);
date_default_timezone_set('Africa/Algiers');
$NSS=$_SESSION['id'];
$section=htmlspecialchars($_POST['section']);
$file=$_FILES['travaux'];
 

$date= date("Y-m-d H:i:s");
if(!isset($group)){
  $group=htmlspecialchars(explode('-',$_POST['group'])[1]);
}else{
  $group=null;
}
 
 
/*
$temp=explode('T',$temp);
$deadline=[
  'date'=>array_shift($temp),
  'heur'=>end($temp)
];
print_r($deadline);
exit();*/
include '../classes/dbh.classes.php';
include '../classes/prof/poster_travaux.classes.php';
include '../classes/prof/poster_travaux-contr.classes.php';

  #   <input type="hidden" name="NSS" value="<?=$_SESSION['id']
$devoir=new ajouter_travaux($nom,$date,$section,$file,$NSS,$group);
$devoir->ajoute();
header('Location: ../templates/Prof/travaux.php?error=none');

}