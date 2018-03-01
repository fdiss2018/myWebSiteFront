<?php 
$s = $this->getSession();
$site = $s['SITE'];
$hc = $site->getCurrentPage();

// ********************************************* //
//              Traitement de la zone 2
// ********************************************* //
$sousNiveau = array();
// == niveau equivalent ==
while (list($key, $page) = each($hc->childs)) {
    
    if (PolitiqueAcces::estAccessible($site->getCurrentUser(), $page, null, POLITIQUE_ACCES_READ	 ))
    {
        $idc = count($sousNiveau);
        $sousNiveau[$idc]['lien'] = Process::getProcess(PROCESSID_GETPAGE)->getLink($page->getProcessParam());
        $sousNiveau[$idc]['titre'] = $page->getTitre();
    }
}
traceSession("Nombre sous niveau : ", count($sousNiveau));

$this->setResultAction($sousNiveau);
?>