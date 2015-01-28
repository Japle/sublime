<?php
$url = "https://ws.pagseguro.uol.com.br/v2/sessions";
$credenciais['email'] = "japle_noodles@hotmail.com";
$credenciais['token'] = "F6AEBAA77FF343A4ACA390E76C335511";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($credenciais));
$output = curl_exec($curl);
//echo $output;
curl_close($curl);
$xml = (string)simplexml_load_string($output) -> id;
echo "1-" .$xml;
?>