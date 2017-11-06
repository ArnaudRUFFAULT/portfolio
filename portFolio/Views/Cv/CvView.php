<h2><?=$this->section->getLibelle()?></h2>
<p><?=$this->section->getTexte()?></p>
<?php
foreach ($this->categorie AS $value){
    ?>
    <ul>
        <li><b><?=$value->getLibelle(). ':'?></b><?=$value->getDescription()?></li>
        <?php
        foreach ($monCV AS $articleCv){
            if ($value->getId() == $articleCv->getIdCategorie()){
                ?>
                <ul>
                    <li><b><?= $articleCv->getTitre()?></b><br /><?= $articleCv->getContenu()?></li>

                </ul>
                <?php
            }
        }
        ?>
    </ul>
    <?php
}
?>