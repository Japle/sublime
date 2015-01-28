<?php

// =================== ENVIA OS DADOS DO COPRADOR E COMPRA
		
		/*$credenciais['email'] = "japle_noodles@hotmail.com";
		$credenciais['token'] = "F6AEBAA77FF343A4ACA390E76C335511";*/
		$credenciais['paymentMode'] = "default";
		$credenciais['paymentMethod'] = "creditCard";
		$credenciais['receiverEmail'] = "japle_noodles@hotmail.com";
		$credenciais['currency'] = "BRL";
		$credenciais['extraAmount'] = "1.00";
		$credenciais['itemId1'] = "0001";
		$credenciais['itemDescription1'] = "Notebook Prata";
		$credenciais['itemAmount1'] = "1.00";
		$credenciais['itemQuantity1'] = "1";
		$credenciais['notificationURL'] = "https://sualoja.com.br/notifica.html";
		$credenciais['reference'] = "REF1234";
		$credenciais['senderName'] = "Jose Comprador";
		$credenciais['senderCPF'] = "22111944785";
		$credenciais['senderAreaCode'] = "11";
		$credenciais['senderPhone'] = "56273440";
		$credenciais['senderEmail'] = "comprador@uol.com.br";
		$credenciais['senderHash'] = "2751ae0dfff253a78f5761fc304807a2e1d9549112c1a4abf602b8089e94262c";
		$credenciais['shippingAddressStreet'] = "Av. Brig. Faria Lima";
		$credenciais['shippingAddressNumber'] = "1384";
		$credenciais['shippingAddressComplement'] = "5o andar";
		$credenciais['shippingAddressDistrict'] = "Jardim Paulistano";
		$credenciais['shippingAddressPostalCode'] = "01452002";
		$credenciais['shippingAddressCity'] = "Sao Paulo";
		$credenciais['shippingAddressState'] = "SP";
		$credenciais['shippingAddressCountry'] = "BRA";
		$credenciais['shippingType'] = "1";
		$credenciais['shippingCost'] = "1.00";
		$credenciais['creditCardToken'] = "4b6d721e015d49c9b73bbcc71da9d1ae"; // aqui ta o token pego por get
		$credenciais['installmentQuantity'] = "1";
		$credenciais['installmentValue'] = "0.00";
		$credenciais['creditCardHolderName'] = "Teste PagSeguro";
		$credenciais['creditCardHolderCPF'] = "01234567890";
		$credenciais['creditCardHolderBirthDate'] = "19/06/1993";
		$credenciais['creditCardHolderAreaCode'] = "11";
		$credenciais['creditCardHolderPhone'] = "50505050";
		$credenciais['billingAddressStreet'] = "Av. Brig. Faria Lima";
		$credenciais['billingAddressNumber'] = "1384";
		$credenciais['billingAddressComplement'] = "5o andar";
		$credenciais['billingAddressDistrict'] = "Jardim Paulistano";
		$credenciais['billingAddressPostalCode'] = "01452002";
		$credenciais['billingAddressCity'] = "Sao Paulo";
		$credenciais['billingAddressState'] = "SP";
		$credenciais['billingAddressCountry'] = "BRA";
		//var_dump($credenciais);
//
		$url = 'https://ws.pagseguro.uol.com.br/v2/transactions/?email=japle_noodles@hotmail.com&token=F6AEBAA77FF343A4ACA390E76C335511';
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $credenciais);
		$output = curl_exec($curl);
		var_dump($output);
		$credenciais = $output;
		$credenciais = simplexml_load_string($credenciais);
		curl_close($curl);
		$xml= simplexml_load_string($xml);
?>