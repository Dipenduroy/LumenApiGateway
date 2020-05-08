<?php
$username='service_username';
$password='pass@1234';
$ch = curl_init($host);

curl_setopt_array($ch, array(
  CURLOPT_URL => "http://local.userpreferences/api/userpreferences?id=1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic c2VydmljZV91c2VybmFtZTpwYXNzQDEyMzQ="
  ),
));

$ch = curl_init($host);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml', $additionalHeaders));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payloadName);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
echo $return = curl_exec($ch);
curl_close($ch);