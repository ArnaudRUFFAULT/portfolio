<?php
class errorController extends parentController{

	/*
	 ** @param
	 ** @action créer un message d'erreur si la page n'existe pas invoque la view correspondante
	 ** @return
	  */
	public function pageExistePasAction(){
	    $titre = 'Erreur';

	    $header = $this->getHeader();

        $error = 'La page demandée n\'existe pas';

	    ob_start();
		require(VIEWS.'Error'. DS . 'error.php');
		$contenu = ob_get_clean();

		$footer = $this->getFooter();

		require (ERROR);
	}

    public function controllerInexistantAction(){
        $titre = 'Erreur';

        $header = $this->getHeader();

        $error = 'Le controller spécifié n\'existe pas';

        ob_start();
        require(VIEWS.'Error'. DS . 'error.php');
        $contenu = ob_get_clean();

        $footer = $this->getFooter();

        require (ERROR);
    }

    public function actionInexistanteAction(){
        $titre = 'Erreur';

        $header = $this->getHeader();

        $error = 'L\'action spécifiée n\'existe pas';

        ob_start();
        require(VIEWS.'Error'. DS . 'error.php');
        $contenu = ob_get_clean();

        $footer = $this->getFooter();

        require (ERROR);
    }
}
		