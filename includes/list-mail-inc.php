<?php
require ('../../classes/dbh.classes.php');
include ('../../classes/list-mail-classes.php');
$mails=new list_mail();
$list_mails=$mails->listage_mail($_SESSION['email']);