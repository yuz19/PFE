<?php 
require ('../../classes/dbh.classes.php');
include ('../../classes/administrateur/getPublication.classes.php');
$publications=new getPublication();
$lPublications=$publications->listPublication();