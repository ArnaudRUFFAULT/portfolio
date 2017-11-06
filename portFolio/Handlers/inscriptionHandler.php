<?php
class inscriptionHandler{
		private $error = array();

		public function checkInfo(array $data){

		$this->stringAlphaNotEmpty($data['nom'],'nom',2,60);

		$this->stringAlphaNotEmpty($data['prenom'],'prenom',2,60);

		$this->stringAlphaNumericNotEmpty($data['pseudo'],'pseudo',4,20);

		$this->validEmail($data['mail']);


		return $this->error;
	}


		




	private function stringAlphaNotEmpty($string,$label,$min,$max){
		if(!empty($string)){
			if(preg_match('#^[A-Za-z- ]+$#', $string)){
				$this->stringIntervalle($min,$max,$string,$label);
			}
			else{
				$this->error[$label] = 'Le champs "'.ucfirst($label).'" contient uniquement des lettres, espaces et tirets.';
			}
		}
		else{
			$this->error[$label] = 'Le champs "'.ucfirst($label).'" ne doit pas être vide.';
		}
	}

	private function stringAlphaNumericNotEmpty($string,$label,$min,$max){
		if(!empty($string)){
			if(preg_match('#^[0-9A-Za-z-]+$#', $string)){
				$this->stringIntervalle($min,$max,$string,$label);
			}
			else{
				$this->error[$label] = 'Le champs "'.ucfirst($label).'" doit être alphanumerique, peut comporter des tirets.';
			}
		}
		else{
			$this->error[$label] = 'Le champs "'.ucfirst($label).'" ne doit pas être vide.';
		}
	}

	private function validEmail($email){
		if (!empty($email)){
			if(preg_match('#^[a-z0-9\._-]+@[a-z0-9\._]{2,}\.[a-z]{2,4}#', $email)){		
			}
			else{
				$this->error['mail'] = 'Email non valide';
			}	
		}
		else{
			$this->error['mail'] = 'Le champs Email doit être rempli.';
		}
	}


	private function stringIntervalle($min,$max,$string,$label){
		if(strlen($string)<$min){
			$this->error[$label] = 'Le champs "'.ucfirst($label).'" doit être supérieur à '.$min.'.';
		}
		if(strlen($string)>$max){
			$this->error[$label] = 'Le champs "'.ucfirst($label).'" doit être inférieur à '.$max.'.';
		}
	}
}
	


