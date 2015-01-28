<?php
	header ('Content-type: text/html; charset= utf-8');
	$credenciais['email'] ="japle_noodles@hotmail.com";
	$credenciais['token'] = "F6AEBAA77FF343A4ACA390E76C335511";
	//$credenciais['token'] = "D29BDF43177840C89EFA6CFF6C0F7180";
	//$url = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions";
	$url = "https://ws.pagseguro.uol.com.br/v2/sessions";

	$curl = curl_init($url);
	curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($credenciais));
	$retorno = curl_exec ($curl);
	curl_close ($curl);

	
	$session = (string)simplexml_load_string($retorno) -> id;
	
	
	
?>
<html>
<head>
	<title> Checkout Transparente </title>
	
</head>
<body>
	<h1 align="center"><b>Checkout Transparente<b></h1><hr>
	<p>Session:<input type ="text" name="session" value="<?php echo $session; ?>" size="40" disabled></p><hr>
	<p>SenderHash:<input type ="text" id="senderHash" size="80" disabled><button id="getSenderHash">getSenderHash</button></p><hr>
	<h2 align ="center">Cartão de Crédito</h2>
	<p>Cartão:<input type ="text" id ="creditCard" maxlength = "16" ><input type="hidden" id="brand" disabled ></p>
	<p>CVV:<input type="text" id="cvv" size="3" maxlength = "3"></p>
	<p>Vencimento do Cartão:<input type="text" id="month" size="2" maxlength = "2"><input type="text" id="year" size="4" maxlength = "4"><button id="createCardToken">createCardToken</button></p>
	<p>Token do Cartão:<input type="hidden" id="tokenCard" size="40" disabled ></p><hr>
	<h2 align ="center"> Valor e Parcelas</h2>
	<p>Valor: <input type ="text" id ="amounts"><button id ="installments">getInstallments</button> </p>
	<p id="installmentList"></p>
	<p id="teste"></p>
	<button onclick="getCreditCardToken('4111111111111111', 'visa', '123', '12', '2030');">Ver token</button>

</body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
	<script type="text/javascript">

		PagSeguroDirectPayment.setSessionId('<?php echo $session; ?>'); 

		$("#getSenderHash").click(function(){
			var senderHash = PagSeguroDirectPayment.getSenderHash();
			console.log(senderHash);
			$("input#senderHash").val(senderHash);
		})



		$("#creditCard").keyup(function(){
			if($("#creditCard").val().length == 6){
				PagSeguroDirectPayment.getBrand({
					cardBin: $("#creditCard").val().substring(0,6),
					success: function(response) { 
						console.log(response);
						var brand = response['brand']['name'];
						$("#brand").val(brand);
						$("#brand").attr('type','text');
						 
					},
					error: function(response) {
						console.log(response);
					}
				});

			}
		})



		$("#createCardToken").click(function(){
			var param = { 
			cardNumber: $("input#creditCard").val(), 
			cvv: $("input#cvv").val(), 
			expirationMonth: $("input#month").val(), 
			expirationYear: $("input#year").val(),
			 success: function(response) { 
			 	console.log(response);
			 	var param = response['card']['token'];
			 	$("#tokenCard").val(param);
				$("#tokenCard").attr('type','text');
				},
				error: function(response) { 
					console.log(response);
				}
			}
			PagSeguroDirectPayment.createCardToken(param);
		})



		$("#installments").click(function(){
			var brand = $("input#brand").val();
			//PagSeguroDirectPayment.getInstallments({amount: 1000.00, complete: function(m) { console.log(m); } });
			
			
			PagSeguroDirectPayment.getInstallments({			
				amount: $("input#amounts").val(),
				brand: brand,
					success: function(response){
						console.log(response);
						var installments = response['installments'][brand];
						installmentListMount(installments);
					},
					error: function(response){
						console.log(response);
					},
			});
			
		})

		function installmentListMount(installments){
			var  select = "<select>";
			$.each(installments,function(key,value){
				console.log(value['quantity'] + "x de " + value['installmentAmount'].toFixed(2) + " - Total de " + value['totalAmount'].toFixed(2));
				 select += "<option value = "+ value['quantity']+">"+value['quantity'] + "x de " + value['installmentAmount'].toFixed(2) + " - Total de " + value['totalAmount'].toFixed(2)+"</option>";

			});
			select += "</select>";
			$("#installmentList").html("Parcelamento: " + select);

			 valorSelecionado();

		}
		function valorSelecionado(){
	   		$('select').change(function() {
	     	var selecionado = $("option:selected", this).val();
	    	$("#teste").html('Numero de parcelas: ' + selecionado);
	     });
  		}

  		function getCreditCardToken(cardNumber, brand, cvv, exMonth, exYear) {
                   PagSeguroDirectPayment.createCardToken({
                            cardNumber: cardNumber,
                            brand: brand,
                            cvv: cvv,
                            expirationMonth: exMonth,
                            expirationYear: exYear,
                            success: function(response){
                                      console.log('Token: ' + response['card']['token']);
                            },
                            error: function(response){
                                      console.log(response);  
                            }
 
                   });
         }

	</script>
</html>

