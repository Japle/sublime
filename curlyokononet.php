<?php

/*$url_session = 'https://ws.pagseguro.uol.com.br/v2/transactions/?email=' . MODULE_PAYMENT_PAGSEGURO_EMAIL . '&token=' . MODULE_PAYMENT_PAGSEGURO_TOKEN;
 //$url_session = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/?email=' . MODULE_PAYMENT_PAGSEGURO_EMAIL . '&token=' . MODULE_PAYMENT_PAGSEGURO_TOKEN;
 $curl = curl_init($url_session);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/xml; charset=ISO-8859-1'));
 curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
 $xml= curl_exec($curl);
 curl_close($curl);
 $xml= simplexml_load_string($xml);*/
 


$notificationCode = "F701DF-90BAA9BAA951-1444327F8B31-FB5E41";
 $notificationType = "transaction";
// tep_db_query("insert into t_log_teste (log, data_log) values ('".$notificationCode.'*****'.$notificationType."', '" . date("Y-m-d H(idea)(worry)") . "')");
 
 $url_session = 'https://ws.pagseguro.uol.com.br/v2/transactions/notifications/'.$notificationCode.'?email=fabio_de_benedetto@hotmail.com&token=CDF109E1703D40D494C7D1F540A53B35';
 //$url_session = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/'.$notificationCode.'?email=' . MODULE_PAYMENT_PAGSEGURO_EMAIL . '&token=' . MODULE_PAYMENT_PAGSEGURO_TOKEN;
 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, $url_session);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_HEADER, false);
 $xml= trim(curl_exec($curl));
 curl_close($curl);
 var_dump($xml);
 //tep_db_query("insert into t_log_teste (log, data_log) values ('".$xml."', '" . date("Y-m-d H(idea)(worry)") . "')");
 $xml= simplexml_load_string($xml);



 ?>