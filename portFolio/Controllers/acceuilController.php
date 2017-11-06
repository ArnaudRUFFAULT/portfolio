<?php
class acceuilController extends parentController {


    public function __construct()
    {
        parent:: __construct();
        $this->getSection(1);
    }

    public function afficherAcceuilAction(){

        $titre = $this->section->getLibelle();

        $header = $this->getHeader();

        $model = new articleModel();
        $mesRealisations = $model->getRealisationsBDD(5);

        ob_start();
        require (VIEWS.'Accueil/accueilView.php');
        $contenu = ob_get_clean();

        $footer = $this->getFooter();

        require(COMMON);

    }

}