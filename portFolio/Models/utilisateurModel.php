<?php
class utilisateurModel extends parentModel{
    /**
     * [insertUserBDD description]On enregistre un utilisateur dans la BDD
     * @param  array  $data [description] tableau qui contient les donné a enregistrer dans la BDD
     * @return [bool]       [description] True si l'enregistrement a fonctionné , sinon false
     */
    public function insertUserBDD(array $data){
        try{
            $sql = 'INSERT INTO user (u_nom, u_prenom, u_pseudo, u_mail, u_password, u_grade_fk) VALUES (:nom, :prenom, :pseudo, :mail, :password , :grade)';

            $params = array(
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'pseudo' => $data['pseudo'],
                'mail' => $data['mail'],
                'password' => $data['password'],
                'grade' => 4
             );

        $this->makeStatement($sql,$params);

        return true;
        }
        catch(Exeption $e){
            return false;
        }   
    }

    /**
     * [checkMailBDD description] On verifie que le mail existe deja ou non dans la BDD
     * @param  [string] $mail [description] Mail a comparer a la BDD
     * @return [bool]       [description] Si le mail existe en BDD, on retourne false, sinon true
     */
    public function checkMailBDD($mail){
        try{
            $sql = 'SELECT user.* FROM user WHERE u_mail = "'. $mail .'"';
            $result = $this->makeselect($sql);
            if(empty($result)){
                return true;
            }
            else{
                return false;
            }     
        }
        catch(Exeption $e){
            return false;
        }   
    }

    /**
     * [checkUserBDD description] On regarde si l'association d'un mail et d'un mot de passe donnés correspond à un utilisateur dans la BDD
     * @param  array  $data [description] contient le mot de passe et le mail a tester
     * @return [array]       [description]retourne un tableau vide si cette association existe en BDD, sinon on etourne un tableau avec les erreurs génèrés
     */
    public function checkUserBDD(array $data){
        try{
            $error=array();
            //Si ce mail existe en BDD, on cherche le mot de passe correspondant
            if(!$this->checkMailBDD($data['mail'])){
                $sql = 'SELECT u_password FROM user WHERE u_mail = "'. $data['mail'].'"';
                $result = $this->makeselect($sql);
                //On vérifie que le mot de passe de la BDD est identique au mot de passe donnée
                if(password_verify($data['password'],$result[0]['u_password'])){
                    //Si c'est le même, on vérifie si il faut rehasher le mot de passe
                    if(password_needs_rehash($result[0]['u_password'],PASSWORD_DEFAULT)){
                        $this->passwordNeedsReashBDD($data);
                    }
                }
                //Si c'est pas le même mot de passe, on génère une erreur
                else{
                    $error['password']='Mot de passe incorrecte';
                }
            } 
            //Si ce mail n'éxiste pas dans la BDD , on génère une erreur
            else{
                $error['mail']='Ce mail n\'existe pas dans la Base de données';
            }
            return $error;  
        }
        catch(Exeption $e){
            
        } 
    }

    /**
     * [getUserBDD description]A partir d'un mail, on récupère les données utilisateurs et on instancie cet utilisateur
     * @param  [string] $mail [description] mail a tester
     * @return [object]       [description] instance de Utilisateur
     */
    public function getUserBDD($mail){
        if($this->checkMailBDD($data['mail'])){
            $sql = 'SELECT * FROM user WHERE u_mail = "' . $mail .'"';
            $result = $this->makeselect($sql);
            return $result[0];
        }
    }

    /**
     * [passwordNeedsReashBDD description]Rehash le mot de passe et l'enregistre en BDD a la place de l'ancien
     * @param  array  $data [description] contient le mail et le mot de passe
     * @return [type]       [description]
     */
    private function passwordNeedsReashBDD(array $data){
        $mail = htmlentities($data["mail"]);
        //On hash le mot de passe
        $passwordHash = password_hash($data['password'],PASSWORD_DEFAULT);
        //On met à jour la BDD avec le novueau mot de passe
        $sql = 'UPDATE user SET u_password = :password WHERE u_mail = :mail';
        $params = array('password'=>$passwordHash,'mail'=>$mail);
        $this->makeStatement($sql,$params);
    }
}

