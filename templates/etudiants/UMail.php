<?php
 
require ('../../includes/user/securite-etudiant-inc.php');
 
include ('../../includes/list-mail-inc.php');

print_r($list_mails);
?>
<!DOCTYPE html>
<html>
 <?php include ('../../includes/template/head.php');?>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-etudiant.php'); nav_affiche("mail");?>
         
    <div class="mail_container">
        <div class="mail_non_open">
            <div class="option">
                <div class="te">
                    <h3> Votre Umail</h3>
                </div>
            </div>
        
            <div class="mail_content">
                <div class="mails">
                    <?php foreach($list_mails as $mail){?>
                    <a href="UMailOpen.html">
                        <div class="mail">
                               <div class="from"><?php echo "De  ".$mail['user_from']." : ".$mail['subject']?></div>
                               <div class="desc"><p><?= $mail['mail'] ?></p></div>
                               <div class="date"><p><?= /*$temp=explode(' ',$mail['date']);
                                echo "le : ".array_shift($temp);*/
                                $mail['date'];
                                ?></p></div>
                        </div>
                    </a>
                    <?php }?>
               
                </div>
            </div></div>
      
        </div>
    
      

 
 </div>
</body>
</html>