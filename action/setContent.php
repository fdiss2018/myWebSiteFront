<?php 
$s = $this->getSession();
if (!empty($_GET["content"])){
    traceSession("Content courante : ", $_GET["content"]);
    
    $cc = $s['SITE']->getCurrentPage()->getContentById($_GET["content"]);
    $s['SITE']->getCurrentPage()->setCurrentContent($cc);
}
else {
    traceSession("Content courante : ", "Null");
    $s['SITE']->getCurrentPage()->setCurrentContent(null);
}
$this->setSession($s);
?>