<?
class Content extends Hierarchie{
	function Content($titre){
		Hierarchie::Hierarchie($titre);
		$this->lien = null;
		$this->srcImg = null;
		$this->texte = null;
		$this->date = null;
		$this->sousTitre = null;
		$this->page = null;
	}

	function setPage($page)	{
	    $this->page = $page;
	}
	
	function getPage()	{
	    return $this->page;
	}
	
	function typeString()	{
		return "News";
	}

	function getPrefixId()	{
		return "CO";
	}
	
	function getDateC()	{
		return $this->date;
	}
	
	function getLien()	{
		return $this->lien;
	}

	function getSrcImg()	{
		return $this->srcImg;;
	}
	
	function getSousTitre()	{
		return $this->sousTitre;
	}

	function getTexte()	{
		return $this->texte;
	}	
	
	function getIcone()	{
		 $mySrc = "";
		if ($this->getPrefixId() == "PH") {
			$mySrc =  "second icon fa-user";
		}
		if ($this->getPrefixId() == "MU") {
			$mySrc =  "second icon fa-cog";
		}
		if ($this->getPrefixId() == "LE") {
			$mySrc =  "second icon fa-cog";
		}
		return $mySrc;
	}	

	function getlink()	{
		return 'index.php?action=content&id='.$this->page->getId().'&idc='.$this->getId();
	}
	
	function addPage($page)	{
	    return $this->page = $page;
	}

}
?>
