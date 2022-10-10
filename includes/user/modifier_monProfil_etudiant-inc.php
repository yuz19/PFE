<?php

if(isset($_POST['bt_submit']))
{   session_start();
    //get data
    $id=htmlspecialchars($_SESSION['id']);
 
 
    $email=htmlspecialchars($_POST['email']);
 
  
    $uid=htmlspecialchars($_POST['uid']);
    $pwd=htmlspecialchars($_POST['pwd']);
    $pwdrepeat=htmlspecialchars($_POST['pwdrepeat']);
    $file=$_FILES['file'];
    $tem_img_status=htmlspecialchars($_POST['img_status']);
 
    $save_pwd=htmlspecialchars($_POST['save_pwd']);
    $save_email=htmlspecialchars($_POST['save_email']);
    $save_uid=htmlspecialchars($_POST['save_uid']);
     include '../../classes/dbh.classes.php';
     include '../../classes/modifier_profil_etudiant.classes.php';
     include "../../classes/modifier_profil_etudiant-contr.classes.php";
    
    $mod=new modifier_profil_etudiant_contr($id,$uid,$email,$pwd,$pwdrepeat,$file,$tem_img_status,$save_pwd,$save_email,$save_uid);

     $mod->ModiferUser();

     header('Location: ../../templates/etudiants/profil.php?error=none');
}