<form action="<?=Process::getProcess(PROCESSID_GETLOGIN)->getLink(null)?>" method="post">
Login<input name = "login" name = "Login"></input>
Password<input type ="password" name = "password"></input>
<input type="submit" value="Submit"> 
</form>
<?php 
if(count($dReponse["erreurs"])>0){
    include PATH_RACINE_VUE.PATH_VUE."erreurs.php";
}
?>