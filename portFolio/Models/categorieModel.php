<?php
class categorieModel extends parentModel{
    /**
     * [getCategorieBDD description] On recupere dans la BDD la liste des catégorie appartenant à une section donnée,puis on les instancie
     * @param  [int] $n [description] identifiant de la section
     * @return [array]    [description]instances de Categorie
     */
    public function getCategorieBDD($n){

        $sql = 'SELECT * FROM categorie  INNER JOIN section ON c_section_fk = s_id WHERE s_id = '. $n;

        $results = $this->makeselect($sql);
        if (empty($results)) {
            return NULL;
        }
        $mesCategories = array();
        foreach ($results as $key => $value) {
            $mesCategories[] = new Categorie($value);
        }
        return $mesCategories;
    }
}


