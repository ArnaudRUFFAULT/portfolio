<?php
class cvController extends parentController {
    //Les attributs data,parameters sont geres dans le coreController
    //Les attributs networks, proprietaire, section categorie sont geres dans le parentControler

    /**
     * [__construct description]Instancie un cvController
     */
    public function __construct(){
        parent::__construct();
        $this->getSection(4);//On recupere les informations de la section (correspond a la section CV), fonction dans parentController
        $this->getCategorie($this->section->getId());//On recupere les categories de la section CV
    }

    /**
     * [afficherCvAction description] On generes toutes les informations necessaires a la view
     * @return [type] [description]
     */
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