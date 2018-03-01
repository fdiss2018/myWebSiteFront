<?
class AlbumPhoto extends Content{
	function AlbumPhoto($date, $titre, $texte, $lien, $srcImg) {
		Content::Content($titre);
		$this->lien = $lien;
		$this->srcImg = $srcImg;
		$this->texte = $texte;
		$this->date = $date;
	}	
	function getPrefixId()	{
		return "PH";
	}

	function typeString()	{
		return "Photo";
	}			
	
}

?>
