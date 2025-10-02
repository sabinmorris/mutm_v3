<?php
  include('../Controller/connect.php');
  
  $instituteid = $_POST['instituteid'];
  
  $json = file_get_contents($pubIP.'selectZoneByInstitute/'.$instituteid); //receive json from url
  $arr = json_decode($json, true); //covert json data into array format

?>
<label for="zoneidd">Zoni
  <span class="text-danger">*</span>
</label>
<select class="form-control" id="zoneidd" name="zoneidd" required="required" style="border: solid 1px green;" onchange="getCollectionByZone()">
    <option value="" hidden>Chagua zoni</option>
    <?php
      foreach ($arr as $key => $value) {
        echo '<option value="'.$value['zoneid'].'">'.$value['zonename'].'</option>';
      }
    ?>
    <option value="ZOTE">ZOTE</option>
</select>
                       
                         