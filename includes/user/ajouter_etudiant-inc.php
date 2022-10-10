<?php

if(isset($_POST['submit']))
{
    //get data
    $matricule=   htmlspecialchars(trim($_POST['matricule']));
    $nom=htmlspecialchars(trim($_POST['nom']));
    $prenom=htmlspecialchars(trim($_POST['prenom']));
    $email=htmlspecialchars(trim($_POST['email']));
    $codesection=htmlspecialchars($_POST['codesection']);
     if(!empty($_POST['group'])){
        $group=htmlspecialchars(explode('-',$_POST['group'])[1]);
      }else{
        $group=null;
      }
      
 
    $uid=htmlspecialchars($_POST['uid']);
    $pwd=htmlspecialchars($_POST['pwd']);
    $pwdrepeat=htmlspecialchars($_POST['pwdrepeat']);
    //file
    $file=$_FILES['file'];
 

    //instant signup-contr
    include '../../classes/dbh.classes.php';
   include "../../classes/etudiant/ajouter_etudiant.classes.php";
    include '../../classes/etudiant/ajouter_etudiant-contr.classes.php';
    
    $signup=new ajouter_etudiant_contr($matricule,$nom,$prenom,$uid,$email,$pwd,$pwdrepeat,$codesection,$group,$file);

    $signup->signupUser();

    header('Location: ../../templates/administrateur/etudiant.php?error=none');

   
}