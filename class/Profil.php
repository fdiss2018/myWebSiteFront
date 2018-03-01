<?php

class Profil extends ObjBdd
{
    var $profilName;
    
    function Profil($profilName){
        $this->profilName= $profilName;
        
    }
    
    function getAcces($objBdd) {
        
        return $acces;
    }
    
    
}

