<!DOCTYPE html>
<html>
<head>
 
<script    src="https://meet.jit.si/external_api.js"></script>
</head>
<body onload="lancer()">
<div id="jitsi-container" class="container align-items-center" style="margin:0;padding:0; overflow:hidden;">
            </div> 
</body>
<script>
 
  
    function lancer(){
        var container = document.querySelector('#jitsi-container');
        console.log("hey")
        var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var stringLength = 30;
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
            "disableKick": true,
            "parentNode": container,
            "width": window.screen.width-100,
            "height": window.screen.height-80,
        };
        api = new JitsiMeetExternalAPI(domain, options);
    }
  
 
      
      
 
 
    

</script>
</script>
   
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>

