<?php
class Network{
	/**
	 * [$id description] Identifiant du reseau social
	 * @var [type] int
	 */
	private $id;

	/**
	 * [$libelle description] Description du reseau social
	 * @var [type] string
	 */
	private $libelle;

	/**
	 * [$url description] Lien vers la page du reseau social
	 * @var [type] string
	 */
	private $url;

	/**
	 * [$logo description] Chemin vers le logo a afficher du reseau social
	 * @var [type] string
	 */
	private $logo;

	/**
	 * [__construct description] Instancie un reseau social
	 * @param array $data [description] Ce tableau associatif doit contenir toutes les informations pour instancier un reseau social
	 */
	public function __construct(array $data){
		$this->id = $data['n_id'];
		$this->libelle = $data['n_libelle'];
		$this->url = $data['n_url'];
		$this->logo = $data['n_logo'];
	}

    /**
     * @return [type] int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return [type] string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param [type] string $libelle
     *
     * @return self
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return [type] string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param [type] string $url
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return [type] string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param [type] string $logo
     *
     * @return self
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }
}