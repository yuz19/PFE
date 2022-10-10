<?php
require_once '../../classes/dbh.classes.php';
include '../../classes/reponse_devoir/reponsedevoir.classes.php';
 
$listdev=new reponsedevoir();
$lreponsediv=$listdev->listreponsedevoir();
if(!empty(unserialize(urldecode(stripslashes($_GET['id']))))){
    $reponse=$listdev->getreponsedevoir(unserialize(urldecode(stripslashes($_GET['id']))));
}
