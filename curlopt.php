<?php
//header("Content-type:text/html");

$fields = array(
	'email' => 'elisson@prismafive.com.br',
	'token' => '079F9D0272BB420992A65BC82CC903C5');

/*$fields = array(
	'email' => 'japle_noodles@hotmail.com',
	'token' => 'D29BDF43177840C89EFA6CFF6C0F7180');*/

$url = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions";

$curl = curl_init($url);
//curl_setopt ($curl, CURLOPT_HTTPHEADER, array('Content-type:application/x-form-urlencoded;ISO-8859-1'));
curl_setopt ($curl, CURLOPT_POSTFIELDS, http_build_query($fields));
curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);
$res = curl_exec ($curl);
var_dump ($res);
curl_close ($curl);

?>
