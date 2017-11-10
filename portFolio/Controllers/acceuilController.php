<?php
class acceuilController extends parentController {
    //Les attributs data,parameters sont geres dans le coreController
    //Les attributs networks, proprietaire, section categorie sont geres dans le parentControler

    /**
     * [__construct description] Instancie un acceuil controller
     */
    public function __construct()
    {
        parent:: __construct();
        $this->getSection(1);//Fonction dans le parentController
    }

    /**
     * [afficherAcceuilAction description]Génère les informations nécessaires à la vue de la page d'acceuil
     * @return [type] [description]
     */
    public function afficherAcceuilAction(){

        $titre = $this->section->getLibelle();//Titre de l'acceul

        $header = $this->getHeader();//En tête de l'acceuil

        $model = new articleModel();//Connexion BDD

        $mesRealisations = $model->getRealisationsBDD(5);//On recupere les 5 dernieres realisations

        //On génère le contenu de la vue
        ob_start();
        require (VIEWS.'Accueil/accueilView.php');
        $contenu = ob_get_clean();

        $footer = $this->getFooter();//Footer de l'acceuil

        require(COMMON);//on appelle le layout commun
    }

}