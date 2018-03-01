<?
class ObjBdd {
	/* ******* */

    /* Compteur pour identifiant */
    STATIC $cpt;
    
    /* Propriétés techniques pour formatage objets enfants */
    static $pfx = "HI";
    static $lstProprieteSave = array();
    
    
	var $id;
	
	var $updateUser;
	var $createUser;
	var $deleteUser;
	var $useUser;
	var $updateDate;
	var $createDate;
	var $deleteDate;
	var $useDate;
		
	var $lstDependance;
	var $politiquesAccesLocal;
	static $politiquesAccesGlobal = array();
	/* ******* */
	
	function ObjBdd() {
		$this->politiquesAccesLocal = array();
		$this->lstDependance = array();
		
		self::$cpt++;
		$this->setId($this->getPrefixId().self::$cpt);		
	}

	
	function getPrefixId()	{
	    //return self::$pfx;
		return strtoupper(get_class($this));
	}
	
	   /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
	
	
	function getId()	{
	    return $this->id;
	}
	
	function getlink()	{
	    return 'index.php?action=content&id='.$this->getId();
	}		
	
	
	
	
	/**
     * @return the $cpt
     */
    public static function getCpt()
    {
        return ObjBdd::$cpt;
    }

    /**
     * @return the $pfx
     */
    public static function getPfx()
    {
        return ObjBdd::$pfx;
    }

    /**
     * @return the $lstProprieteSave
     */
    public static function getLstProprieteSave()
    {
        return ObjBdd::$lstProprieteSave;
    }

    /**
     * @return the $updateUser
     */
    public function getUpdateUser()
    {
        return $this->updateUser;
    }

    /**
     * @return the $createUser
     */
    public function getCreateUser()
    {
        return $this->createUser;
    }

    /**
     * @return the $deleteUser
     */
    public function getDeleteUser()
    {
        return $this->deleteUser;
    }

    /**
     * @return the $useUser
     */
    public function getUseUser()
    {
        return $this->useUser;
    }

    /**
     * @return the $updateDate
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * @return the $createDate
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @return the $deleteDate
     */
    public function getDeleteDate()
    {
        return $this->deleteDate;
    }

    /**
     * @return the $useDate
     */
    public function getUseDate()
    {
        return $this->useDate;
    }

    /**
     * @return the $lstDependance
     */
    public function getLstDependance()
    {
        return $this->lstDependance;
    }

    /**
     * @return the $politiqueAccesLocal
     */
    public function getPolitiquesAccesLocal()
    {
        return $this->politiquesAccesLocal;
    }

    /**
     * @param field_type $cpt
     */
    public static function setCpt($cpt)
    {
        ObjBdd::$cpt = $cpt;
    }

    /**
     * @param string $pfx
     */
    public static function setPfx($pfx)
    {
        ObjBdd::$pfx = $pfx;
    }

    /**
     * @param multitype: $lstProprieteSave
     */
    public static function setLstProprieteSave($lstProprieteSave)
    {
        ObjBdd::$lstProprieteSave = $lstProprieteSave;
    }

    /**
     * @param field_type $updateUser
     */
    public function setUpdateUser($updateUser)
    {
        $this->updateUser = $updateUser;
    }

    /**
     * @param field_type $createUser
     */
    public function setCreateUser($createUser)
    {
        $this->createUser = $createUser;
    }

    /**
     * @param field_type $deleteUser
     */
    public function setDeleteUser($deleteUser)
    {
        $this->deleteUser = $deleteUser;
    }

    /**
     * @param field_type $useUser
     */
    public function setUseUser($useUser)
    {
        $this->useUser = $useUser;
    }

    /**
     * @param field_type $updateDate
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    /**
     * @param field_type $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @param field_type $deleteDate
     */
    public function setDeleteDate($deleteDate)
    {
        $this->deleteDate = $deleteDate;
    }

    /**
     * @param field_type $useDate
     */
    public function setUseDate($useDate)
    {
        $this->useDate = $useDate;
    }

    /**
     * @param multitype: $lstDependance
     */
    public function setLstDependance($lstDependance)
    {
        $this->lstDependance = $lstDependance;
    }

    /**
     * @param multitype: $politiqueAccesLocal
     */
    public function addPolitiqueAccesLocal($politiqueAccesLocal)
    {
        $this->politiquesAccesLocal[count($this->politiquesAccesLocal)] = $politiqueAccesLocal;
    }

    /**
     * @return the $politiqueAccesGlobal
     */
    public static function getPolitiquesAccesGlobal()
    {
        return ObjBdd::$politiquesAccesGlobal;
    }

    /**
     * @param multitype: $politiqueAccesGlobal
     */
    public static function addPolitiqueAccesGlobal($politiqueAccesGlobal)
    {
        ObjBdd::$politiquesAccesGlobal[count(ObjBdd::$politiquesAccesGlobal)] = $politiqueAccesGlobal;
    }

    function save() {
		
	$result = $this->tableBd->executerRequete($this->reqCreer());	
		
		;
	}

	function isOwner($user) {
	    global $administrateur;
	    if ($user == $administrateur)return true;	    
	        else return false;	    
	}
	
	function test() {
	}
	
}
?>
