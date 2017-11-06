<?php
class Network{
	private $id;
	private $libelle;
	private $url;
	private $logo;

	public function __construct(array $data){
		$this->id = $data['n_id'];
		$this->libelle = $data['n_libelle'];
		$this->url = $data['n_url'];
		$this->logo = $data['n_logo'];
	}
	public function getId(){
		return $this->id;
	}

	public function getLibelle(){
		return $this->libelle;
	}

	public function setLibelle($libelle){
		$this->libelle = $libelle;
	}

	public function getUrl(){
		return $this->url;
	}

	public function setUrl($url){
		$this->url = $url;
	}

	public function getLogo(){
		return $this->logo;
	}

	public function setLogo($logo){
		$this->logo = $logo;
	}
	
}