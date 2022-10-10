<?php 
 
require ('../../includes/user/securite-prof-inc.php');
include ('../../includes/increment-inc.php');

 
?>
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
<script    src="https://meet.jit.si/external_api.js"></script>
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-prof.php'); nav_affiche("live");?>
    <div class="live">
 
        <div  class="live_r">
        <a href="live.php" target="_blank">
            <button onclick="clickMe()" id="start" class="btn btn-light btn-lg" type="button"><b>Start a new meeting</b></button>
            </a>
            </div>
       
    </div>
 </div>
 



 <script>
 function clickMe(){
    var result ="<?php $his->incremente($_SESSION['id']); ?>"
    document.write(result);
    setTimeout("location.reload(true);",'500');
    }
/*     <div id="jitsi-container" class="container align-items-center">
            </div> 
  
    var button = document.querySelector('#start');
    var container = document.querySelector('#jitsi-container');
    var api = null;
   
    button.addEventListener('click', () => {
        var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var stringLength = 30;
        button.style.display="none";
      
        function pickRandom() {
        return possible[Math.floor(Math.random() * possible.length)];
        }
  
 
        function pickRandom() {
        return possible[Math.floor(Math.random() * possible.length)];
        }
    
    var randomString = Array.apply(null, Array(stringLength)).map(pickRandom).join('');
    
        var domain = "meet.jit.si";
        var options = {
            "roomName": randomString,
            "parentNode": container,
            "width": 1300,
            "height": 800,
        };
        api = new JitsiMeetExternalAPI(domain, options);
 
    });
   
 
 */
 
    </script>
   
   
</body>
</html>
