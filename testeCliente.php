<?php

$email ="japle_noodles@hotmail.com";
$token = "D29BDF43177840C89EFA6CFF6C0F7180";
    
        $vars['paymentMode'] = 'default';
        $vars['paymentMethod'] = 'creditCard';
        $vars['receiverEmail'] = 'samuel@xneo.com.br';
        $vars['currency'] = 'BRL'; 
        $vars['extraAmount'] = '0.00';
        $vars['itemId1'] = '0001'; 
        $vars['itemDescription1'] = 'Notebook Prata';
        $vars['itemAmount1'] = '100.00'; 
        $vars['itemQuantity1'] = '1';
        $vars['notificationURL'] = 'https://www.casadofusca.com.br/temp/log.php';
        $vars['reference'] = 'REF1234';
        $vars['senderName'] = 'Jose Comprador';
        $vars['senderCPF'] = '22111944785';
        $vars['senderAreaCode'] = '11';
        $vars['senderPhone'] = '56273440';
        $vars['senderEmail'] = 'c73564327128590537288@sandbox.pagseguro.com.br';
        $vars['senderHash'] = '95daeab0ddcb31157f50d2557247aa5730e742e6fa32dae1aca57d0f3e02a3e7';
        $vars['shippingAddressStreet'] = 'Av. Brig. Faria Lima';
        $vars['shippingAddressNumber'] = '1384';
        $vars['shippingAddressComplement'] = '5o andar';
        $vars['shippingAddressDistrict'] = 'Jardim Paulistano';
        $vars['shippingAddressPostalCode'] = '01452002';
        $vars['shippingAddressCity'] = 'Sao Paulo';
        $vars['shippingAddressState'] = 'SP';
        $vars['shippingAddressCountry'] = 'BRA';
        $vars['shippingType'] = '1';
        $vars['shippingCost'] = '1.00';
        $vars['creditCardToken'] = '57e71c96b8484d298f82899f97c9e4c7';
        $vars['installmentQuantity'] = '1';
        $vars['installmentValue'] = '100.00';
        $vars['creditCardHolderName'] = 'Jose Comprador';
        $vars['creditCardHolderCPF'] = '22111944785';
        $vars['creditCardHolderBirthDate'] = '27/10/1987';
        $vars['creditCardHolderAreaCode'] = '11';
        $vars['creditCardHolderPhone'] = '56273440';
        $vars['billingAddressStreet'] = 'Av. Brig. Faria Lima';
        $vars['billingAddressNumber'] = '1384';
        $vars['billingAddressComplement'] = '5o andar';
        $vars['billingAddressDistrict'] = 'Jardim Paulistano';
        $vars['billingAddressPostalCode'] = '01452002';
        $vars['billingAddressCity'] = 'Sao Paulo';
        $vars['billingAddressState'] = 'SP';
        $vars['billingAddressCountry'] = 'BRA';

        var_dump($vars);
        
        $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/?email=".$email ."&token=" .$token;

        $vars = http_build_query($vars);
        
        $sessao_curl = curl_init($url);           
        
        
        curl_setopt($sessao_curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($sessao_curl, CURLOPT_TIMEOUT, 40);
        curl_setopt($sessao_curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($sessao_curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($sessao_curl, CURLOPT_POSTFIELDS, $vars);
        echo $url;
        $resultado = curl_exec($sessao_curl);
        curl_close($sessao_curl);
        
        $vars = simplexml_load_string($resultado);

        var_dump($vars);
        
?>