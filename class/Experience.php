<?class Experience extends Content{
	function Experience ($dateDeb, $datefin, $employeur, $titre, $texte ) {
		Content::Content($titre );
		$this->texte = $texte;
		$this->dateD = $dateDeb;
		$this->dateF = $datefin;
		$this->employeur = $employeur;
	}	
	function getPrefixId()	{
		return "EX";
	}
	
	function getTitre()	{
		$periode = "";
		if ($this->dateF != null) {$periode .= "De " . date("l jS \of F Y", $this->dateD) . " to " .   date("l jS \of F Y", $this->dateF);}
		else {$periode .= "Depuis " . date("l jS \of F Y", $this->dateD);}
		return $this->employeur." ".$this->titre." ". $periode;
	}

	function typeString()	{
		return "Experience";
	}			
}
?>
