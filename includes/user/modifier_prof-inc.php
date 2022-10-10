<?php

if(isset($_POST['bt_submit']))
{   
    //get data
    $nss=htmlspecialchars($_POST['NSS']);
    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $grade=htmlspecialchars($_POST['grade']);
    $numTel=htmlspecialchars($_POST['numTel']);
    $email=htmlspecialchars($_POST['email']);
    #$Niveau_specialite=$_POST['Niveau_specialite'];
    $uid=htmlspecialchars($_POST['uid']);
    $pwd=htmlspecialchars($_POST['pwd']);
    $pwdrepeat=htmlspecialchars($_POST['pwdrepeat']);
    $file=$_FILES['file'];
    $temp_img_status=htmlspecialchars($_POST['img_status']);

    $save_nss=htmlspecialchars($_POST['save_nss']);
    $save_pwd=htmlspecialchars($_POST['save_pwd']);
    $save_email=htmlspecialchars($_POST['save_email']);
    $save_uid=htmlspecialchars($_POST['save_uid']);

     include '../../classes/dbh.classes.php';
     include "../../classes/prof/modifier_prof.classes.php";
     include '../../classes/prof/modifier_prof-contr.php';
    $mod=new modifier_prof_contr($nss,$nom,$prenom,$uid,$pwd,$pwdrepeat,$grade,$numTel,$email,$file,$temp_img_status,$save_nss,$save_pwd,$save_email,$save_uid);

     $mod->ModiferUser();

     header('Location: ../../templates/administrateur/prof.php?error=none');
}elseif(isset($_POST['delete'])){
    $NSS=htmlspecialchars($_POST['save_nss']);
  
    require_once '../../classes/dbh.classes.php';
    include '../../classes/administrateur/admin.classes.php';

    $admin=new admin();
    $admin->supp_compte($NSS,0,0,'prof',0);
    header('Location: ../../templates/administrateur/prof.php?error=none');
}
