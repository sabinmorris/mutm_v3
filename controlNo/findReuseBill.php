<?php
	session_start();
	unset($_SESSION["shopping_cart"]);
	include('../Controller/connect.php');
	include ("../Controller/configuration.php"); //configuration file
	$refn = $_POST['refn'];

  $cnnumber = $_POST['cnnumber'];


	$filedata = file_get_contents($pubIP.'getControllNumberAndSelectedServiceByBillId?billid='.$refn);
	$details = json_decode($filedata,true);

	$referencenumber = $details['referencenumber'];
	$email = $details['email'];
	$phonenumber = $details['phonenumber'];
	$fullname = $details['fullname'];
	$pin = $details['pin'];

?>

  <div class="row">
    <div class="col-sm-12">
      <h4 class="text-primary">
        Taarifa ya Bili:
      </h4>
      <hr/>
    </div>
  </div>

<form id="cnNoFormR">

<div class="row">
	<div class="col-sm-6">
	    <div class="form-group">
	        <label for="referencenumberR">Kumbukumbu  Namba:
	          <span class="text-danger">*</span>
	        </label>
	        <input type="text" class="form-control" placeholder="Kumbukumbu namba" id="referencenumberR" name="referencenumberR" value="<?php echo $referencenumber; ?>" readonly="readonly" required="required" style="border: solid 1px green;">
	    </div>
	</div>
  <div class="col-sm-6">
      <div class="form-group">
          <label for="controlnumberR">Ankara  Namba:
            <span class="text-danger">*</span>
          </label>
          <input type="text" class="form-control" placeholder="Ankara namba" id="controlnumberR" name="controlnumberR" value="<?php echo $cnnumber; ?>" readonly="readonly" required="required" style="border: solid 1px green;">
      </div>
  </div>
</div>

<div class="row">
	<div class="col-sm-6">
	    <div class="form-group">
        <label for="fullNameR">Jina la mlipaji <span class="small">(Mtu binafsi/Kampuni/Shirika/nk)</span>:
          <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" placeholder="Ingiza jina la mlipaji" id="fullNameR" name="fullNameR" value="<?php echo $fullname; ?>" readonly="readonly" required="required" style="border: solid 1px green;">
	    </div>
	</div>
	<div class="col-sm-6">
	  <div class="form-group">
	    <label for="emailR">Baruapepe:</label>
	    <span class="text-danger"></span>
	    <input type="email" name="emailR" id="emailR" value="<?php echo $email; ?>" class="form-control" readonly="readonly" placeholder="Ingiza baruapepe" style="border: solid 1px green;">
	  </div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
	  <div class="form-group">
	    <label for="payerIdentificationNumberR">Namba ya Kitambulisho:</label>
	    <span class="text-danger">*</span>
	    <input type="text" name="payerIdentificationNumberR" id="payerIdentificationNumberR" readonly="readonly" value="<?php echo $pin; ?>" class="form-control" placeholder="Ingiza kitambulisho cha mlipaji" style="border: solid 1px green;" required="required">
	  </div>
	</div>
	<div class="col-sm-6">
	    <div class="form-group">
	      <label for="phoneNumberR">Namba ya Simu:</label>
	      <span class="text-danger">*</span>
	      <input type="tel" name="phoneNumberR" id="phoneNumberR" value="<?php echo $phonenumber; ?>" class="form-control" pattern="[255]{3}[0-9]{9}" placeholder="eg: 255773217012" readonly="readonly" minlength="12" maxlength="12" title="Phone number should start with 255 and remaing 9 digit with 0-9" style="border: solid 1px green;" required="required">
	    </div>
  	</div>
</div>


<!-- tables data -->
<div class="row">
<div class="col-lg-12">
  <div class="card">
    <div class="card-header border-0">
      <div class="card-tools">
        &nbsp;
      </div>
    </div>
    <div class="card-body table-responsive p-0" id="printBillsR">
      <table class="table table-striped table-valign-middle" id="malipoTableR">
        <thead>
        <tr>
          <th>S/N</th>
          <th>GFS Code</th>
          <th>Huduma</th>
          <th>Kiasi</th>
          <th>Benki</th>
          <th>Akaunti Nam.</th>
        </tr>
        </thead>
        <tbody id="mmR">
        <?php

        	if(!empty($_SESSION["shopping_cart"]))
            {
              $total = 0;
              $num = 1;
              foreach($_SESSION["shopping_cart"] as $keys => $values)
              {
                $total = $total + $values["kiasi"];
            ?>
            <tr>
              <td><?php echo $num; ?></td>
              <td><?php echo $values["huduma"]; ?></td>
              <td><?php echo $values["ainaHuduma"]; ?></td>
              <td>TZS <?php echo number_format($values["kiasi"]); ?></td>
              <td><?php echo $values["benki"]; ?></td>
              <td><?php echo $values["namMalipo"]; ?></td>
            </tr>
            <?php
              $num++;
              }

              ?>
              <tr>
              <th colspan="5" class="text-right">Total</th>
              <td align="right">
                TZS <?php echo number_format($total, 2); ?>
                <?php
                echo '<input type="hidden" id="sumR" value="'.$total.'">';
                ?>
              </td>
            </tr>
              <?php
              
            }else{

          	//start session
          	$total = 0;
            $num = 1;
          	foreach($details['collectService'] as $valued){
      				$item_array = array(
      					'huduma' =>	$valued["servicecode"],
      					'ainaHuduma' =>	$valued["ltsname"],
      					'kiasi'	=>	$valued['amount'],
      					'benki'	=>	$valued['bankcode'],
      					'namMalipo'	=>	$valued['accountnumber'],
      					'ltsIdChk' =>	$valued["ltsid"]
      				);

				?>
          <tr>
            <td><?php echo $num; ?></td>
            <td><?php echo $valued["servicecode"]; ?></td>
            <td><?php echo $valued["ltsname"]; ?></td>
            <td>TZS <?php echo number_format($valued["amount"]); ?></td>
            <td><?php echo $valued["bankcode"]; ?></td>
            <td><?php echo $valued["accountnumber"]; ?></td>
          </tr>
          <?php
            $num++;
            $total = $total + $valued["amount"];

			}

			$_SESSION["shopping_cart"][0] = $item_array;

      ?>

      <tr>
        <th colspan="5" class="text-right">Total</th>
        <td align="right">
          TZS <?php echo number_format($total, 2); ?>
          <?php
          echo '<input type="hidden" id="sum" value="'.$total.'">';
          ?>
        </td>
      </tr>
      <?php

		}
        ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- /.card -->
</div>

</div>
<!-- tables data end -->

  <a class="btn btn-success" onclick="
  reuseCN()">
    <span class="fas fa-print"></span>
    Ruhusu kutumia tena Ankara Namba
  </a>
</form>

<div id="rJsonR">&nbsp;</div>
