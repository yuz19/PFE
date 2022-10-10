<?php 
    require_once '../../classes/dbh.classes.php';
    include "../../classes/gestion/gestion.classes.php";
   
$gest=new gestion();
$lgest=$gest->listGestion();