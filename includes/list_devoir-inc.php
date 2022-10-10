<?php
include ('../../classes/dbh.classes.php');
include ('../../classes/list_devoir.classes.php');
$lisdevoir=new list_devoir();
$ldevoirs=$lisdevoir->list_devoir($_SESSION['id']);