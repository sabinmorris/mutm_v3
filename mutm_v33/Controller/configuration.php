<?php
include "../Controller/ApiResponse.php";

// include "../../models/UserLog.php";
function getServer(){
    //$serverName = "http://localhost/ocgs-api";
    include('../Controller/connect.php');
    $serverName = $ipConnect;
    return $serverName;
}

//fetch result from database table
// function getData($api_url, $myuser, $mypass){
function getData($api_url){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$api_url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json'));
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // curl_setopt($ch, CURLOPT_USERPWD, "$myuser:$mypass");
    $data = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $api = new ApiResponse();
    $api->http_code = $http_code;
    $api->data = $data;
    $api->data_err = $err;
    curl_close($ch);
    return $api;

}

//send date into database table
// function postData($api_url,$myJSON, $myuser, $mypass){
function postData($api_url,$myJSON){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$api_url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json'));
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // curl_setopt($ch, CURLOPT_USERPWD, "$myuser:$mypass");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $myJSON);
    $data = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    $api = new ApiResponse();
    // $response3lg = curl_exec($curl3lg);
    $api->http_code = $http_code;
    $api->data = $data;
    $api->data_err = $err;

    curl_close($ch);
    return $api;
}

// function postData($api_url,$myJSON){

// $curl = curl_init();

//     curl_setopt_array($curl, array(
//       CURLOPT_URL => $api_url,
//       CURLOPT_RETURNTRANSFER => true,
//       CURLOPT_ENCODING => '',
//       CURLOPT_MAXREDIRS => 10,
//       CURLOPT_TIMEOUT => 0,
//       CURLOPT_FOLLOWLOCATION => true,
//       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//       CURLOPT_CUSTOMREQUEST => 'POST',
//       CURLOPT_POSTFIELDS =>$myJSON,
//       CURLOPT_HTTPHEADER => array(
//         'content-type: application/json'
//       ),
//     ));

//     $response = curl_exec($curl);

//     curl_close($curl);
//     echo $response;

// }


//update data into database
// function updateData($api_url,$myJSON,$myuser,$mypass){
function updateData($api_url,$myJSON){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$api_url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json'));
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // curl_setopt($ch, CURLOPT_USERPWD, "$myuser:$mypass");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $myJSON);
    $data = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    $api = new ApiResponse();
    $api->http_code = $http_code;
    $api->data = $data;
    $api->data_err = $err;
    curl_close($ch);
    return $api;
}


function user_activity_log($log_msg, $myuser, $mypass, $api_url){

    $user_log = new UserLog();
    $user_log->user = $myuser;
    $user_log->action = $log_msg;

    $myJSON = json_encode($user_log);

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$api_url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json'));
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$myuser:$mypass");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $myJSON);
    $data = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $api = new ApiResponse();
    $api->http_code = $http_code;
    $api->data = $data;
    curl_close($ch);
    return $api;
    
}

?>
