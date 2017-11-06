<?php
class parentModel extends coreModel{
	/*
	 ** @param
	 ** @action Cherche dans la BDD les reseaux sociaux, les instancie grâce à la classe Network , et les retourne dans un tableau
	 ** @return array (object Network || NULL)
	  */
	public function getNetworksDB(){
		$sql = 'SELECT * FROM network';
		$results = $this->makeselect($sql);
		if (empty($results)) {
			return NULL;
		}
		$mesNetworks = array();
		foreach ($results as $key => $value) {
			$mesNetworks[] = new Network($value);
		}
		return $mesNetworks;	
	}

    public function getProprietaireDB(){
        $sql = 'SELECT * FROM proprietaire WHERE p_id = 1';
        $result = $this->makeselect($sql);
        if (empty($result)) {
            return NULL;
        }
        $monProprietaire = $result[0];
        foreach ($result as $key => $value) {
            $monProprietaire[] = new Proprietaire($value);
        }
        return $monProprietaire[0];
    }
}