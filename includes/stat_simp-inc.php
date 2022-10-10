<?php
require ('../../classes/dbh.classes.php');
include ('../../classes/stat-classes.php');
$stat=new stat();
$stats=$stat->stat_simple($_SESSION['id']);
$section=$stat->get_section($_SESSION['id']);


$etudiant_online=$stat->etudiant_online($section);
$etudiants=$stat->etudiant_list($_SESSION['id']);
 