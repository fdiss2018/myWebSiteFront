<?
Process::setDefaultVueReponse("vueContents.php");

Define("ACTIONID_RESULT_FOOTER","FOOT");
Define("ACTIONID_RESULT_HEADER","header");
Define("ACTIONID_RESULT_PATH1","chemin");
Define("ACTIONID_RESULT_PATH2","sousNiveau");
Define("ACTIONID_RESULT_CONTENTS","contents");
Define("ACTIONID_RESULT","*RESULT");
Define("ACTIONID_RESULT_NONE","NONE");

Define("PROCESSID_HEADERandFOOT","get:header");
$processGetHeader = new Process("Process : Get nav, chemin, link", PROCESSID_HEADERandFOOT);
$processGetHeader->addAction(ACTIONID_RESULT_HEADER, new Action("getNav.php"));
$processGetHeader->addAction(ACTIONID_RESULT_PATH1, new Action("getChemin.php"));
$processGetHeader->addAction(ACTIONID_RESULT_PATH2, new Action("getSsNiveau.php"));
$processGetHeader->addAction(ACTIONID_RESULT_FOOTER, new Action("getLink.php"));

Define("PROCESSID_SETPROCESS","get:default");
$processSetProcess = new Process("Process : set process", PROCESSID_SETPROCESS);
$processSetProcess->addAction(ACTIONID_RESULT, new Action("setProcess.php"));

Define("PROCESSID_SHOW_CONTENTS","get:contentsShow");
$processDebase = new Process("Process : Contents show", PROCESSID_SHOW_CONTENTS);
$processDebase->addAction(ACTIONID_RESULT_CONTENTS, new Action("getContent.php"));
$processDebase->addAction(ACTIONID_RESULT, $processGetHeader);

Define("PROCESSID_GETRAZ","get:raz");
$processIniSession = new Process("Process de réinitialisation", PROCESSID_GETRAZ);
$processIniSession->addAction(ACTIONID_RAZ, new Action("raz.php"));
$processIniSession->addAction(ACTIONID_RESULT, $processSetProcess);

Define("PROCESSID_GETPAGE","get:setPage");
$processChangePage = new Process("Process : Set Page", PROCESSID_GETPAGE);
$processChangePage->addAction(ACTIONID_RESULT_NONE, new Action("setPageCourante.php"));
$processChangePage->addAction(ACTIONID_RESULT, $processSetProcess);
$processChangePage->setParametresName(array("page"));



Define("PROCESSID_SHOW_1_CONTENT","get:contentShow");
$processVisuContent = new Process("Process : 1 Content show", PROCESSID_SHOW_1_CONTENT);
$processVisuContent->addAction(ACTIONID_RESULT_NONE, new Action("setPageCourante.php"));
$processVisuContent->addAction(ACTIONID_RESULT_NONE, new Action("setContent.php"));
$processVisuContent->addAction(ACTIONID_RESULT, $processSetProcess);
$processVisuContent->setParametresName(array("page", "content"));


// Login 
Define("PROCESSID_GETLOGIN","get:login");
$processLogin = new Process("Login", PROCESSID_GETLOGIN);
$processLogin->addAction(ACTIONID_RESULT, $processGetHeader);
$processLogin->addVue("form-login.php", PROCESS_ETAT_DEFAUT);  

Define("PROCESSID_POSTLOGIN","post:login");
$processLogin = new Process("Login", PROCESSID_POSTLOGIN);
$processLogin->addAction(ACTIONID_RESULT_NONE, new Action("trt-login.php"));
$processLogin->addAction(ACTIONID_RESULT, $processDebase);
$processLogin->addVue("form-login.php", PROCESS_ETAT_DEFAUT);
$processLogin->addVue(Process::getDefaultVueReponse(), PROCESS_ETAT_FINAL);

Define("PROCESSID_GETUNLOG","get:unlog");
$processUnlog = new Process("Unlog", PROCESSID_GETUNLOG);
$processUnlog->addAction(ACTIONID_RESULT_NONE, new Action("trt-unlog.php"));
$processUnlog->addAction(ACTIONID_RESULT, $processDebase);

// WS 
//

Define("PROCESSID_WS_GETNAV","get:nav");
$processWsgetNav= new Process("WS Récupération nav", PROCESSID_WS_GETNAV);
$processWsgetNav->addAction(ACTIONID_RESULT_HEADER, new Action("getNav.php"));
$processWsgetNav->setProcessType("WS");

// Acces Bd
//
Define("PROCESSID_GETADDBDD","get:addBDD");
$processAddBDDGet = new Process("addbdd", PROCESSID_GETADDBDD);
$processAddBDDGet->addAction(ACTIONID_RESULT, $processGetHeader);
$processAddBDDGet->addVue("form-addBDD.php", PROCESS_ETAT_DEFAUT);  

Define("PROCESSID_POSTADDBDD","post:addbdd");
$processAddBDDPost = new Process("addBDD", PROCESSID_POSTADDBDD);
$processAddBDDPost->addAction(ACTIONID_RESULT_NONE, new Action("trt-addBDD.php"));
$processAddBDDPost->addAction(ACTIONID_RESULT, $processGetHeader);
$processAddBDDPost->addVue("form-addBDD.php", PROCESS_ETAT_DEFAUT);
$processAddBDDPost->addVue(Process::getDefaultVueReponse(), PROCESS_ETAT_FINAL);

Define("PROCESSID_GETSHOWBDD","get:showbdd");
$processShowBdd = new Process("ShowBdd", PROCESSID_GETSHOWBDD);
$processShowBdd->addAction(ACTIONID_RESULT_NONE, new Action("setPageCourante.php"));
$processShowBdd->addAction(ACTIONID_RESULT, $processGetHeader);
$processShowBdd->addAction(ACTIONID_RESULT_NONE, new Action("manageBDD.php"));
$processShowBdd->setParametresName(array("id"));
?>