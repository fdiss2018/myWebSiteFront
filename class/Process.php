<?php
// Constantes
// Etat Process
Define("PROCESS_ETAT_INITIAL","*INITIAL");
Define("PROCESS_ETAT_ENCOURS","*EN_COURS");
Define("PROCESS_ETAT_ENERR"  ,"*EN_ERREUR");
Define("PROCESS_ETAT_FINAL"  ,"*FINAL");
Define("PROCESS_ETAT_DEFAUT" ,"*ETAT_DEFAUT");

Define("PROCESS_ATTENTE_ACTION_UTILISATEUR","*ATTENTE_ACTION_UTILISATEUR");

// Etat Initial
Define("PROCESS_ETAT_TOUT","*QUELQUESOITLETAT");
Define("PROCESS_WORKFLOW1","*WORKFLOW1");
Define("PROCESS_WORKFLOW2","*WORKFLOW2");

// Tableau action
Define("PROCESS_ACTION_ETAT_INITIAL","*EtatInitial");
Define("PROCESS_ACTION_SCRIPT","*Script");

class Process extends Action{
    
	static $lstProcess = array();
	static $controler;
	// static $configObject = array();
    protected static $defaultVueReponse;

	
    var $processName;
	var $processId;
	var $processType;
    var $lstAction = Array();
    var $resultProcess = Array();
	var $lstParam = Array();
    var $vuesReponse = Array();
    var $etatProcess = PROCESS_ETAT_INITIAL;
    
    /* -====================== */
    /* -== Constructor     ==- */
    /* -====================== */
    function Process($processName, $processId){
        $this->processName = $processName;
        $this->processId = $processId;
        $this->processType = "MVC";
        self::$lstProcess[$processId] = $this;
    }
    
    
    /**
     * @return mixed
     */
    public function isProcessWebService()
    {
        return $this->processType != "MVC";
    }

    /**
     * @param mixed $processTyp
     */
    public function setProcessType($processTyp)
    {
        $this->processType = $processTyp;
    }

    /* -====================== */
    /* -== Getter & Setter ==- */
    /* -====================== */
    static function setDefaultVueReponse($defaultVueReponse){
        self::$defaultVueReponse = $defaultVueReponse;
    }
    
    static function getDefaultVueReponse(){
        return self::$defaultVueReponse;
    }

	static function setControler($controler){
        self::$controler = $controler;
    }

    static function getControler(){
	
		if (self::$controler == null )throw (new ErrorException("Process.GetControler : Controler non défini."));
        return self::$controler;
    }
    
	static function getProcess($processId){
	    traceSession("process id", $processId);
	    
		if (self::$lstProcess[$processId] == null )throw (new ErrorException("Process.GetProcess : Process non défini : [".$processId."]"));
        return self::$lstProcess[$processId];
    }
	
    /**
     * @return mixed
     */
    public function getEtatProcess()
    {
        return $this->etatProcess;
    }
    
    /**
     * @param mixed $etatProcess
     */
    public function setEtatProcess($etatProcess)
    {
        $this->etatProcess = $etatProcess;
    }
    
    
    function setParametresName($lstParametreName){
        $this->parametresName = $lstParametreName;
    }
    
    /**
     * @return multitype:
     */
    public function getResultProcess()
    {
        return $this->resultProcess;
    }

    /**
     * @param multitype: $resultProcess
     */
    public function setResultProcess($id, $resultProcess)
    {
        if($id != ACTIONID_RESULT_NONE) {
            $this->resultProcess[$id] = null;
            if ($resultProcess != null){
                if ($id == ACTIONID_RESULT && is_array ($resultProcess )){
                    foreach ($resultProcess as $key => $result) {
                        $this->resultProcess[$key] = $result;
                    }
                }
                else {
                    $this->resultProcess[$id] = $resultProcess;
                }
            }
        }
    }

    function getLink($Args){
        
        list ($type, $code)=split(':', $this->processId);
        
        $link = "index.php?action=".$code;
        try{
            if($this->parametresName) {
                foreach ($this->parametresName as $k => $parametreName){
                    $link .= "&".$parametreName."=".$Args[$k];
                }
            }
        }
        catch (Exception $exc){
            throw (new ErrorException("Process.getLink : Arguments et parametres process incompatible."));
        }
        return $link;
    }
    

    function addAction($idAction, $action){
		
		$this->addActionEtat($idAction, PROCESS_ETAT_TOUT, $action);
 //       array_push($this->lstAction, $action);
 //       $action->process = $this;
    }

    function addActionEtat($idAction, $etatInitial, $action){
        if ($this->lstAction[$idAction]) {
            // if ($idAction != ACTIONID_RESULT_NONE) throw (new Exception("Identifiant action déja utilisé : " . $idAction));
        }
        else {
            $this->lstAction[$idAction] = array(PROCESS_ACTION_ETAT_INITIAL => $etatInitial, PROCESS_ACTION_SCRIPT => $action);
        }
        // array_push($this->lstAction, array(PROCESS_ACTION_ETAT_INITIAL => $etatInitial, PROCESS_ACTION_SCRIPT => $action));
        $action->process = $this;
    }
	
    function addVue($reponse, $etat){
		traceSession("Config :". $etat, $reponse);
        $this->vuesReponse[$etat] = $reponse;
    }

    function getVue(){
        traceSessionStart("Process.getVue", "");
		traceSessionTab("Vues", $this->vuesReponse);
        traceSession("Process - Etat", $this->etatProcess);
        traceSession("Process - Vue associées", $this->vuesReponse[$this->etatProcess]);
        traceSession("Process - Vue defaut", self::$defaultVueReponse);
        $rep; 
        if( $this->vuesReponse[$this->etatProcess] != null ) { 
            $rep =  $this->vuesReponse[$this->etatProcess];
        } 
        else {
            if( $this->vuesReponse[PROCESS_ETAT_DEFAUT] != null ) {
                $rep =  $this->vuesReponse[PROCESS_ETAT_DEFAUT];
            }
            else {
                $rep = self::$defaultVueReponse;
            }
        }

        traceSession("Process - Vue réponse", $rep);
        traceSessionEnd();
        
        
        return $rep;
    }
    

    /* -====================== */
    /* -== Surcharges      ==- */
    /* -====================== */
    
    function traitementAction(){
        traceSessionStart("Process : Traitement Action", $this->processName);
        foreach ($this->lstAction as $key => $action){
            if($action[PROCESS_ACTION_ETAT_INITIAL] == PROCESS_ETAT_TOUT or $action[PROCESS_ACTION_ETAT_INITIAL] == $this->getEtatProcess()) {
                $action[PROCESS_ACTION_SCRIPT]->traitementAction();
                $this->setResultProcess($key, $action[PROCESS_ACTION_SCRIPT]->getResultAction());
            }
        }
        
        traceSessionTab("REPONSE", $this->resultProcess);
        
        traceSessionEnd();
        traceSession("Process : Etat", $this->etatProcess);
    }
    
    function getResultAction(){
            return $this->getResultProcess();
    }


    /* -====================== */
    /* -== Traitement ==- */
    /* -====================== */
    
        
}

?>