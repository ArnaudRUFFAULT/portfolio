<?php
class articleModel extends parentModel{

    public function getRealisationsBDD($combien = NULL){

        $sql = 'SELECT * FROM article INNER JOIN categorie ON a_categorie_fk = categorie.c_id INNER JOIN section ON c_section_fk = s_id WHERE s_id = 3 AND a_validation = true ORDER BY a_date DESC ';

        if(is_numeric($combien)){
            $sql ='SELECT * FROM article INNER JOIN categorie ON a_categorie_fk = categorie.c_id INNER JOIN section ON c_section_fk = s_id WHERE s_id = 3 AND a_validation = true ORDER BY a_date DESC LIMIT '.$combien;
        }
        $results = $this->makeselect($sql);
        if (empty($results)) {
            return NULL;
        }
        $mesRealisations = array();
        foreach ($results as $key => $value) {
            $mesRealisations[] = new Article($value);
        }
        return $mesRealisations;
    }

    public function getServicesBDD(){

        $sql='SELECT * FROM article INNER JOIN categorie ON a_categorie_fk = categorie.c_id INNER JOIN section ON c_section_fk = s_id WHERE s_id = 2 AND a_validation = true';

        $results = $this->makeSelect($sql);
        if (empty($results)) {
            return NULL;
        }
        $mesServices = array();
        foreach ($results as $key => $value) {
            $mesServices[] = new Article($value);
        }
        return $mesServices;
    }

    public function getCvBDD(){

        $sql='SELECT * FROM article INNER JOIN categorie ON a_categorie_fk = categorie.c_id INNER JOIN section ON c_section_fk = s_id WHERE s_id = 4 AND a_validation = true';

        $results = $this->makeSelect($sql);
        if (empty($results)) {
            return NULL;
        }
        $monCV = array();
        foreach ($results as $key => $value) {
            $monCV[] = new Article($value);
        }
        return $monCV;
    }
}


