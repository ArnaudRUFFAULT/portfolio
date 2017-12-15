<?php
class FormHandler implements JsonSerializable{
	/**
	 * [$nom description]valeur saisie dans l'input nom du formaulaire d'inscription
	 * @var [string]
	 */
	private $nom = null;

	/**
	 * [$prenom description]valeur saisie dans l'input prenom du formaulaire d'inscription
	 * @var [string]
	 */
	private $prenom = null;

	/**
	 * [$pseudo description]valeur saisie dans l'input pseudo du formaulaire d'inscription
	 * @var [string]
	 */
	private $pseudo = null;

	/**
	 * [$mail description]valeur saisie dans l'input mail du formaulaire d'inscription
	 * @var [string]
	 */
	private $mail = null;
	/**
	 * [$nom description]valeur saisie dans l'input nom du formaulaire d'inscription
	 * @var [string]
	 */
	private $password = null;
	/**
	 * coorespond à un mot de passe
	 * @var null|string
	 */
	private $passwordConfirmed = null;
	/**
	 * coorespond à un mot de passe
	 * @var null|string
	 */
	private $newPassword = null;

	/**
	 * coorespond à un mot de passe
	 * @var null|string
	 */
	private $confirmedNewPassword = null;

	/**
	 * coorespond à un une question secrete
	 * @var null|string
	 */
	private $newQuestion = null;

	/**
	 * coorespond à une reponse secrete
	 * @var null|string
	 */
	private $newAnswer = null;

	/**
	 * tableau qui récupère toutes les erreurs
	 * @var array
	 */
	private $error = array();

	/**
	 * Instancie un FormHandler
	 * @param array $data tableau associatif dont les clés doivent correspondre à un attribut
	 */
	public function __construct(array $data){
		$this->setNewPassword($data);
		$this->setConfirmedNewPassword($data);
		$this->setNewQuestion($data);
		$this->setNewAnswer($data);
		$this->setNom($data);
		$this->setPrenom($data);
		$this->setPseudo($data);
		$this->setMail($data);
		$this->setPassword($data);
		$this->setPasswordConfirmed($data);
	}

	/**
	 * renvoi un tableau des attributs de l'instance si l'instance est encode en JSON
	 * @return array 
	 */
	public function jsonSerialize(){

	}

	public function checkDataConnexion(){
		$this->checkPassword();
		$this->checkMail();
		return $this->error;
	}

	public function checkInfoInscription(){
		$this->checkPseudo();
		$this->checkPrenom();
		$this->checkNom();
		$this->checkPasswordIntegrity();
		$this->checkPasswordConfirmed();
		$this->checkMail();
		return $this->error;
	}

	public function setNom(array $data){
		if(isset($data['nom'])){
			$this->nom = $data['nom'];
		}
	}

	public function setPrenom(array $data){
		if(isset($data['prenom'])){
			$this->prenom = $data['prenom'];
		}
	}

	public function setPseudo(array $data){
		if(isset($data['pseudo'])){
			$this->pseudo = $data['pseudo'];
		}
	}

	public function setMail(array $data){
		if(isset($data['mail'])){
			$this->mail = $data['mail'];
		}
	}

	public function setPassword(array $data){
		if(isset($data['password'])){
			$this->password = $data['password'];
		}
	}

	public function setPasswordConfirmed(array $data){
		if(isset($data['passwordConfirmed'])){
			$this->passwordConfirmed = $data['passwordConfirmed'];
		}
	}

	/**
	 * modifie l'attribut newPassword
	 * @param array $data Tableau qui doit contenir la clé "newPassword"
	 */
	public function setNewPassword(array $data){
		if(isset($data['newPassword'])){
			$this->newPassword = $data['newPassword'];
		}
	}

	/**
	 * modifie l'attribut confirmedNewPassword
	 * @param array $data Tableau qui doit contenir la clé "confirmedNewPassword"
	 */
	public function setConfirmedNewPassword(array $data){
		if(isset($data['confirmedNewPassword'])){
			$this->confirmedNewPassword = $data['confirmedNewPassword'];
		}
	}

	/**
	 * modifie l'attribut newQuestion
	 * @param array $data Tableau qui doit contenir la clé "newQuestion"
	 */
	public function setNewQuestion(array $data){
		if(isset($data['newQuestion'])){
			$this->newQuestion = $data['newQuestion'];
		}
	}

	/**
	 * modifie l'attribut newAnswer
	 * @param array $data Tableau qui doit contenir la clé "newAnswer"
	 */
	public function setNewAnswer(array $data){
		if(isset($data['newAnswer'])){
			$this->newAnswer = $data['newAnswer'];
		}
	}

