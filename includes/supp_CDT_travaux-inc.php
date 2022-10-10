<?php
require ('../classes/dbh.classes.php');
include ('../classes/supp_CDT-classes.php');
$id=unserialize(urldecode(stripslashes($_GET['id'])));
 
$cdt=new supp_CDT();
$cdt->supprimer($id,'travaux');
header('Location: ../templates/prof/travaux.php?error=none');
