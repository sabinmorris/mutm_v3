google.charts.load('current',{
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
        //select main source collection for LGA
        $num = 0;
          $jsong = file_get_contents($pubIP.'selectMainsourceByInstitute/'.$_SESSION['instituteid']); //receive json from url
          $arrg = json_decode($jsong, true); //covert json data into array format

          foreach ($arrg as $key => $valueg) {
            $msidg = $valueg['msid'];
            $msnameg = $valueg['msname'];


            //find makusanyo by main source
            $mks = 0;
            $jsongg = file_get_contents($pubIP.'getYearDashboarCollectionByVyanzo/'.$msidg); //receive json from url
            $arrgg = json_decode($jsongg, true); //covert json data into array format
            foreach ($arrgg as $key => $valuegg) {
              $mks = $valuegg['totalamount'];
            }

            //find projection by main source
            $mkdggg = 0;
            // $jsonggg = file_get_contents($ipConnect.'/selectProjectionByMainsource/'.$msidg); //receive json from url
            // $arrggg = json_decode($jsonggg, true); //covert json data into array format
            // foreach ($arrggg as $key => $valueggg) {
            //   $mkd = $valueggg['amount'];

            // }

            //find projections by institute
            $jsonggg = file_get_contents($pubIP.'selectProjectionByMainsource/'.$msidg);

            if($jsonggg != '[null]'){
              $mkdggg = $jsonggg;
            }else{
              $mkdmggg = 0;
            }

          ?>

            {c:[{v:"<?= $msnameg ?>"},{v:"<?= $mks ?>"},{v:"<?= $mkdggg ?>"}]},

            <?php
          

          $num++;
        }
      ?>
      ]

    }
  ),
  {});
};