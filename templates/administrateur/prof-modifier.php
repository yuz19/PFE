<?php 
require ('../../includes/user/securite-administrateur-inc.php');
  include ('../../includes/list_prof-inc.php');
  $id=$_GET['id'];
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
    
    <div class="cont_acceuil cont_modifier">
        <a href="prof.php"><div class="back_return"><div class="arrow"></div></div> </a>
        <div class="form_etude " style="height: 880px;  display: block; top:3%;">
            <p id="message" style="position:absolute;top:20px;"></p>

            <form id="myform" action="../../includes/user/modifier_prof-inc.php" method="POST" enctype='multipart/form-data' >
            <span class="error"><?php
          if( isset($_GET['error']) && strcmp($_GET['error'],'none')!=0) {
                echo '*'.$_GET['error'].'<br/>';
          }
         ?></span>
            <input type="text" name="NSS" placeholder="numero securite social...." value="<?= $lprof[$id]['NSS'] ?>"  onchange="etat();"><br>
                <input type="text" name="grade" placeholder="grade...." value="<?= $lprof[$id]['grade'] ?>" onchange="etat();"><br>
                <input type="number" name="numTel" placeholder="numero telephone...." value="<?= $lprof[$id]['numtel'] ?>" onchange="etat();"><br>
                <input type="email" name="email" placeholder="email...." value="<?= $lprof[$id]['email'] ?>" onchange="etat();"><br>
                
                <input type="file" class="file" id="file2" name="file" onchange="etat();" >
                <label for="file2">
                    <span id="plus_devoir">&#43;</span>Modifier la  photo profil
                </label><br>
                <?php if($lprof[$id]['img_status']==1){?> 
                <img  src="../../uploads/profs/profile-<?=$lprof[$id]['NSS']?>.png?<?=mt_rand()?>" height="60"><br>
                <?php }else{ ?>
                    <img  src="../../assets/ICON/user.png" height="60"><br>
                    <?php }?>
                <input type="text" name="uid" placeholder="username...." value="<?= $lprof[$id]['Username'] ?>" onchange="etat();"><br>

                <input type="hidden"  name="img_status" value="<?=$lprof[$id]['img_status']?>" style="display:none">
        
                <input type="hidden"  name="save_nss" value="<?=$lprof[$id]['NSS']?>" style="display:none">
                <input type="hidden"  name="save_pwd" value="<?=$lprof[$id]['Password']?>" style="display:none">
                <input type="hidden"  name="save_email" value="<?=$lprof[$id]['email']?>" style="display:none">
                <input type="hidden"  name="save_uid" value="<?=$lprof[$id]['Username']?>" style="display:none">

                <input type="hidden"  name="bt_submit">
                
                <input type="hidden" id="save" name="verification" value=" ">
                <input type="text"  name="nom" placeholder="nom...."  value="<?= $lprof[$id]['Nom'] ?>" onchange="etat();"><br>
                <input type="text" name="prenom" placeholder="prenom...." value="<?= $lprof[$id]['prenom'] ?>" onchange="etat();"><br>
                <input type="password" name="pwd" placeholder="password...." value="<?= $lprof[$id]['Password'] ?>" onchange="etat();"><br>
                <input type="password" name="pwdrepeat" placeholder="repter le password...." value="<?= $lprof[$id]['Password'] ?>" onchange="etat();"><br>
               
                <input type="button" id="bt_submit"  value="Modifier prof"  onclick="envoyer();">
                
            </form>
            <form method="POST" action="../../includes/user/modifier_prof-inc.php" >
            <input type="hidden"  name="save_nss" value="<?=$lprof[$id]['NSS']?>" style="display:none">
                <button type="submit" class="delete" name="delete">supprimer</button>
            </form>
        </div>
     </div>
 </div>

<script>

function envoyer()
{
    if(document.getElementById ("save").value=="ok" )
    {
        
        document.getElementById("myform").submit(); 
    }else
    {
        document.getElementById("message").innerText="Le formulaire n'a pas change";
    }
    
}
    //document.getElementById ("message").innerText += "-"+bcivilite++bnom+"-"+bprenom+"-"+bdate
function etat ()
{
    document.getElementById ("save").value="ok";
  
} 
</script>

</body>
</html>