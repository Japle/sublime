<?php
$url = "https://ws.pagseguro.uol.com.br/v2/checkout/";

$data['email'] = "japle_noodles@hotmail.com";
$data['token'] = "F6AEBAA77FF343A4ACA390E76C335511";
$data['itemId1'] = "Produto 1";
$data['itemDescriotion1'] = "produto1";
$data['itemAmount1'] = "250.00";
$data['itemQuantity1'] = "2";
$data['itemShippingCost1'] = "1.00";
$data['senderEmail'] = "email@emailcliente.com";
$data['senderName'] = "Teste Comprador";
$data['senderCPF'] = "01234567890";
$data['senderBornDate'] = "12/11/1987";
$data['currency'] = "BRL";
$data['reference'] = "numero pedido";
$data['shippingAddressCountry'] = "BRA";
$data['shippingAddressPostalCode'] = "01230000";
$data['shippingAddressState'] = "UF";
$data['shippingAddressCity'] = "São Paulo";
$data['shippingAddressDistrict'] = "Santa Cecília";
$data['shippingAddressStreet'] = "rua";
$data['shippingAddressNumber'] = "123";
$data['shippingAddressComplement'] = "complemento";
$data['shippingCost'] = "10.00";
$data['shippingType'] = "3";
$data['extraAmount'] = "15.00";

var_dump($data);

$data = http_build_query($data);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$xml= curl_exec($curl);
curl_close($curl);

var_dump($xml);

if($xml == 'Unauthorized'){
//Insira seu código de prevenção a erros

header('Location: erro.php?tipo=autenticacao');
exit;//Mantenha essa linha
}
curl_close($curl);

$xml = new SimpleXMLElement($xml);
header('Location: https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);



?>