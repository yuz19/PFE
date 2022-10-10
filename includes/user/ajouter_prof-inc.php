<?php

if(isset($_POST['submit']))
{   
    //get data
    $nss=htmlspecialchars(trim($_POST['NSS']));
    $nom=htmlspecialchars(trim($_POST['nom']));
    $prenom=htmlspecialchars(trim($_POST['prenom']));
    $grade=htmlspecialchars($_POST['grade']);
    $numTel=htmlspecialchars($_POST['numTel']);
    $email=htmlspecialchars(trim($_POST['email']));
    #$Niveau_specialite=$_POST['Niveau_specialite'];
    $uid=htmlspecialchars($_POST['uid']);
    $pwd=htmlspecialchars($_POST['pwd']);
    $pwdrepeat=htmlspecialchars($_POST['pwdrepeat']);
    $file=$_FILES['file'];
    //instant signup-contr
    include '../../classes/dbh.classes.php';
    include "../../classes/prof/ajouter_prof.classes.php";
    include '../../classes/prof/ajouter_prof-contr.classes.php';

    
    $signup=new ajouter_prof_contr($nss,$nom,$prenom,$uid,$pwd,$pwdrepeat,$grade,$numTel,$email,$file);

    $signup->signupUser();

    header('Location: ../../templates/administrateur/prof.php?error=none');
}