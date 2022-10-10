<?php

if(isset($_POST['submit'])){
 session_start();
$nom=htmlspecialchars($_POST['nom']);
 
$NSS=$_SESSION['id'];
$section=htmlspecialchars(explode('-',$_POST['section'])[1]);
$Codemodule=htmlspecialchars(explode('-',$_POST['section'])[0]);
$type=htmlspecialchars(explode('-',$_POST['section'])[2]);

$file=$_FILES['devoir'];
$deadline=htmlspecialchars($_POST['deadline']);
 
 
/*
$temp=explode('T',$temp);
$deadline=[
  'date'=>array_shift($temp),
  'heur'=>end($temp)
];
print_r($deadline);
exit();*/
include '../classes/dbh.classes.php';
include '../classes/prof/poster_devoir.classes.php';
include '../classes/prof/poster_devoir-contr.classes.php';

  #   <input type="hidden" name="NSS" value="<?=$_SESSION['id']
$devoir=new ajouter_devoir($nom,$deadline,$section,$file,$NSS,$Codemodule,$type);
$devoir->ajoute();
header('Location: ../templates/Prof/prof_devoir.php?error=none');

}