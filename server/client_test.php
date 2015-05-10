<?php

$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL, 'http://nhannguyen.local:8080/example_api/test');
// curl_setopt($curl_handle, CURLOPT_URL, 'http://api.thanhtrucco.com/example_api/test');
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($curl_handle, CURLOPT_HTTPGET, 1);
curl_setopt($curl_handle, CURLOPT_POST, 1);
curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array('name' => 'Nhan Nguyen', 'email' => 'nguyenanhnhan@email.com'));
$buffer = curl_exec($curl_handle);

if(!curl_errno($curl_handle))
{
 $info = curl_getinfo($curl_handle);

 echo 'content_type: '.$info['content_type']."\r\n";
 echo 'http_code: '.$info['http_code']."\r\n";
 echo 'connect_time: '.$info['connect_time']."\r\n";
}

curl_close($curl_handle);

// $result = json_decode($buffer);
$result = $buffer;

print_r($result."\r\n");

?>