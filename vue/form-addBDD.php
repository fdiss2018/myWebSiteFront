<form action="<?=Process::getProcess(PROCESSID_GETADDBDD)->getLink(null)?>" method="post">
<input type="submit" value="Submit"> 
</form>
<?php 
if(count($dReponse["erreurs"])>0){
    include PATH_RACINE_VUE.PATH_VUE."erreurs.php";
}
?>