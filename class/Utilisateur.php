<?php

class Utilisateur extends ObjBdd {
    
    var $profil;
    var $userName;
    
    /**
     * @return the $userName
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param field_type $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    function Utilisateur($userName, $profil){
        $this->profil = $profil;
        $this->userName = $userName;
    }
    
    function getPrefixId()	{
        return "UT";
    }
    
    
    static function login($login, $password) {
        // En attendant
        global $administrateur;
        if($login == "FDY" && $password == "Lswefdy") 
        {
                //echo "!non exception!";
            return $administrateur;
        }
        else {
            //echo "!exception!";
            throw(
                new Exception('Erreur de connexion'));
        }
    }
    
}
