<?php 
if(isset($_POST['submit'])){
    session_start();
    $Commentaire=htmlspecialchars($_POST['Commentaire']);
    $id_user=htmlspecialchars($_SESSION['id']);
    $id_file=htmlspecialchars($_POST['id_file']);
    $type=htmlspecialchars($_POST['type']);
    $page=htmlspecialchars($_POST['page']);
    
    require_once '../classes/dbh.classes.php';
    include "../classes/commentaire/commentaire.classes.php";
    include "../classes/commentaire/ajouter_commentaire-contr.classes.php";
    
    $ajt_gestion=new ajouter_commentaire_contr($Commentaire,$id_user,$id_file,$type,$page);
    $ajt_gestion->ajouter_commentaire($type,$_SESSION['role']);    
    if($type=='devoir' and $page=='prof'){
        header("Location: ../templates/prof/prof_devoir_comment.php?id=".addslashes(urlencode(serialize($id_file)))."&error=none");
    
    }
    if($type=='cour' and $page=='prof'){
        header("Location: ../templates/prof/prof_cour_comment.php?id=".addslashes(urlencode(serialize($id_file)))."&error=none");
        exit();
    }
    if($type=='travaux' and $page=='prof'){
        header("Location: ../templates/Prof/prof_travaux_comment.php?id=".addslashes(urlencode(serialize($id_file)))."&error=none");
        exit();
    }

    if($type=='travaux' and $page=='etudiant'){
        header("Location: ../templates/etudiants/etudiant_travaux_comment.php?id=".addslashes(urlencode(serialize($id_file)))."&error=none");
        exit();
    }
    if($type=='devoir' and $page=='etudiant'){
        header("Location: ../templates/etudiants/etudiant_devoir_comment.php?id=".addslashes(urlencode(serialize($id_file)))."&error=none");
        exit();
    }
    if($type=='cour' and $page=='etudiant'){
        header("Location: ../templates/etudiants/etudiant_cour_comment.php?id=".addslashes(urlencode(serialize($id_file)))."&error=none");
        exit();
    }
}