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
        $titre = ucfirst($this->section->getLibelle());

        $mesRealisations = $this->getRealisations();

        $header = $this->getHeader();

        ob_start();
        require (VIEWS.'Realisations/RealisationsView.php');
        $contenu = ob_get_clean();

        $footer = $this->getFooter();

        require(COMMON);

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