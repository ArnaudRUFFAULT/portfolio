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

    /**
     * [controllerInexistantAction description] créer un message d'erreur si le controller n'existe pas invoque la view correspondante
     * @return [type] [description]
     */
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

    /**
     * [actionInexistanteAction description] créer un message d'erreur si l'action n'existe pas et invoque la view correspondante
     * @return [type] [description]
     */
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

    /**
     * [errorInscriptionAction description]créer un message d'erreur si l'inscription a echoue et invoque la view correspondante
     * @return [type] [description]
     */
    public function errorInscriptionAction(){
        $titre = 'Erreur';

        $header = $this->getHeader();

        $error = 'L\'enregistrement n\' a pas pu être effectué';

        ob_start();
        require(VIEWS.'Error'. DS . 'error.php');
        $contenu = ob_get_clean();

        $footer = $this->getFooter();

        require (ERROR);
    }
}
		