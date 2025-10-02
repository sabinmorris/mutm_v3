<?php
//session_start();
include('../Controller/connect.php');
include("../Controller/configuration.php"); //configuration file
$ltsIdd = $_POST["ltid"];

//find bills service start
$json = file_get_contents($pubIP1 . 'mutm/api/selectlicensetypebyid/'.$ltsIdd); //receive json from url

$arr =  (array)json_decode($json, TRUE); //covert json data into array format

 $value['pricee']= $arr['price'];
 $value['ltypee']= $arr['ltype'];
 
  ?>
  <label for="amount">Kiwango
  <span class="text-danger">*</span>
    </label>
    <input type="text" name="licensetypp" id="licensetypp" value="<?php echo $value['ltypee']; ?>"  class="form-control" readonly required="required" style="border: solid 1px green;">
    <input type="text" name="amountt" id="amountt" value="<?php echo $value['pricee']; ?>"  class="form-control" readonly required="required" style="border: solid 1px green;">
    <?php
    
?>


