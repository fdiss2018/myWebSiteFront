<?php
// Constantes
// Politique d'acces
Define("POLITIQUE_ACCES_ADD","ADD");
Define("POLITIQUE_ACCES_READ","READ");
Define("POLITIQUE_ACCES_UPDATE","UPDATE");
Define("POLITIQUE_ACCES_DELETE","DELETE");
Define("POLITIQUE_ACCES_USE","USE");

Define("POLITIQUE_ACCES_EVERY_THING","*EVERY_THING");
Define("POLITIQUE_ACCES_EVERY_USER","*EVERY_USER");
Define("POLITIQUE_ACCES_OWNER","*OWNER");
Define("POLITIQUE_ACCES_NONE","*NONE");
/**
 * @author Administrateur
 *
 */
class PolitiqueAcces extends ObjBdd
{
    
    STATIC $cpt;
    STATIC $LstPolitiquesAcces = array();
    
    var $who;   // UserName/ProfilName/Role
    var $class;  //Class/Instance/Methode
    var $obj;
    var $process;  //Class/Instance/Methode
	
    var $readAccess;
    var $addAccess;
    var $updateAccess;
    var $deleteAccess;
    var $useAccess;
    
    function PolitiqueAcces($who, $class, $object, $process, $readAccess, $writeAccess, $addAccess, $updateAccess, $useAccess){
        $this->who = $who;
        $this->class = $class;
        $this->obj   = $object;
        $this->process = $process;
		$this->readAccess = $readAccess;
        $this->addAccess = $addAccess;
        $this->updateAccess = $updateAccess;
        $this->useAccess = $useAccess;
        
        self::$cpt++;
        $this->id = "POL".self::$cpt;
        
        self::$LstPolitiquesAcces[count(self::$LstPolitiquesAcces)] = $this;
        
    }
    
   Static function estAccessible($utilisateur, $objBdd, $methode, $comment) {
       traceSessionStart("Politique access ".$utilisateur."-".$objBdd."-".$methode, $comment);
       // 10000 user instance (4=utilisateur, 3=proprietaire, 2=*ALL, -1 = non correspondance
       // 100
       
       $CurrentPolitiqueAcces = null;
       $scoreCorrespondance = 0;
       $result = false;
       
       // dump(self::$politiquesAcces);
       
       // Analyse Objet
       foreach (self::$LstPolitiquesAcces as $key => $PolitiquesAcces) {
           traceSessionStart("Analyse ", $PolitiquesAcces->toString());
           
           $score = 0;
           
           // Analyse Méthode
           if ($methode == $PolitiquesAcces->process) { $score = 100;} 
           else { $score = -100; }
           
           // Analyse Objet
           if ($score > 0) {
               if(is_string($objBdd)){
                   // Test de class
                   if ($objBdd == $PolitiquesAcces->class ) {$score += 1000;}
                   else { $score = -1000; }
               }
               else {
                   if ($PolitiquesAcces->obj == $objBdd->getId()) { $score += 3000;}
                   else {
                       if ($PolitiquesAcces->obj == null) {
                           if (get_class($objBdd) == $PolitiquesAcces->class) { $score += 2000;}
                           else {
                               if ($PolitiquesAcces->class == null) { $score = 1000;} 
                               else {   $score = -2000; }
                            }
                       }
                       else { $score = -3000;}
                   }
               }
           }           
           
           // Analyse Utilisateur
           if($score > 0) {
               if ($utilisateur == $PolitiquesAcces->who){$score += 500;}
               else{
                   // echo "/-".$objBdd->isOwner($utilisateur)."-/";
                   if ($PolitiquesAcces->who == POLITIQUE_ACCES_OWNER && $objBdd->isOwner($utilisateur)){$score += 400;}
                   else {
                       if ($PolitiquesAcces->who == POLITIQUE_ACCES_EVERY_USER && $utilisateur != null ){$score += 300;}
                       else {
                           if ($PolitiquesAcces->who == POLITIQUE_ACCES_EVERY_THING){ $score += 200;}
                           else {$score = -200;}
                       }
                   }
               }
           }
           
           // Résultat
           traceSession("Score ", $score);
           if ($score > 0 && $scoreCorrespondance < $score ){
               $CurrentPolitiqueAcces = $PolitiquesAcces;
               $scoreCorrespondance = $score;
           } 
           traceSessionEnd();
       }
       
       
       // Politique selectionnée ;
       if ($CurrentPolitiqueAcces != null){
           traceSession("Politique selectionnée [".$CurrentPolitiqueAcces->toString()."] ", $scoreCorrespondance);
           switch ($comment) {
               case POLITIQUE_ACCES_READ:
                   $result = $CurrentPolitiqueAcces->readAccess;
                   break;
               case POLITIQUE_ACCES_ADD:
                   $result = $CurrentPolitiqueAcces->addAccess;
                   break;
               case POLITIQUE_ACCES_UPDATE:
                   $result = $CurrentPolitiqueAcces->updateAccess;
                   break;
               case POLITIQUE_ACCES_DELETE:
                   $result = $CurrentPolitiqueAcces->deleteAccess;
                   break;
               case POLITIQUE_ACCES_USE:
                   $result = $CurrentPolitiqueAcces->useAccess;
                   break;
               throw new Exception('estAccessible : Type accès inconnu');    
           }
       }
       else {
           traceSession("Pas de politique d acces ", "");
           $result = false;
       }
       
       traceSession("Resultat ".$comment, $result);
       traceSessionEnd();
       return $result;
   }
    
   /**
     * @return multitype:
     */
    public static function getPolitiquesAcces()
    {
        return PolitiqueAcces::$LstPolitiquesAcces;
    }

/**
     * @param multitype: $politiquesAcces
     */
    public static function setPolitiquesAcces($LstPolitiquesAcces)
    {
        PolitiqueAcces::$LstPolitiquesAcces = $LstPolitiquesAcces;
    }

function toString() {
       return $this->id."[WHO:".$this->who."|WHAT:".$this->class."/".$this->obj."/".$this->process."|READ:".$this->readAccess."|ADD:".$this->addAccess."|UPD:".$this->updateAccess."|DLT:".$this->deleteAccess."|USE:".$this->useAccess;
   }
   
}

