<?php
include ('../../includes/list-mail-inc.php');
print_r ($list_mails);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <title>USTHB-admin</title>
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-adminstrateur.php'); nav_affiche("mail");?>
 
    <div class="mail_container">
        <div class="mail_non_open">
            <div class="option">
                <div class="te">
                    <h3> Votre Umail</h3>  
                   
                </div>
                <a href="UMail-envoy.php"><div id="plus"><span>+</span></div></a>
            </div>
        
            <div class="mail_content">
                <div class="mails">
                    <a href="UMailOpen.php">
                        <div class="mail">
                               <div>prof ddd</div>
                               <div class="desc"><p>Lorem ipsum dolor sit,  Doloremque consequuntur facilis nemo voluptatem quasi quibusdam fuga ducimus sunt odit debitis?</p></div>
                        </div>
                    </a>
                        <div class="mail">
                            prof dqsd mail
                        </div>
                        <div class="mail">
                            prof dqsd mail
                        </div>
                </div>
            </div></div>
      
        </div>
    
      

 
 </div>
</body>
</html>