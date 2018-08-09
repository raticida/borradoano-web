<?php require('includes/config.php'); 

//verifica se foi feito o submit do form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	

	$array_id = array();
	$array_nome = array();
	
	
	foreach($_POST['approved'] as $i => $approved) {
		
		if ($approved == 1) {
			$array_id[] = $_POST['borra_id'][$i];
			$array_nome[] = $_POST['borra_nome'][$i];
			$descricao = $_POST['descricao'];
			$data_inicio = $_POST['start'];
			$data_fim = $_POST['end'];
		}

	}

	//print_r($array_id);
	//print_r($array_nome);
	//echo $enquete;

	$param = '{
   "descricao": "'.$descricao.'",
   "data_criacao": "'.$data_inicio.'",
   "data_fim": "'.$data_fim.'",
   "opcao_1": "'.$array_nome[0].'",
   "opcao_2": "'.$array_nome[1].'",
   "opcao_3": "'.$array_nome[2].'",
   "opcao_4": "'.$array_nome[3].'",
   "id_opcao_1": '.$array_id[0].',
   "id_opcao_2": '.$array_id[1].',
   "id_opcao_3": '.$array_id[2].',
   "id_opcao_4": '.$array_id[3].'
	}';
		
	
	//echo $param;
}


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
	$_SESSION['event_type'] = 'Enquete';
	header("Location:index.php");
	
} else {
	
	$_SESSION['event'] = 'success';
	$_SESSION['event_type'] = 'Enquete';
	header("Location:index.php");
}
?>