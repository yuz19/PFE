<?php 
    include '../../classes/dbh.classes.php';
    include "../../classes/etudiant/etudiant.classes.php";
   
$etud=new etudiant();
$letudiant=$etud->listetud();
