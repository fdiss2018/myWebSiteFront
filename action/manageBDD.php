<?php 
$s = $this->getSession();

$BD = BaseDonnee::GetInstance() ;
$BD->listeTable();

$this->setReponse($s['REPONS']);
?>