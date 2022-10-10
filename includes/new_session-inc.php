<?php

if(isset($_POST['new_session'])){

require_once '../classes/dbh.classes.php';
include '../classes/new_anne.classes.php';
session_start();
$new_ann=new new_annee();
$new_ann->start($_SESSION['id']);
header('Location: ../templates/Prof/profil.php?error=none');
}