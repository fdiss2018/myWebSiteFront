<?
/*
MYUSER
------------
USMAILU
USPASSW
USPSEUD
USCLEPR
USCLEPU
*/

class BaseDonnee {
	
	PRIVATE STATIC $MyInstance;
	
	STATIC $indConnecte = false;
	
	var $lstTable = array();
	
	var	$host 	= HOSTD;
	var $user 	= USERD;
	var $bdd  	= BDDD;
	var $passwd = PASSWDD;
	
	private function BaseDonnee() {
	 //$_SESSION['ENV']= "D";
	 // echo "!".$_SESSION['ENV']."!";
	 
		if (isset($_SESSION['ENV']) && $_SESSION['ENV']== "P") {
			//Declaration des paramètres de connexion
			$this->host 	= HOSTP;
			$this->user 	= USERP;
			$this->bdd  	= BDDP;
			$this->passwd = PASSWDP;
		}
		else {
			$this->host 	= HOSTD;
			$this->user 	= USERD;
			$this->bdd  	= BDDD;
			$this->passwd = PASSWDD;
		}
	//echo "!".$this->host."!";
	}
	
	function addTableBd($table) {
		$this->lstTable[$table->getPrefix()] = $table;
		// array_push($this->lstTable,$table);
	}
		
	function getTableBd($prefix) {
		return $this->lstTable[$prefix];
		//array_push($this->lstTable,$table);
	}
	
	function ConnexionBD(){
		//Declaration des paramètres de connexion
		if (!self::$indConnecte ) {
			mysql_connect($this->host, $this->user,$this->passwd) or die("erreur de connexion au serveur ".$this->host);
			mysql_select_db($this->bdd) or die("erreur de connexion a la base de donnees ".$this->bdd );
			self::$indConnecte = true;
		}	
	}
	
	function listeTable() {
		echo "<TABLE>";
		foreach ($this->lstTable as $key=>$table)	{
			$table->formAfficherTable();
		}	
		echo "</TABLE>";
	}

	static function GetInstance() {
		if (empty(self::$MyInstance)) {
			self::$MyInstance = new BaseDonnee();  
		}
		return self::$MyInstance;
	}
}

?>