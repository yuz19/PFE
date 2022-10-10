<?php

if(isset($_POST['submit'])){
 
$Gp=htmlspecialchars($_POST['Gp']);
 
$specialite=htmlspecialchars($_POST['specialite']);
$section=htmlspecialchars($_POST['section']);
$numero=htmlspecialchars($_POST['numero']);
 
 
/*
$temp=explode('T',$temp);
$deadline=[
  'date'=>array_shift($temp),
  'heur'=>end($temp)
];
print_r($deadline);
exit();*/
include '../classes/dbh.classes.php';
include '../classes/section/section.classes.php';
include '../classes/section/ajouter_section-contr.classes.php';

  #   <input type="hidden" name="NSS" value="<?=$_SESSION['id']
$module=new ajouter_section($specialite,$section,$numero,$Gp);
$module->ajouter();
header('Location: ../templates/administrateur/section.php?error=none');

}