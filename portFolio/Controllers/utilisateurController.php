<?php
class utilisateurController extends parentController {
    //Les attributs data,parameters sont geres dans le coreController
    //Les attributs networks, proprietaire, section categorie sont geres dans le parentControler

    /**
     * [inscriptionAffichageAction description]Genere les variables necessaires a la view et invoque la view correspondante
     * @param  array|null $error [description] un tableau rempli de messages a afficher en cas d'erreur lors de l'inscription
     * @return [type]            [description]
     */
    public function inscriptionAffichageAction(array $error = null){
                    $layoutVariable['titre'] = 'Inscription';

                    $layoutVariable['header'] = $this->loadView(HEADER);

                    $variables = array();
                    $variables['error'] = $error;

                    $layoutVariable['contenu'] = $this->loadView(VIEWS.'Utilisateur/utilisateurInscriptionView.php',$variables);

                    $layoutVariable['footer'] = $this->loadView(FOOTER);

                    $this->loadView(COMMON,$layoutVariable, true);
    }

 /**
  * [inscriptionValideeAffichageAction description]Affiche la page lors d'une inscription reussi
  * @return [type] [description]
  */
    public function inscriptionValideeAffichageAction(){
        $layoutVariable['titre'] = 'Connexion';

        $layoutVariable['header'] = $this->loadView(HEADER);

        $layoutVariable['contenu'] = $this->loadView(VIEWS.'Utilisateur/utilisateurInscriptionReussiteView.php');

        $layoutVariable['footer'] = $this->loadView(FOOTER);

        $this->loadView(COMMON,$layoutVariable,true);
    }

    /**
     * [connexionAffichageAction description]Affiche la page de connexion
     * @param  array|null $error [description]un tableau rempli de messages a afficher en cas d'erreur lors de la connexion
     * @return [type]            [description]
     */
    public function connexionAffichageAction(array $error = null){
        $layoutVariable['titre'] = 'Connexion';

        $layoutVariable['header'] = $this->loadView(HEADER);

        $variables = array();
        $variables['error'] = $error;

        $layoutVariable['contenu'] = $this->loadView(VIEWS.'Utilisateur/utilisateurConnexionView.php',$variables);

        $layoutVariable['footer'] = $this->loadView(FOOTER);

        $this->loadView(COMMON,$layoutVariable,true);
    }

    /**
     * [inscriptionAction description]Recupere les informations entree du formaulaire d'inscription,puis les envoi au gestionnaire d'inscription. Si le gestionnaire retourne un tableau vide, on enregistre un nouvel utilisateur en base de donne, sinon, on recupere les messages d'erreur et on les affiches sur la page d'inscription la ou les erreur ont eu lieu
     * @return [type] [description]
     */
    public function inscriptionAction(){
        $handler = new formHandler($this->data);
        $error = $handler->checkInfoInscription();
        //Si le gestionnaire nous renvoie un tableau vide, c'est qu'il n'y a pas eu d'erreur dans les saisis de l'utilisateur
        if(empty($error)){
            try{
                $model = new utilisateurModel;
                try{
                    if($model->checkMailBDD($this->data['mail'])){
                        $cleanData=array();
                        foreach ($this->data as $key => $value) {
                            //On hash le mot de passe pour plus de securite
                            if($key == 'password'){
                                $cleanData[$key] = password_hash(htmlentities($value),PASSWORD_DEFAULT);
                            }
                            else{
                                //On fait un htmlentities pour nettoyer le contenu qui ne pourra plus etre interprete comme du html
                                $cleanData[$key]=htmlentities($value);
                            }
                        }
                        //Si l'enregistrement a réussi
                        if($model->insertUserBDD($cleanData)){
                            //On appelle la view d'inecription reussite
                            $this->inscriptionValideeAffichageAction();
                        }
                        else{
                            throw new Exception("Probleme avec la base de donnée, réessayer plus tard");
                        }          
                    }
                    else{
                        $error['mail']= 'ce mail est associé à un autre utilisateur';
                        $this->inscriptionAffichageAction($error);
                    }
                }
                catch(Exception $e){
                    $errorController= new ErrorController();
                    $errorController->error($e->getMessage(),'Base de Données indisponible');
                }
            }
            catch(Exception $e){
                $errorController= new ErrorController();
                $errorController->error($e->getMessage(),'Base de Données indisponible');
            }
        }
        //Si le gestionnaire retourne un tableau non vide, c'est qu'il y a eu des erreurs dans le formulaire, donc on renvoie la page d'inscription avec le tableau des erreur pour pouvoir les afficher
        else{
            $this->inscriptionAffichageAction($error);
        }
    }

    /**
     * [connexionAction description]Recupere les informations entree du formulaire de connexion,puis les envoi au gestionnaire de connexion. Si le gestionnaire retourne un tableau vide, on verifie que cet utilisateur existe dans la base de donne puis si c'est le cas on l'enregistre en session, sinon, on recupere les messages d'erreur et on les affiches sur la page d'inscription la ou les erreur ont eu lieu
     * @return [type] [description]
     */
    public function connexionAction(){
        $handler = new formHandler($this->data);
        //On envoie les informations du formulaire d'inscription au gestionnaire correspondant
        $error = $handler->checkDataConnexion();
        //Si le gestionnaire nous renvoie un tableau vide, c'est qu'il n'y a pas eu d'erreurs dans les saisies de l'utilisateur
        if(empty($error)){
            $cleanData = array();
            //on recupere apres un htmlentities les informations email et password
            $cleanData['mail']=htmlentities($this->data['mail']);
            $cleanData['password']=htmlentities($this->data['password']);
            $model = new utilisateurModel();
            $error = $model->checkUserBDD($cleanData);
            //Le model nous renvoie un tableau vide si il n'y a pas eu de probleme lors de la connexion
            if(empty($error)){
                //Si tout est Ok , on enregistre l'utilisateur en session et on le redirige a l'acceuil
                $_SESSION['portfolio']['user'] = $model->getUserBDD($this->data['mail']);
                header('Location:index.php');
            }
            //Si aucun email et password concorde dans la BDD , on informe l'utilisateur en envoyant le tableau erreur sur le page de connexion et on affiche les erreurs aux endroits correspondants
            else{
                $this->ConnexionAffichageAction($error);
            }
        }
        //Si le gestionnaire de connexion a trouvé des erreurs, on informe l'utilisateur en envoyant le tableau erreur sur le page de connexion et on affiche les erreurs aux endroits correspondants
        else{
            $this->ConnexionAffichageAction($error);
        }
    }
}