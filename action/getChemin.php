<?php 

// ********************************************* //
//              Traitement de la zone 1
// ********************************************* //
$s = $this->getSession();
$site = $s['SITE'];
$hc = $site->getCurrentPage();
$p = $hc->getParent();


// == Main Wrapper Chemin ==
$chemin = array();
while ($p != null && $p->getTitre() != ""){
    
	traceSession("Analyse droit zone 2", $p->getTitre());
    if (PolitiqueAcces::estAccessible($site->getCurrentUser(), $p, null, POLITIQUE_ACCES_READ ))
    {
        $idc = count($chemin);
        $chemin[$idc]['lien'] = Process::getProcess(PROCESSID_GETPAGE)->getLink($p->getProcessParam());
        $chemin[$idc]['titre'] = $p->getTitre();
    }
    $p = $p->getParent();
}
traceSession("Nombre niveau superieur : ", count($chemin));

$this->setResultAction($chemin);
?>