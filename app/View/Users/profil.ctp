<div class="colomns large-10 center">
	<h2>Profil</h2>
	Nom: <?= $user['firstname'] ?> <br>
	Prenom: <?= $user['lastname'] ?> <br>
	Email: <?= $user['email'] ?> <br>
	Nom d'utilisateur: <?= $user['username'] ?> <br>
	Telephone: <?= $user['telephone'] ?> <br>
	Profession: <?= $user['profession'] ?> <br>
	Entreprise: <?= $user['entreprise'] ?>
	<?php 
		//print_r($user);
	 ?>
</div>