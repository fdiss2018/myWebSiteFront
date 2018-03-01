<?
class Hierarchie extends ObjBdd{ 
   
    var $titre = "";
    var $parent = null;
    var $childs = array();
    
	function Hierarchie($titre) {
	    ObjBdd::ObjBdd();
		$this->titre = $titre;
		// $this->parent = null;
		$this->childs = array();
	}	

	
	function getTitre()	{
		return $this->titre;
	}
	
	
	function addChild($child)	{
		$this->childs[count($this->childs)] = $child;
		$child->parent = $this;
	}
	
	function getHierarchieById($id)	{
		$a = null;
		if ($this->getId() == $id){
			$a = $this;
		}
		else{
			$myBool = false;
			for ( $c = 0; $c< count($this->childs) && !$myBool; $c++) {
				$a = $this->childs[$c]->getHierarchieById($id);
				if ($a != null) {$myBool = true;}
			}	
		}
		return $a;
	}
    /**
     * @return multitype:
     */
    public function getChilds()
    {
        return $this->childs;
    }

    /**
     * @param multitype: $childs
     */
    public function setChilds($childs)
    {
        $this->childs = $childs;
    }
    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Ambigous <string, unknown> $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }




}

?>
