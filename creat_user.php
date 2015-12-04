</p>

<?php

function verifPost ($cles) { //Permet ce vérifier que $_POST contient les clés contenu dans le tableau $cles et qu'elles ne sons pas vides
	foreach($cles as $v) {
		if (!(isset($_POST[$v]) and trim($_POST[$v]) != '')) {
			return false;
		}
	}
	return true;
}

if (isset($_POST['submit'])) {
	if (verifPost(array("prenom", "nom", "mail", "mdp", "mdp2"))) {
		$ok = true;
		if ($_POST["mdp"] != $_POST["mdp2"]) {
			echo 'Mot de passes différents !';
			$ok = false;
		}

		if ($ok) {
			echo "Informations enregistrés";

			$req=$bdd->prepare("insert into users values (:id, :nom, :prenom, :sexe, :telephone, :mail, :mdp, :id_loc, :desc)");
				$req->execute(array(
					'id' => '',
					'nom' => $_POST['nom'],
					'prenom' => $_POST['prenom'],
					'sexe' => $_POST['sexe'],
					'telephone' => $_POST['telephone'],
					'mail' => $_POST['mail'],
					'mdp' => $_POST['mdp'],
					'id_loc' => $_POST['location'],
					'desc' => $_POST['desc']
				));

				$id_user = $bdd->lastInsertId();

			$req=$bdd->prepare("insert into lien_users_problemes values (:id_user, :id_probleme)");

			foreach($_POST["problemes"] as $value) {
				$req->execute(array(
					'id_user' => $id_user,
					'id_probleme' => $value
				));
			}
		}
	}
	else {
		echo "Informations manquantes";
	}
}

?>
</br>
</br>
<form action="#" method="post" >
	<div id="boite"><label>Prénom :  </label><input type="text" name="prenom" id="prenom"/></br>
	<label>Nom : <input type="text" name="nom" id="nom"/> </label></div></br>
	<div id="boite"><label>Homme : <input type="radio" name="sexe" value="1" id="homme"/> </label></br>
	<label>Femme : <input type="radio" name="sexe" value="0" id="femme"/></div> </label></br>
	<div id="boite"><label>Mail : <input type="text" name="mail" id="mail" /> </label></br>
	<label>Téléphone : <input type="text" name="telephone" id="tel" /> </label></br>
	<label>Mot de passe : <input type="password" name="mdp" id="mdp" /> </label></br>
	<label>Confirmation : <input type="password" name="mdp2" id="mdp2"/> </label></br></div>
	<div id="boite"><label>Localisation : <select name="location" id="loc">
		<?php

		$req=$bdd->prepare("select * from location");
		$req->execute();
		
		while ($rep=$req->fetch(PDO::FETCH_ASSOC))
		{
			echo '<option value="'.$rep['id'].'">'.$rep['libelle'].'</option>';
		}	

		?>
	</select></br>
	<label>Commentaires :</br><textarea name="desc"></textarea></label></div></br>
	</label></br>
	<div id="boite"><h3>Problèmes que vous pouvez resoudre<h3>
	<?php

		$req=$bdd->prepare("select * from problemes");
		$req->execute();
		
		while ($rep=$req->fetch(PDO::FETCH_ASSOC))
		{
			echo '<label><input type="checkbox" name="problemes[]" value="'.$rep['id'].'"/>'.$rep['libelle'].'</label></br>';
		}	

		?></div>
	</br>
	

	<div id="inscrire"><input type="submit" name="submit" value="S'inscrire !" /></div> </br>
</form>
</p>
