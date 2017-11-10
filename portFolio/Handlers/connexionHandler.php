<?php
class connexionHandler extends formHandler{
	//Attribut error dans le formHandler
	
	/**
	 * [$mail description]Recupere la valeur de l'input mail
	 * @var [string]
	 */
	private $mail;

	/**
	 * [$password description]Recupere la valeur de l'input password
	 * @var [string]
	 */
	private $password;

	/**
	 * [__construct description]Instancie un connexionHandler
	 * @param array $data [description]Tableau associatif qui doit contenir toutes les informations nécessaires à l'instanciation
	 */
	public function __construct(array $data){
		$this->mail = $data['mail'];
		$this->password = $data['password'];
	}

	/**
	 * [checkInfo description]Verifie si le mail ou le mot de passe est correcte, et renvoir un tableau d'erreurs ou un tableau vide
	 * @return [array] [description]
	 */
	public function checkInfo(){
		$this->checkpassword();
		$this->checkMail();
		return $this->error;
	}

	/**
	 * [checkMail description]Verifie si le mail n'est pas vide
	 * @return [type] [description]
	 */
	private function checkMail(){
		if ($this->mail=='') {
			$this->error['mail'] = "Le mail doit être remplie";
		}
	}

	/**
	 * [checkpassword description]Verifie si le mot de passe n'est pas vide
	 * @return [type] [description]
	 */
	private function checkpassword(){
		if ($this->password=='') {
			$this->error['password'] = "Le mot de passe doit être remplie";
		}
	}
}
	


