<?php
abstract class parentController extends coreController{

	/**
	 * [$networks description] Tableau qui contient des instances de networks
	 * @var [type] array
	 */
	protected $networks;

	/**
	 * [$proprietaire description] L'unique instance de proprietaire
	 * @var [type] object
	 */
	protected $proprietaire;

	/**
	 * [$section description] Tableau qui contient des instances de section
	 * @var [array] 
	 */
	protected $section;

	/**
	 * [$categorie description] Tableau qui contient des instances categorie
	 * @var [array] 
	 */
	protected $categorie;


	/*
	 ** @param
	 ** @action Rempli l'attribut $MesNetworks à partir de la BDD
	 ** @return
	  */
	public function __construct(){
		parent:: __construct();
		$this->getNetworks();
		$this->getProprietaire();
	}

	/*
	 ** @param
	 ** @action Etablit la connexion à la BDD et récupère les informations de la table network, puis les instancie
	 ** @return
	  */
	private function getNetworks(){
		$model = new parentModel;
		$this->networks = $model -> getNetworksDB();
	}

	/**
	 * [getSection description] Etablit la connexion à la BDD et récupère les informations de la table section, puis les instancie
	 * @param  [int] $n [description] identifiant de la section
	 * @return [array]    [description] tableau qui contient les instances de section
	 */
    protected function getSection($n){
        $model = new sectionModel;
        $this->section = $model -> getSectionBDD($n);
    }

    /**
     * [getCategorie description] Etablit la connexion à la BDD et récupère les informations de la table categorie, puis les instancie
     * @param  [int] $n [description] Identifiant de la categorie
     * @return [array]    [description] tableau qui contient les instances de categorie
     */
    protected function getCategorie($n){
        $model = new categorieModel;
        $this->categorie = $model -> getCategorieBDD($n);
    }

    /**
     * [getProprietaire description] Etablit la connexion à la BDD et récupère les informations de la table proprioetaire, puis les instancie
     * @return [object] [description] instance de classe Proprietaire
     */
    private function getProprietaire(){
        $model = new parentModel;
        $this->proprietaire = $model -> getProprietaireDB();
    }

    /**
     * [getHeader description] génère le header et le met dans une variable
     * @return [string] [description] 
     */
	protected function getHeader(){
        ob_start();
        require (HEADER);
        $header = ob_get_clean();
        return $header;
    }
	/*
	 ** @param
	 ** @action cree dans une variable le footer
	 ** @return
	  */
	protected function getFooter(){
			ob_start();
			require (FOOTER);
			$footer = ob_get_clean();
			return $footer;
	}

	protected function loadView($nameView, $variables = array(), $noBuffer = false){
		extract($variables);
		if($noBuffer){
			include($nameView);
			return true;
		}
		else{
			ob_start();
        	require ($nameView);
        	return ob_get_clean();
		}
	}
}
		