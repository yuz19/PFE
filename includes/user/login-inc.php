<?php

if(isset($_POST['submit']))
{   
    //get data

    $matricule_nss=$_POST['matricule_nss'];
    $pwd=$_POST['pwd'];
  
    //instant signup-contr  
    include '../../classes/dbh.classes.php';
    include "../../classes/login.classes.php";
    include '../../classes/login-contr.classes.php';

    $login=new LoginContr($matricule_nss,$pwd);
 
    $login->loginUser();
 
}