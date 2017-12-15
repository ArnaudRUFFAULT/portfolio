<p><?= $this->section->getTexte() ?></p>
<?php
foreach ($mesRealisations AS $realisation){
    echo '<h2><a href="index.php?controller=realisations&action=afficherFicheRealisation&id='.$realisation->getId().'">'.$realisation->getTitre().'</a></h2>';
    echo '<div>'.$realisation->getContenu().'</div>';
}
?>