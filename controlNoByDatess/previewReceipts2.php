<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    <?php 
      if (isset($_GET['controlnumber'])) {
        echo $_GET['controlnumber'] . ' Receipt';
      }else{
        echo 'Receipt';
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
    if (!isset($_GET['controlnumber'])) {
      header('Location: ../logOut/?msg=error');
      exit;
    }

    $controlnumber = $_GET['controlnumber'];

    //$json = file_get_contents($ipConnect.'/getControllNumberByControlNumber?contnumb='.$controlnumber);
    // $json = file_get_contents($ipConnect.'/getControllNumberByControlNumber/'.$controlnumber);
    // $json = file_get_contents($ipConnect.'/getControllNumberByControlNumber?contnumb='.$controlnumber);
    $json5 = file_get_contents($pubIP.'getControllNumberByControlNumber?contnumb='.$controlnumber);

    $arr = json_decode($json5, true); //covert json data into array format
      // $totalamount;
    foreach ($arr as $key => $value) {
      $fullname = $value['fullname'];
      $phonenumber = $value['phonenumber'];
      $requestdate = $value['requestdate'];
      $duedate = $value['duedate'];
      $cstatus = $value['cstatus'];
      $referencenumber = $value['referencenumber'];
      $totalamount = $value['totalamount'];
      $paiddate = $value['paiddate'];
      if ($paiddate == null || $paiddate == '1970-01-01') {
        $paiddate2 = '';
        $paidtime2 = '';
      }else{
        $paiddate2 = date( "d-m-Y", strtotime($paiddate));
        $paidtime2 = date( "H:s:a", strtotime($paiddate));
      }
      $receiptnumber = $value['receiptnumber'];
      $userid = $value['userid'];
      $firstname = $value['firstname'];
      $middlename = $value['middlename'];
      $lastname = $value['lastname'];
      $username = $value['username'];
      $servicename = '';
      $instname = $value['instname'];
    }

  ?>
</head>
<body onload="pr()">
  <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12 text-left">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="../dist/img/smz_logo.png" style="width:100px; height:100px;">
                </div>
            </div>
            <h3 class="text-left" style="font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;********** MWANZO WA RISITI **********</h3>
            <h3 class="text-left" style="font-weight: normal;">
              OR - TMSMIM - <?php echo $instname; ?>
            </h3>
            <h3 class="text-left" style="font-weight: normal;">
              SLP: 4220, Simu: +255242230034
            </h3>
            <hr style="font-weight:bold;">
            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-12">
                  <?php
                    if ($cstatus == 'PAID') {
                      ?>
                      <h3 style="font-weight: normal;">
                        Risiti Namba&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;:&nbsp;&nbsp;
                        <?php echo $receiptnumber; ?>
                      </h3>
                      <?php
                    }
                  ?>
                    <h3 style="font-weight: normal;">
                      Ankara Namba&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;:&nbsp;&nbsp;
                      <?php echo $controlnumber; ?>
                    </h3>
                    
                    <h3 style="font-weight: normal;">
                        Jina la Mlipaji&nbsp;:&nbsp;&nbsp;<?php  echo $fullname;?>
                    </h3>

                    <?php
                      $jsonS = file_get_contents($pubIP.'getCollectedServiceByControlNumber/'.$controlnumber); //receive json from url
                      $arrS = json_decode($jsonS, true); //covert json data into array format

                      $serviceno = 1;
                      foreach ($arrS as $keyS => $valueS) {
                        $servicename = $valueS['servicename'];
                        $serviceamount = $valueS['amount'];

                        ?>

                        <h3 style="font-weight: normal;">
                          Huduma&nbsp;<?php echo $serviceno;?>&nbsp;:&nbsp;&nbsp;<?php  echo $servicename;?>
                        </h3>
                        <h3 style="font-weight: normal;">
                          Malipo ya Huduma&nbsp;&nbsp;(TZS)&nbsp;:&nbsp;&nbsp;<?php  echo number_format($serviceamount, 2);?>
                        </h3>

                        <?php
                        $serviceno++;
                      }

                    ?>
                    <h3 style="font-weight: normal;">
                      Jumla ya Malipo&nbsp;&nbsp;(TZS)&nbsp;:&nbsp;&nbsp;<?php  echo number_format($totalamount, 2);?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Hali ya Malipo&nbsp;:&nbsp;&nbsp;<?php if($cstatus == 'CREATED'){echo 'NOT PAID';}else{echo $cstatus;}; ?>
                    </h3>
                    
                    <h3 style="font-weight: normal;">
                      Karani Mapato&nbsp;:&nbsp;&nbsp;<?php  echo $firstname . ' ' . $lastname;?>
                    </h3>
                </div>
            </div>
            
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12">
                    <!-- <h3 style="font-weight: normal;">
                        Printed&nbsp;&nbsp;By&nbsp;:&nbsp;&nbsp;<?php  echo $_SESSION['uName'];?>
                    </h3> -->
                    <?php
                      if ($cstatus == 'PAID') {
                        ?>
                        <h3 style="font-weight: normal;">
                          Tarehe&nbsp;&nbsp;ya&nbsp;&nbsp;Malipo&nbsp;:&nbsp;&nbsp;<?php  echo $paiddate2;?>
                        </h3>
                        <h3 style="font-weight: normal;">
                          Muda&nbsp;&nbsp;wa&nbsp;&nbsp;Malipo&nbsp;:&nbsp;&nbsp;<?php  echo $paidtime2;?>
                        </h3>
                        <?php
                      }else{
                        ?>
                        <h3 style="font-weight: normal;">
                          Tarehe&nbsp;&nbsp;ya&nbsp;&nbsp;Maombi&nbsp;:&nbsp;&nbsp;<?php  echo date( "d-m-Y", strtotime($requestdate));?>
                        </h3>
                        <h3 style="font-weight: normal;">
                          Tarehe&nbsp;&nbsp;ya&nbsp;&nbsp;Malipo&nbsp;:&nbsp;&nbsp;<?php  echo $paiddate2;?>
                        </h3>
                        <?php
                      }
                    ?>
                    
                </div>
            </div>
            
            <div class="row" style="margin-top: 10px;">
              <div class="col-sm-12 text-left">
                <hr style="font-weight: bold;">
                <h3 style="font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*** Lipa kodi kwa maendeleo ya Nchi ***</h3>
                <h3 style="font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;********** MWISHO WA RISITI **********</h3>
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


