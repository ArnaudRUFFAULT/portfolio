<?php
class Categorie{
    private $id;
    private $libelle;
    private $description;
    private $idSection;


    public function __construct(array $data){
        $this->id = $data['c_id'];
        $this->libelle = $data['c_libelle'];
        $this->description = $data['c_description'];
        $this->idSection = $data['c_section_fk'];
    }

    /**
     * @return mixed
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
     * @return mixed
     */
    public function getIdSection()
    {
        return $this->idSection;
    }

    /**
     * @param mixed $idSection
     */
    public function setIdSection($idSection)
    {
        $this->idSection = $idSection;
    }



}