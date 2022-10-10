<?php
if(!empty($_POST['id'])){
if(isset($_POST['submit'])){
session_start();
 
$file=$_FILES['devoir'];
$matricule=$_SESSION['id'];
$iddv=htmlspecialchars($_POST['id']);
require_once '../classes/dbh.classes.php';
include '../classes/reponse_devoir/reponsedevoir.classes.php';
include '../classes/reponse_devoir/poster_reponsedevoir-contr.classes.php';
 
$devoir=new ajouter_reponsedevoir($file,$matricule,$iddv);
$devoir->ajoute();
header("Location: ../templates/etudiants/etudiant_devoir_comment.php?id=".addslashes(urlencode(serialize($iddv)))."&error=none");

}elseif(isset($_POST['annule']))
{$iddv=htmlspecialchars($_POST['id']);
    require_once '../classes/dbh.classes.php';
    include '../classes/reponse_devoir/reponsedevoir.classes.php';
    include '../classes/reponse_devoir/poster_reponsedevoir-contr.classes.php';
    session_start();
    $devoir=new reponsedevoir();
     
    $devoir->delete($iddv,$_SESSION['id']);
    header("Location: ../templates/etudiants/etudiant_devoir_comment.php?id=".addslashes(urlencode(serialize($iddv)))."&error=none"  );
}
}else{
    header("Location: ../templates/etudiants/etudiant_devoir_prof.php?error=empty_id");
}