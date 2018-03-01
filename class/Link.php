<?
class Link extends ObjBdd{
    var $titre;
    var $categorie;
    var $lien;
    
    function Link($categorie, $lien, $titre) {
        Content::Content($titre);
        $this->categorie = $categorie;
        $this->titre = $titre;
        $this->lien = $lien;
    }	

    /**
     * @return the $titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return the $categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @return the $lien
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * @param field_type $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @param field_type $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @param field_type $lien
     */
    public function setLien($lien)
    {
        $this->lien = $lien;
    }		
	
	function getPrefixId()	{
		return "Lk";
	}
	
}
?>
