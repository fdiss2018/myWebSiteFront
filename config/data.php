<?
//
// Menu
//
$site = new siteInternet();
$home = new PageInternetContent("Home");$home->setId(PAGEINTERNET_ID_HOM);
$work = new PageInternetContent("Work");
$curriculum = new PageInternetContent("Curriculum Vitae");
$curriculum->modeAff = "2";
$talentia = new PageInternetContent("Talentia-Software");$talentia->setId(PAGEINTERNET_ID_TAL);
$centre = new PageInternetContent("Centres d'interêt");
$photo = new PageInternetContent("Photo");
$musique = new PageInternetContent("Musique");
$movie = new PageInternetContent("Movie");
$travel = new PageInternetContent("Voyages");
$sport = new PageInternetContent("Sport");
$lecture = new PageInternetContent("Lecture");
$outils = new PageInternetContent("Outils");
$administration = new PageInternetContent("Administration");$administration->setId(PAGEINTERNET_ID_ADM);
$adminBdd = new PageInternet("Administration Bdd", Process::getProcess(PROCESSID_GETSHOWBDD));$adminBdd->setId(PAGEINTERNET_ID_BDD);

$surf = new PageInternetContent("Surf");

// Organisation menu
$site->addDefaultPage($home);
$site->addPage($work);
$site->addPage($centre);
$site->addPage($outils);
$work->addPage($curriculum);
$work->addPage($talentia);
$centre->addPage($photo);
$centre->addPage($musique);
$centre->addPage($sport);
$centre->addPage($lecture);
$centre->addPage($movie);
$centre->addPage($travel);
$sport->addPage($surf);
$site->addPage($administration);
$administration->addPage($adminBdd);
//
// CONTENT
//
$musique->addContentAccueil(new playlistDeezer(mktime(0, 0, 0, 09, 01, 2016), "Reprises d&eacute;cal&eacute;es", 'Des reprises, des reprises et encore des reprises ...', '2166990102'));
$musique->addContentAccueil(new playlistDeezer(mktime(0, 0, 0, 09, 01, 2016), "Musique de film", 'Standards pr&eacute;sent au cinema ...', '2693704244'));

// concert 
$conc1 = new Content("Usine - Nash");$conc1->date = mktime(0, 0, 0, 03, 18, 2016);$musique->addContent($conc1);
$conc2 = new Content("Arêne de Nîme - Insus");$conc2->date = mktime(0, 0, 0, 03, 18, 2016);$musique->addContent($conc2);


