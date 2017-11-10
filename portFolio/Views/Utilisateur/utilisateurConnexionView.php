<form action="index.php?controller=utilisateur&action=connexion" method="POST">
    <label for="mail">Email:</label>
    <input type="email" name="mail" value=<?php if(!empty($this->data['mail'])){echo '"'.$this->data['mail'].'"';} ?>>
    <?php
	if (!empty($error['mail'])) {
		echo '<span class="errorSaisi">'.$error['mail'].'</span>';
	}
	?>
    <br />
    <label for="password">Mot de passe:</label>
    <input type="password" name="password">
    <?php
	if (!empty($error['password'])) {
		echo '<span class="errorSaisi">'.$error['password'].'</span>';
	}
	?>
	<br />
    <input type="submit">
</form>