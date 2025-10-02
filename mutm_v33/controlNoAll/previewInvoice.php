<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    <?php 
      if (isset($_GET['controlnumber'])) {
        echo $_GET['controlnumber'] . ' Invoice';
      }else{
        echo 'Invoice';
      }

       
    ?>
  </title>
  <style>
    @media print {
      @page {
        margin: 5;
      }
      body {
        margin: 5px;
      }
    }
  </style>
  <?php
    include('../MySections/HeaderLinks.php');
    include ("../Controller/configuration.php"); //configuration file
    include('../Controller/convertNumbertoWords.php');
    if (!isset($_GET['controlnumber'])) {
      header('Location: ../logOut/?msg=error');
      exit;
    }

    $controlnumber = $_GET['controlnumber'];

    $refn = $_GET['refn'];

    $fstchar = $controlnumber[0]; //GET FIRST CHARACTER OF CONTROL NUMBER

    if ($fstchar == 8) {
      // $api ="getControllNumberByControlNumber?contnumb=".$controlnumber."&pageNumber=1&pageSize=50"; //define API name
      $jsonp = file_get_contents($pubIP.'getControllNumberByControlNumber?contnumb='.$controlnumber.'&pageNumber=1&pageSize=50'); //receive json from url

      $arrp = json_decode($jsonp, true); //covert json data into array format

      foreach ($arrp as $key => $valuep) {
        
        $fullname = $valuep['fullname'];
        $phonenumber = $valuep['phonenumber'];
        $requestdate = $valuep['requestdate'];
        $duedate = $valuep['duedate'];
        $cstatus = $valuep['cstatus'];
        $referencenumber = $valuep['referencenumber'];

        $totalamount = $valuep['totalamount'];
        $paiddate = $valuep['paiddate'];
        if ($paiddate == null || $paiddate == '1970-01-01') {
          $paiddate2 = '';
          $paidtime2 = '';
        }else{
          $paiddate2 = date( "d-m-Y", strtotime($paiddate));
          $paidtime2 = date( "H:s:a", strtotime($paiddate));
        }

        $receiptnumber = $valuep['receiptnumber'];
        $userid = $valuep['userid'];
        $firstname = $valuep['firstname'];
        $middlename = $valuep['middlename'];
        $lastname = $valuep['lastname'];

        // $username = $output->username;..
        // $servicename = '';...
        $instname = $valuep['instname'];
        $zonename = '';
        $spcode = '';

      }

    }else{
      $api ="getControllNumberByBillId?billId=".$refn; //define API name

      $api_url = getServer().$api; //call get server func

      $res = getData($api_url);  //call getData func

      //check if success
      if($res->http_code == 200){
        $output = json_decode($res->data); //covert json data into array format

        //get results
        $fullname = $output->fullname;
        $phonenumber = $output->phonenumber;
        $requestdate = $output->requestdate;
        $duedate = $output->duedate;
        $cstatus = $output->cstatus;
        $referencenumber = $output->referencenumber;
        $totalamount = $output->totalamount;
        $paiddate = $output->paiddate;
        if ($paiddate == null || $paiddate == '1970-01-01') {
          $paiddate2 = '';
          $paidtime2 = '';
        }else{
          $paiddate2 = date( "d-m-Y", strtotime($paiddate));
          $paidtime2 = date( "H:s:a", strtotime($paiddate));
        }
        $receiptnumber = $output->receiptnumber;
        $userid = $output->userid;
        $firstname = $output->firstname;
        $middlename = $output->middlename;
        $lastname = $output->lastname;
        // $username = $output->username;..
        // $servicename = '';...
        $instname = $output->instname;
        $zonename = $output->zonename;
        $spcode = $output->intergratingcode;

      }

    }
    
  ?>
