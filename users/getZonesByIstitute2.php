<?php
  include('../Controller/connect.php');
  
  $instituteid = $_POST['instituteid'];
  $json = file_get_contents($pubIP.'selectZoneByInstitute/'.$instituteid); //receive json from url
  $arr = json_decode($json, true); //covert json data into array format

?>
<label for="zoneidu">Zoni
    <span class="text-danger">*</span>
</label>
<select class="form-control" id="zoneidu" name="zoneidu" required="required" style="border: solid 1px green;">
    <option hidden="">chagua zoni</option>
    <?php
    foreach ($arr as $key => $value) {
      echo '<option value="'.$value['zoneid'].'">'.$value['zonename'].'</option>';
    }
  ?>
</select>
                       
                         