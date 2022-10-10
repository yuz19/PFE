<?php 
 
   include "../../classes/section/section.classes.php";
   $sections=new section();
   /*
   $lspecialite=$sections->lispecialite_unique();
   $lniveaux=$sections->lniveauSp_unique();*/
   $lisection=$sections->lisection_unique();
   $allsection=$sections->lisection();