<?php
  include('../Controller/connect.php');
  
  $instituteid = $_POST['instituteid'];

  $json = file_get_contents($pubIP.'selectMainsourceByInstitute/'.$instituteid); //receive json from url
  $arr = json_decode($json, true); //covert json data into array format

?>
<label for="msid">Vyanzo Vikuu
  <span class="text-danger">*</span>
</label>
<select class="form-control select2" id="msid" name="msid" required="required" style="border: solid 1px green;" onchange="showChanzoKidogo()">
  <option value="" hidden>chagua Chanzo kikuu</option>
  <?php
    foreach ($arr as $key => $value) {
      echo '<option value="'.$value['msid'].'">'.$value['msname'].'</option>';
    }
  ?>
</select>
                       
                         