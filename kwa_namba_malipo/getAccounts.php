<?php
  include('../Controller/connect.php');
  
  $instituteid = $_POST['instituteid'];
  
  include('../Controller/account_controller/selectAccountByInstitute2.php'); //query to select accounts no by institute
  $json = $selectAccountByInstitute; //receive json from url
  $arr = json_decode($json, true); //covert json data into array format

?>
<label for="accid">Namba ya Malipo / Account No.
  <span class="text-danger">*</span>
</label>
<select class="form-control" id="accid" name="accid" required="required" style="border: solid 1px green;" onchange="getCollectionByAccount()">
    <option value="ZOTE">ZOTE</option>
    <?php
      foreach ($arr as $key => $value) {
        echo '<option value="'.$value['accid'].'">'.$value['accnum'].'-'.$value['accname'].'('.$value['bankcode'].')</option>';
      }
    ?>
</select>
                       
                         