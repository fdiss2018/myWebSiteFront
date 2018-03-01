<?
class Lecture extends Content{
	function Lecture($date, $titre, $texte, $isbn ) {
		Content::Content($titre);
		$this->isbn = $isbn;
		$this->texte = $texte;
		$this->date = $date;
	}	
	function getPrefixId()	{
		return "LE";
	}

	function getIsbn()	{
		return $this->isbn;
	}

	function getSrcImg()	{
		 $srcImg = "";
		if ($this->srcImg == null) {
			$srcImg =  "images/pic03.jpg";
		}
		else{
			$srcImg =  $this->srcImg;
		}
		return $srcImg;
	}
	
	function getLien()	{
		return  'https://www.abebooks.fr/servlet/SearchResults?isbn='.$this->getIsbn().'&x=74&y=8&sortby=17';			
	}

	function typeString()	{
		return "Book";
	}	
}
?>
