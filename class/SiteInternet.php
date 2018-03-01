<?
class SiteInternet extends Hierarchie{
    
    Static $site;
    var $defaultPage;
    var $currentPage;
    var $currentUser;
    
	function SiteInternet() {
		// PageInternet::PageInternet("", "");
		$this->site = $this;
		$this->defaultPage = null;
		$this->currentPage = null;
		$this->currentUser = null;
	}				

	public function addPage($page)	{
	    $this->addChild($page);
	    $page->setSite($this);
	}	
	
	public function addDefaultPage($page)	{
	    $this->addPage($page);
	    $this->setDefaultPage($page);
	}	
	
	
	public function getCurrentPage() {
	    if ($this->currentPage != null) {	return $this->currentPage;}
		else {	return $this->defaultPage;}
	}
	
	public function setCurrentPageById($id)	{
		$this->currentPage = $this->getHierarchieById($id);
	}	

	public function setDefaultPage($pageInternet)	{
	    $this->defaultPage = $pageInternet;
	}	

	public function getDefaultPage() {
	    return $this->defaultPage;
	}
    /**
     * @return the $currentUser
     */
    public function getCurrentUser() {
        return $this->currentUser;
    }

    /**
     * @param NULL $currentUser
     */
    public function setCurrentUser($currentUser)
    {
        // unset($_SESSION['USER']);
        $this->currentUser = $currentUser;
        // $_SESSION['USER'] = $currentUser;
    }

}


?>
