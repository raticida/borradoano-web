<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('America/Sao_Paulo');

//database credentials
define('DBHOST','edo4plet5mhv93s3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com	');
define('DBUSER','sm38r4alhb5fmgwj');
define('DBPASS','n67igr2zbi9rh9c0');
define('DBNAME','xgoosp5ef7msdibz');

//application address
define('DIR','http://localhost/');
define('SITEEMAIL','noreply@localhost');

try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";charset=utf8mb4;dbname=".DBNAME, DBUSER, DBPASS);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Suggested to comment on production websites
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>
