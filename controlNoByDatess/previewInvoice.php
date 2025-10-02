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
      $userid = $output->serid;
      $firstname = $output->firstname;
      $middlename = $output->middlename;
      $lastname = $output->lastname;
      $username = $output->username;
      $servicename = '';
      $instname = $output->instname;
      $zonename = $output->zonename;
      $spcode = $output->intergratingcode;

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
            <h3 class="" style="font-weight: normal;">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Bili ya Serikali
            </h3>
            <hr style="font-weight:bold;">
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
                      <?php echo $referencenumber; ?>
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
                      $jsonS = file_get_contents($pubIP.'getCollectedServiceByBillId/'.$referencenumber); //receive json from url
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
                            $servicename = $valueS['servicename'];
                            $servicecode = $valueS['servicecode'];
                            $ltsname = $valueS['ltsname'];
                            $ltsid = $valueS['ltsid'];
                            $bankcode = $valueS['bankcode'];
                            $serviceamount = $valueS['amount'];

                        ?>

                            <tr>
                              <td style="width:15%; white-space: nowrap;">
                                <?php echo $serviceno;?>
                              </td>
                              <td style="width:45%; white-space: nowrap;">
                                <?php 
                                  if ($fstchar == 8) {
                                    echo strtoupper($servicename);
                                  }else{
                                    echo strtoupper($ltsname);
                                  }
                                  
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
                      Kiasi cha Malipo kwa Maneno&nbsp;:&nbsp;&nbsp;<?php  echo numberTowords($totalamount);?>
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
                  1. Kupitia Benki: Fika tawi lolote au wakala wa benki ya PBZ.
                </h3>
              </div>

              <div class="col-sm-6">
                <h3 style="font-weight: normal; font-size: 1.3em; font-style: italic;" class="">
                  2. Kupitia Simu ya Kiganjani: Unaweza kufanya malipo kupitia EzyPesa au
                  <br>
                  TigoPesa.
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


