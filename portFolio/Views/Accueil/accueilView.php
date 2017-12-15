<p><?= $this->section->getTexte() ?></p>
<?php
foreach ($mesRealisations AS $realisation){
	echo '<div class="blocRealisation">';
	    echo '<h2><a href="index.php?controller=realisations&action=afficherFicheRealisation&id='.$realisation->getId().'">'.$realisation->getTitre().'</a></h2>';
	    echo '<p>'.$realisation->getDescription().'</p>';
	echo '</div>';
}
?>