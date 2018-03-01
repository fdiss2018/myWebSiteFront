<?
class PlayListDeezer extends Content{
	function playlistDeezer($date, $titre, $texte, $idDeezer) {
		Content::Content($titre);
		$this->idDeezer = $idDeezer;
		$this->texte = $texte;
		$this->date = $date;
	}	
	function getPrefixId()	{
		return "MU";
	}

	function getIdDeezer()	{
		return $this->idDeezer;
	}
	
	function getSrcImg()	{
		return "https://www.deezer.com/plugins/player?format=square&autoplay=false&playlist=false&color=007FEB&layout=dark&size=medium&type=playlist&id=".$this->getIdDeezer()."&app_id=1";
	}
	
	function typeString()	{
		return "Musique";
	}		
}

?>
