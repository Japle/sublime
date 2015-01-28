<?php
 $credenciais = array(
   "email" => "f.r_ale@hotmail.com",
   "token" => "4E0499D6BB3C4347AA263BB95E30E5FC"
 );
 $url = "https://ws.pagseguro.uol.com.br/v2/sessions";
  
 $curl = curl_init($url);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($credenciais));
 $resultado = curl_exec($curl);
 curl_close($curl);


?>
<html>
   <head>
        <title>
      
        </title>
 </head>
 <body>
      <center><h1>Exemplo - Checkout Transparente.</h1></center>
      <hr>
      <p><b>SessionID:</b> <?php echo $resultado;?></p>
      <hr>
      <b>Gerando o identificador do comprador.</b><br>
      <p><button id="SenderHash">Gerar getSenderHash</button> <input type="hidden" id="hash" size="80" readonly="true">
      <hr>
      <b>Cartão de Crédito:</b><input type ="text" id ="numero"><input type="hidden" id="bandeira"><br>
      <hr>
 </body>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
     <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
     <script type="text/javascript">
   PagSeguroDirectPayment.setSessionId('<?php echo $resultado;?>'); 

  $("#SenderHash").click(function(){
    var Hash = PagSeguroDirectPayment.getSenderHash();
      console.log(Hash);
      $("#hash").val(Hash);
      $("#hash").attr('type','text');
  })

    $("#numero").keyup(function(){
      if($("#numero").val().length == 6){
        PagSeguroDirectPayment.getBrand({
          cardBin: $("#numero").val().substring(0,6),
          success: function(response){ 
            console.log(response);
            var brand = response['brand']['name'];
            $("#bandeira").val(brand);
            $("#bandeira").attr('type','text');
             
          },
          error: function(response) {
            console.log("erro " + response);
          }
        });

      }
    })
  
  </script>
</html>
