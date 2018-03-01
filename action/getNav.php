<?php 
$s = $this->getSession();
$site = $s['SITE'];


$header = array();
// Lien de réinitialisation
$header['RAZ_LINK'] = Process::getProcess(PROCESSID_GETRAZ)->getLink(null);

// Navigation
$header['NAV'] = getNav(0, $site);


// Action menu
$header['ACTION'] = array();

if (PolitiqueAcces::estAccessible($site->getCurrentUser(), $site, PROCESSID_GETLOGIN, POLITIQUE_ACCES_USE ))
{
	$i = count($header['ACTION']);
    $header['ACTION'][$i]["icone"] =  "glyphicon glyphicon-log-in" ;
    $header['ACTION'][$i]["href"] =  Process::getProcess(PROCESSID_GETLOGIN)->getLink(null);
    $header['ACTION'][$i]["name"] =   "";
}
if (PolitiqueAcces::estAccessible($site->getCurrentUser(), $site, PROCESSID_GETUNLOG, POLITIQUE_ACCES_USE ))
{
    $i = count($header['ACTION']);
    $header['ACTION'][$i]["icone"] =  "glyphicon glyphicon-log-out" ;
    $header['ACTION'][$i]["href"] =  Process::getProcess(PROCESSID_GETUNLOG)->getLink(null);
    $header['ACTION'][$i]["name"] =   $site->getCurrentUser()->userName;
}
if (PolitiqueAcces::estAccessible($site->getCurrentUser(), $site, PROCESSID_GETSHOWBDD, POLITIQUE_ACCES_USE ))
{
    $i = count($header['ACTION']);
    $header['ACTION'][$i]["icone"] =  "glyphicon glyphicon glyphicon-cog" ;
    $header['ACTION'][$i]["href"] =  Process::getProcess(PROCESSID_GETSHOWBDD)->getLink(null);
    $header['ACTION'][$i]["name"] =   "";
}


function getNav($profondeur, $noeudEnCours)	{
    $NAV = array();
    $prof = $profondeur+1;
    if(count($noeudEnCours->childs) > 0 && $prof <3){
        $c = 0;
        foreach ($noeudEnCours->childs as $key => $child ) {

			traceSession("Traitement page", $child->getTitre());		
            if (PolitiqueAcces::estAccessible($child->getSite()->getCurrentUser(), $child, null, POLITIQUE_ACCES_READ ))
            {
                $NAV[$c]['titre'] = $child->getTitre();
                $NAV[$c]['lien'] = Process::getProcess(PROCESSID_GETPAGE)->getLink($child->getProcessParam());
				$NAV[$c]['actif'] = 0;
                
                $NAV[$c]['childs'] = getNav($prof, $child);
                $c++;
            }
        }
    }
    return $NAV;
}

$this->setResultAction($header);
?>