$photo->addContentAccueil(new AlbumPhoto(mktime(0, 0, 0, 05, 13, 2017), "Coquelicots", "Apr&egrave;s midi coquelicot", 'https://photos.google.com/share/AF1QipOToXGPtRoJiKrCpaAlRDkay7f_kXWGSLNypJV_WOVQuemDXpSXE7vChvt-gMv4fA?key=b0RHVzViVS1seWJoeDZPeUQ4LTNfaWNJRTlYWmZR', 'https://lh3.googleusercontent.com/p/AF1QipPcnGrH0bm9xvMGJGY3bMreI-Poo3DVgv1VxF6k=s512-p-iv1992?key=b0RHVzViVS1seWJoeDZPeUQ4LTNfaWNJRTlYWmZR'));
$photo->addContentAccueil(new AlbumPhoto(mktime(0, 0, 0, 07, 07, 2017), "Monde animal", "Apr&egrave;s midi pass&eacute; dans le monde du tout petit, concours photo entreprise 2017",  'https://photos.google.com/share/AF1QipP2WaJhh5Z0ylG_U6Zp-bpiPc5QMRFwiXhmYESjZR7QD1UpcECxviuaxHZ8RqIvbg?key=MlhrSHBZbHNBSGhzaXp6MDh3c24wWlZHWjBac0VB', 'https://lh3.googleusercontent.com/p/AF1QipP0JIgKmuhAGE58I_sSX6Pw3xFfHDfXdFTO7xnW=s512-p-iv1991?key=MlhrSHBZbHNBSGhzaXp6MDh3c24wWlZHWjBac0VB'));
$photo->addContentAccueil(new AlbumPhoto(mktime(0, 0, 0, 09, 20, 2017), "G&eacute;ometrie Urbaine", "Concours photo entreprise 2017, photo pr&eacute;sent&eacute;e : les 3 personnages qui montent les marches de la d&eacute;fense(3e place).",  'https://photos.google.com/share/AF1QipP9H4V32tO6N_Z7bmSdbKXpunfzRANowLiyxW2TER-3_F2mFMX9Z5DPzgLcizBa2Q?key=cEFLTVpmZllaTThTakJMdGJLRkFKOVJyeE5qRnlR', 'https://lh3.googleusercontent.com/p/AF1QipMujcADtlsjDo735ggxQz0bpioKcYGEXUmNH2K8=s512-p-iv2255?key=cEFLTVpmZllaTThTakJMdGJLRkFKOVJyeE5qRnlR'));
$photo->addContentAccueil(new AlbumPhoto(mktime(0, 0, 0, 09, 01, 2016), "Concour photo 2016 : Lumi&egrave;re", " Concours enteprise, photo pr&eacute;sent&eacute;e : la bougie dans les mains (2d place). ", 'https://goo.gl/photos/Hi2gLFFboeNCvArw8',  'https://lh3.googleusercontent.com/p/AF1QipMUvYxkgNaxYGL1qHKtIm4Vbvm5sFeTSm-a5bl4=s512-p-iv1776?key=UlNYaVdEX05ubERFVjA0d1RDaEFIRW1qdGh1QWRB'));

$lecture->addContent(new Lecture(mktime(0, 0, 0, 07, 07, 2017), "Orson Scott Card - Cycle d'Ender", "Un classique SF, l'aspect psychologique ne laisse pas insensible, mais l'univers n'est pas transportant", ' 9782290071823', ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 08, 06, 2017), "Gr&eacute;goire Hervier - Vintage", "Je l'ai d&eacute;vor&eacute;, on lache le livre que pour se jeter sur Deezer", '9791030700749', ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 01, 10, 2015), 'Caryl Ferey - D\'amour et dope fraiche', 'Une aventure du poulpe, divertissant', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 02, 01, 2016), 'Philippe Carrese - 3 jours d\'engatse', 'Intrigue un peu l&eacute;g&egrave;re, l\'histoire mise trop sur le cot&eacute; marseillais', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 02, 23, 2016), 'Michel Houellebecq - Soumission', 'Interessant, l\'accueil de la critique n\'est au moins tout autant', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 03, 04, 2016), 'Legardinier - Et soudain tout change', 'Sympa, l&eacute;ger, quelques reflexion interessante autour de la jeunesse, les diference de point de vue ado/adulte, et les questions que se posent les jeunes', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 03, 08, 2016), 'phillippe grimbert - nom de dieu', 'Amusant, pas prise de tête, bienvenue si en panne de lecture.', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 03, 30, 2016), ' - Alea', 'Non fini, pas r&eacute;ussis à rentrer sufisement dans l\'histoire.', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 04, 13, 2016), 'Adam Langer - Contrat SAlinger', 'Se laisse lire. Bon livre de vacances.', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 05, 02, 2016), 'Shaw, William - Du sang sur Abbey road', 'Sympa, bon polar dans une ambiance ann&eacute;e retro.', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 05, 28, 2016), 'Gordon Zola - La d&eacute;rive des incontinents', 'Sous fond d\'intrigues polici&egrave;re, un record en terme de nombre de jeux de mot par phrase. Tr&egrave;s marrant. ', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 06, 06, 2016), 'Anne Mikolajczak - Petite philosophie de nos erreurs quotidiennes', '2, 3 exemples interessant mettant en &eacute;vidence notre conditionnement.', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 06, 16, 2016), 'Benson, St&eacute;phanie - Lilith et la vengeance du dark magician', 'Livre pour enfant, où l\'anglais est introduit au fur et a mesur.', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 06, 17, 2016), 'Lenglet, Roger - Europe Ecologie : miracle ou mirage ?', 'Trop de d&eacute;tail sur l\'historique du parie et du coup masque la compr&eacute;hention des faits. Abandonn&eacute; à la moiti&eacute;.', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 07, 02, 2016), 'Gordon Zola - Les tatas flingueurs', 'Sous fond d\'intrigues polici&egrave;re, une multitude de jeux de mots. Tr&egrave;s marrant, m^me si au bout du second roman lue, la redondance de la m&eacute;canique du style perd de son charme. ', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 07, 09, 2016), 'Johnson, Craig - Little Bird', 'Polar qui se d&eacute;roule dans le Wyoming, embarqu&eacute; par les personnages et l\'ambiance, tr&egrave;s bon livre.', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 08, 31, 2016), '?? - ??', 'Roman aventure, se d&eacute;roulant sur 2 epoques, 13 et 21e siecle (2024), la fin du monde est annonc&eacute;e, les dates de naisances et de deces recense&eacute;es dans une biblioth&egrave;que, l\'ensemble des nations (US, UK Chine) veulent s\'emparer de ce tresor. Un herot pour mettre de l\'odre dans tous ça. Un ensemble bien tir&eacute; par les cheveux, bien pour s\'occuper sur la plage. ', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 11, 04, 2016), 'Arlan Coben - Peur Noire', 'Pas mal, on se lasse un peu au bout du niem arlan coben', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 03, 20, 2016), 'Olivier Maulin - Gueule de bois', 'Loufoque, sympa, dans la lign&eacute; de "Comment devinr un dieu vivant" de Blanc Gras. Par contre si les personnages et les situations font que le livre est sympa, en revanche on ne voit l\'intention en g&eacute;n&eacute;rale.', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 09, 04, 2016), 'Dr chritian bourrit - Votre vie est un jeu quantique', 'Pas trop accroch&eacute; la partie quantique, par contre bonne m&eacute;thode avec exemple de formulaire pour savoir comment r&eacute;orienter sa vie.', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 09, 11, 2016), 'Titiou lecoq - La th&eacute;orie de la tartine', 'Evolution du net depuis les ann&eacute;e 2000 au travers la vie de 3 personnage.Tres tres bien.', null, ''));

