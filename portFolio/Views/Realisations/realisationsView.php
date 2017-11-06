<p><?= $this->section->getTexte() ?></p>
<?php
foreach ($mesRealisations AS $realisation){
    echo '<h2>'.$realisation->getTitre().'</h2>';
    echo '<div>'.$realisation->getContenu().'</div>';
}
?>