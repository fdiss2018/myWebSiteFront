<?php
class Action{
    
    var $conditionInitial;
    var $scriptAction;
	var $etatFinal;
    var $process;

    var $resultAction = Array();
    
    function Action($scriptAction){
        $this->scriptAction = $scriptAction;
    }
    
    function traitementAction(){
        traceSessionStart("Action Execution ", PATH_RACINE_ACTION.PATH_ACTION.$this->scriptAction);
        include PATH_RACINE_ACTION.PATH_ACTION.$this->scriptAction;
        traceSessionEnd();
    }

    function setReponse($result){
		try {
			$c = Process::getControler();
			$c->setReponse($result);
		}
		catch (Exception $exc) {
              throw ($exc);
		}
    }

   function setSession($result){
		try {
			$c = Process::getControler();
			$c->setSession($result);
		}
		catch (Exception $exc) {
              throw ($exc);
		}
    }
    
    function getSession(){
        // $p = $this->process;
        $c = Process::getControler();
        return $c->session;
    }
    
    /**
     * @return mixed
     */
    public function getConditionInitial()
    {
        return $this->conditionInitial;
    }

    /**
     * @return mixed
     */
    public function getEtatFinal()
    {
        return $this->etatFinal;
    }

    /**
     * @param mixed $conditionInitial
     */
    public function setConditionInitial($conditionInitial)
    {
        $this->conditionInitial = $conditionInitial;
    }

    /**
     * @param mixed $EtatFinal
     */
    public function setEtatFinal($EtatFinal)
    {
        $this->etatFinal = $EtatFinal;
    }
    /**
     * @return multitype:
     */
    public function getResultAction()
    {
        return $this->resultAction;
    }

    /**
     * @param multitype: $resultAction
     */
    public function setResultAction($resultAction)
    {
        $this->resultAction= $resultAction;
    }


    
    
    
}
?>