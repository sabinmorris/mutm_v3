<?php
  session_start();
  include('../Controller/connect.php');
  
  $userRole = $_POST['userRole'];
  
  if ($_SESSION['insttype'] != 'WIZARA') {
    $json = file_get_contents($pubIP.'selectInstitutionById/'.$_SESSION['instituteid']); //receive json from url
  }else{
      $json = file_get_contents($pubIP.'selectInstitutionInfo'); //receive json from url
  }

  $arr = json_decode($json, true); //covert json data into array format

?>
<label for="instituteidus">Taasisi
    <span class="text-danger">*</span>
</label>
<select class="form-control" id="instituteidus" name="instituteidus" required="required" style="border: solid 1px green;" onchange="showZonesByIstitute()">
    <option hidden="">chagua taasisi</option>
    <?php
    foreach ($arr as $key => $value) {

      if ($userRole == 'Msimamizi mkuu' || $userRole == 'Muangalizi mkuu') {

        if ($value['insttype'] == 'WIZARA') {
          echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
        }

      }else{
        // if ($value['insttype'] != 'WIZARA') {
          echo '<option value="'.$value['instituteid'].'">'.$value['instname'].'</option>';
        // }
      }
      
    }
  ?>
</select>
                       
                         