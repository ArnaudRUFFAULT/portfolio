<?php
class utilisateurController extends parentController {

    public function connexionAffichageAction(){
        $titre = 'Connexion';

        $header = $this->getHeader();

        ob_start();
        require (VIEWS.'Utilisateur/utilisateurConnexionView.php');
        $contenu = ob_get_clean();

        $footer = $this->getFooter();

        require(COMMON);
    }

    public function connexionAction(){

    }

    public function inscriptionAffichageAction(array $error = null){
            $titre = 'Inscription';

                    $header = $this->getHeader();

                    ob_start();
                    require (VIEWS.'Utilisateur/utilisateurInscriptionView.php');
                    $contenu = ob_get_clean();

                    $footer = $this->getFooter();

                    require(COMMON);
    }

    public function inscriptionAction(){
        $handler = new inscriptionHandler();
        $error = $handler->checkInfo($this->data);
        if(empty($error)){

        }
        else{
            $this->inscriptionAffichageAction($error);
        }
    }
}