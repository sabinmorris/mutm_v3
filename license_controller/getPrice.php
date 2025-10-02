<?php
//session_start();
include('../Controller/connect.php');
include("../Controller/configuration.php"); //configuration file
$ltsId = $_POST["ltid"];

//find bills service start
$my_url = urlencode($pubIP1);
$json = file_get_contents($my_url . 'mutm/api/selectlicensetypebyid/'.$ltsId); //receive json from url

$arr =  (array)json_decode($json, TRUE); //covert json data into array format

 $value['price']= $arr['price'];
 $value['ltype']= $arr['ltype'];
 
  ?>
  <label for="amount">Kiwango
  <span class="text-danger">*</span>
    </label>
    <input type="hidden" name="ltype" value="<?php echo $value['ltype']; ?>" id="ltype" class="form-control" readonly required="required" style="border: solid 1px green;">
    <input type="text" name="amount" value="<?php echo $value['price']; ?>" id="amount" class="form-control" readonly required="required" style="border: solid 1px green;">
    <?php
    
?>


