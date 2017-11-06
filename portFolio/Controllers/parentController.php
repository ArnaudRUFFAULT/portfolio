<?php
abstract class parentController extends coreController{

	/*
	 ** array Contient la liste des instances de la classe Network
	  */
	protected $networks;

	protected $proprietaire;

	protected $section;

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

    protected function getSection($n){
        $model = new sectionModel;
        $this->section = $model -> getSectionBDD($n);
    }

    protected function getCategorie($n){
        $model = new categorieModel;
        $this->categorie = $model -> getCategorieBDD($n);
    }

    private function getProprietaire(){
        $model = new parentModel;
        $this->proprietaire = $model -> getProprietaireDB();
    }

	protected function getHeader(){
        ob_start();
        require (HEADER);
        $header = ob_get_clean();
        return $header;
    }

	/*
	 ** @param
	 ** @action crée le module qui contient les liens vers les reseaux sociaux du footer grâce à un tampon, puis l'ajoute a l'attribut $Networks
	 ** @return
	  */
	protected function getFooter(){
			ob_start();
			require (FOOTER);
			$footer = ob_get_clean();
			return $footer;

	}
}
		