<?php
  include('../Controller/connect.php');
  session_start();
  // $useridn = $_POST['useridn'];
  $instituteidch = $_POST['instituteidch'];
  $startDatech = $_POST['startDatech'];
  $endDatech = $_POST['endDatech'];

  ?>

  <script>
  google.charts.load('current',{
    "packages":["corechart"],"callback":drawChart,"language":"sw"
  });
  function drawChart(){
    var w2 = new google.visualization.ColumnChart(document.getElementById('sales-chart'));
    w2.draw(new google.visualization.DataTable(
      {cols:[
          {label:"MWEZI ",type:"string"},
          {label:"Makusanyo2",type:"number"}
        ],

        rows:[

        <?php

          if ($instituteidch == "ZOTE") {
                    
            $json5 = file_get_contents($pubIP.'getAllLgaEachMonthsReport?edate='.$endDatech.'&sdate='.$startDatech); //receive json from url

          }else{

            $json5 = file_get_contents($pubIP.'getLgaEachMonthsReport/'.$instituteidch.'?edate='.$endDatech.'&sdate='.$startDatech); //receive json from url

          }

          // if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
          //   $json5 = file_get_contents($pubIP.'getAllLgaEachMonthsReport?edate='.$endDatech.'&sdate='.$startDatech); //receive json from url
          // }else{
          //   $json5 = file_get_contents($pubIP.'getLgaEachMonthsReport/'.$instituteidch.'?edate='.$endDatech.'&sdate='.$startDatech); //receive json from url
          // }

          $num = 1;
          $allMonthTotalch = 0;
          $eachMonthTotalch = 0;


          $arr5 = json_decode($json5, true); //covert json data into array format
          foreach ($arr5 as $key5 => $value5) {
            $monthsch = $value5['months'];
            $eachMonthTotalch = $value5['totalamount'];
            $num++;
            $allMonthTotalch = $allMonthTotalch + $eachMonthTotalch;

          ?>

            {c:[{v:"<?= $monthsch ?>"},{v:"<?= $eachMonthTotalch ?>"}]},

            <?php
            

            $num++;
          }
        ?>
        ]
      }
    ),
    {});
  };
</script>

  
  <div id="sales-chart" style="width: 100%; height: 500px;"></div>

<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../dist/js/pages/dashboard3.js"></script> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


             
                         