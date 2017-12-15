<?php
class Article{
    /**
     * [$id description] Identifiant de l'article
     * @var [type] int
     */
    private $id;

    /**
     * [$date description] Date de la publication de l'article AAAA-MM-DD
     * @var [type] date
     */
    private $date;

    /**
     * [$titre description] Titre de l'article
     * @var [type] string
     */
    private $titre;

    /**
     * [$titre description] Description de l'article
     * @var [type] string
     */
    private $description;

    /**
     * [$contenu description] Contenu de l'article
     * @var [type] string
     */
    private $contenu;

    /**
     * [$lien description] Lien qui redirige vers l'article
     * @var [type] string
     */
    private $lien;

    /**
     * [$validation description] Determine c'est un article est visible ou bien en attente de révision
     * @var [type] bool
     */
    private $validation;

    /**
     * [$idAuteur description] Identifiant de l'auteur de l'article
     * @var [type] int
     */
    private $idAuteur;

    /**
     * [$idCategorie description] Identifiant de la categorie de l'article(ex:1 represente la categorie "Intégration / Développement Front-End")
     * @var [type] int
     */
    private $idCategorie;


    /**
     * [__construct description] Instancie un article
     * @param array $data [description] Ce tableau associatif doit contenir toutes les informations pour instancier un article
     */
    public function __construct(array $data){
        $this->id = $data['a_id'];
        $this->date = $data['a_date'];
        $this->titre = $data['a_titre'];
        $this->description = $data['a_description'];
        $this->contenu = $data['a_texte'];
        $this->lien = $data['a_lien'];
        $this->validation = $data['a_validation'];
        $this->idAuteur = $data['a_user_fk'];
        $this->idCategorie = $data['a_categorie_fk'];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed string
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $titre
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * @param string $lien
     */
    public function setLien($lien)
    {
        $this->lien = $lien;
    }

    /**
     * @return mixed
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * @param bool $validation
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;
    }

    /**
     * @return int
     */
    public function getIdAuteur()
    {
        return $this->idAuteur;
    }


    /**
     * @return mixed
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * @param int $idCategorie
     */
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;
    }


}