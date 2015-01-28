<?php

$postFields = array( 
   "email" => "japle_noodles@hotmail.com", 
   "token" => "D29BDF43177840C89EFA6CFF6C0F7180",
   "currency" => "BRL", 
   "itemId1" => "66",
   "itemDescription1" => "LS Studio â€“ ParaÃ­so: cauterizaÃ§Ã£o LOrÃ©al ou KÃ©rastase de R$ 232 por R$ 49",
   "itemAmount1" => "49.90",
   "itemQuantity1" => "1",
   "reference" => "go-209-1-aech",
   "redirectURL" => "http://desarrollo.maspretty.com/order/pagseguro/return.php"
);

// $contentLength = "Content-length: " . strlen(http_build_query($postFields));
$charset = 'ISO-8859-1';
$url = "https://ws.pagseguro.uol.com.br/v2/checkout/";


$options = array(
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/x-www-form-urlencoded; charset=" . $charset
        ),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CONNECTTIMEOUT => 20,
        CURLOPT_POST => false,
        CURLOPT_POSTFIELDS => http_build_query($postFields),
);


$curl = curl_init();
curl_setopt_array($curl, $options);

$retorno = curl_exec ($curl);
curl_close ($curl);

echo $url . "<br/>";
echo $retorno;

?>
