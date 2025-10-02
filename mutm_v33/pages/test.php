<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	//http://10.100.100.51:8900/message-api/zanmalipo/message/
CURLOPT_URL => 'http://102.223.7.37:8900/message-api/zanmalipo/message/',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'{
"billService": [
{
"accountNumber": "999999",
"amount": 2000,
"bankCode": "PBZ",
"serviceCode": "GFS001",
"serviceName": "Kuchimba Mchanga"
}
],
"createdBy": "232131",
"currency": "TZS",
"email": "whiteali90@gmail.com",
"fullName": "Yahya Suleiman Ali",
"institutionCode": 128,
"payerIdentificationNumber": "3224324324",
"paymentType": "FULL",
"phoneNumber": "0718356055",
"requestDate":"2016-06-08 19:30:40",
"referenceNumber":"1234566",
"totalAmount": 2000
}',
CURLOPT_HTTPHEADER => array(
'content-type: application/json',
'x-zanmalipo-msg-name: CONTROL_NUMBER_REQUEST',
'x-zanmalipo-callback-url: http://192.168.70.38:8860/controlnumberResponse/',
'x-zanmalipo-integrating-code: 6231500450'
),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>