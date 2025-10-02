<?php
  session_start();
  include('../Controller/connect.php');
  
  $chk = $_POST['chk'];
  $searchId = $_POST['searchId'];

  if ($chk == 'byInstituteId') {

    if ($searchId == 'z') {
      $json = file_get_contents($pubIP.'selectAllMiddlesource/'); //receive json from url
    }else{
      $json = file_get_contents($pubIP.'selectMiddlesourceByInstitute/'.$searchId); //receive json from url
    }

    $arr = json_decode($json, true); //covert json data into array format

    include('haliKatiList.php');

  }elseif ($chk == 'byMainSource') {

    $instituteid = $_POST['instituteid'];

    if ($searchId == 'z') {
      if ($instituteid == 'z') {
        $json = file_get_contents($pubIP.'selectAllMiddlesource/'); //receive json from url
      }else{
        $json = file_get_contents($pubIP.'selectMiddlesourceByInstitute/'.$instituteid); //receive json from url
      }
      
    }else{
      $json = file_get_contents($pubIP.'selectMiddlesourceByMainsource/'.$searchId); //receive json from url
    }

    $arr = json_decode($json, true); //covert json data into array format

    include('haliKatiList.php');

  }
  
?>