<?php

if(isset($_POST['bt_submit'])){
 
$Gp=htmlspecialchars($_POST['Gp']);

$specialite=htmlspecialchars($_POST['specialite']);
$section=htmlspecialchars($_POST['section']);
$numero=htmlspecialchars($_POST['numero']);
$codesection_save=htmlspecialchars($_POST['codesection_save']);
$group_save=htmlspecialchars($_POST['group_save']);
/*
$temp=explode('T',$temp);
$deadline=[
  'date'=>array_shift($temp),
  'heur'=>end($temp)
];
print_r($deadline);
exit();*/
require_once '../classes/dbh.classes.php';
include '../classes/section/section.classes.php';
include '../classes/section/modifier_section-contr.classes.php';

  #   <input type="hidden" name="NSS" value="<?=$_SESSION['id']
$module=new modifier_section($specialite,$section,$numero,$Gp,$codesection_save,$group_save);
$module->Modifer();
header('Location: ../templates/administrateur/section.php?error=none');

}elseif(isset($_POST['delete'])){
  $Codemodule=htmlspecialchars($_POST['Codesection_save']);
  $Gp=htmlspecialchars($_POST['Gp_save']);
  require_once '../classes/dbh.classes.php';
  include '../classes/administrateur/admin.classes.php';

  $admin=new admin();
  $admin->supp_compte(0,$Codemodule,$Gp,'section',0);
  header('Location: ../templates/administrateur/section.php?error=none');
}