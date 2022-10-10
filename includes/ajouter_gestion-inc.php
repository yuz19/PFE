<?php 
if(isset($_POST['submit'])){

    $Codemodule=htmlspecialchars($_POST['Codemodule']);
    $nss=htmlspecialchars($_POST['NSS']);
    $Codesection=htmlspecialchars($_POST['Codesection']);
    $Gp=htmlspecialchars($_POST['Gp']);
    $type=htmlspecialchars($_POST['type']);
    require_once '../classes/dbh.classes.php';
    include "../classes/gestion/gestion.classes.php";
    include "../classes/gestion/ajouter_gestion-contr.classes.php";
    $ajt_gestion=new ajouter_gestion_contr($Codemodule,$nss,$Codesection,$Gp,$type);
    $ajt_gestion->ajouter();    
    header('Location: ../templates/administrateur/gestion.php?error=none');
}