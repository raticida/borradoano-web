<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://borradoanov2.herokuapp.com/newPoll",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n   \"descricao\": \"Teste de envio de enquete via PHP?\",\r\n   \"data_criacao\": \"10/10/2018\",\r\n   \"data_fim\": \"10/10/2018\",\r\n   \"opcao_1\": \"Rei Borrão\",\r\n   \"opcao_2\": \"Fio Terra\",\r\n   \"opcao_3\": \"Borra de Guerra\",\r\n   \"opcao_4\": \"Bujão\",\r\n   \"id_opcao_1\": 154,\r\n   \"id_opcao_2\": 162,\r\n   \"id_opcao_3\": 170,\r\n   \"id_opcao_4\": 165\r\n }",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    "Postman-Token: bbc612cc-cf61-4634-9eac-5d7ef2216011"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>