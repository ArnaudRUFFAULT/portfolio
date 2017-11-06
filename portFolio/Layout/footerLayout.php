<footer>
    <a href="">Contact</a>
    <span>Copyright <?= ucfirst($this->proprietaire->getPrenom())?> <?= strtoupper($this->proprietaire->getNom())?>| Tout droits réservés</span>
    <span>
        <?php
        foreach ($this->networks as $network ){
            echo '<a href="'.$network->getUrl().'">'.$network->getLibelle().'</a>||';
        }
        ?>
    </span>
</footer>