	private function checkPseudo(){
		if(!StringHandler::isEmpty($this->pseudo)){
			if(StringHandler::isStringIntervalValid($this->pseudo, MIN_PSEUDO, MAX_PSEUDO)){
				if(StringHandler::isAlphaNumeric($this->pseudo)){

				}
				else{
					$this->error['pseudo'] = 'Le pseudo doit être alphanumérique';
				}
			}
			else{
				$this->error['pseudo'] = 'Le pseudo doit être compris entre '.MIN_PSEUDO.' et '.MAX_PSEUDO.' caractères';
			}

		}
		else{
			$this->error['pseudo'] = 'Le pseudo doit être rempli';
		}
	}

	private function checkPrenom(){
		if(!StringHandler::isEmpty($this->prenom)){
			if(StringHandler::isStringIntervalValid($this->prenom,MIN_PRENOM,MAX_PRENOM)){
				if(StringHandler::isAlpha($this->prenom)){

				}
				else{
					$this->error['prenom'] = 'Le prenom doit être alpha';
				}
			}
			else{
				$this->error['prenom'] = 'Le prenom doit être compris entre '.MIN_PRENOM.' et '.MAX_PRENOM.' caractères';
			}

		}
		else{
			$this->error['prenom'] = 'Le prenom doit être rempli';
		}
	}

	private function checkNom(){
		if(!StringHandler::isEmpty($this->nom)){
			if(StringHandler::isStringIntervalValid($this->nom,MIN_NOM,MAX_NOM)){
				if(StringHandler::isAlpha($this->nom)){

				}
				else{
					$this->error['nom'] = 'Le nom doit être alpha';
				}
			}
			else{
				$this->error['nom'] = 'Le nom doit être compris entre '.MIN_NOM.' et '.MAX_NOM.' caractères';
			}

		}
		else{
			$this->error['nom'] = 'Le nom doit être rempli';
		}
	}

	private function checkPassword(){
		if(!StringHandler::isEmpty($this->password)){
		}
		else{
			$this->error['password'] = 'Vous n\'avez pas entré votre mot de passe';
		}
	}

	private function checkMail(){
		if(StringHandler::isValidEmail($this->mail)){
		}
		else{
			$this->error['mail'] = 'La mail saisi n\' a pas une forme standard';
		}
	}

	

	/**
	 * vérifie la conformité d'un mot de passe
	 */
	private function checkPasswordIntegrity(){
		if(!StringHandler::isEmpty($this->password)){
			if(StringHandler::isStringIntervalValid($this->password, MIN_PASSWORD, MAX_PASSWORD)){

			}
			else{
				$this->error['password']= 'Le mot de passe doit être compris entre '.MIN_PASSWORD.' et '.MAX_PASSWORD. ' caractères';
			}
		}
		else{
			$this->error['password']= 'Le mot de passe ne doit pas être vide';
		}
	}
	/**
	 * Verifie si le mot de passe confirmé correspond au mot de passe saisi
	 */
	private function checkPasswordConfirmed(){
		if($this->password == $this->passwordConfirmed){

		}
		else{
			$this->error['passwordConfirmed']= 'la confirmation du mot de passe n\'est pas identique';
		}
	}



	/**
	 * Verifie la conformité d'une question secrete
	 */
	private function checkNewQuestion(){
		if(!StringHandler::isEmpty($this->newQuestion)){
			if(StringHandler::isStringIntervalValid($this->newQuestion, QUESTION_MIN, QUESTION_MAX)){
				if(StringHandler::isQuestionValid($this->newQuestion)){

				}
				else{
					$this->error['newQuestion'] = 'La question n\'a pas une syntaxe valide, comprends uniquement des caractères alphanumériques, des espaces et un point d\'interrogation sans accentuation';
				}
			}
			else{
				$this->error['newQuestion']= 'La question doit être comprise entre '.QUESTION_MIN.' et '.QUESTION_MAX. ' caractères';
			}
		}
		else{
			$this->error['newQuestion']= 'La question ne doit pas être vide';
		}

	}

	/**
	 * Verifie la conformité d'une reponse secrete
	 */
	private function checkNewAnswer(){
		if(!StringHandler::isEmpty($this->newAnswer)){
			if(StringHandler::isStringIntervalValid($this->newAnswer, ANSWER_MIN, ANSWER_MAX)){
			}
			else{
				$this->error['newAnswer']= 'La reponse doit être comprise entre '.ANSWER_MIN.' et '.ANSWER_MAX. ' caractères';
			}
		}
		else{
			$this->error['newAnswer']= 'La reponse ne doit pas être vide';
		}
	}
}