<?php
  session_start();//start session
  include('../Controller/connect.php');
  
  $instituteid = $_POST['instituteid'];
  
  $json = file_get_contents($pubIP.'selectUsersByInstitute/'.$instituteid.'?email='. $_SESSION['username'].'&token='.$_SESSION['logintoken']);//receive json from url
  $arr = json_decode($json, true); //covert json data into array format

?>
<label for="userid">Mkusanyaji
  <span class="text-danger">*</span>
</label>
<select class="form-control select2" id="useridn" name="useridn" required="required" style="border: solid 1px green;" onchange="getCollectionByCollector()">
  <option value="">Chagua Mkusanyaji</option>
  <?php
    foreach ($arr as $key => $value) {
      if ($value['urole'] == 'Mkusanyaji' || $value['urole'] == 'Afisa mapato') {
        // echo '<option value="'.$value['userid'].'">'.$value['username'].'</option>';
        echo '<option value="'.$value['userid'].'">'.$value['firstname'].' '.$value['middlename'].' '. $value['lastname'].' - '.$value['username'].'</option>';
      }
      
    }
  ?>
  <option value="WOTE">WOTE</option>
</select>
                       
                         