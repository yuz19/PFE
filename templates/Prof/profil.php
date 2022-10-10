<?php
 
require ('../../includes/user/securite-prof-inc.php');
include ('../../includes/get_prof-inc.php');
$prof=$prof->get_AllInfo_prof($_SESSION['id']);

?>
<!DOCTYPE html>
<html>
 <?php include ('../../includes/template/head.php');?>
 <link rel="stylesheet" href="../../assets/style_admin.css">
<body>
 <div class="container">

 <?php   include ('../../includes/template/header-prof.php'); nav_affiche("d");?>
 <div class="cont_acceuil cont_modifier">
        <a href="acceuil.php"><div class="back_return"><div class="arrow"></div></div> </a>
 <div class="form_etude "  style="  display: block; height:550px;" >

 <form action="../../includes/user/modifier_monProfil_prof-inc.php"  id="myform" method="POST"  enctype='multipart/form-data'>
        <p id="message" style="position:absolute;top:20px;"></p>
        <span class="error"><?php
          if( isset($_GET['error']) && strcmp($_GET['error'],'none')!=0) {
                echo '*'.$_GET['error'].'<br/>';
          }
          
         ?></span>
            
            <input type="text" name="uid" placeholder="Username...." value="<?=$prof[0]['Username']?>" onchange="etat();"><br>
            <input type="email" name="email" placeholder="Email...." value="<?=$prof[0]['email']?>" onchange="etat();"><br>
           
            <input type="file" class="file" id="file2" name="file" onchange="etat();">
            <label for="file2">
                <span id="plus_devoir">&#43;</span>Ajouter une  photo profil
            </label><br>

            <input type="hidden"  name="img_status" value="<?=$prof[0]['img_status']?>">
   
                <input type="hidden"  name="save_pwd" value="<?=$prof[0]['Password']?>" style="display:none">
                <input type="hidden"  name="save_email" value="<?=$prof[0]['email']?>" style="display:none">
                <input type="hidden"  name="save_uid" value="<?=$prof[0]['Username']?>" style="display:none">
                <input type="hidden" id="save" name="verification" value=" ">

            <input type="password" name="pwd" placeholder="password...." value="<?=$prof[0]['Password']?>" onchange="etat();"><br>
            <input type="password" name="pwdrepeat" placeholder="repter le password...." value="<?=$prof[0]['Password']?>" ><br>

            <input type="hidden"  name="bt_submit">  
            <input type="button" id="bt_submit"  value="Modifier profil"  onclick="envoyer();">
        </form>
        <form method="POST" action="../../includes/new_session-inc.php"  >
         <button name="new_session" class="new_session"> nouvelle année</button>
        </form>
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