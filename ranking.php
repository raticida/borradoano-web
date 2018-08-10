<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
//$title = 'Members Page';

//include header template
//require('layout/header.php'); 
?>

<!DOCTYPE html>
<html>
<head>
<title>Borra do Ano - Enquetes</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>

<script type="text/javascript" src="js/pnotify.custom.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet">

<link id="bsdp-css" href="//uxsolutions.github.io/bootstrap-datepicker/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    
<link href="css/offcanvas.css" rel="stylesheet">
<link href="css/navbar-top-fixed.css" rel="stylesheet">
<link href="css/pnotify.custom.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="apple-touch-icon-precomposed" sizes="57x57" href="favicon/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="favicon/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="favicon/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="favicon/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="favicon/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="favicon/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="favicon/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="favicon/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="favicon/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="favicon/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="favicon/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="favicon/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="favicon/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="favicon/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="favicon/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="favicon/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="favicon/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="favicon/mstile-310x310.png" />

<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

<script type="text/javascript">

	$(window).load(function(){
		
		//tratativa dos checkboxes
		$(function() {	
		$('#qtd_pontos').on( 'change', function() {
		  if( $('#qtd_pontos').val().length !=0 ){
			 $('#enviar').prop( 'disabled', false );
		  } else {
			 $('#enviar').prop( 'disabled', true );
		  }
			});
		});
			
	});
</script>

<?php

//verifica se há um evento e de qual tipo é se não torna-o vazio
$event = (isset($_SESSION['event'])) ? $_SESSION['event'] : '';
$event_type = (isset($_SESSION['event_type'])) ? $_SESSION['event_type'] : '';

//verifica qual evento é e exibe a notificação
switch ($event) {
	case 'warning':
		echo "<script type='text/javascript'>$(document).ready(function(){new PNotify({title: 'Atenção!',text: 'Nenhuma alteração foi realizada!',type: 'warning'});});</script>";
		$_SESSION['event'] = null;
		break;
	case 'success':
		echo "<script type='text/javascript'>$(document).ready(function(){new PNotify({title: 'Successo!',text: 'A $event_type foi enviada com sucesso!',type: 'success'});});</script>";
		$_SESSION['event'] = null;
		break;
	case 'error':
		echo "<script type='text/javascript'>$(document).ready(function(){new PNotify({title: 'Erro!',text: 'A $event_type não foi enviada!',type: 'error'});});</script>";
		$_SESSION['event'] = null;
		break;		
}
?>

</head>


  <body class="bg-light">
  

    <nav class="navbar navbar-expand-md fixed-top" style="background-color: #764a21">
	 <div class="container">
	  <img class="d-block mr-2 " src="images/logo_icon.png" alt="" height="50">
      <span class="navbar-brand" style="color:#fff;"><strong>Borra do Ano</strong></span>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
		<span class="navbar-toggler-icon"><i class="fa fa-navicon"></i></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Enquete<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pontuar_borra.php">Pontuar Borra</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ranking.php">Ranking</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="logout.php">Sair</a>
            </div>
          </li>
        </ul>
      </div>
      </div>
    </nav>
  
  
 <?php

	  
    $url = 'https://borradoanov2.herokuapp.com/getAllBorras';
	$data = file_get_contents($url); // put the contents of the file into a variable
	$result = json_decode($data); // decode the JSON feed
	
	//echo 'Qtde: '.count($result);
	

?>	 
  
  
    <div class="container">
      <div class="py-5 text-center">
	    <img class="d-block mx-auto mb-4" src="images/logo_icon.png" alt="" height="72">
        <h2>Borra do Ano</h2>
        <p class="lead">Inteface Web para Pontuar um Borra no Sistema Borra do Ano v2.0</p>
      </div>

		<div class="row">	
			<div class="col-lg-12">
			  <h4 class="mb-3">Borra Ranking</h4>
			<hr class="mb-4">				
			</div>
		</div>	
		  
    <div class="row">
	
	
	<?php foreach ($result as $item) {
	
	if ( $item->qtd_trofeu == '1' ) { $active_trophy = 'style="color:#ffc107;"'; } else { $active_trophy = ''; }
	if ( $item->beer == '1' ) { $active_beer = 'style="color:#ffc107;"'; } else { $active_beer = ''; }

	echo '
	
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="padding:15px;">
		  <div class="main-section text-center">
			  <div>
				  <div class="col-lg-12 col-sm-12 col-12 profile-header"></div>
			  </div>
			  <div class="user-detail">
				  <div class="col-lg-12 col-sm-12 col-12">
					  <img src="images/logo_icon.png" class="rounded-circle img-thumbnail" style="padding: 15px;">
					  <h5>'.$item->nome.'</h5>
					  <hr>
					  <span>'.$item->pontos.' Pontos</span>
				  </div>
			  </div>
			  <div class="user-social-detail">
				  <div class="col-lg-12 col-sm-12 col-12">
					  <i class="fa fa-trophy" aria-hidden="true" '.$active_trophy.'></i></i>
					  <i class="fa fa-beer" aria-hidden="true" '.$active_beer.'></i>
				  </div>
			  </div>
		  </div>
      </div>
	  
	  '; echo "\n"; } ?>



	  
	  
    </div>





	  
</div>		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
	  
		  

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2018 - Borra do Ano</p>
      </footer>
    </div>

   <script src="js/popper.min.js"></script>
   <script src="js/holder.min.js"></script>
   <script src="js/offcanvas.js"></script>
</body>
</html>
