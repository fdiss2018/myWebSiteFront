<?
new politiqueAcces(POLITIQUE_ACCES_EVERY_THING, null, null, null, false, false, false, false, false);
new politiqueAcces(POLITIQUE_ACCES_EVERY_THING, "PageInternet", null, null, true, false, false, false, false);
new politiqueAcces(POLITIQUE_ACCES_EVERY_THING, "PageInternetContent", null, null, true, false, false, false, true);

new politiqueAcces(POLITIQUE_ACCES_EVERY_THING, "PageInternetContent", PAGEINTERNET_ID_TAL, null, false, false, false, false, false);
new politiqueAcces(POLITIQUE_ACCES_OWNER, "PageInternetContent", PAGEINTERNET_ID_TAL, null, true, false, false, false, true);

new politiqueAcces(POLITIQUE_ACCES_EVERY_THING, "PageInternet", PAGEINTERNET_ID_ADM, null, false, false, false, false, false);
new politiqueAcces(POLITIQUE_ACCES_OWNER, "PageInternet", PAGEINTERNET_ID_ADM, null, true, false, false, false, true);

new politiqueAcces(POLITIQUE_ACCES_EVERY_THING, "PageInternet", PAGEINTERNET_ID_BDD, null, false, false, false, false, false);
new politiqueAcces(POLITIQUE_ACCES_OWNER, "PageInternet", PAGEINTERNET_ID_BDD, null, true, false, false, false, true);

new politiqueAcces(POLITIQUE_ACCES_EVERY_THING, null, null, PROCESSID_GETLOGIN, false, false, false, false, true);
new politiqueAcces(POLITIQUE_ACCES_EVERY_USER, null, null, PROCESSID_GETLOGIN, false, false, false, false, false);
new politiqueAcces(POLITIQUE_ACCES_EVERY_THING, null, null, PROCESSID_GETUNLOG, false, false, false, false, false);
new politiqueAcces(POLITIQUE_ACCES_EVERY_USER, null, null, PROCESSID_GETUNLOG, false, false, false, false, true);

new politiqueAcces(POLITIQUE_ACCES_EVERY_THING, null, null, PROCESSID_GETSHOWBDD, false, false, false, false, false);
new politiqueAcces(POLITIQUE_ACCES_EVERY_USER, null, null, PROCESSID_GETSHOWBDD, false, false, false, false, true);
?>