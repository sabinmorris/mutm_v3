<?php
	session_start();
	unset($_SESSION["shopping_cart"]);
	include('../Controller/connect.php');
	include ("../Controller/configuration.php"); //configuration file
	$refn = $_POST['refn'];


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

<form id="cnNoForm">

<div class="row">
	<div class="col-sm-12">
	    <div class="form-group">
	        <label for="fullName">Kumbukumbu  Namba:
	          <span class="text-danger">*</span>
	        </label>
	        <input type="text" class="form-control" placeholder="Kumbukumbu namba" id="referencenumber" name="referencenumber" value="<?php echo $referencenumber; ?>" readonly="readonly" required="required" style="border: solid 1px green;">
	    </div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
	    <div class="form-group">
        <label for="fullName">Jina la mlipaji <span class="small">(Mtu binafsi/Kampuni/Shirika/nk)</span>:
          <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" placeholder="Ingiza jina la mlipaji" id="fullName" name="fullName" value="<?php echo $fullname; ?>" readonly="readonly" required="required" style="border: solid 1px green;">
	    </div>
	</div>
	<div class="col-sm-6">
	  <div class="form-group">
	    <label for="email">Baruapepe:</label>
	    <span class="text-danger"></span>
	    <input type="email" name="email" id="email" value="<?php echo $email; ?>" class="form-control" placeholder="Ingiza baruapepe" style="border: solid 1px green;">
	  </div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
	  <div class="form-group">
	    <label for="payerIdentificationNumber">Namba ya Kitambulisho:</label>
	    <span class="text-danger">*</span>
	    <input type="text" name="payerIdentificationNumber" id="payerIdentificationNumber" value="<?php echo $pin; ?>" class="form-control" placeholder="Ingiza kitambulisho cha mlipaji" style="border: solid 1px green;" required="required">
	  </div>
	</div>
	<div class="col-sm-6">
	    <div class="form-group">
	      <label for="phoneNumber">Namba ya Simu:</label>
	      <span class="text-danger">*</span>
	      <input type="tel" name="phoneNumber" id="phoneNumber" value="<?php echo $phonenumber; ?>" class="form-control" pattern="[255]{3}[0-9]{9}" placeholder="eg: 255773217012" minlength="12" maxlength="12" title="Phone number should start with 255 and remaing 9 digit with 0-9" style="border: solid 1px green;" required="required">
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
    <div class="card-body table-responsive p-0" id="printBills">
      <table class="table table-striped table-valign-middle" id="malipoTable">
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
        <tbody id="mm">
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
                echo '<input type="hidden" id="sum" value="'.$total.'">';
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
  resendCN()">
    <span class="fas fa-print"></span>
    Rejea Kuomba Ankara Namba
  </a>
</form>

<div id="rJson">&nbsp;</div>