</head>
<body onload="pr()">
  <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-8">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="../dist/img/smz_logo.png" style="width:150px; height:100px;">
                </div>
            </div>
            <h3 class="" style="font-weight: bold;">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;
            	SERIKALI YA MAPINDUZI ZANZIBAR
            </h3>
            <!-- <h3 class="" style="font-weight: bold;">
            	OR - TAWALA ZA MIKOA SERIKALI ZA MITAA NA IDARA 
              <br/>
              MAALUM ZA SMZ
            </h3> -->
            <h3 class="" style="font-weight: bold;">
              &nbsp;&nbsp;&nbsp;&nbsp;
              (OR-TMSMIM) <?php echo strtoupper($instname); ?>
            </h3>

            <hr style="font-weight: bold; border: 3px dashed #020002;" >
            <div class=""style="font-weight: bold;">
              <h3 style="font-weight: bold;"> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;S.L.P: 4220, Vuga, Zanzibar
              </h3>

              <h3 style="font-weight: bold;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;
                Simu: +255242230034 | Faksi: +255242230034
              </h3>
              <h3 style="font-weight: bold; font-size: 1.4em;">
                Barua Pepe: info@tamisemim.go.tz | Tovuti: https://tamisemim.go.tz
              </h3>
            </div>
            <hr style="font-weight: bold; border: 3px dashed #020002;">
            <h3 class="" style="font-weight: bold;">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              #BILI YA SERIKALI
            </h3>
            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-12">

                    <h3>
                      Kumbukumbu ya Malipo&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;:&nbsp;&nbsp;
                      <span style="font-weight: bold;">
                        <?php echo $controlnumber; ?>
                      </span>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Rejea ya Malipo&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;:&nbsp;&nbsp;
                      <?php echo $refn; ?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Hali ya Bili&nbsp;:&nbsp;&nbsp;
                      <?php
                          echo strtoupper($cstatus);
                      ?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Namba ya Taasisi&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;:&nbsp;&nbsp;
                      <?php echo strtoupper($spcode); ?>
                    </h3>

                  	<h3 style="font-weight: normal;">
                        Jina la Mlipaji&nbsp;:&nbsp;&nbsp;<?php  echo strtoupper($fullname);?>
                    </h3>

                    <h3 style="font-weight: normal;">
                        Namba ya Simu&nbsp;:&nbsp;&nbsp;<?php  echo strtoupper($phonenumber);?>
                    </h3>

                    <h3 style="font-weight: normal;">
                        Huduma Zinazolipiwa
                    </h3>

                    <?php
                      if ($fstchar == 8) {
                        $jsonS = file_get_contents($pubIP.'getCollectedServiceByControlNumber/'.$controlnumber); //receive json from url
                      }else{
                        
                        $jsonS = file_get_contents($pubIP.'getCollectedServiceByBillId/'.$refn); //receive json from url
                      }
                      
                      $arrS = json_decode($jsonS, true); //covert json data into array format

                      $serviceno = 1;
                      ?>
                      <table class="table table-bordered table-striped" style="width:67%;">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Huduma</th>
                            <th>Kiasi cha Malipo</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          foreach ($arrS as $keyS => $valueS) {

                            if ($fstchar == 8) {
                              // $servicename = $valueS['servicename'];
                              $servicecode = $valueS['servicecode'];
                              $servicename = $valueS['servicename'];
                              $ltsid = $valueS['ltsid'];
                              $bankcode = $valueS['bankcode'];
                              $serviceamount = $valueS['amount'];
                              $accountnumber = $valueS['accountnumber'];
                            }else{
                              // $servicename = $valueS['servicename'];
                              $servicecode = $valueS['servicecode'];
                              $servicename = $valueS['ltsname'];
                              $ltsid = $valueS['ltsid'];
                              $bankcode = $valueS['bankcode'];
                              $serviceamount = $valueS['amount'];
                            }


                        ?>

                            <tr>
                              <td style="width:15%; white-space: nowrap;">
                                <?php echo $serviceno;?>
                              </td>
                              <td style="width:45%; white-space: nowrap;">
                                <?php 
                                  // if ($fstchar == 8) {
                                    echo strtoupper($servicename);
                                  // }else{
                                  //   echo strtoupper($ltsname);
                                  // }
                                  
                                ?>
                              </td>
                              <td style="font-weight: bold;">
                                <?php  echo number_format($serviceamount, 2) . ' TZS';?>
                              </td>
                            </tr>

                        <?php
                            $serviceno++;
                          }

                        ?>

                        </tbody>
                        <tfoot>
                          <tr style="font-weight: bold;">
                            <th colspan="2" class="text-right" >
                              Jumla ya Malipo:
                            </th>
                            <th>
                              <?php  echo number_format($totalamount, 2) . ' TZS';?>
                            </th>
                          </tr>
                        </tfoot>
                      </table>

                    <h3 style="font-weight: normal;">
                      Kiasi cha Malipo kwa Maneno&nbsp;:&nbsp;&nbsp;<?php  echo numberTowords($totalamount).'ONLY';?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Tarehe ya Bili Kumalizika&nbsp;:&nbsp;&nbsp;<?php  echo date('d-m-Y', strtotime($duedate));?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Jina la Mtoa Bili&nbsp;:&nbsp;&nbsp;<?php  echo strtoupper($firstname) . ' ' . strtoupper($lastname);?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Zoni/Kituo&nbsp;:&nbsp;&nbsp;<?php  echo strtoupper($zonename);?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Jina la Aliyechapisha&nbsp;:&nbsp;&nbsp;<?php  echo strtoupper($_SESSION['fullname']);?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Tarehe ya Kuchapishwa&nbsp;:&nbsp;&nbsp;<?php  echo date( "d-m-Y H:s:a");?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Sahihi ya Mtoa Bili&nbsp;:&nbsp;&nbsp;....................
                    </h3>

                    

                </div>
            </div>

            <hr style="font-weight: bold;">

            <h3 style="font-weight: bold; font-size: 1.3em; font-style: italic;">
              Jinsi ya Kulipia:
            </h3>

            <div class="row" style="margin-top: 10px;">
              <div class="col-sm-6">
                <h3 style="font-weight: normal; font-size: 1.3em; font-style: italic;" class="">
                  1. Kupitia Benki: Fika tawi lolote au wakala wa benki ya watu wa Zanzibar (PBZ), number ya kumbukumbu: <span style="font-weight: bold;"><?php echo $controlnumber; ?></span>.
                </h3>
              </div>

              <div class="col-sm-6">
                <h3 style="font-weight: normal; font-size: 1.3em; font-style: italic;" class="">
                  2. Kupitia Mitandao ya simu: Zantel na Tigo
                  	<br>
          					- Ingia kwenye menu ya mtandao husika
          					<br>
          					- Chagua 4 (Lipia Bili)
          					<br>
          					- Chagua 5 (Malipo ya Serikali).
          					<br>
          					- Ingiza hii <span style="font-weight: bold;"><?php echo $controlnumber; ?></span> kama namba ya kumbukumbu
                </h3>
              </div>
            </div>
            
            <div class="row" style="margin-top: 10px;">
              <div class="col-sm-12">
                <h3 class="" style="font-weight: normal; font-size: 1.3em; font-style: italic;">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;
                	*** Lipa Kodi kwa Maendeleo ya Nchi ***
            	</h3>
              </div>
            </div>
    </div>
</div>
</div>    

<script>
function pr() {
   window.print();
//   history.back();
}

// go to the previous page after printing
window.onafterprint = function(){
   history.go(-1);
}
</script>

<?php
  include('../MySections/footerLinks.php');
?>
</body>
</html>


