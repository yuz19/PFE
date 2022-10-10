<?php 
 
   include "../../classes/section/section_devoir.classes.php";
   $sections=new section_devoir();
   /*
   $lspecialite=$sections->lispecialite_unique();
   $lniveaux=$sections->lniveauSp_unique();*/
   $lisection=$sections->lisection_unique($_SESSION['id']);