<article>
	<h1><?=$maRealisation->getTitre()?></h1>
	<p><?=$maRealisation->getContenu()?></p>
	<?php
	if($maRealisation->getLien() != ''){
		echo '<a href="'.$maRealisation->getLien().'">Voir la réalisation</a>';
	}
	?>
	<p>Ajouté le <?=$maRealisation->getDate()?></p>
</article>