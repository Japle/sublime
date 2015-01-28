<?php

$xml = '<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>
<payment>
<mode>default</mode>
<method>creditCard</method>
<sender>
<name>VITOR PERAZZA</name>
<email>teste.pagseguro93@gmail.com</email>
<phone>
<areaCode>11</areaCode>
<number>58163692</number>
</phone>
<documents>
<document>
<type>CPF</type>
<value>01234567890</value>
</document>
</documents>
<hash>47ef55952bdcbd6a3e4ce97b129f59396a9b4cbec01be381c023efc78bef8a77</hash>
</sender>
<currency>BRL</currency>
<notificationURL>http://www.testeyorosnet.com.br/ext/modules/payment</notificationURL>
<items>
<item>
<id>15173</id>
<description>MOLETOM GAP MASCULINO ARCH LOGO COD.15173 - Tamanho: M</description>
<amount>149.00</amount>
<quantity>1</quantity>
</item>
<item>
<id>15618</id>
<description>MOLETOM GAP MASCULINO ARCH LOGO COD.15618 - Tamanho: M</description>
<amount>149.00</amount>
<quantity>1</quantity>
</item>
</items>
<reference>153ce8619382f4</reference>
<shipping>
<address>
<street>RUA GREGÓRIO ALLEGRI</street>
<number>40</number>
<complement>
</complement>
<district>VILA DAS BELEZAS</district>
<city>SÃO PAULO</city>
<state>SP</state>
<country>BR</country>
<postalCode>05842070</postalCode>
</address>
<type>3</type>
<cost>14.90</cost>
</shipping>
<creditCard>
<token>ad736ea07c5740cbbd50189c3ab388ea</token>
<installment>
<quantity>1</quantity>
<value>312.9</value>
</installment>
<holder>
<name>VITOR N PERAZZA</name>
<documents>
<document>
<type>CPF</type>
<value>42302712803</value>
</document>
</documents>
<birthDate>19/06/1993</birthDate>
<phone>
<areaCode>11</areaCode>
<number>58163692</number>
</phone>
</holder>
<billingAddress>
<street>RUA GREGÓRIO ALLEGRI</street>
<number>40</number>
<complement>APTO 13</complement>
<district>VILA DAS BELEZAS</district>
<city>SÃO PAULO</city>
<state>SP</state>
<country>BR</country>
<postalCode>05842070</postalCode>
</billingAddress>
</creditCard>
</payment>';

$url_session = 'https://ws.pagseguro.uol.com.br/v2/transactions/?email=japle_noodles@hotmail.com&token=F6AEBAA77FF343A4ACA390E76C335511';
 //$url_session = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/?email=' . MODULE_PAYMENT_PAGSEGURO_EMAIL . '&token=' . MODULE_PAYMENT_PAGSEGURO_TOKEN;
 $curl = curl_init($url_session);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/xml; charset=ISO-8859-1'));
 curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
 $xml= curl_exec($curl);
 var_dump($xml);
 $dados = $xml;
 $dados= simplexml_load_string($dados);
 curl_close($curl);
 $xml= simplexml_load_string($xml);

 ?>
