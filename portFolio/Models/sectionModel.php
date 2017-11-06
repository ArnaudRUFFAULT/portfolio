<?php
class sectionModel extends parentModel{

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


