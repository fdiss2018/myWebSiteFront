<?php
$s = $this->getSession();
$site = $s['SITE']; 
$hc = $site->getCurrentPage();


$FOOT = array();
for ($x = 0; $x<count($hc->links); $x++){
    //var_dump($this->links);
    $lnk = $hc->links[$x];
    // Recherche categorie
    if ($FOOT[$lnk->getCategorie()] == null){
        $FOOT[$lnk->getCategorie()] = array();
    }
    // Ajout du lien
    $idc = count($FOOT[$lnk->getCategorie()]);
    $FOOT[$lnk->getCategorie()][$idc]['titre'] = $lnk->getTitre();
    $FOOT[$lnk->getCategorie()][$idc]['lien'] = $lnk->getLien();
    $FOOT[$lnk->getCategorie()][$idc]['target'] = $lnk->getCategorie();
}
traceSession("Nombre Liens : ", count($FOOT));

$this->setResultAction($FOOT);
?>