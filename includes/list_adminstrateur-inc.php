<?php
include('../../classes/dbh.classes.php');
include('../../classes/admin/administrateur.classes.php');
$administrateurs=new administrateur();
$ladministrateurs=$administrateurs->listadmin();

