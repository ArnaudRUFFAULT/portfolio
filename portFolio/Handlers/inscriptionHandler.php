<?php
class inscriptionHandler extends formHandler{
		/**
		 * [$nom description]valeur saisie dans l'input nom du formaulaire d'inscription
		 * @var [string]
		 */
		private $nom;

		/**
		 * [$prenom description]valeur saisie dans l'input prenom du formaulaire d'inscription
		 * @var [string]
		 */
		private $prenom;

		/**
		 * [$pseudo description]valeur saisie dans l'input pseudo du formaulaire d'inscription
		 * @var [string]
		 */
		private $pseudo;

		/**
		 * [$mail description]valeur saisie dans l'input mail du formaulaire d'inscription
		 * @var [string]
		 */
		private $mail;

		/**
		 * [$password description]valeur saisie dans l'input password du formaulaire d'inscription
		 * @var [string]
		 */
		private $password;

		/**
		 * [$passwordConfirmed description]valeur saisie dans l'input passwordConfirmed du formaulaire d'inscription
		 * @var [type]
		 */
		private $passwordConfirmed;

		/**
		 * [__construct description]Instancie un inscriptionHandler
		 * @param array $data [description] Tableau qui doit contenir toutes les informations nécessaire à l'instanciation d'un inscriptionHandler
		 */
		public function __construct(array $data){
			$this->nom = $data['nom'];
			$this->prenom = $data['prenom'];
			$this->pseudo = $data['pseudo'];
			$this->mail = $data['mail'];
			$this->password = $data['password'];
			$this->passwordConfirmed = $data['passwordConfirmed'];
		}

		/**
		 * [checkInfo description]Appelle les methodes correspondantes pour verifier chaque input, puis retourne toutes les erreurs repertoriees dans un tableau associatif ou un tableau vide si il n'y a aucune erreur
		 * @return [array] [description]tabelau associatif
		 */
		public function checkInfo(){

		$this->stringAlphaNotEmpty($this->nom,'nom',MIN_NOM,MAX_NOM);

		$this->stringAlphaNotEmpty($this->prenom,'prenom',MIN_PRENOM,MAX_PRENOM);

		$this->stringAlphaNumericNotEmpty($this->pseudo,'pseudo',MIN_PSEUDO,MAX_PSEUDO);

		$this->validEmail();

		$this->checkPassword();

		$this->checkPasswordConfirmed();

		return $this->error;
	}

	/**
	 * [stringAlphaNotEmpty description]Verifie si le string n'est pas vide, et qu'il est composé uniquement de lettres, tirets ou espaces
	 * @param  [string] $string [description]variable a tester
	 * @param  [string] $label  [description]nom a donner au tableau associatif comme cle pour afficher les erreurs
	 * @param  [int] $min    [description]taille minimale autorisé
	 * @param  [int] $max    [description]taille maximale autorisé
	 * @return [type]         [description]
	 */
	private function stringAlphaNotEmpty($string,$label,$min,$max){
		//Si le string n'est pas vide
		if(!empty($string)){
			//Si le string n'contient uniquement des lettres, tirets ou espaces
			if(preg_match('#^[A-Za-z- ]+$#', $string)){
				//Alors on teste sa taille
				$this->stringIntervalle($min,$max,$string,$label);
			}
			else{
				//Sinon on crée un erreur dans le tableau
				$this->error[$label] = 'Le champs "'.ucfirst($label).'" contient uniquement des lettres, espaces et tirets.';
			}
		}
		//Sinon on crée un erreur dans le tableau
		else{
			$this->error[$label] = 'Le champs "'.ucfirst($label).'" ne doit pas être vide.';
		}
	}

	/**
	 * [stringAlphaNumericNotEmpty description]On verifie que le string est composé uniquement de lettre,nombres ou de tirets
	 * @param  [string] $string [description] variable a tester
	 * @param  [string] $label  [description] nom a donner au tableau associatif comme cle pour afficher les erreurs
	 * @param  [int] $min    [description] taille minimale autorisé
	 * @param  [int] $max    [description] taille maximale autorisé
	 * @return [type]         [description]
	 */
	private function stringAlphaNumericNotEmpty($string,$label,$min,$max){
		//Si le string n'est pas vide
		if(!empty($string)){
			//Si le string n'contient uniquement des lettres, nombres ou tirets
			if(preg_match('#^[0-9A-Za-z-]+$#', $string)){
				//Alors on teste sa taille
				$this->stringIntervalle($min,$max,$string,$label);
			}
			else{
				//Sinon la taille n'est pas valide on crée un message d'erreur
				$this->error[$label] = 'Le champs "'.ucfirst($label).'" doit être alphanumerique, peut comporter des tirets.';
			}
		}
		else{
			//Si le champs est vide on crée un message d'erreur
			$this->error[$label] = 'Le champs "'.ucfirst($label).'" ne doit pas être vide.';
		}
	}

