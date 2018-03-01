<nav class="navbar navbar-inverse "><!-- navbar-fixed-top -->
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?=$this->session['REPONS']['header']['RAZ_LINK']?>">Franck Dissoubray</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    	<?php afficheNav2($this->session['REPONS']['header']['NAV'], 0);?>
        <ul class="nav navbar-nav navbar-right">
            <?php foreach ($this->session['REPONS']['header']['ACTION'] as $key => $action) { ?>
    	        <li><a href="<?=$action["href"]?>"><span class="<?=$action["icone"]?>"></span><?=$action["name"]?></a></li>
            <?php }?>
		</ul>
    </div>
  </div>
</nav>



<!-- Banner -->
<?if ($this->session['REPONS']['header']['Banner'] == true) {?>
    <div id="banner">
		<h2><strong>... Mon </strong> site internet ...</h2>
		<br />
		<p>... du pratique, ne se veut ni exaustif, ni representatif ...</p>
		<a href="#main-wrapper" class="button big icon fa-check-circle">Yes it does</a>
    </div>  
<?} ?> 

<?
function afficheNav($TB)
{
    if(count($TB)>0){
        ?><ul><?
        foreach ($TB as $key => $mnu) {
            ?>
            <li<?if($mnu['actif']){?> class="current_page_item" <?}?>>
                <a href = "<?=$mnu['lien']?>"><?=$mnu['titre']?></a>
                <?afficheNav($mnu['childs']);?>
            </li>
        <?}
        ?></ul><?
    }
}

function afficheNav2($TB, $niv)
{
    if(count($TB)>0){
        ?>
        <ul class="<?= ($niv == 0)? "nav navbar-nav" : "dropdown-menu" ?>"><?
        foreach ($TB as $key => $mnu) {
            
            $classLi = (count($mnu['childs'])>0)?  ($niv == 0)?  "dropdown" : "dropdown-submenu" : "" ;
            $classA = (count($mnu['childs'])>0)? "dropdown-toggle" : "" ;
            $dataToggle = (count($mnu['childs'])>0)? "dropdown" : "" ;
            ?>
            <li class="<?= $classLi ?>">
                <a class = "<?= $classA ?>" data-toggle = "<?= $dataToggle ?>" href = "<?=$mnu['lien']?>"><?=$mnu['titre']?></a>
                <?$niv2 = 1+$niv;afficheNav2($mnu['childs'], $niv2);?>
            </li>
        <?}
        ?></ul><?
    }
}
?>