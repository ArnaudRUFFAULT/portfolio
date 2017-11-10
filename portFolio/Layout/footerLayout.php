<!-- Layout commun a tout les footers-->
<footer>
    <a href="">Contact</a>
    <!-- On récupère les données a afficher : prenom et nom du proprietaire du portfolio-->
    <span>Copyright <?= ucfirst($this->proprietaire->getPrenom())?> <?= strtoupper($this->proprietaire->getNom())?>| Tout droits réservés</span>
    <!-- On récupère les liens pour les reseaux sociaux du proprietaire-->
    <span>
        <?php
        foreach ($this->networks as $network ){
            echo '<a href="'.$network->getUrl().'">'.$network->getLibelle().'</a>||';
        }
        ?>
    </span>
</footer>

