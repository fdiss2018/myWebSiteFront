<?php
Define("PATH_RACINE_CONF","./");
Define("PATH_CONF","config/");


class Controler
{
    
   var $config = array();
   var $session = array();
   
   var $etat;
   var $processEnCours;
   var $lstProcess = array();
   
   
   function Controler() {
       
       $_SESSION['trace'] = array();
       // lecture config
       include PATH_RACINE_CONF.PATH_CONF.'config.php';
       
    }				

    function addProcess($idProcess, $process) {
        $this->lstProcess[$idProcess] = $process;
        $process->controler = $this;
    }
    
    function getProcess() {
	   // on rÈcupËre l'action ‡† entreprendre
	   // $sAction=$_GET['action'] ? strtolower($_GET['action']) : 'default';
	   // $idProcess=strtolower($_SERVER['REQUEST_METHOD']).":$sAction";
	   
	   $sAction=$_GET['action'] ? $_GET['action'] : 'default';
	   $idProcess=strtolower($_SERVER['REQUEST_METHOD']).":$sAction";
	   
	   traceSession("Action demandÈe", $idProcess);

		if (Process::$lstProcess[$idProcess] == null)
        {
            traceSessionTab("Liste des process ", Process::$lstProcess);
            throw (new ErrorException("Controler.GetProcess : Identifiant de process inconnu."));
        }
        else {
            return Process::$lstProcess[$idProcess];
        }
    }
    
    function main (){
        global $administrateur;
        
            traceSessionStart("Controler Main : ", "");
        
            try {
				// Chargement des class
                $this->loadComponant("includesClass");   
				$this->loadComponant("includesConfig");
            
				Process::setControler($this);
			
               // User
               $profilAdmin = new Profil("Profil Administrateur");
               $administrateur = new Utilisateur("Franck D.", $profilAdmin);
               
               // load la session
               $this->loadSession(); 
               $site = $this->session['SITE'];
               traceSession("site ", $site); 
			   
               $this->session['REPONS'] = array();
               
               // Determination du process
               $this->process = $this->getProcess();
               $this->process->traitementAction();
    
               $this->session['REPONS'] = $this->process->getResultProcess();
               
               traceSession("Current User", $this->session['SITE']->getCurrentUser());
               traceSessionTab("session['REPONS']", $this->session['REPONS']);
               
              // envoi de la rÈponse(vue) au client
               if ($this->process->isProcessWebService()) {
                   $this->traitementWebService();
               } else {
                    $this->traitementVue();
               } 
              
              $this->session['SITE'] = $site ;
              $this->finSession($this->config,$dReponse,$this->session);
              
              // fin du script - on ne devrait pas arriver l√† sauf bogue
              $this->trace ("Erreur de configuration.");
              $this->trace("Action=[$sAction]");
              $this->trace("scriptAction=[$scriptAction]");
              $this->trace("Etat=[$this->etat]");
              $this->trace("scriptVue=[$scriptVue]");
              $this->trace ("V√©rifiez que les script existent et que le script [$scriptVue] se termine par l'appel √ finSession.");

          }
          catch (Exception $exc) {
              echo "Oups";
              traceSession($exc->getMessage(), $exc->getCode());
          }
          
          traceSessionEnd();
          
          exit(0);
    }

	function setReponse($reponse) {
	
		$this->session['REPONS'] = $reponse;
	}
	
	function setSession($reponse) {
	
		$this->session = $reponse;
	}
	
	function traitementVue(){	    
	    	    
	    $this->config['VuePrincipal']['urlZone1'] = PATH_RACINE_CLASS.PATH_VUE."header.php";
	    $this->config['VuePrincipal']['urlZone2A'] = PATH_RACINE_CLASS.PATH_VUE."erreurs.php";
	    $this->config['VuePrincipal']['urlZone2B'] = PATH_RACINE_CLASS.PATH_VUE.$this->process->getVue();
	    $this->config['VuePrincipal']['urlZone3'] = PATH_RACINE_CLASS.PATH_VUE."footer.php";
	    
	    traceSession("Execution vue entete : ", $this->config['VuePrincipal']['urlZone1']);
	    traceSession("Execution vue erreur   : ", $this->config['VuePrincipal']['urlZone2A']);
	    traceSession("Execution vue base   : ", $this->config['VuePrincipal']['urlZone2B']);
	    traceSession("Execution vue foot   : ", $this->config['VuePrincipal']['urlZone3']);
	    
	    $vuePrincipale = $this->config['VuePrincipal']['url'];
	    include PATH_RACINE_VUE.PATH_VUE.$vuePrincipale;
	    traceSession("Execution entete: ", PATH_RACINE_VUE.PATH_VUE.$vuePrincipale);
	}
	
