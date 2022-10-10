<?php 
  include ('../../includes/list_prof-inc.php');
 
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="../../assets/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>USTHB-admin</title>
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-adminstrateur.php'); nav_affiche("prof");?>
    
        <div class="list"  >
            <div class="back4"><div class="arrow2"></div></div> 
                <div class="list_eleve">
                    <div class="opt">
                    <div class="search_box">
                        <form method="GET">
                        <input class="shearch" id="search-items" type="text" placeholder="Search..."  onkeyup="searchd()" >
                        
                        </form> 
                    </div>
                    <select id="choixsect" name="section">
                        <option value="isil_A">isil A</option>
                        <option value="isil_B">isil b</option>
                    
                    </select>
                    </div>
                    <div class="eleve" style="height: 750px;">
                    <?php if(!empty($lprof)) {?>
                    <?php foreach ($lprof as  $key=>$value) {?>
                        <div class="eleve_info">
                        <?php if($value['img_status']==0) {?>
                            <img  class='profil'  src='../../assets/ICON/user.png' height='70' width="70"> <?php }else{?>
                            
                            <img  class='profil'  src='../../uploads/profs/profile-<?= $value['NSS']?>.png' height='70' width="70">
                            <?php }?>
                            <div class="info_elev">
                                <h3><?= $value['Nom']." ".$value['prenom'] ?> </h3>  
                                matricule:<?=$value['NSS']?>
                            </div>
                            <a href=" prof-modifier.php?id=<?= $key?>  ">
                                <button  class="modifier"  >modifier</button>
                            </a>
                        </div>
                        <?php }?>
                        <?php }else{ ?>
                            <p class="vide">0 profs</p>
                        <?php }?>
                
                    </div>
               </div>
        </div>
        <div class="form_etude "  style="height:780px;">
  
            <form action="../../includes/user/ajouter_prof-inc.php" method="POST" enctype='multipart/form-data'>
                <input type="text" maxlength="12" name="NSS" placeholder="numero securite social...."><br>
                <input type="text" name="grade" placeholder="grade...."><br>
                <input type="number" name="numTel" placeholder="numero telephone...."><br>
                <input type="email" name="email" placeholder="email...."><br>
                <input type="file" name="file"   ><br>
                <input type="text" name="uid" placeholder="username...."><br>
            
                <input type="text"  name="nom" placeholder="nom...."><br>
                <input type="text" name="prenom" placeholder="prenom...."><br>
                <input type="password" name="pwd" placeholder="password...."><br>
                <input type="password" name="pwdrepeat" placeholder="repter le password...."><br>
            
             
                <button type="submit" name="submit">Ajouter Prof</button>
            </form>
            <div class="back5" ><div class="arrow3"></div></div> 
     
        </div>
     </div>
     


 <script src="app2.js"> </script>
 <script src="../app.js"> </script>
</body>
</html>