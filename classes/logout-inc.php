<?php
include('../classes/dbh.classes.php');
include('../classes/offline.php');
session_start();
if($_SESSION['role']=="etudiant"){
    $off=new offline();

    $off->off();
}
 


session_unset();
session_destroy();

header("Location: ../templates/login.php");