<?php require('includes/config.php'); 

//verifica se foi feito o submit do form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	

		
	$borra_id = $_POST['borra_id'];
	$qtd_pontos = $_POST['qtd_pontos'];



	//print_r($array_id);
	//print_r($array_nome);
	//echo $enquete;

	$param = '{
   "id": "'.$borra_id.'",
   "qtd_pontos": "'.$qtd_pontos.'"
   }';
	
	echo $param;
}


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://borradoanov2.herokuapp.com/pontuarBorra",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $param,
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
	
	$_SESSION['event'] = 'error';
	$_SESSION['event_type'] = 'Pontuação';
	header("Location:pontuar_borra.php");
	
} else {
	
	$_SESSION['event'] = 'success';
	$_SESSION['event_type'] = 'Pontuação';
	header("Location:pontuar_borra.php");
}
?>