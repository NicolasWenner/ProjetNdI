<?php
	$page_ok = array (
		//Pages autorisées
		'acc',	
		'creat_user',
		'login',
		'profile',
	);

	if (isset($_GET['p'])) {
		$p = htmlspecialchars($_GET['p']);
	
		if (!(in_array($p, $page_ok))) {
			$p = 'acc';
		}
	}
	else {
    		$p = 'acc';
	}
?>
