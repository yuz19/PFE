<?php 
 
   include "../../classes/section/section_cour.classes.php";
   $sections=new section_cour();
   /*
   $lspecialite=$sections->lispecialite_unique();
   $lniveaux=$sections->lniveauSp_unique();*/
   $lisection=$sections->lisection_unique($_SESSION['id']);