$lecture->addContent(new Lecture(mktime(0, 0, 0, 07, 11, 2017), 'Romain Puertolas - Tout un �t� sans facebook', 'Polar d�jant�. Pas mal', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 09, 09, 2017), 'Lupano Rodguen - Ma r�v�rence', 'Bonne BD', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 09, 09, 2017), 'Antoine Laurain - Le chapeau de mitterrand', 'Id�e originale, le croisement depersonnage h�t�roclite, li� par un chapeau', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 06, 08, 2017), 'Gr�goire Hervier - Vintage', 'l\'histoire du rock re-conter sur la trace d\'une guitare', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 16, 07, 2017), 'Gilles Legardinier - Le premier miracle', 'Entre da vinci code et indiana jones : �a d�tend', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 27, 06, 2017), 'Uli Desterle - Hector Umbra', ' Une BD .... ', null, ''));
$lecture->addContent(new Lecture(mktime(0, 0, 0, 27, 06, 2017), 'P�n�lope Bagieu - Josephine', ' BD tr�s sympa ', null, ''));


$travail01 = new Content("Voltaire");$travail01->texte = " ... Le travail &eacute;loigne de nous trois grands maux : l'ennui, le vice et le besoin ... ";$work->addContent($travail01);

$exp01 = new Content("Ing&eacute;nieur d'&eacute;tudes");$exp01->texte = "15ans dans l'informatique de gestion, banque CIL, progiciel RH ... ";$curriculum->addContent($exp01);
$curriculum->addContent(new Experience(mktime(0, 0, 0, 04, 01, 2011), null,  "Talentia Software", "Analyste concepteur", "Au sein du d&eacute;partement R&D, participation à la maintenance et aux &eacute;volutions de la solution HR IP (Human Ressource Iris Personnel) : Conception Solutions, r&eacute;daction sp&eacute;cifications techniques et fonctionnelles, suivi de recette, r&eacute;daction documentations utilisateurs, logistique."));
$curriculum->addContent(new Experience(mktime(0, 0, 0, 01, 01, 2009), mktime(0, 0, 0, 04, 15, 2016),  "Auto Entrepreneur", "Web designer", "Maintenance site internet \"Hotel-R&eacute;sidence les Aiguades\" (PHP5, Mysql, h&eacute;bergement 1&1.)"));
$curriculum->addContent(new Experience(mktime(0, 0, 0, 02, 01, 2010), mktime(0, 0, 0, 03, 31, 2011),  "Bnp Lease", "Chef de projet", "Prestation de service en tant que chef de projet Junior sur les projets de mise aux normes BÂLEII.<Br>- Accompagnement MOA dans la r&eacute;daction des cahiers des charges.<Br>- Conception et r&eacute;daction des dossiers de sp&eacute;cifications fonctionnelles et techniques.<Br>- Suivi de la r&eacute;alisation par plateforme offshore, suivi de Recette.<Br>- D&eacute;ploiement et suivi de l’application."));
$curriculum->addContent(new Experience(mktime(0, 0, 0, 09, 01, 2008), mktime(0, 0, 0, 01, 31, 2010),  "Alliade SI", "ing&eacute;nieur d’&eacute;tude", "Prestation de service en tant qu’ing&eacute;nieur d’&eacute;tude.<br>- Conception, r&eacute;alisation et suivi de ressources dans le cadre de la refonte du syst&egrave;me de la gestion commerciale<br>- Suivi et maintient de l'application de gestion des courriers<br>- R&eacute;daction cahier des charges dans le cadre du rapprochement entre collecteurs (Lois Molle–Boutin).<br>"));
$curriculum->addContent(new Experience(mktime(0, 0, 0, 09, 01, 2004), mktime(0, 0, 0, 08, 31, 2008),  "Bnp Lease", "ing&eacute;nieur d’&eacute;tude", "Prestation de service en tant qu’ing&eacute;nieur d'&eacute;tude au sein du domaine  des projets de mise aux normes BÂLE II.<br>- Conception et r&eacute;alisation pour la mise en place d’un syst&egrave;me d’acquisition de donn&eacute;es aupr&egrave;s de fournisseurs de donn&eacute;es dans le cadre du projet Extranet Europ&eacute;en.<br>- Mise en place d’outils de contrôle de performances du syst&egrave;me d’acquisition de donn&eacute;es.<br>- R&eacute;tro- documentation du process risque dans le cadre de la certification CMMI.<br>"));
//
// LINK
//

