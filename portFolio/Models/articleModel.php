<?php
class articleModel extends parentModel{

    /**
     * [getRealisationsBDD description] On recupere un nombre donné de réalisation dans la BDD, ou si aucun nombre ,est indiqué on recupere toute la liste des réalisations de la plus recente a la plus ancienne
     * @param  [int] $combien [description]nombre de réalisation a récuperer
     * @return [array]          [description]instances de réalisations dans un tableau
     */
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

    public function getFicheRealisationBDD($id){

        $sql = 'SELECT * FROM article INNER JOIN categorie ON a_categorie_fk = categorie.c_id INNER JOIN section ON c_section_fk = s_id WHERE s_id = 3 AND a_id = '.htmlentities($id);

        $result = $this->makeselect($sql);

        if (empty($result)) {
            return NULL;
        }
        $maFicheRealisation = new Article($result[0]);
        
        return $maFicheRealisation;
    }

    /**
     * [getServicesBDD description]On récupère dans la BDD tous les articles de la section Service, puis on les instancie
     * @return [array] [description]instances de services dans un tableau
     */
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

    /**
     * [getCvBDD description]On récupère dans la BDD tous les articles de la section CV, puis on les instancie
     * @return [array] [description]instances d'article CV dans un tableau
     */
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


