 
<?php 
 
 require ('../../includes/user/securite-etudiant-inc.php');
 
 include('../../includes/get_prof-inc.php');
 $profs=$prof->getprof_fromgestion($_SESSION['Codesection'],'cour');    

 ?>  
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-etudiant.php'); nav_affiche("cours");?>
    
    <div class="cont">

 


        <div class="cont_prof">
            <?php if(!empty($profs)){?>
            <?php foreach($profs as $value){ ?>    
            <a href="etudiant_cours.php?id=<?=addslashes(urlencode(serialize($value)))?>" style="color:#000000">
            <div class="prof">
            <?php if(!file_exists('../../uploads/profs/profile-'.$value['NSS'].'.png')){?>
            <img src='../../assets/ICON/user.png' height='50'> 
            <?php }else{?>
                <img class="profil" src='../../uploads/profs/profile-<?=$value['NSS']?>.png' width='60' height="60"> 
             <?php }?>
 
            <p style="font-size: 20px;font-weight:bolder; margin-left:10px;"> <?=explode('_',$value['Codemodule'])[0].'-'.$prof->getprof($value['NSS'])?></p>
            </div>  </a>
            <?php }?>
            <?php }else{?>
                <p  class="vide">0 cours</p>
                <?php }?>
        </div>
    </div>
 </div>
 
  
</body>
</html>