	/**
	 * [validEmail description]On vérifie que l'email a une forme standard et qu'il n'existe pas dans la BDD
	 * @return [type] [description]
	 */
	private function validEmail(){
		//Si l'email n'est pas vide
		if (!empty($this->mail)){
			//Si l'email est standard on verifie sa taille
			if(preg_match('#^[a-z0-9\._-]+@[a-z0-9\._]{2,}\.[a-z]{2,4}$#', $this->mail)){
				$valid =$this->stringIntervalle(MIN_MAIL,MAX_MAIL,$this->mail,'mail');
				//Si sa taille est valide on vérifie si il existe dans la BDD
				if(empty($valid)){
					$model = new utilisateurModel;
					if($model->checkMailBDD($this->mail)){
						//On a fait toutes les verifications, pas d'erreurs
					}
				}
				//Si il existe deja en BDD on crée un message d'erreur
				else{
					$this->error['mail'] = 'Cet Email est déjà utilisé, veuiller vous connecter au compte associé';
				}
			}
			//Si il est pas valide on crée un message d'erreur
			else{
				$this->error['mail'] = 'Email non valide';
			}	
		}
		//Si le champs est vide on crée un message d'erreur
		else{
			$this->error['mail'] = 'Le champs Email doit être rempli.';
		}
	}


	/**
	 * [stringIntervalle description]On teste la taille d'un string et on verifie qu'il est dans les bornes
	 * @param  [string] $string [description] variable a tester
	 * @param  [string] $label  [description] nom a donner au tableau associatif comme cle pour afficher les erreurs
	 * @param  [int] $min    [description] taille minimale autorisé
	 * @param  [int] $max    [description] taille maximale autorisé
	 * @return [type]         [description]
	 */
	private function stringIntervalle($min,$max,$string,$label){
		//Si le string est inférieur à la bornes MIN, on crée un message d'erreur
		if(strlen($string)<$min){
			$this->error[$label] = 'Le champs "'.ucfirst($label).'" doit être supérieur à '.$min.'.';
		}
		//Si le string est superieur à la bornes MAX, on crée un message d'erreur
		if(strlen($string)>$max){
			$this->error[$label] = 'Le champs "'.ucfirst($label).'" doit être inférieur à '.$max.'.';
		}
	}

	/**
	 * [checkPassword description]On verifie que le mot de passe est valide
	 * @return [type] [description]
	 */
	private function checkPassword(){
		//Si le mot de passe n'est pas vide
		if(!empty($this->password)){
			//Si le mot de passe ne contient pas d'espaces
			if(preg_match('#^[^\s]+$#', $this->password)){
				$this->stringIntervalle(MIN_PASSWORD,MAX_PASSWORD,$this->password,'password');
			}
			//Si il y a des espaces, on crée un message d'erreur
			else{
				$this->error['password'] = 'Le champs "'.ucfirst('mot de passe').'" ne doit pas comporter d\'espaces blancs.';
			}
		}
		//Si le mot de passe est vide, on crée un message d'erreur
		else{
			$this->error['password'] = 'Le champs "'.ucfirst('mot de passe').'" ne doit pas être vide.';
		}
	}

	/**
	 * [checkPasswordConfirmed description]On verifie que l'utilisateur est entrée 2 fois le même mot de passe
	 * @return [type] [description]
	 */
	private function checkPasswordConfirmed(){
		//Si 'confirmez le mot de passe' n'est pas vide
		if(!empty($this->passwordConfirmed)){
			//Si passwordConfirmed est différent de password, on crée un message d'erreur
			if($this->password !== $this->passwordConfirmed){
				$this->error['passwordConfirmed'] = "Le mot de passe n'est pas identique!.";
			}
		}
		//Si 'confirmez le mot de passe' est vide, on crée un message d'erreur
		else{
			$this->error['passwordConfirmed'] = "Ce champs ne doit pas rester vide.";
		}
	}
}
	


