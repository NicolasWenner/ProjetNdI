<?php
	$page_ok = array (
		//Pages autorisées
		'acc',		
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
