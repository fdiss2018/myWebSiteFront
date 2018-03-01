<?php 
traceSessionStart("Debut action setPageCourante", "");
$s = $this->getSession();
// $site = $s['SITE'];
// Contexte de la page
if ( !empty($_GET["page"])){
    traceSession("Page courante : ", $_GET["page"]);
    $s['SITE']->setCurrentPageById($_GET["page"]);
}

$this->setSession($s);
traceSessionEnd();
?>