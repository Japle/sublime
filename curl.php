<?php

$credenciais['email'] ="cassiano@x-neo.com.br";
$credenciais['token'] = "C8088B81DF664F329EE63CFB65CFC7B1";
$url = "https://ws.pagseguro.uol.com.br/v2/sessions";

$sessao_curl = curl_init($url);
curl_setopt($sessao_curl, CURLOPT_FAILONERROR, true);
curl_setopt($sessao_curl, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($sessao_curl, CURLOPT_TIMEOUT, 40);
curl_setopt($sessao_curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($sessao_curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($sessao_curl, CURLOPT_POSTFIELDS, http_build_query($credenciais));
$resultado = curl_exec($sessao_curl);
curl_close($sessao_curl);

var_dump($resultado);

?>