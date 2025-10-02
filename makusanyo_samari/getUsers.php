<?php
  include('../Controller/connect.php');
  
  $instituteid = $_POST['instituteid'];
  
  $json = file_get_contents($pubIP.'selectUsersByInstitute/'.$instituteid);//receive json from url
  $arr = json_decode($json, true); //covert json data into array format

?>
<label for="userid">Mkusanyaji
  <span class="text-danger">*</span>
</label>
<select class="form-control" id="userid" name="userid" required="required" style="border: solid 1px green;">
    <option value="" hidden>chagua mkusanyaji</option>
    <?php
      foreach ($arr as $key => $value) {
        echo '<option value="'.$value['userid'].'">'.$value['username'].'</option>';
      }
    ?>
</select>
                       
                         