<?php
  session_start();
  include('../Controller/connect.php');
  
  $chk = $_POST['chk'];
  $searchId = $_POST['searchId'];

  if ($chk == 'byInstituteId') {

    $json = file_get_contents($pubIP.'selectLittlesourceByInstitute/'.$searchId); //receive json from url

    $arr = json_decode($json, true); //covert json data into array format
    
    include('haliVyanzoList.php');
 
  }elseif ($chk == 'byMainSource') {

    $instituteid = $_POST['instituteid'];

    if ($searchId == 'z') {
      $json = file_get_contents($pubIP.'selectLittlesourceByInstitute/'.$instituteid); //receive json from url
      
    }else{
      $json = file_get_contents($pubIP.'selectLittlesourceByInstitute/'.$instituteid); //receive json from url
    }

    $arr = json_decode($json, true); //covert json data into array format

    include('haliVyanzoList.php');

  }elseif ($chk == 'byMiddleSource') {

    $instituteid = $_POST['instituteid'];
    $msid = $_POST['msid'];
    $searchId = $_POST['searchId'];

    if ($searchId == 'z') {

      if ($msid == 'z') {
        $json = file_get_contents($pubIP.'selectLittlesourceByInstitute/'.$instituteid); //receive json from url
      }else{
        $json = file_get_contents($pubIP.'selectLittlesourceByInstitute/'.$msid); //receive json from url
      }
      
      
    }else{
      $json = file_get_contents($pubIP.'selectLittlesourceByMiddlesource/'.$searchId); //receive json from url
    }

    $arr = json_decode($json, true); //covert json data into array format

    include('haliVyanzoList.php');

  }

?>