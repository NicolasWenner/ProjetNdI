<?php
	//Varaibles de connexion a mysql
	$loging_mysql = 'nuitInfo';
	$password_mysql = 'azer1234';
	$hote_mysql = 'localhost';
	$base_mysql = 'NuitInfo';                                            

	try {
    		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    		$bdd = new PDO('mysql:host=' . $hote_mysql . ';dbname=' . $base_mysql, $loging_mysql, $password_mysql);
    		$bdd->query("SET NAMES 'utf8'");
	}
	catch (Exception $e) {
    		die('Erreur : ' . $e->getMessage());
	}
?>

    
	

