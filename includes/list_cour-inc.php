<?php
include ('../../classes/dbh.classes.php');
include ('../../classes/list_cour.classes.php');
$liscours=new list_cour();
$lcours=$liscours->list_cour($_SESSION['id']);