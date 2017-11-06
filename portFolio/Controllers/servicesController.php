<?php
class servicesController extends parentController {

    public function __construct()
    {
        parent:: __construct();
        $this->getSection(2);
        $this->getCategorie($this->section->getId());
    }
    /**
     *
     */
    public function afficherServicesAction(){
        $titre = $this->section->getLibelle();

        $header = $this->getHeader();

        $model = new articleModel();
        $mesServices = $model->getServicesBDD(5);

        ob_start();
        require (VIEWS.'Services/servicesView.php');
        $contenu = ob_get_clean();

        $footer = $this->getFooter();

        require(COMMON);

    }
}