<?php

if(isset($_POST['bt_submit'])){
 
$Codemodule=htmlspecialchars($_POST['Codemodule']);
$nss=htmlspecialchars($_POST['NSS']);
$Codesection=htmlspecialchars($_POST['Codesection']);
$Gp=htmlspecialchars($_POST['Gp']);
$type=htmlspecialchars($_POST['type']);
 
$Codemodule_save=htmlspecialchars($_POST['Codemodule_save']);
$nss_save=htmlspecialchars($_POST['nss_save']);
$Codesection_save=htmlspecialchars($_POST['Codesection_save']);
$Gp_save=htmlspecialchars($_POST['Gp_save']);
$type_save=htmlspecialchars($_POST['type_save']);
/*
$temp=explode('T',$temp);
$deadline=[
  'date'=>array_shift($temp),
  'heur'=>end($temp)
];
print_r($deadline);
exit();*/
include '../classes/dbh.classes.php';
include '../classes/gestion/gestion.classes.php';
include '../classes/gestion/modifier_gestion-contr.classes.php';

  #   <input type="hidden" name="NSS" value="<?=$_SESSION['id']
$module=new modifier_gestion_contr($Codemodule,$nss,$Codesection,$Gp,$type,$Codemodule_save,$nss_save,$Codesection_save,$Gp_save,$type_save);
$module->Modifier();
header('Location: ../templates/administrateur/gestion.php?error=none');

}elseif(isset($_POST['delete'])){
 
  require_once '../classes/dbh.classes.php';
  include '../classes/administrateur/admin.classes.php';
  
 
  $nss_save=htmlspecialchars($_POST['nss_save']);
  $Codesection_save=htmlspecialchars($_POST['Codesection_save']);
  $Gp_save=htmlspecialchars($_POST['Gp_save']);
  $type_save=htmlspecialchars($_POST['type_save']);
  $admin=new admin();
  $admin->supp_compte($nss_save,$Codesection_save,$Gp_save,'gestion',$type_save);
  header('Location: ../templates/administrateur/gestion.php?error=none');
}
