<form action="index.php?controller=utilisateur&action=inscription" method="POST">
	<label for="nom">Nom:</label>
	<input type="text" name="nom" value=<?php if(!empty($this->data['nom'])){echo '"'.$this->data['nom'].'"';} ?>>
	<?php
	if (!empty($error['nom'])) {
		echo '<span class="errorSaisi">'.$error['nom'].'</span>';
	}
	?>
	<br />
	<label for="prenom">Prenom:</label>
	<input type="text" name="prenom" value=<?php if(!empty($this->data['prenom'])){echo '"'.$this->data['prenom'].'"';} ?>>
	<?php
	if (!empty($error['prenom'])) {
		echo '<span class="errorSaisi">'.$error['prenom'].'</span>';
	}
	?>
	<br />
	<label for="pseudo">Pseudo:</label>
	<input type="text" name="pseudo" value=<?php if(!empty($this->data['pseudo'])){echo '"'.$this->data['pseudo'].'"';} ?>>
	<?php
	if (!empty($error['pseudo'])) {
		echo '<span class="errorSaisi">'.$error['pseudo'].'</span>';
	}
	?>
	<br />
	<label for="mail">Email:</label>
	<input type="text" name="mail" value=<?php if(!empty($this->data['mail'])){echo '"'.$this->data['mail'].'"';} ?>>
	<?php
	if (!empty($error['mail'])) {
		echo '<span class="errorSaisi">'.$error['mail'].'</span>';
	}
	?>
	<br />
	<label for="password">Mot de passe:</label>
	<input type="text" name="password" value=<?php if(!empty($this->data['password'])){echo '"'.$this->data['password'].'"';} ?>>
	<?php
	if (!empty($error['password'])) {
		echo '<span class="errorSaisi">'.$error['password'].'</span>';
	}
	?>
	<br />
	<label for="passwordConfirmed">Confirmer le mot de passe:</label>
	<input type="text" name="passwordConfirmed">
	<?php
	if (!empty($error['passwordConfirmed'])) {
		echo '<span class="errorSaisi">'.$error['passwordConfirmed'].'</span>';
	}
	?>
	<br />	
	<label for="newsletter">Abonnement newsletter:</label>
	<input type="checkbox" name="newsletter" value="1">
	<?php
	if (!empty($error['newsletter'])) {
		echo '<span class="errorSaisi">'.$error['newsletter'].'</span>';
	}
	?>
	<br />
	<input type="submit" value="S'inscire">
</form>
