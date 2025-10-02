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
                <div class="col-sm-12">
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
              #STAKABADHI YA MALIPO YA SERIKALI
            </h3>
            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-12">

                  	<h3 style="font-weight: normal;">
                        Namba ya Risiti&nbsp;:&nbsp;&nbsp;<?php  echo strtoupper($receiptnumber);?>
                    </h3>
                    <h3 style="font-weight: normal;">
                        Jina la Mlipaji&nbsp;:&nbsp;&nbsp;<?php  echo strtoupper($fullname);?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Malipo kwa Tarakimu&nbsp;:&nbsp;&nbsp;<?php  echo number_format($totalamount, 2) . ' TZS';?>
                    </h3>

                    <h3 style="font-weight: normal;">
                    <?php
                    function convertNumber($num = false)
                        {
                            $num = str_replace(array(',', ''), '' , trim($num));
                            if(! $num) {
                                return false;
                            }
                            $num = (int) $num;
                            $words = array();
                            $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
                                'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
                            );
                            $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
                            $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
                                'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
                                'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
                            );
                            $num_length = strlen($num);
                            $levels = (int) (($num_length + 2) / 3);
                            $max_length = $levels * 3;
                            $num = substr('00' . $num, -$max_length);
                            $num_levels = str_split($num, 3);
                            for ($i = 0; $i < count($num_levels); $i++) {
                                $levels--;
                                $hundreds = (int) ($num_levels[$i] / 100);
                                $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : '' ) . ' ' : '');
                                $tens = (int) ($num_levels[$i] % 100);
                                $singles = '';
                                if ( $tens < 20 ) {
                                    $tens = ($tens ? ' and ' . $list1[$tens] . ' ' : '' );
                                } elseif ($tens >= 20) {
                                    $tens = (int)($tens / 10);
                                    $tens = ' and ' . $list2[$tens] . ' ';
                                    $singles = (int) ($num_levels[$i] % 10);
                                    $singles = ' ' . $list1[$singles] . ' ';
                                }
                                $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
                            } //end for loop
                            $commas = count($words);
                            if ($commas > 1) {
                                $commas = $commas - 1;
                            }
                            $words = implode(' ',  $words);
                            $words = preg_replace('/^\s\b(and)/', '', $words );
                            $words = trim($words);
                            $words = ucfirst($words);
                            $words = $words . " ONLY.";
                            return $words;   
                            
                        }

                          $totalAmountinWord =  convertNumber($totalamount);

                        ?>
                      Malipo kwa Maneno&nbsp;:&nbsp;&nbsp;<?php  echo strtoupper($totalAmountinWord);?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Hali ya Malipo&nbsp;:&nbsp;&nbsp;
                      <?php 
                      	if($cstatus == 'CREATED'){
                      		echo 'NOT PAID';
                      	}else{
                      		echo strtoupper($cstatus);
                      	}; 
                      ?>
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
                      			<th colspan="2" class="text-right">
                      				Jumla ya Malipo:
                      			</th>
                      			<th>
                      				<?php  echo number_format($totalamount, 2) . ' TZS';?>
                      			</th>
                      		</tr>
                      	</tfoot>
                      </table>
                      
                      <?php
	                    if ($cstatus == 'PAID') {
	                      ?>
	                      <h3 style="font-weight: normal;">
	                        Rejea ya Bili&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;:&nbsp;&nbsp;
	                        <?php echo $refn; ?>
	                      </h3>
	                      <?php
	                    }
	                  ?>

                    <h3>
                      Kumbukumbu Namba&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;:&nbsp;&nbsp;
                      <span style="font-weight: bold;">
                      	<?php echo $controlnumber; ?>
                      </span>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Tarehe ya Malipo&nbsp;:&nbsp;&nbsp;<?php  echo $paiddate2 . ' ' . $paidtime2;?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Jina la Mtoa Bili&nbsp;:&nbsp;&nbsp;<?php  echo strtoupper($firstname) . ' ' . strtoupper($lastname);?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Tarehe ya Kutoa Bili&nbsp;:&nbsp;&nbsp;<?php  echo date( "d-m-Y", strtotime($requestdate));?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Jina la Mtoa Risiti&nbsp;:&nbsp;&nbsp;<?php  echo strtoupper($_SESSION['fullname']);?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Tarehe ya Kutoa Risiti&nbsp;:&nbsp;&nbsp;<?php  echo date( "d-m-Y H:s:a");?>
                    </h3>

                    <h3 style="font-weight: normal;">
                      Sahihi ya Mtoa Risiti&nbsp;:&nbsp;&nbsp;....................
                    </h3>

                </div>
            </div>

            <hr style="font-weight: bold;">
            <div class="row" style="margin-top: 10px;">
              <div class="col-sm-12">
                <!-- <hr style="font-weight: bold;"> -->
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


