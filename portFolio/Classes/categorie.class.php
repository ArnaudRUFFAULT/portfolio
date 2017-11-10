<?php
class Categorie{
    /**
     * [$id description]Identifiant de la categorie
     * @var [type] int
     */
    private $id;

    /**
     * [$libelle description] Libelle de la categorie
     * @var [type] string
     */
    private $libelle;

    /**
     * [$description description] Description de la catégorie
     * @var [type] string
     */
    private $description;

    /**
     * [$idSection description] Identifiant de la section à laquelle appartient la categorie
     * @var [type] int
     */
    private $idSection;

    /**
     * [__construct description] Instancie une categorie
     * @param array $data [description] Ce tableau associatif doit contenir toutes les informations pour instancier une categorie
     */
    public function __construct(array $data){
        $this->id = $data['c_id'];
        $this->libelle = $data['c_libelle'];
        $this->description = $data['c_description'];
        $this->idSection = $data['c_section_fk'];
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getIdSection()
    {
        return $this->idSection;
    }

    /**
     * @param int $idSection
     */
    public function setIdSection($idSection)
    {
        $this->idSection = $idSection;
    }
}