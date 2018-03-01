<?
Process::setDefaultVueReponse("vueContents.php");

Define("ACTIONID_RESULT_FOOTER","FOOT");
Define("ACTIONID_RESULT_HEADER","header");
Define("ACTIONID_RESULT_CONTENTS","contents");
Define("ACTIONID_RESULT","RESULT");
Define("ACTIONID_RESULT_NONE","NONE");

Define("PROCESSID_HEADERandFOOT","get:header");
$processGetHeader = new Process("Get donnée nav, chemin, link", PROCESSID_HEADERandFOOT);
$processGetHeader->addAction(ACTIONID_RESULT_HEADER, new Action("h-init.php"));
$processGetHeader->addAction(ACTIONID_RESULT_FOOTER, new Action("f-init.php"));

Define("PROCESSID_GETINIT","get:init");
$processDebase = new Process("Process par défaut", PROCESSID_GETINIT);
$processDebase->addAction(ACTIONID_RESULT_CONTENTS, new Action("a-init.php"));
$processDebase->addAction(ACTIONID_RESULT, $processGetHeader);
// $processDebase->addAction(ACTIONID_RESULT_HEADER, new Action("h-init.php"));
// $processDebase->addAction(ACTIONID_RESULT_FOOTER, new Action("f-init.php"));

Define("PROCESSID_GETRAZ","get:raz");
$processIniSession = new Process("Process de réinitialisation", PROCESSID_GETRAZ);
$processIniSession->addAction(ACTIONID_RAZ, new Action("raz.php"));
$processIniSession->addAction(ACTIONID_RESULT, $processDebase);
$processIniSession->addAction(ACTIONID_RESULT_CONTENTS, new Action("a-init.php"));
$processIniSession->addAction(ACTIONID_RESULT_HEADER, new Action("h-init.php"));
$processIniSession->addAction(ACTIONID_RESULT_FOOTER, new Action("f-init.php"));

Define("PROCESSID_GETPAGE","get:page");
$processVisuPage = new Process("Demande Page", PROCESSID_GETPAGE);
$processVisuPage->addAction(ACTIONID_RESULT_NONE, new Action("setPageCourante.php"));
$processVisuPage->addAction(ACTIONID_RESULT_CONTENTS, new Action("a-init.php"));
$processVisuPage->addAction(ACTIONID_RESULT_COMMON, $processGetHeader);
$processVisuPage->setParametresName(array("id"));


Define("PROCESSID_GETCONTENT","get:content");
$processVisuContent = new Process("Demande Content", PROCESSID_GETCONTENT);
$processVisuContent->addAction(ACTIONID_RESULT_NONE, new Action("setPageCourante.php"));
$processVisuContent->addAction(ACTIONID_RESULT_NONE, new Action("setContent.php"));
$processVisuContent->addAction(ACTIONID_RESULT_CONTENTS, new Action("a-init.php"));
$processVisuContent->addAction(ACTIONID_RESULT_HEADER, new Action("h-init.php"));
$processVisuContent->addAction(ACTIONID_RESULT_FOOTER, new Action("f-init.php"));
$processVisuContent->setParametresName(array("id", "idc"));


// Login 
Define("PROCESSID_GETLOGIN","get:login");
$processLogin = new Process("Login", PROCESSID_GETLOGIN);
$processLogin->addAction(ACTIONID_RESULT_HEADER, new Action("h-init.php"));
$processLogin->addAction(ACTIONID_RESULT_FOOTER, new Action("f-init.php"));
$processLogin->addVue("form-login.php", PROCESS_ETAT_DEFAUT);  

Define("PROCESSID_POSTLOGIN","post:login");
$processLogin = new Process("Login", PROCESSID_POSTLOGIN);
$processLogin->addAction(ACTIONID_RESULT_NONE, new Action("trt-login.php"));
$processLogin->addAction(ACTIONID_RESULT_HEADER, new Action("h-init.php"));
$processLogin->addAction(ACTIONID_RESULT_NONE, new Action("f-init.php"));
$processLogin->addAction(ACTIONID_RESULT_CONTENTS, new Action("a-init.php"));
$processLogin->addVue("form-login.php", PROCESS_ETAT_DEFAUT);
$processLogin->addVue(Process::getDefaultVueReponse(), PROCESS_ETAT_FINAL);

Define("PROCESSID_GETUNLOG","get:unlog");
$processUnlog = new Process("Unlog", PROCESSID_GETUNLOG);
$processUnlog->addAction(ACTIONID_RESULT_NONE, new Action("trt-unlog.php"));
$processUnlog->addAction(ACTIONID_RESULT_HEADER, new Action("h-init.php"));
$processUnlog->addAction(ACTIONID_RESULT_NONE, new Action("f-init.php"));
$processUnlog->addAction(ACTIONID_RESULT_CONTENTS, new Action("a-init.php"));

// Acces Bd
//
Define("PROCESSID_GETADDBDD","get:addBDD");
$processAddBDDGet = new Process("addbdd", PROCESSID_GETADDBDD);
$processAddBDDGet->addAction(ACTIONID_RESULT_HEADER, new Action("h-init.php"));
$processAddBDDGet->addAction(ACTIONID_RESULT_FOOTER, new Action("f-init.php"));
$processAddBDDGet->addVue("form-addBDD.php", PROCESS_ETAT_DEFAUT);  

Define("PROCESSID_POSTADDBDD","post:addbdd");
$processAddBDDPost = new Process("addBDD", PROCESSID_POSTADDBDD);
$processAddBDDPost->addAction(ACTIONID_RESULT_NONE, new Action("trt-addBDD.php"));
$processAddBDDPost->addAction(ACTIONID_RESULT_HEADER, new Action("h-init.php"));
$processAddBDDPost->addAction(ACTIONID_RESULT_NONE, new Action("f-init.php"));
$processAddBDDPost->addAction(ACTIONID_RESULT_CONTENTS, new Action("a-init.php"));
$processAddBDDPost->addVue("form-addBDD.php", PROCESS_ETAT_DEFAUT);
$processAddBDDPost->addVue(Process::getDefaultVueReponse(), PROCESS_ETAT_FINAL);

Define("PROCESSID_GETSHOWBDD","get:showbdd");
$processShowBdd = new Process("ShowBdd", PROCESSID_GETSHOWBDD);
$processShowBdd->addAction(ACTIONID_RESULT_NONE, new Action("setPageCourante.php"));
$processShowBdd->addAction(ACTIONID_RESULT_HEADER, new Action("h-init.php"));
$processShowBdd->addAction(ACTIONID_RESULT_FOOTER, new Action("f-init.php"));
$processShowBdd->addAction(ACTIONID_RESULT_NONE, new Action("manageBDD.php"));
$processShowBdd->setParametresName(array("id"));
?>