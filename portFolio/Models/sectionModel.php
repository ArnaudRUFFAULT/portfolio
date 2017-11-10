<?php
class sectionModel extends parentModel{
    /**
     * [getSectionBDD description] A partir de l'identifiant d'une section, on recupere ces info en BDD et on l'instancie
     * @param  [int] $n [description] Identifiant de le section
     * @return [object]    [description] Instance de Section
     */
    public function getSectionBDD($n){

        $sql = 'SELECT * FROM section  WHERE s_id = '. $n;

        $results = $this->makeselect($sql);
        if (empty($results)) {
            return NULL;
        }
        $maSection = array();
        foreach ($results as $key => $value) {
            $maSection[] = new Section($value);
        }
        return $maSection[0];
    }
}


