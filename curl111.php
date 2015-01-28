<?php
/*$data['email']="cmdcapalmital@bol.com.br";
$data['token']="32764AB577BB45FCA229D96C3126E706";*/

$data['email']="japle_noodles@hotmail.com";
$data['token']="D29BDF43177840C89EFA6CFF6C0F7180";
 
$curl = curl_init();
 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($curl, CURLOPT_HTTPHEADER, false);
curl_setopt($curl, CURLOPT_URL, 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$resp = curl_exec($curl);
var_dump($resp);
curl_close($curl);

?>
