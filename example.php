<?php
	//Iniciando a sessão. Você pode criar um serviço que retorne este valor.
	$url = "https://ws.pagseguro.uol.com.br/v2/sessions";
	$credenciais = array(
			"email" => "marcelokinho@gmail.com",
			"token" => "C475C83B3C094AAAA83E047D56190F77"
	);

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($credenciais));
	$resultado = curl_exec($curl);
	curl_close($curl);
	$session = simplexml_load_string($resultado)->id;
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Exemplo</title>
	<script type="text/javascript"></script>
</head>
<body>
	<h1>Exemplo</h1><hr>
	<h2>Obtendo os dados do cartão de crédito</h3>
	<!--
	<p>Seu cartão é emitido fora do Brasil <input type="checkbox" name="isInternational" id="isInternational"> Sim</p>
	-->
	<p>
		Número do cartão: <input type="text" id="creditCardNumber" class="creditcard" name="creditCardNumber"></input>
		Bandeira: <input type="text" id="creditCardBrand" class="creditcard" name="creditCardBrand" disabled></input>
	</p>
	<p>
		Validade: Mês (mm) <input type="text" id="creditCardExpMonth" class="creditcard" name="creditCardExpMonth" size="2"></input> &nbsp;
		Ano (yyyy) <input type="text" id="creditCardExpYear" class="creditcard" name="creditCardExpYear" size="4"></input>
	</p>
	<p>
		CVV: <input type="text" id="creditCardCvv" class="creditcard" name="creditCardCvv"></input>
	</p>
	<p>
		<button id="generateCreditCardToken">Gerar Token</button>
		<input type="text" id="creditCardToken" name="creditCardToken" disabled></input>
	</p>
	<h2>Parcelamento</h2>
	<p>
		Valor do Checkout: <input type="text" id="checkoutValue" name="checkoutValue"></input>
		<button id="installmentCheck">Ver Parcelamento</button>
	</p>
	<p>
		<select id="InstallmentCombo">
		</select>
	</p>
	<p>
		<button id="doPayment">Efetuar pagamento</button> SenderHash: <input type="text" id="senderHash" name="senderHash" size="65"></input>
	</p>
</body>
<!-- Incluíndo o arquivo JS do PagSeguro e o JQuery-->
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Funcionalidade do JS -->
<script type="text/javascript">

	//Setando o session ID
	PagSeguroDirectPayment.setSessionId('<?php echo $session; ?>');

	//Get CreditCard Brand and check if is Internationl
	$("#creditCardNumber").keyup(function(){
		if ($("#creditCardNumber").val().length >= 6) {
			PagSeguroDirectPayment.getBrand({
				cardBin: $("#creditCardNumber").val().substring(0,6),
				internationalMode:true,
				success: function(response) { 
						console.log(JSON.stringify(response));
						$("#creditCardBrand").val(response['brand']['name']);
						$("#creditCardCvv").attr('size', response['brand']['cvvSize']);
				},
				error: function(response) {
					console.log(response);
				}
			})
		};
	})

	//Generates the creditCardToken
	$("#generateCreditCardToken").click(function(){
		var param = {
			cardNumber: $("#creditCardNumber").val(),
			cvv: $("#creditCardCvv").val(),
			internationalMode: $("#isInternational").is(':checked'),
			expirationMonth: $("#creditCardExpMonth").val(),
			expirationYear: $("#creditCardExpYear").val(),
			success: function(response) {
				$("#creditCardToken").val(response['card']['token']);
			},
			error: function(response) {
				console.log(response);
			}
		}
			//parâmetro opcional para qualquer chamada
			if($("#creditCardBrand").val() != '') {
				param.brand = $("#creditCardBrand").val();
			}
			PagSeguroDirectPayment.createCardToken(param);
	})

	//Check installment
	$("#installmentCheck").click(function(){
		if($("#creditCardBrand").val() != '') {
			getInstallments();
		} else {
			alert("Uma bandeira deve estar selecionada");
		}
	})


	function getInstallments(){
		var brand = $("#creditCardBrand").val();
		PagSeguroDirectPayment.getInstallments({
			amount: $("#checkoutValue").val().replace(",", "."),
			brand: brand,
			success: function(response) {
				var installments = response['installments'][brand];
				buildInstallmentSelect(installments);
			},
			error: function(response) {
				console.log(response);
			}
		})
	}

	function buildInstallmentSelect(installments){
		$.each(installments, (function(key, value){
			$("#InstallmentCombo").append("<option value = "+ value['quantity'] +">" + value['quantity'] + "x de " + value['installmentAmount'].toFixed(2) + " - Total de " + value['totalAmount'].toFixed(2)+"</option>");
		}))
	}

	//Get SenderHash
	$("#doPayment").click(function(){
		$("#senderHash").val(PagSeguroDirectPayment.getSenderHash());
	})
</script>

</html>