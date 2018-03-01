<??>


<footer class="container-fluid text-center">

<div class="btncon" style="margin-bottom:25px;">
	<?if($this->session['REPONS']['sousNiveau']){
        foreach ( $this->session['REPONS']['sousNiveau'] as $key => $link){?>
			<a href="<?=$link['lien'] ?>" class="btn btn-default"><?=$link['titre'] ?> <i class="fa fa-file-text"></i></a>
		<?}
    }?>
</div>
</footer>