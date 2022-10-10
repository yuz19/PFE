<?php 
 
   include "../../classes/section/section_travaux.classes.php";
   $sections=new section_travaux();
   /*
   $lspecialite=$sections->lispecialite_unique();
   $lniveaux=$sections->lniveauSp_unique();*/
   $lisection=$sections->lisection_unique($_SESSION['id']);
   $liallinfosection=$sections->get_group($_SESSION['id']);