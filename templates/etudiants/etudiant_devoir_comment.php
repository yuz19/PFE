<?php
 
require ('../../includes/user/securite-etudiant-inc.php');
include('../../includes/list_devoir_etudiant-inc.php');
include('../../includes/get_devoir-inc.php');
 
include ('../../includes/list_commentaire-inc.php');
include('../../includes/get_user-inc.php');
$id=unserialize(urldecode(stripslashes($_GET['id'])));;
$devoir=$lisdevoir->getDevoir($id);
$tmp=explode('.',$devoir[0]['nom_file']);
if(!isset($devoir)){
    header('Location: etudiant_devoir_prof.php');
}
$type=end($tmp);
$commentaires=$listcommentaire->list_commentaire($id,"devoir");
$nbr=$listcommentaire->count($id,"devoir");
?>
<!DOCTYPE html>
<html>
 <?php include ('../../includes/template/head.php');?>
<body>
 <div class="container">

 <?php   include ('../../includes/template/header-etudiant.php'); nav_affiche("devoir");?>
     
     
    
    <div class="container_comment_cour">
        <div class="top_container_comment">
        <h1>Devoir:<?=$devoir[0]['nom']?></h1>
            <p>Deadline : <?=str_replace('T',',',$devoir[0]['deadline'])?></p>
            <hr>
            <br>
            <div class="ligne">
            <div class="comment_info">
                <!--affichage du devoir-->
                    <div>   
                        <a href='read_devoir.php?id=<?=$id?>' >
                        <?php if($devoir[0]['nom_file']==0 or !file_exists("../../uploads/devoir/file-".$devoir[0]['NSS']."-".$devoir[0]['iddev'].".pdf")){?>
                            <img src="../../assets/IMAGE/img_graduation.jpg" height="80">
                        <?php }else{?>
                            
                        <img src="../../uploads/devoir/file-<?=$devoir[0]['NSS']?>-<?=$devoir[0]['iddev']?>.jpg"  width="100px"  >
                        <?php } ?>
                        </a>
                    </div>
                    <div class="desc"><h3><?=$devoir[0]['nom']?></h3><br><p><?php echo($tmp[1]);?></p></div>
                    
                    <div class="upl"  > 

                        <a href="read.php?id=$id" download="<?=$devoir[0]['nom_file']?>" >
                            <img src="../../assets/IMAGE/download.png" height="30"  >
                        </a>
                    </div>
                </div>
                <!--poster reponse devoir-->
            <?php
            if(!empty($devoir[0]['deadline'])){
               
            
       
                date_default_timezone_set('Africa/Algiers');
                $date= date("Y-m-d H:i:s");
                $dead= str_replace('T','',$devoir[0]['deadline']);
       
                if(!(strtotime($date) >= strtotime($dead) )){
                  
                    
                    
         
                 
                ?>
                    <?php if(empty($reponse[0]['nom_file'])){ ?>
                    <div class="poster">
                    <span class="error"><?php
                    if( isset($_GET['error']) && strcmp($_GET['error'],'none')!=0) {
                            echo '*'.$_GET['error'].'<br/>';
                    }
                    ?></span>
                    <p>Poster devoir</p><br>
                    <form method="POST" action="../../includes/poster_reponsedevoir-inc.php"  enctype='multipart/form-data'>
    
                    <div>
                        <input type="file" id="file" name="devoir" >
                        <label for="file">
                            <span id="plus_devoir">&#43;</span> Poser le devoir
                        </label>
                        </div>
                        <input type="hidden" name="id" value="<?=$id?>">
                        
                        <button name="submit">Envoyer</button>
                    </form>
                    </div>
                    <?php }else{?>
                        <div class="poster">
                    <p>Poster devoir</p><br>
                    <form method="POST" action="../../includes/poster_reponsedevoir-inc.php"  enctype='multipart/form-data'>
                    <input type="hidden" name="id" value="<?=$id?>">
                        <button name="annule">annuler</button>
                    </form>
                    </div>
                    <?php } ?>
                
                <?php }elseif((strtotime($date) > strtotime($dead) )){   ?>
                    <div class="poster">
                    <p style="color:red;">Delai Dépasser</p><br>
            
                    </div>
                <?php } }else{?>
                    <?php if(empty($reponse[0]['nom_file'])){ ?>
                    <div class="poster">
                    <span class="error"><?php
                    if( isset($_GET['error']) && strcmp($_GET['error'],'none')!=0) {
                            echo '*'.$_GET['error'].'<br/>';
                    }
                    ?></span>
                    <p>Poster devoir</p><br>
                    <form method="POST" action="../../includes/poster_reponsedevoir-inc.php"  enctype='multipart/form-data'>
                    <div>
                        <input type="file" id="file" name="devoir" >
                        <label for="file">
                            <span id="plus_devoir">&#43;</span> Poser le devoir
                        </label>
                        </div>
                        <input type="hidden" name="id" value="<?=$id?>">
                        
                        <button name="submit">Envoyer</button>
                    </form>
                    </div>
                    <?php }else{?>
                        <div class="poster">
                    <p>Poster devoir</p><br>
                    <form method="POST" action="../../includes/poster_reponsedevoir-inc.php"  enctype='multipart/form-data'>
                    <input type="hidden" name="id" value="<?=$id?>">
                        <button name="annule">annuler</button>
                    </form>
                    </div>
                    <?php } ?>
                <?php }?>
            </div>
        </div>
   
        <div class="comment">
            <div class="appel_input_commentaire"><h3>Ajouter un commentaire</h3>il ya  <?=$nbr?> commentaire</div>
            
            <div class="form_comment" >
            <form  method="POST" action="../../includes/ajouter_commentaire-inc.php">
                <input type="text" name="Commentaire" placeholder="Comment.......................">
                <input type="hidden" name="type" value="devoir">
                <input type="hidden" name="page" value="etudiant">
                <input type="hidden" name="id_file" value="<?=$id?>" >

                <button type="submit" name="submit" >Envoyer</button>
            </form>
            </div>
        </div><br>
        <div class="commentaire">
            <?php if(!empty($commentaires)){?>
            <?php foreach($commentaires as $value){ ?>
            <div class="MSG">
                <div class="img">
                    
                <?php 
                $temp=$user->if_photo_profil_existe($value['id_user']);
                if(!empty($temp['etudiant']) ){
                    if($temp['etudiant']==1){
                        echo " <img  id='profil'  src='../../uploads/etudiants/profile-".$value['id_user'].".png'  height='50' width='50' style='border-radius:50%;'>";
                    }
                    
                }elseif(!empty($temp['enseignant']) ){
                    if($temp['enseignant']==1){
                        echo " <img  id='profil'  src='../../uploads/profs/profile-".$value['id_user'].".png'  height='50' width='50'  style='border-radius:50%;'>";
                    }

                }else{
                    echo " <img src='../../assets/ICON/user.png' height='50'>";
                }
                ?>
                </div>
                <div>
                    <p><?= $user->get_use($value['id_user'])?> </p>
                    <div class="msg"><?=$value['commentaire']?></div>
                </div>
               
            </div>
           <?php }?> 
            <?php }else{?>
                <p class="vide">0 commmentaire</p>
                <?php }?> 
        </div> 
             
     
    </div>
 </div>
<script >/*comment*/
    let activation=document.querySelector('.appel_input_commentaire');
    let comment=document.querySelector('.form_comment');
    
    activation.onclick=function()
    {       
        comment.style.display="block";
    }
    </script>
</body>
</html>