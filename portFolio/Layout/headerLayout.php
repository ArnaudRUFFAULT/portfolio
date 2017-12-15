<!-- Layout commun a tout les headers-->
<header>
    <!--Message de bienvenue avec le Orenom et Nom du proprietaire-->
    <p>Bienvenue sur le portfolio d' <?= ucfirst($this->proprietaire->getPrenom())?> <?= strtoupper($this->proprietaire->getNom())?>!</p>
    <?php 
    //Si il y a n'y a pas de session ,on affiche ici la possibilité de se connecter ou s'inscrire
    if(empty($_SESSION['portfolio']['user'])){ 
        echo '<p>';
            echo '<a href="index.php?controller=utilisateur&action=connexionAffichage">Se connecter</a>';
            echo '<br />';
            echo '<a href="index.php?controller=utilisateur&action=inscriptionAffichage">S\'inscrire</a>';
        echo '</p>';
     }
     //Si il y a un utilisateur de connecté, on affiche son pseudo et la possibilite de se deconnecter
     else{
        echo '<p>Bienvenue '.$_SESSION['portfolio']['user']['u_pseudo'].' !</p>';
        echo '<a href="index.php?deco=portfolio">Se deconnecter</a>';
     }
     ?>

    <!--Menu qui permet de naviquer sur le site-->
    <nav>
        <a href="index.php?controller=acceuil&action=afficherAcceuil">Acceuil</a>
        <a href="index.php?controller=services&action=afficherServices">Services</a>
        <a href="index.php?controller=realisations&action=afficherRealisations">Réalisations</a>
        <a href="index.php?controller=cv&action=afficherCv">CV</a>
        <a href="">Contact</a>
    </nav>
</header>