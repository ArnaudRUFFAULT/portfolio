<?php
class realisationsController extends parentController {
    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->getSection(3);
    }

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

    public function getRealisations(){
        $model = new articleModel();
        $mesRealisations = $model->getRealisationsBDD();
        return $mesRealisations;
    }
}