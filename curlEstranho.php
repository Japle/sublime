<?php

$credenciais['email'] ="japle_noodles@hotmail.com";
$credenciais['token'] = "D29BDF43177840C89EFA6CFF6C0F7180";


$curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions');
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($credenciais));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
      $result = trim(curl_exec($curl));
      var_dump($result);
      curl_close($curl);


     /*$dados = array("email"=>japle_noodles@hotmail.com, "token"=>D29BDF43177840C89EFA6CFF6C0F7180);
        $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions";
        //inicia o CURL
        $ch = curl_init();
        //seta os parametros
        curl_setopt($ch, CURLOPT_URL, $url);        
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $ch_result = curl_exec($ch);
        curl_close($ch);*/

?>