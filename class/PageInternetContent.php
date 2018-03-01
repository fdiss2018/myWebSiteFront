<?
Define("PROCESSID_SHOW_CONTENTS","get:contentsShow");

class PageInternetContent extends PageInternet{
    
	var $contents;
	var $links;
	var $currentContent;
	
	function PageInternetContent($titre) {
	    PageInternet::PageInternet($titre, Process::getProcess(PROCESSID_SHOW_CONTENTS));
		
		$this->contents = array();
		$this->links = array();
		$this->currentContent = null;
	}	

	function addContent($content)	{
	    traceSession($this->titre." add : ", $content->titre);
	    $this->contents[count($this->contents)] = $content;
	    $content->setPage($this);
	}	

	function addContentAccueil($content)	{
	    $this->getSite()->getDefaultPage()->addContent($content);
	    $this->addContent($content);
	}	
	
	function addLink($link)	{
	    $this->links[count($this->links)] = $link;
	}	

	function addLinkAccueil($link)	{
	    $this->getSite()->getDefaultPage()->addLink($link);
	    $this->addLink($link);
	}	
	
	function getCurrentContent()	{
		return $this->currentContent;
	}	
	function setCurrentContent($c)	{
	    $this->currentContent = $c;
	}	
	
	function getContentByID($id)	{
	    for ($x = 0; $x<count($this->contents); $x++){
	        if ($this->contents[$x]->getId()==$id){
	            return$this->contents[$x];
	        }
	    }
	}
	
    public function getContents()
    {
        return $this->contents;
    }

	
}	

?>
