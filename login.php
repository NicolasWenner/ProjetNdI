<?php

if (isset($_POST['submit'])) {
	if (verifPost(array("mail", "mdp"))) {

		$req=$bdd->prepare("select * from users where mail=:mail and mdp=:mdp");
		$req->execute(array(
			'mail' => $_POST['mail'],
			'mdp' => $_POST['mdp']
		));
		
		if ($rep=$req->fetch(PDO::FETCH_ASSOC)) {
			$_SESSION['id']	= $rep['id'];
			$_SESSION['mail']= $rep['mail'];
			header("Location: index.php?p=profile");
		}	
		else {
			echo "Mail / Mot de passe invalide";
		}
		
	}
	else {
		echo "Entrez le mail et le mot de passe";
	}
	
}

?>

<p>
<form actionn="#" method="post" >
	<div id="boite"><label>Mail : <input type="text" name="mail" id="mail"/></label></br>
	<label>Mot de passe : <input type="password" name="mdp" id="mdp" /><label></div>
	<div id="inscrire"><input type="submit" name="submit" value="Connexion" /></div>
</form>
</p>