	function traitementWebService(){

	    function arrayToXml($array){
	        foreach($array as $index => $post) {
	            $node = $index;
	            if (is_numeric($index)) $node = "node".$index;
	            if(is_array($post)) {
	                echo '<',$node,'>',$this->arrayToXml($post),'</',$node,'>';
	            }
	            else {
	                // echo  '<',$node,'>',htmlentities($post),'</',$node,'>';
	                echo  '<',$node,'>',$post,'</',$node,'>';
	            }
	        }
	    }   
	    
	    /**
	     * Supplementary json_encode in case php version is < 5.2 (taken from http://gr.php.net/json_encode)
	     */
	    if (!function_exists('json_encode'))
	    {
	        function json_encode($a=false)
	        {
	            if (is_null($a)) return 'null';
	            if ($a === false) return 'false';
	            if ($a === true) return 'true';
	            if (is_scalar($a))
	            {
	                if (is_float($a))
	                {
	                    // Always use "." for floats.
	                    return floatval(str_replace(",", ".", strval($a)));
	                }
	                
	                if (is_string($a))
	                {
	                    static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
	                    return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
	                }
	                else
	                    return $a;
	            }
	            $isList = true;
	            for ($i = 0, reset($a); $i < count($a); $i++, next($a))
	            {
	                if (key($a) !== $i)
	                {
	                    $isList = false;
	                    break;
	                }
	            }
	            $result = array();
	            if ($isList)
	            {
	                foreach ($a as $v) $result[] = json_encode($v);
	                return '[' . join(',', $result) . ']';
	            }
	            else
	            {
	                foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
	                return '{' . join(',', $result) . '}';
	            }
	        }
	    }
	    
	    $format = strtolower($_GET['format']) == 'xml' ? 'xml' : 'json'; //json is the default
	    header('Access-Control-Allow-Origin: *');
	    
	    /* output in necessary format */
	    if($format == 'json') {
	        header('Content-type: application/json');
	        echo json_encode(array('posts'=>$this->session['REPONS']));
	    }
	    else {
	        header('Content-type: text/xml');
	        echo '<posts>';
	        $this->arrayToXml($this->session['REPONS']);
	        echo '</posts>';
	    }
	    
	}
	

	
	
  // ---------------------------------------------------------------
    function finSession(&$dReponse){
        // $this->config : dictionnaire de configuration
        // $dSession : dictionnaire contenant les infos de session
        // $dReponse : le dictionnaire des arguments de la page de r√©ponse
        
        // enregistrement de la session
        if(isset($this->session)){
          // on met les param√®tres de la requ√™te dans la session
          $this->session['requete']=strtolower($_SERVER['REQUEST_METHOD'])=='get' ? $_GET :
          strtolower($_SERVER['REQUEST_METHOD'])=='post' ? $_POST : array();
          
          
          $_SESSION['session']=serialize($this->session);
          session_write_close();
        }
        else{
          // pas de session
          session_destroy();
        }
          
        // on pr√©sente la r√©ponse
        //include $this->config['vuesReponse'][$dReponse['vuereponse']]['url'];
        
        // fin du script
        exit(0);
    }//finsession
  
      
      //--------------------------------------------------------------------
      function loadSession() {
          traceSessionStart("Controler : Load Session", "");
          // on d√©marre ou reprend la session
          // session_start();
          $this->session=$_SESSION["session"];
          if($this->session) {
              traceSession("Calcul contexte : ", "unserialize Session");
              $this->session=unserialize($this->session);
              PolitiqueAcces::setPolitiquesAcces($this->session['POITIQUE_ACCES']);
              $pol = $this->session['POITIQUE_ACCES'];
          }
          else{
              $this->iniSession();
          }                    
          traceSessionEnd();
      }

      //--------------------------------------------------------------------
      function iniSession() {
              traceSession("Calcul contexte : ", "Data");
			  $_SESSION["session"] = array();
              include_once PATH_RACINE_CONF.PATH_CONF."data.php";
              //$site->setCurrentUser($invitÈ);
			  
              $this->session['SITE'] = $site;
              $this->session['POITIQUE_ACCES'] = PolitiqueAcces::getPolitiquesAcces();

      }
      
      function loadComponant ($type){
          // inclusion de biblioth√®ques
          traceSessionStart("Controler : Load Componant", "");
          for($i=0;$i<count($this->config[$type]);$i++){
              traceSession($type, $this->config[$type][$i]);
              include($this->config[$type][$i]);
          }
          traceSessionEnd();
      }
            
}

//--------------------------------------------------------------------
function dump($dInfos){
    // affiche un dictionnaire d'informations
    while(list($cl√©,$valeur)=each($dInfos)){
        echo "[$cl√©,$valeur]<br>\n";
    }//while
}//suivi

//--------------------------------------------------------------------
function trace($msg){
    echo $msg."<br>\n";
}//suivi

function traceSession($msg, $var){
    $i = count($_SESSION['trace']);
    $date = date(DATE_RFC2822);
    $trace .= '<li>['.$date.'] '.$msg.'</label> : '.$var.'!</li>';
    $_SESSION['trace'][$i] = $trace;
}

function traceSessionStart($msg, $var){
    $i = count($_SESSION['trace']);
    $date = date(DATE_RFC2822);
    $trace .= '<li><input type="checkbox" id="c'.$i.'" />';
    $trace .= '<i class="fa fa-angle-double-right"></i>';
    $trace .= '<i class="fa fa-angle-double-down"></i> ';
    $trace .= '<label for="c'.$i.'">['.$date.']'.$msg.'</label>:'.$var.'!';
    $trace .= '<ul>';
    $_SESSION['trace'][$i] = $trace;
}

function traceSessionEnd(){
    $i = count($_SESSION['trace']);
    $date = date(DATE_RFC2822);
    $trace .= '<li>['.$date.']End</li>';
    $trace .= '</ul>';
    $trace .= '</li>';
    $_SESSION['trace'][$i] = $trace;
}

function traceSessionTab($nom, $tab){
    if (is_array($tab) && count($tab) > 0) { 
        traceSessionStart($nom, count($tab));
        foreach ($tab as $k => $val){
            traceSessionTab($nom."[".$k."]", $val);
        }
        traceSessionEnd();
    }
    else {
        traceSession($nom, $tab);
    }
}

?>