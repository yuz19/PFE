<?php
include ('../../classes/dbh.classes.php');
include ('../../classes/list_travaux_prof.classes.php');
$listravaux=new list_travaux_prof();
$ltravaux=$listravaux->list_travaux_prof($_SESSION['id']);