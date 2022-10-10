<?php

if(isset($_POST['bt_submit']))
{   session_start();
    //get data
    $id=htmlspecialchars($_SESSION['id']);
 
 
    $email=htmlspecialchars($_POST['email']);
 
  
    $uid=htmlspecialchars($_POST['uid']);
    $pwd=htmlspecialchars($_POST['pwd']);
    $pwdrepeat=htmlspecialchars($_POST['pwdrepeat']);
  
  
 
    $save_pwd=htmlspecialchars($_POST['save_pwd']);
    $save_email=htmlspecialchars($_POST['save_email']);
    $save_uid=htmlspecialchars($_POST['save_uid']);
    include '../../classes/dbh.classes.php';
    include '../../classes/modifier_profil_admin.classes.php';
    include "../../classes/modifier_profil_admin-contr.classes.php";
    
    $mod=new modifier_profil_admin_contr($id,$uid,$email,$pwd,$pwdrepeat,$file,$save_pwd,$save_email,$save_uid);

     $mod->ModiferUser();

     header('Location: ../../templates/administrateur/profil.php?error=none');
}