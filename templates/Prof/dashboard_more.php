<?php 
 
require ('../../includes/user/securite-prof-inc.php');
 
include ('../../includes/increment-inc.php');
include ('../../includes/stat_plus-inc.php');
$first=$his->get_prof_stat($_SESSION['id']);
$second=$stat->stat_devoir($_SESSION['id']);
$third=$stat->stat_cour($_SESSION['id']);
$four=$stat->stat_td_tp($_SESSION['id']);
?>
<!DOCTYPE html>
<html>
<head>
<?php include ('../../includes/template/head.php');?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    @media (max-width:1400px) {
      body{
        overflow-y: scroll;
    } 
    } 
   
 
    </style>
</head>
<body>
 <div class="container">
 <?php   include ('../../includes/template/header-prof.php'); nav_affiche("dashboard"); ?>
    
    <div class="cont_2">
           <div id="first"> 
            <canvas id="myChart"></canvas>
          </div>
          <div id="second"> 
     
            <canvas id="myChart2"></canvas>
 
          </div>
          <div id="third"> 
            <canvas id="myChart3"></canvas>
          </div>
          <div id="four" > 
            <canvas id="myChart4" style="height:80%;"></canvas>
          </div>

    </div>

 </div>
 <script>
    const labels = [
      <?php foreach ($first as$value) {
        echo "'".$value['date']."',";
      } ?>
     
    ];
  
    const data = {
      labels: labels,
      datasets: [{
        label: 'nombre live online par jour',
        backgroundColor: '#125199',
        borderColor: '#125199',
        data: [
          <?php foreach ($first as$value) {
        echo "'".$value['cpt']."',";
      } ?>
     
        ],
      }]
    };
  
    const config = {
  type: 'line',
  data: data,
};

const labels2 = [
  <?php foreach ($third as $key=>$value) {
        echo $key.",";
      } ?>
    ];
  
    const data3 = {
      labels: labels2,
      datasets: [{
        label: 'nombre cour online ',
        backgroundColor: '#125199',
        borderColor: '#125199',
        data: [  <?php foreach ($third as $key=>$value) {
        echo $value.",";
      } ?>],
      }]
    };
  
    const config3 = {
  type: 'line',
  data: data3,
};
const labels3 = [
  <?php foreach ($four as $key=>$value) {
        echo $key.",";
      } ?>
    ];
  
    const data4 = {
      labels: labels3,
      datasets: [{
        label: 'nombre travaux online ',
        backgroundColor: '#125199',
        borderColor: '#125199',
        data: [  <?php foreach ($four as $key=>$value) {
        echo $value.",";
      } ?>],
      }]
    };
const config4 = {
  type: 'line',
  data: data4,
};

     const data2 ={
      labels: [ 
        <?php foreach ($second as $key=>$value) {
        echo $key.",";
      } ?>
      ],
      datasets: [{
        label: "nombre des devoirs remis par les sections",
        backgroundColor: ['#1471ac','#9AA1E0','#0f1833','#934c93','#e5dcd6','#a86fa8','#474444','#68839b','#66cccc','#468499','#f78ea4','#a0ce4e','#cd0000'],
        data: [
          <?php foreach ($second as $key=>$value) {
        echo $value.",";
      } ?>
        ],
      }]
    };
    const config2 = {
    type: 'doughnut',
    data: data2,
    options: {} 
     };
 
  </script>
  <script>
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
    const myChart3 = new Chart(
      document.getElementById('myChart3'),
      config3
    );
    const myChart4 = new Chart(
      document.getElementById('myChart4'),
      config4
    );
    const myChart2 = new Chart(
      document.getElementById('myChart2'),
      config2
    );
  </script>
 
</body>
</html>