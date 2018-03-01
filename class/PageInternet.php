<?
// ID forcé
Define("PAGEINTERNET_ID_ADM","PAGEINTERNET_IDADM"); // Admin
Define("PAGEINTERNET_ID_BDD","PAGEINTERNET_IDBDD"); // Admin BDD
Define("PAGEINTERNET_ID_TAL","PAGEINTERNET_IDTAL"); // Talentia
Define("PAGEINTERNET_ID_HOM","PAGEINTERNET_IDHOM"); // Home

class PageInternet extends Hierarchie{
    
	static $pfx = "PI";	
	var $site;

	var $process;
	
	function PageInternet($titre, $process) {
		Hierarchie::Hierarchie($titre);
				
		$this->site = null;
		$this->process = $process;
	}	
	
	function setSite($site)	{
	    $this->site = $site;
	}	
	function getSite()	{
	    return $this->site;
	}	
	
	
	function getProcess()	{
	    return $this->process;
	}

	function getProcessParam()	{
	    return array($this->getId());
	}
	
	function addPage($page)	{
	    $this->addChild($page);
		$page->site = $this->site;
	}		
	
}	

?>
