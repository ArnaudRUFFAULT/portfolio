<?php
class categorieModel extends parentModel{

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


