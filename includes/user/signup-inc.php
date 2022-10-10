<?php

if(isset($_POST['submit']))
{   
    //get data
    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $email=htmlspecialchars($_POST['email']);
    $uid=htmlspecialchars($_POST['uid']);
    $pwd=htmlspecialchars($_POST['pwd']);
    $pwdrepeat=htmlspecialchars($_POST['pwdrepeat']);
    //instant signup-contr
    include '../../classes/dbh.classes.php';
    include '../../classes/signup.classes.php';
    include '../../classes/signup-contr.classes.php';
    
    $signup=new SignupContr($nom,$prenom,$uid,$email,$pwd,$pwdrepeat);

    $signup->signupUser();

    header('Location: ../templates/login.php?error=none');
}