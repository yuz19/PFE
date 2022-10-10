<?php 

include ('../../includes/list_etudiant-inc.php');#deja inclu dbh ne pas repter dans list_sepcialite includ dbh.php
include ('../../includes/list_specialite-inc.php');
$id=$_GET['id'];/*
print_r($lspecialite);
print_r($lniveaux);
print_r($lisection);*/

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
 <?php   include ('../../includes/template/header-adminstrateur.php'); nav_affiche("etudiant");?>
    
    <div class="cont_acceuil cont_modifier">
        <a href="etudiant.php"><div class="back_return"><div class="arrow"></div></div> </a>
        <div class="form_etude "   style="height: 800px; display: block; top:8%; "  >

        <p id="message" style="position:absolute;top:20px;"></p>

            <form action="../../includes/user/modifier_etudiant-inc.php"  id="myform" method="POST" enctype='multipart/form-data'>
               <input type="text" name="matricule" placeholder="Matricule...." value="<?=$letudiant[$id]['matricule']?>" onchange="etat();"><br>
                <input type="text" name="uid" placeholder="username...." value="<?=$letudiant[$id]['Username']?>" onchange="etat();"><br>
                <input type="text"  name="nom" placeholder="nom...." value="<?=$letudiant[$id]['nom']?>" onchange="etat();"><br>
                <input type="text" name="prenom" placeholder="prenom...." value="<?=$letudiant[$id]['prenom']?>" onchange="etat();"><br>
                <input type="email" name="email" placeholder="Email...."  value="<?=$letudiant[$id]['email']?>" onchange="etat();"><br>
                
                <input type="file" name="file" onchange="etat();" ><br>
                <?php if($letudiant[$id]['img_status']==1){?> 
                <img  src="../../uploads/etudiants/profile-<?=$letudiant[$id]['matricule']?>.png" height="60"><br>
                <?php }else{ ?>
                    <img  src="../../assets/ICON/user.png" height="60"><br>
                    <?php }?>
                <input type="hidden"  name="img_status" value="<?=$letudiant[$id]['img_status']?>">
                    
        
                <input type="hidden"  name="save_mat" value="<?=$letudiant[$id]['matricule']?>" style="display:none">
                <input type="hidden"  name="save_pwd" value="<?=$letudiant[$id]['Password']?>" style="display:none">
                <input type="hidden"  name="save_email" value="<?=$letudiant[$id]['email']?>" style="display:none">
                <input type="hidden"  name="save_uid" value="<?=$letudiant[$id]['Username']?>" style="display:none">
                <input type="hidden" id="save" name="verification" value=" ">
            
                
                <select name="codesection"  onchange="etat();">
                <?php foreach($lisection as $sec){?>
                    <option value="<?= $sec['Codesection']?>"
                    
                    <?php if($letudiant[$id]['Codesection']==$sec['Codesection']){echo ("selected='selected'");}?>> <?= $sec['Codesection']?></option>
                    
                <?php }?>
                </select><br>
                <select id="choixsect" name="group" onchange="etat();">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                 </select><br>
              
                <input type="hidden"  name="bt_submit">
                <input type="password" name="pwd" placeholder="password...." value="<?= $letudiant[$id]['Password']?>" onchange="etat();"><br>
                <input type="password" name="pwdrepeat" placeholder="repter le password...." value="<?= $letudiant[$id]['Password']?>" onchange="etat();"><br>
                <input type="button" id="bt_submit"  value="Modifier prof"  onclick="envoyer();">
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

 <script src="app2.js"> </script>
</body>
</html>
                    