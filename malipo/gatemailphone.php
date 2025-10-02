<?php
//session_start();
include('../Controller/connect.php');
include("../Controller/configuration.php"); //configuration file
$fullName = $_GET["fullName"];
$pubIP1 = 'https://zcrlb.zssf.or.tz/mutm/api/getBusinessByName/'.$fullName;
$content = file_get_contents($pubIP1);
        if (strpos($http_response_header[0], "200")) { 
         echo "SUCCESS";
       } 
       else { 
              echo "FAILED";
            }
//$json = file_get_contents($pubIP1."mutm/api/getBusinessByName/".$fullName); //receive json from url
$json =  file_get_contents($pubIP1);
$arr = (array)json_decode($json, TRUE); //covert json data into array format
// //  Initiate curl
// $ch = curl_init();
// // Will return the response, if false it print the response
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// // Set the url
// curl_setopt($ch, CURLOPT_URL,$pubIP1);
// // Execute
// $result=curl_exec($ch);
// // Closing
// curl_close($ch);

// // Will dump a beauty json :3
// $arr = json_decode($result, true);

$value['email'] = $arr['email'];
$value['phonenumber'] = $arr['phonenumber'];
?>

<div class="col-sm-6">
    <div class="form-group">
        <label for="email">Baruapepe:</label>
        <span class="text-danger"></span>
        <input type="email" readonly name="email" id="email" value="<?php echo $value['email']; ?>" class="form-control" style="border: solid 1px green;">
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label for="phoneNumber">Namba ya Simu:</label>
        <span class="text-danger">*</span>
        <input type="tel" readonly name="phoneNumber" id="phoneNumber" value="<?php echo $value['phonenumber']; ?>" class="form-control" pattern="[1-9]{1}[0-9]{8}" placeholder="eg: 773217012" minlength="9" maxlength="9" title="Phone number should not start with 0 and remaing 8 digits with 0-9" style="border: solid 1px green;">
    </div>
</div>