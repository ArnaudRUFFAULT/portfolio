<?php
class realisationsController extends parentController {
    //Les attributs data,parameters sont geres dans le coreController
    //Les attributs networks, proprietaire, section categorie sont geres dans le parentControler
    
    /**
     * [__construct description]Instancie un realisationsController
     */
    public function __construct()
    {
        parent::__construct();
        $this->getSection(3);
    }

    /**
     * [afficherRealisationsAction description] Génère les variables nécessaires à la view et invoque la view correspondante
     * @return [type] [description]
     */
    public function afficherRealisationsAction(){
        $layoutVariable['titre'] = ucfirst($this->section->getLibelle());

        $layoutVariable['header'] = $this->loadView(HEADER);

        $variables = array();
        $variables['mesRealisations'] = $this->getRealisations();

        $layoutVariable['contenu'] = $this->loadView(VIEWS.'Realisations/RealisationsView.php', $variables);


        $layoutVariable['footer'] = $this->loadView(FOOTER);

        $this->loadView(COMMON, $layoutVariable, true);

    }

    public function afficherFicheRealisationAction(){
        $layoutVariable['titre'] = ucfirst($this->section->getLibelle());

        $model = new articleModel();

        $layoutVariable['header'] = $this->loadView(HEADER);

        $variables = array();
        $variables['maRealisation'] = $model->getFicheRealisationBDD($this->parameters['id']);

        $layoutVariable['contenu'] = $this->loadView(VIEWS.'Realisations/ficheRealisationView.php', $variables);

        $layoutVariable['footer'] = $this->loadView(FOOTER);

        $this->loadView(COMMON, $layoutVariable, true);
    }

    /**
     * [getRealisations description] Recupere dans la BDD les réalisations
     * @return [array] [description] contient des instances de Realisation
     */
    public function getRealisations(){
        $model = new articleModel();
        $mesRealisations = $model->getRealisationsBDD();
        return $mesRealisations;
    }
}