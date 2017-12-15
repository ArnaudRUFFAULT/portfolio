<?php
class errorController extends parentController{
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

    /**
     * Affiche une view avec un message d'erreur standard, sans précision
     * @return 
     */
    public function error($message = null,$titre = null){
            $this->loadErrorView($message,$titre);
    }    
    
    /**
     * Affiche une page d'erreur 404
     */
    public function error404(){
        $this->loadErrorView('Cette page n\'existe pas', 'Error 404', 404);    
    }

    /**
     * Crée un view qui affiche une erreur
     * @param  string $errorMessage message descriptif de l'érreur
     * @param  string $titre        titre de la page
     * @param  [int|null] $codeError    Definit le code d'erreur http
     */
    private function loadErrorView($errorMessage = 'Une erreur interne c\'est produite, veuillez réessayer ultérieurement.',$titre = 'Error',$codeError = null){
        if(isset($codeError)){
            http_response_code($codeError);
        }


        $layoutVariables = array();

        $layoutVariables['titre'] = $titre;


        $layoutVariables['header'] = $this->getHeader();

        $variables = array();
        $variables['errorMessage'] = $errorMessage;

        $layoutVariables['contenu'] = $this->loadView('./Views/Error/error.php',$variables);

        $layoutVariables['footer'] = $this->getFooter();

        $this->loadView(ERROR,$layoutVariables, true);
    }
}
		