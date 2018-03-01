<?php 
traceSessionStart("Trt login", "");
$s = $this->getSession();
$site = $s['SITE']; 

$s['REPONS']["erreurs"] = array();
if(empty($_POST["login"])) $s['REPONS']["erreurs"][count($s['REPONS']["erreurs"])] = "Login obligatoire".$_POST["login"].$_POST["login"]."!";
else $login = $_POST["login"];

if(empty($_POST["password"]))$s['REPONS']["erreurs"][count($s['REPONS']["erreurs"])] = "Mot de passe obligatoire".$_POST["password"]."!";
else $password = $_POST["password"];

try {
    
    $usr = Utilisateur::login($login, $password);
    traceSession("TRT-login - Utilisateur", $usr);
} catch (Exception $e){
    traceSession("TRT-login - Erreur", $e->getMessage());
    $s['REPONS']["erreurs"][count($s['REPONS']["erreurs"])] = $e->getMessage();
}

if(count($s['REPONS']["erreurs"])>0){
    $s['REPONS']["info"] = "Connexion invalide";
    $s['REPONS']["href"] = "./index.php";
    $s['REPONS']["lien"] = "Abandon";
    $this->process->setEtatProcess(PROCESS_ETAT_ENERR); 
}
else {
    $s['SITE']->setCurrentUser($usr);
    $this->process->setEtatProcess(PROCESS_ETAT_FINAL);
}

//$this->process->controler->session = $s;

//traceSessionEnd();

$this->setSession($s);
traceSessionEnd();

?>