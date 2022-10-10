<?php

if(isset($_POST['submit'])){
 
 
$module=htmlspecialchars($_POST['module']);
 
$Codesection=htmlspecialchars($_POST['Codesection']);
 
$titre=htmlspecialchars($_POST['titre']);
$coeficient=htmlspecialchars($_POST['coeficient']);
$unite=htmlspecialchars($_POST['unite']);

/*
$temp=explode('T',$temp);
$deadline=[
  'date'=>array_shift($temp),
  'heur'=>end($temp)
];
print_r($deadline);
exit();*/
include '../classes/dbh.classes.php';
include '../classes/module_usthb/module.classes.php';
include '../classes/module_usthb/ajouter_module-contr.classes.php';

  #   <input type="hidden" name="NSS" value="<?=$_SESSION['id']
$module=new ajouter_module($module,$Codesection,$titre,$coeficient,$unite);
$module->ajouter();
header('Location: ../templates/administrateur/module.php?error=none');

}