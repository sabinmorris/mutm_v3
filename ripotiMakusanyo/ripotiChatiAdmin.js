agoogle.charts.load('current',{
        "packages":["corechart"],"callback":drawChart,"language":"sw"
});
function drawChart(){
  var w2 = new google.visualization.ColumnChart(document.getElementById('sales-chart'));
  w2.draw(new google.visualization.DataTable(
    {cols:[
        {label:"LGA ",type:"string"},
        {label:"Makusanyo",type:"number"},
        {label:"Makadirio",type:"number"}
      ],

      rows:[

      <?php
        $yearlyTotal = 0;
        $num = 0;
        // $mksm = 6000000;
        $jsonChart2 = file_get_contents($pubIP.'getYearDashboradWizarani/'); //receive json from url
        $arrChart2 = json_decode($jsonChart2, true); //covert json data into array format
        foreach ($arrChart2 as $key => $value) {
          $instname = $value['instname'];
          $instid = $value['instituteid'];
          $mksm = $value['totalamount'];

          //find projections by institute
          $jsonm = file_get_contents($pubIP.'selectAllProjectionByInstitute/'.$instid);

          if($jsonm != '[null]'){
            $mkdm = $jsonm;
          }else{
            $mkdm = 0;
          }

          // $mksm = $mksm * 2;

        ?>

          {c:[{v:"<?= $instname ?>"},{v:"<?= $mksm ?>"},{v:"<?= $mkdm ?>"}]},

          <?php
          

          $num++;
        }
      ?>
      ]
    }
  ),
  {});
};