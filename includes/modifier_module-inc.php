<?php

if(isset($_POST['bt_submit'])){
 
 
$module=htmlspecialchars($_POST['module']);
 
$Codesection=htmlspecialchars($_POST['Codesection']);
$Codemodule_save=htmlspecialchars($_POST['Codemodule_save']);
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
include '../classes/module_usthb/modifier_module-contr.classes.php';

  #   <input type="hidden" name="NSS" value="<?=$_SESSION['id']
$module=new modifier_module_contr($module,$Codesection,$titre,$coeficient,$unite,$Codemodule_save);
$module->Modifer();
header('Location: ../templates/administrateur/module.php?error=none');

}elseif(isset($_POST['delete'])){
  $Codemodule=htmlspecialchars($_POST['Codemodule_save']);

  require_once '../classes/dbh.classes.php';
  include '../classes/administrateur/admin.classes.php';

  $admin=new admin();
  $admin->supp_compte(0,$Codemodule,0,'module',0);
  header('Location: ../templates/administrateur/module.php?error=none');
}