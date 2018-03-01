<?php 
$s = $this->getSession();
$site = $s['SITE']; 
$hc = $site->getCurrentPage();
$cc = $hc->getCurrentContent();

// == Content ==
$lstContents = array();
if ($cc != null){    
    traceSession("Add vue Content courant : ", $cc->titre);
    $lstContents[0] = setVueContent($cc);
}
else {
    traceSessionStart("Liste content : ", "Start");
    foreach($hc->getContents() as $key => $content){
        traceSession($key, $content);
        $lstContents[$key] = array();
        $lstContents[$key] = setVueContent($content);
    }
    traceSessionEnd();
}
traceSession("Nombre Content : ", count($lstContents));

function setVueContent($content){
    
    $tab = array();
    $tab['titre'] = $content->getTitre();
    $tab['sousTitre'] = $content->getSousTitre();
    $tab['texte'] = $content->getTexte();
    if ($content->getDateC() != null){$tab['date'] = date("l jS \of F Y", $content->getDateC());}
    
    // Illustatrtions
    if ($content->getSrcImg()){
        $tab['illustration']['src'] = $content->getSrcImg();
        if ($content->getPrefixId() == "MU"){
            $tab['illustration']['iframe'] = true;
        }
    }

    
    // Actions
    $tab['Actions'] = array();
    $i = count($tab['Actions']);
    $tab['Actions'][$i]['link'] = Process::getProcess(PROCESSID_SHOW_1_CONTENT)->getLink(array($content->getPage()->getId(), $content->getId()));
    $tab['Actions'][$i]["titre"] = "D&eacute;tail";

    if ($content->getLien()){
        $i = count($tab['Actions']);
        $tab['Actions'][$i]['link'] = $content->getLien();
        $tab['Actions'][$i]["titre"] = "Go";
        $tab['Actions'][$i]['target'] = $content->getPrefixId();
    }    
        
    return $tab;
    
}


$this->setResultAction($lstContents);
?>