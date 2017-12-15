<?php
class servicesController extends parentController {
    //Les attributs data,parameters sont geres dans le coreController
    //Les attributs networks, proprietaire, section categorie sont geres dans le parentControler
    
    /**
     * [__construct description] Instancie un servicesController
     */
    public function __construct()
    {
        parent:: __construct();
        $this->getSection(2);//le 2 correspond à l'identifiant de la section service
        $this->getCategorie($this->section->getId());//On récupere les categories appartenant a la section service
    }

    /**
     * [afficherServicesAction description]Génère les variables nécessaires à la view et invoque la view correspondante
     * @return [type] [description]
     */
    public function afficherServicesAction(){
        $layoutVariable['titre'] = $this->section->getLibelle();

        $layoutVariable['header'] = $this->loadView(HEADER);

        $model = new articleModel();

        $variables = array();
        $variables['mesServices'] = $model->getServicesBDD();

        $layoutVariable['contenu'] = $this->loadView(VIEWS.'Services/servicesView.php', $variables);

        $layoutVariable['footer'] = $this->loadView(FOOTER);

        $this->loadView(COMMON, $layoutVariable, true);
    }
}