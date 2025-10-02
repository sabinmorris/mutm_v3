<?php
  include('../Controller/connect.php');
  
  $msid = $_POST['msid'];
  $json = file_get_contents($pubIP.'selectMiddlesourceByMainsource/'.$msid); //receive json from url
  $arr = json_decode($json, true); //covert json data into array format

?>
<label for="mdsid">Vyanzo Vidogo:</label>
<select class="form-control select2" id="mdsid" name="mdsid" required="required" style="border: solid 1px green;" onchange="getCollectionByChanzoKidogo()">
    <option value="" hidden>chagua chanzo kidogo</option>
    <?php
      foreach ($arr as $key => $value) {
        echo '<option value="'.$value['mdsid'].'">'.$value['mdsname'].'</option>';
      }
    ?>
    <option value="VYOTE">VYOTE</option>
</select>
                       
                         