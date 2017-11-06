<header>
    <p>Bienvenue sur le portfolio d' <?= ucfirst($this->proprietaire->getPrenom())?> <?= strtoupper($this->proprietaire->getNom())?>!</p>
    <?php if(empty($_SESSION['portfolio']['user'])){ ?>
        <p>
            <a href="index.php?controller=utilisateur&action=connexionAffichage">Se connecter</a>
            <a href="index.php?controller=utilisateur&action=inscriptionAffichage">S'inscrire</a>
        </p>
    <?php } ?>

    <nav>
        <a href="index.php?controller=acceuil&action=afficherAcceuil">Acceuil</a>
        <a href="index.php?controller=services&action=afficherServices">Services</a>
        <a href="index.php?controller=realisations&action=afficherRealisations">Réalisations</a>
        <a href="index.php?controller=cv&action=afficherCv">CV</a>
        <a href="">Contact</a>
    </nav>
</header>