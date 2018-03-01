<?
// PATH
Define("PATH_RACINE_CLASS","./");
Define("PATH_CLASS","class/");
Define("PATH_RACINE_VUE","./");
Define("PATH_VUE","vue/");
Define("PATH_RACINE_ACTION","./");
Define("PATH_ACTION","action/");


// Bibliothèque à inclure
$this->config['includesClass'] = array();
$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."BaseDonnee.php";
$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."ObjBdd.php";

$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."Hierarchie.php";

$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."PageInternet.php";
$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."SiteInternet.php";
$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."PageInternetContent.php";

$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."Content.php";
$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."PlayListDeezer.php";
$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."AlbumPhoto.php";
$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."Lecture.php";
$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."Experience.php";
$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."Link.php";

$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."Utilisateur.php";
$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."Profil.php";
$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."PolitiqueAcces.php";

$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."Action.php";
$this->config['includesClass'][count($this->config['includesClass'])] = PATH_RACINE_CLASS.PATH_CLASS."Process.php";

$this->config['includesConfig'] = array();
$this->config['includesConfig'][count($this->config['includesConfig'])] = PATH_RACINE_CONF.PATH_CONF."config_Process.php";
$this->config['includesConfig'][count($this->config['includesConfig'])] = PATH_RACINE_CONF.PATH_CONF."config_vuePrincipale.php";
$this->config['includesConfig'][count($this->config['includesConfig'])] = PATH_RACINE_CONF.PATH_CONF."config_PolitiqueAcces.php";

?>