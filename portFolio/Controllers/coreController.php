<?php
//Ce controleur est la parent de tous les autres controleurs
abstract class coreController{
	/*
	 **array contient tous les paramètres récupérés en GET sous forme d'un tableau associatif (ex: 'groupe'=>3)
	  */
	protected $parameters;

	/*
	 **array contient toutes les données récupérées en POST sous forme d'un tableau associatif (ex: 'password'=>'champignon')
	  */
	protected $data;

	/*
	 **@params
	 **@action initialise les attributs sous forme de tableaux vides
	 **@return
	  */
	public function __construct(){
		$this->parameters = array();
		$this->data = array();
	}

	/*
	 **@params array 
	 **@action enregistres les parametres (a priori les données du GET)
	 **@return
	  */
	public function setParameters(array $parameters){
		$this->parameters = $parameters;
	}

	/*
	 **@params array 
	 **@action enregistres les données(a priori les données du POST)
	 **@return
	  */
	public function setData(array $data){
		$this->data = $data;
	}
}