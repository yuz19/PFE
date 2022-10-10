<?php

if(isset($_POST['bt_submit']))
{   
    //get data
    $matricule=htmlspecialchars($_POST['matricule']);
    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $email=htmlspecialchars($_POST['email']);
    $group=htmlspecialchars($_POST['group']);
    $codesection=htmlspecialchars($_POST['codesection']);
  
    $uid=htmlspecialchars($_POST['uid']);
    $pwd=htmlspecialchars($_POST['pwd']);
    $pwdrepeat=htmlspecialchars($_POST['pwdrepeat']);
    $file=$_FILES['file'];
    $tem_img_status=htmlspecialchars($_POST['img_status']);
    $save_mat=htmlspecialchars($_POST['save_mat']);
    $save_pwd=htmlspecialchars($_POST['save_pwd']);
    $save_email=htmlspecialchars($_POST['save_email']);
    $save_uid=htmlspecialchars($_POST['save_uid']);
    require_once '../../classes/dbh.classes.php';
     include "../../classes/etudiant/modifier_etudiant.classes.php";
     include '../../classes/etudiant/modifier_etudiant-contr.classes.php';
    $mod=new modifier_etudiant_contr($matricule,$nom,$prenom,$uid,$email,$pwd,$pwdrepeat,$codesection,$group,$file,$tem_img_status,$save_mat,$save_pwd,$save_email,$save_uid);

     $mod->ModiferUser();

     header('Location: ../../templates/administrateur/etudiant.php?error=none');
}elseif(isset($_POST['delete'])){
    $matricule=htmlspecialchars($_POST['save_mat']);
    require_once '../../classes/dbh.classes.php';
    include '../../classes/administrateur/admin.classes.php';

    $admin=new admin();
    $admin->supp_compte($matricule,0,0,'etudiant',0);
    header('Location: ../../templates/administrateur/etudiant.php?error=none');
}
