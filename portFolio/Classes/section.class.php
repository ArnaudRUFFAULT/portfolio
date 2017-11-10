<?php
class Section{
    /**
     * [$id description] identifiant de la Section
     * @var [type] int
     */
    private $id;

    /**
     * [$libelle description] Libelle de la section
     * @var [type] string
     */
    private $libelle;

    /**
     * [$texte description] Description de la section
     * @var [type] string
     */
    private $texte;

    /**
     * [__construct description]Instancie une section
     * @param array $data [description] Ce tableau associatif doit contenir toutes les informations pour instancier une section
     */
    public function __construct(array $data){
        $this->id = $data['s_id'];
        $this->libelle = $data['s_libelle'];
        $this->texte = $data['s_texte'];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * @param mixed $texte
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
    }
}