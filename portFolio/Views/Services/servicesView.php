<h2><?=$this->section->getLibelle()?></h2>
<p><?=$this->section->getTexte()?></p>
<?php
    foreach ($this->categorie AS $value){
        ?>
        <ul>
            <li><b><?=$value->getLibelle(). ':'?></b><?=$value->getDescription()?></li>
            <?php
            foreach ($mesServices AS $service){
                if ($value->getId() == $service->getIdCategorie()){
                    ?>
                    <ul>
                        <li><b><?= $service->getTitre().':'?></b><?= $service->getContenu()?></li>

                    </ul>
                    <?php
                }
            }
            ?>
        </ul>
        <?php
    }
?>