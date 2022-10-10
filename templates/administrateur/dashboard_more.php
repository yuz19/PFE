<?php 
 
 require ('../../includes/user/securite-administrateur-inc.php');
 include ('../../includes/stat_plus-inc.php');
 include ('../../includes/get_prof-inc.php');
 $tabs=$stat->stat_prof();

 #<?php print_r($tabs);
?>
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
 
  
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-adminstrateur.php'); nav_affiche("dashboard");?>
 <div class="table_d">

 <table>
   <caption><p>HISTORIQUE PROF LIVE</p></caption>
   <thead>
    <tr>
      <th>Prof</th>
      <th>nombre de live online</th>
      <th>Date</th>
    </tr>
   </thead>
   <tbody>
     <?php if(!empty($tabs)){?>
     <?php foreach($tabs as $value){?>
        <tr>
          <th><?=$prof->getprof($value['NSS']).'-'.$value['NSS']?></th>
          <td><?=$value['cpt']?></td>
          <td><?=$value['date']?></td>
        </tr>
          
       <?php }}else{?>
        <tr>
          <th>none</th>
          <td>0</td>
          <td>0</td>
        </tr>
        <?php }?>
   </tbody>

 </table>
 </div>

 </div>
</body>
</html>