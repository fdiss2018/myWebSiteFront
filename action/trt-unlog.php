<?php 
traceSessionStart("Trt login", "");
$s = $this->getSession();

$s['REPONS']["erreurs"] = array();

try {
    $s['SITE']->setCurrentUser(null);
} catch (Exception $e){
    $s['REPONS']["erreurs"][count($s['REPONS']["erreurs"])] = $e->getMessage();
}

if(count($s['REPONS']["erreurs"])>0){
    $s['REPONS']["info"] = "Deconnexion invalide";
    $s['REPONS']["href"] = "./index.php";
    $s['REPONS']["lien"] = "Abandon";
    $this->process->setEtatProcess(C_ETAT_ENERR); 
}
else {
    $this->process->setEtatProcess(C_ETAT_FINAL);
}

$this->setSession($s);
traceSessionEnd();
?>