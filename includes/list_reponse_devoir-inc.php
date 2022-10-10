<?php 
require_once ('../../classes/dbh.classes.php');
include ('../../classes/reponse_devoir/reponsedevoir.classes.php');
include ('../../classes/etudiant/etudiant.classes.php');
$repdevoir=new reponsedevoir();
$lreponsedevoir=$repdevoir->getreponsedevoir($_GET['id']);
$etudiant=new etudiant();