$centre01 = new Content("Descarte");$centre01->texte = " ... Les passions sont toutes bonnes de leur nature et nous n�avons rien � &eacute;viter que leurs mauvais usages ou leurs exc&egrave;s. ... ";$centre->addContent($centre01);


$work->addLinkAccueil(new Link("Dico", "http://www.leconjugueur.com/" ,"Le Conjugueur - Toute la conjugaison des verbes"));
$work->addLinkAccueil(new Link("Dico", "http://www.lexilogos.com/index.htm" ,"LEXILOGOS - Dictionnaires, Cartes, Documents en ligne - Langues &amp; Pays"));
$work->addLinkAccueil(new Link("Dico", "http://atilf.atilf.fr/dendien/scripts/tlfiv4/showps.exe?p=combi.htm;java=no;" ,"Recherche d&#39;un mot"));
$work->addLinkAccueil(new Link("Dico", "http://www.mediadico.com/dictionnaire/anglais-francais/omit/1" ,"Traduction omit dictionnaire anglais francais"));
$work->addLinkAccueil(new Link("Dico", "http://translate.google.com/" ,"Google Traduction"));
$work->addLink(new Link("Perso", "https://fr-mg42.mail.yahoo.com/neo/launch?.rand=ammc6v669b4pv#mail" ,"Yahoo Mail"));
$work->addLink(new Link("Perso", "https://mail.google.com/mail/u/0/?tab=wm#inbox" ,"Google Mail"));
$work->addLink(new Link("Perso", "https://www.google.com/calendar/render?tab=wc&pli=1" ,"Google Agenda"));
$work->addLink(new Link("Perso", "https://drive.google.com/?tab=mo&authuser=0#my-drive" ,"Google Drive"));
$work->addLink(new Link("Perso", "file:///F:/Data/Documents/PERSO/Inscription/connexion.html" ,"USB key - connexion.html"));
$work->addLink(new Link("Perso", "http://franck.dissoubray.free.fr/" ,"Franck Dissoubray"));
$work->addLink(new Link("Perso", "http://simulateur-entretien.apec.fr","Entretient Apec"));
$work->addLink(new Link("Autre", "http://www.agirc-arrco.fr/" ,"retraite compl&eacute;mentaire AGIRC-ARRCO Accueil"));
$work->addLink(new Link("Autre", "http://www.volubis.fr/bonus/SQL_memo.htm" ,"M&eacute;mento SQL"));
$work->addLink(new Link("Autre", "https://www.fun-mooc.fr/cours/" ,"FUN MOOC - Les cours"));
$work->addLink(new Link("Autre", "http://publib.boulder.ibm.com/cgi-bin/bookmgr/FRAMESET/QBKAQV00/11.20.84?SHELF=&DT=19940325191514" ,"IBM Library Server 11.20.84 &quot;QBKAQV00&quot;"));
$work->addLink(new Link("M&eacute;thode", "http://gpp.oiq.qc.ca/le_plan_qualite_de_projet.htm" ,"Le plan qualit&eacute; de projet"));
$work->addLinkAccueil(new Link("Autre", "./raz.php" ,"Raz"));
$work->addLinkAccueil(new Link("Autre", "http://tahe.developpez.com/web/php/mvc/?page=page_1", "Tuto MVC"));
$curriculum->addLink(new Link("M&eacute;thode", "http://viadeo.com/" ,"Viadeo.com"));
$curriculum->addLink(new Link("M&eacute;thode", "https://fr.linkedin.com/" ,"LinkedIn"));
$curriculum->addLink(new Link("M&eacute;thode", "http://www.pole-emploi.fr/accueil/" ,"Pôle emploi"));
$curriculum->addLink(new Link("M&eacute;thode", "http://www.apec.fr/Accueil/ApecIndexAccueil.jsp?gclid=COSUtZb8xrwCFU_KtAodoA8AHA#xtor=SEC-1560" ,"Apec.fr"));
$talentia->addLink(new Link("EveryDay", "https://webmail.talentia-software.com/owa/fdissoubray@lswe.priv/" ,"Outlook"));
$talentia->addLink(new Link("Support", "https://webmail.lswe.com/owa/support-connexion@lswe.priv/" ,"Outlook support"));
$talentia->addLink(new Link("EveryDay", "http://confluence.lswe.priv/" ,"Wiki - Espace de documentation"));
$talentia->addLink(new Link("EveryDay", "http://confluence.lswe.priv/display/THRIP/Talentia+HR-IP" ,"Wiki - Talentia HR-IP"));
$talentia->addLink(new Link("Support", "http://jira.tswe.com/secure/Dashboard.jspa" ,"Jira - Tableau de bord"));
$talentia->addLink(new Link("Support", "http://confluence.lswe.priv/display/telem/Home" ,"Wiki  -  Support T&eacute;l&eacute;maintenance"));
$talentia->addLink(new Link("Support", "https://vm-appcont2012/" ,"VM cisco"));
$talentia->addLink(new Link("Support", "https://docs.google.com/forms/d/1BF59zzdmfZRp2A4IjVwlqWYEMIEFLWJD2OdhyLdxM6c/viewform" ,"H&eacute;bergement - Formulaire d&#39;acc&egrave;s"));
$talentia->addLink(new Link("Support", "http://172.30.30.12:10080/eServices/pagesAuth/authStep.jsf" ,"Hebergement - Portail Co"));
$talentia->addLink(new Link("Actu", "https://twitter.com/TalentiaSW" ,"Talentia Software Twitter"));
$talentia->addLink(new Link("Vie courante", "http://intranet.lswe.net/vdoc/index.jsp" ,"Intranet"));
$talentia->addLink(new Link("Vie courante", "http://extranet.tswe.com/" ,"Extranet"));
$talentia->addLink(new Link("EveryDay", "http://vm-activ/WD140AWP/WD140AWP.exe/CONNECT/ffPointage." ,"Pointeuse"));
$talentia->addLink(new Link("Talentia", "https://mail.talentia-software.com/user/antispam/user/greylist" ,"Mail in black"));
$talentia->addLink(new Link("Vie courante", "https://w.mykds.com/MA017/6.73.5046.0/gbt/pages/Logon.aspx" ,"EasyRes Corpo"));
$talentia->addLink(new Link("Support", "http://support-info.lswe.net/" ,"Support - GLPI"));
$talentia->addLink(new Link("Vie courante", "https://portailrh.tswe.com/eServices/" ,"Portail acces externe"));
$talentia->addLink(new Link("Produit", "http://drhprod:7001/analytics/saw.dll?bieehome&startPage=1" ,"Oracle Business Intelligence Connexion"));
$talentia->addLink(new Link("Produit", "http://vm-sirh-retd/" ,"Vm-SIRH-R&amp;D - Serveurs  Front Office 2.0"));
$talentia->addLink(new Link("Produit", "http://vm-sirh-retd/IrisAdmin/serversList.do" ,"vm-sirh-retd - Administration"));
$talentia->addLink(new Link("Produit", "file://///lswe.priv/Fichiers/Logiciels/Bases%20de%20donnees/Infinite%204005/Documentation/index.htm" ,"Infinite iSeries Help"));
$talentia->addLink(new Link("Produit", "http://vm-eservices:6080/eServices/pagesAuth/authStep.jsf?cid=3" ,"Portail CO P1 THR30"));
$talentia->addLink(new Link("Produit", "http://vm-eservices:8080/eServices/pagesAuth/authStep.jsf;jsessionid=38927D2A60B8924157425C16B6635357" ,"Portail CO P1 THR32"));
$talentia->addLink(new Link("Produit", "http://vm-eservices:1080/portailDsn" ,"Portail DSN"));
$talentia->addLink(new Link("Produit", "http://vm-eservices:9080/talentiaAdmin/pages/environnement/index.jsf" ,"eService appli d&#39;admin"));
$photo->addLinkAccueil(new Link("Photo", "http://www.bluehoursite.com/" ,"Blue Hour and Night Photography "));
$photo->addLink(new Link("Photo", "http://www.lense.fr/news/les-20-meilleurs-blogs-photo-selon-life/" ,"Les 20 meilleurs blogs photo selon Life | Lense "));
$photo->addLink(new Link("Photo", "https://www.theatlantic.com/photo/" ,"Photo - The Atlantic "));
$photo->addLink(new Link("Photo", "http://www.studio-photo-numerique.com/photos-noir-et-blanc/" ,"Photos en noir et blanc : le guide complet "));
$photo->addLink(new Link("Photo", "http://objectif-photographe.fr/" ,"Objectif Photographe - Devenons ensemble photographe, et vivez la vie de vos rêves "));
$photo->addLink(new Link("Photo", "http://www.laphotopourlesnuls.com/?cat=8" ,"Notions de base La Photo Pour Les Nuls "));
$photo->addLink(new Link("Photo", "http://apprendre-la-photo.fr/" ,"Apprendre la photo, le blog | "));
$photo->addLink(new Link("Photo", "http://tontonphoto.fr/" ,"Tonton Photo : apprendre la photo grâce à des conseils simples et cr&eacute;atifs "));
$photo->addLink(new Link("Photo", "http://rawtherapee.com/blog/documentation" ,"RawTherapee RawTherapee Documentation "));
$photo->addLink(new Link("Photo", "http://www.1point2vue.com/" ,"Apprendre à faire des photos et à les retoucher | 1point2vue "));
$photo->addLink(new Link("Photo", "http://www.astuces-photo.com/" ,"Astuces Photo | Apprendre la photo autrement "));
$musique->addLink(new Link("Musique", "http://www.allmusic.com/" ,"AllMusic "));
$musique->addLink(new Link("Musique", "http://tunein.com/artist/Billie-Holiday-m85726/?autoplay=true" ,"Blocked URL "));
$musique->addLink(new Link("Musique", "http://www.deezer.com/" ,"deezer "));
$musique->addLink(new Link("Musique", "http://www.frequence-radio.com/frequence-radio-MARSEILLE.html" ,"Frequence Radio MARSEILLE "));
$centre->addLink(new Link("Sortie", "http://hotel-de-la-plage.com/hotel-restaurant-carry-specialiste-bouillabaisse.php" ,"Hotel Restaurant sp&eacute;cialites mer bouillabaisse à Carry sur la côte bleue - Hotel Restaurant de la Plage. "));
$centre->addLink(new Link("Sortie", "http://www.google.fr/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&ved=0CDAQFjAA&url=http%3A%2F%2Fmarseille.onvasortir.com%2F&ei=sx_2UpOaNYm10wWd6YCYCw&usg=AFQjCNHAAdOn9Jo_MzIDi57mtiBDABOkHw&sig2=PEE6sqp5lNvK", "Ovs"));
$centre->addLink(new Link("Vacances", "http://www.booking.com/hotel/fr/logis-select.fr.html?sid=44ff02a12d5d11fc49a99e19c9e2a4e4;checkin=2011-10-01;checkout=2011-10-02;srfid=83b828158abd2cbdc29ec0c59215b78bX7" ,"booking.com Logis Hotel Select"));
$centre->addLink(new Link("Vacances", "http://www.reinesammut.com/" ,"Hôtel Auberge de Charme et Luxe en Luberon Provence La Feni&egrave;re de Reine Sammut "));
$sport->addLink(new Link("Sport", "http://www.setsquash.com/mon-compte/" ,"MON COMPTE - SET "));
$sport->addLinkAccueil(new Link("Sport", "http://resa.setsquash.deciplus.pro/deciplus.html" ,"Set squash"));
$sport->addLink(new Link("Sport", "https://www.surf-report.com/meteo-surf/le-prado-s1050.html" ,"M&eacute;t&eacute;o surf Le Prado"));
$sport->addLinkAccueil(new Link("Sport", "http://marine.meteoconsult.fr/meteo-marine/meteo-spots-de-glisse/mer-mediterranee/previsions-meteo-marseille-258-0.php" ,"M&eacute;t&eacute;o marseille - Spots de Glisse "));
$sport->addLinkAccueil(new Link("Sport", "http://zywave.org/spots/marseille" ,"ZYWAVE.ORG-Pr&eacute;vision des vagues à Marseille "));
$sport->addLink(new Link("Sport", "http://www.academie-de-hatha-yoga-marseille.com/" ,"academie-de-hatha-yoga "));
$sport->addLink(new Link("Sport", "http://www.sports-tracker.com/#/workout/hazemh/p9h3iots16dglk7o" ,"Sports Tracker - hazemh&#39;s public workouts "));
$sport->addLink(new Link("Sport", "http://viaferratafr.free.fr/via-ferrata.php" ,"ViaFerrata-fr.net Liste de toutes les via ferrata françaises ... "));
$sport->addLink(new Link("Sport", "http://www.baladeenprovence.com/liste-balades.php?page=1&type=8&destination=0&niveau=0&duree=2&mot_cles=&trie=0" ,"Balade en Provence le site des balades en images "));
$lecture->addLink(new Link("Culture", "http://www.anglaisfacile.com/" ,"www.anglaisfacile.com : Apprendre l&#39;anglais "));
$lecture->addLink(new Link("Culture", "http://time.com/magazine/" ,"time magazine "));
$lecture->addLinkAccueil(new Link("Culture", "http://www.bmvr.marseille.fr/in/sites/marseille/accueil" ,"Biblioth&egrave;que "));
$lecture->addLink(new Link("Culture", "http://touch-arts.com/" ,"Touch-arts.com - Site de promotion artistique - Tous les arts et artistes du moment "));
$lecture->addLink(new Link("Culture", "http://www.thegoodlife.fr/" ,"The Good Life | le premier magazine masculin hybride : business &amp; lifestyle "));
$lecture->addLink(new Link("Culture", "http://www.ac-grenoble.fr/PhiloSophie/articles.php?lng=fr&pg=17022" ,"PhiloSophie - Docs audio et vid&eacute;o - Livres audio "));
$lecture->addLink(new Link("Culture", "http://www.arte.tv/fr/tracks/104524.html" ,"Tracks | Culture | fr - ARTE "));
$lecture->addLink(new Link("Culture", "http://13.agendaculturel.fr/search/5xoxEx9xo" ,"Agenda du 07/04/2012 - Agenda Culturel des Bouches-du-Rhône : Concert, Th&eacute;âtre, Festivals "));
$outils->addLinkAccueil(new Link("Information", "http://marseille.lachainemeteo.com/meteo-france/ville/previsions-meteo-marseille-3219-0.php" ,"M&eacute;t&eacute;o "));
$outils->addLinkAccueil(new Link("Information", "https://www.google.fr/maps/place/Marseille/@43.2580718,5.3810769,15z/data=!4m5!3m4!1s0x12c9bf4344da5333:0x40819a5fd970220!8m2!3d43.296482!4d5.36978!5m1!1e1" ,"Marseille - Google Maps Circulation "));
$outils->addLinkAccueil(new Link("Information", "http://fr.mappy.com/info-trafic#/1/M2/TSearch/Smarseille/N151.12061,6.11309,5.37449,43.29502/Z11/" ,"Info trafic Mappy : toute l’info sur le trafic routier "));
$outils->addLink(new Link("Information", "http://www.lepilote.com/carto/?rub_code=127" ,"Lepilote : Image circulation "));
$outils->addLink(new Link("Information", "http://thegoodlife.thegoodhub.com/" ,"The Good Life - Business &amp; Lifestyle "));
$outils->addLink(new Link("Information", "http://www.madmagazine.com/" ,"Mad Magazine | Welcome to Mad Magazine "));
$outils->addLink(new Link("Information", "http://www.marsactu.fr/" ,"Marsactu | News, Blog et City Guide "));
$outils->addLink(new Link("Information", "https://news.google.fr/" ,"Google Actualit&eacute;s "));
$outils->addLink(new Link("Information", "http://lemonde.fr/" ,"Le Monde"));
$outils->addLink(new Link("Information", "http://www.liberation.fr/" ,"Liberation "));
$outils->addLink(new Link("Information", "http://www.lefigaro.fr/" ,"Figaro"));
$outils->addLink(new Link("Information", "http://www.marianne.net/" ,"Marianne "));
$outils->addLink(new Link("Information", "http://www.mediapart.fr/" ,"Mediapart "));
$outils->addLink(new Link("Information", "http://www.sinemensuel.com/" ,"Sin&eacute; Mensuel - Le journal qui fait mal et ça fait du bien "));
$outils->addLink(new Link("Information", "http://www.fakirpresse.info/" ,"FAKIR | Presse alternative | Edition &eacute;lectronique - Journal fâch&eacute; avec tout le monde. Ou presque. "));
$outils->addLink(new Link("Information", "http://www.leravi.org/" ,"Le ravi, mensuel satirique de la r&eacute;gion PACA "));
$outils->addLink(new Link("Information", "http://www.arretsurimages.net/" ,"Arrêt sur images "));
$outils->addLink(new Link("Information", "http://www.capital.fr/" ,"Capital : Actualit&eacute;s &eacute;conomiques "));
?>