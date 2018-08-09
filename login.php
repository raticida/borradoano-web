<?php
//include config
require_once('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: index.php'); exit(); }

//process login form if submitted
if(isset($_POST['submit'])){

	if (!isset($_POST['username'])) $error[] = "Please fill out all fields";
	if (!isset($_POST['password'])) $error[] = "Please fill out all fields";

	$username = $_POST['username'];
	if ( $user->isValidUsername($username)){
		if (!isset($_POST['password'])){
			$error[] = 'Digite sua senha!';
		}
		$password = $_POST['password'];

		if($user->login($username,$password)){
			$_SESSION['username'] = $username;
			header('Location: index.php');
			exit;

		} else {
			$error[] = 'Borra Name ou Senha inválida.';
		}
	}else{
		$error[] = 'Borra Name deve ser Alfanumérico, e conter entre 3 e 6 caracteres';
	}



}//end if submit

//define page title
$title = 'Login';

//include header template
//require('layout/header.php'); 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
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

    <title>Borra do Ano</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" role="form" method="post" action="" autocomplete="off">
	  <img class="d-block mx-auto mb-4" src="images/logo_icon.png" alt="" height="72">
      <h2 class="h3 mb-4">Borra do Ano</h2>
      <label for="inputName" class="sr-only">Email address</label>
      <input type="text" name="username" id="inputName" class="form-control mb-2" placeholder="Borra Name" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required>
      <button class="btn btn-lg btn-block mb-3" type="submit" name="submit" value="Login" style="background-color:#764a21;color:#fff;">Entrar</button>
	  
		<?php
		//check for any errors
		if(isset($error)){
			foreach($error as $error){
				echo '<div class="alert alert-danger"><strong>Erro!</strong> '.$error.'</div>';
			}
		}

		if(isset($_GET['action'])){

			//check the action
			switch ($_GET['action']) {
				case 'active':
					echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
					break;
				case 'reset':
					echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
					break;
				case 'resetAccount':
					echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
					break;
			}

		}

		
		?>	  
		
      <p class="mt-5 mb-3 text-muted">&copy; 2018 - Borra do Ano</p>
    </form>
  </body>
</html>
