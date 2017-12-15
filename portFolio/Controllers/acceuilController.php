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

        $layoutVariable['titre'] = $this->section->getLibelle();//Titre de l'acceul

        $layoutVariable['header'] = $this->loadView(HEADER);

        $model = new articleModel();//Connexion BDD

        $variables = array();
        $variables['mesRealisations'] = $model->getRealisationsBDD(5);//On recupere les 5 dernieres realisations

        $layoutVariable['contenu'] = $this->loadView(VIEWS.'Accueil/accueilView.php', $variables);

        $layoutVariable['footer'] = $this->loadView(FOOTER);

        $this->loadView(COMMON, $layoutVariable, true);//on appelle le layout commun
    }

}