<?php
$email = "financeiro@guicheweb.com.br";
$token = "D193CD83E4BE43F7A33E3D652FE072EE";

$url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/?email=".$email."&token=".$token;

$xml = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" standalone=\"yes\"?><payment>
		<mode>default</mode>
		<method>credit_card</method>
		<reference>$id_venda</reference>
		<receiver>
			<email>$email</email>
		</receiver>
		<sender>
			<name>Livia Dionizio</name>
			<email>liviap_5@yahoo.com.br</email>
			<phone>
				<areaCode>17</areaCode>
				<number>981452144</number>
			</phone>
			<documents>
				<document>
					<type>CPF</type>
					<value>40236258842</value>
				</document>
			</documents>
			<!--
			<hash>d5f881a700849e2b5817dd4e5bfb1e518a96cd7e54171b6d5d55fbae53bf01f2</hash>
			-->
		</sender>
		<currency>BRL</currency>
		<notificationURL>http://www.guicheweb.com.br/compra/retornops.php</notificationURL>
		<items>
			<item>
				<id>1</id>
				<description>Ingresso 1</description>
				<quantity>2</quantity>
				<amount>1.00</amount>
			</item>
		</items>
		<!--
			Informações sobre pagamento em débito (eft) ou boleto
		-->		
		<bank>
			<name>bradesco</name>
		</bank>
		<!--
			Informações sobre pagamento em cartão de crédito
		-->
		<creditCard>
			<token>dc251dc26d99463792b69f661df649bc</token>
			<installment>
				<quantity>1</quantity>
				<value>5.50</value>
			</installment>
			<holder>
				<name>Nome impresso no cartão</name>
				<birthDate>13/02/1992</birthDate>
				<phone>
					<areaCode>17</areaCode>
					<number>981452144</number>
				</phone>
				<documents>
					<document>
						<type>CPF</type>
						<value>40236258842</value>
					</document>
				</documents>
			</holder>
			<billingAddress>
				<street>R. Itacolomi</street>
				<number>3699</number>
				<complement></complement>
				<district>Vila Marin</district>
				<city>Votuporanga</city>
				<state>SP</state>
				<country>BRA</country>
				<postalCode>15500467</postalCode>
			</billingAddress>
		</creditCard>
	</payment>";
	//var_dump($xml);
	
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, Array("Content-Type: application/xml; charset=UTF-8"));
	curl_setopt($curl, CURLOPT_POSTFIELDS,$xml);
	$xml_retorno = curl_exec($curl);
	curl_close($curl);
	//echo $xml_retorno;
	$xml_retorno = simplexml_load_string($xml_retorno);
	
	print_r($xml_retorno);
	
	
?>