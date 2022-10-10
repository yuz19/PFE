<?php
 
include('../classes/dbh.classes.php');
include ('../classes/administrateur/supp_publication-classes.php');
$sup_publi=new supp_publication();
$id=$_GET['id'];
$sup_publi->supp($id );
header('Location: ../templates/administrateur/acceuil.php');