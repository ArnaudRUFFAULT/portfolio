<?php
class cvController extends parentController {
    /**
     *
     */

    public function __construct(){
        parent::__construct();
        $this->getSection(4);
        $this->getCategorie($this->section->getId());
    }

    public function afficherCvAction(){
        $titre = ucfirst($this->section->getLibelle());

        $header = $this->getHeader();

        $model = new articleModel();
        $monCV = $model->getCvBDD();

        ob_start();
        require (VIEWS.'Cv/cvView.php');
        $contenu = ob_get_clean();

        $footer = $this->getFooter();

        require(COMMON);

    }
}