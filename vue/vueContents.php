<div class="container text-center">    
	<div class="row">
		
    	<?if($this->session['REPONS']['chemin']) {?>
			<div class="col-sm-2">
				<div class="alert alert-success fade in">

					<p><strong>Chemin</strong></p>
				</div>        
    			<?foreach($this->session['REPONS']['chemin'] as $idChe => $chemin) {?>
        			<p><a href="<?=$chemin['lien']?>"><?=$chemin['titre']?></a></p>
    			<?php }?>        
			</div>   	
        <?}
        for ( $i=0; $i<count($this->session['REPONS']['contents']); $i++){
            $size = 2;            
            if($this->session['REPONS']['contents'][$i]['illustration'] && $size < 3) {$size = 3;}
            if($this->session['REPONS']['contents'][$i]['illustration']['iframe'] && $size < 4) {$size = 4;}
            if(strlen($this->session['REPONS']['contents'][$i]['texte'])>20  && $size < 3) {$size = 3;}
            if(strlen($this->session['REPONS']['contents'][$i]['texte'])>40  && $size < 4) {$size = 4;}
            
            $class =  "col-sm-2 well" ; 
            if($size == 3){$class =  "col-sm-3 well" ; }
            if($size == 4){$class =  "col-sm-4 well" ; }
            ?>

        	<div class="<?=$class?>">
        		<div class="thumbnail">
        			<p><?=$this->session['REPONS']['contents'][$i]['titre']?></p>
        
        			<?if($this->session['REPONS']['contents'][$i]['illustration']){?>
            			<?if($this->session['REPONS']['contents'][$i]['illustration']['iframe']){?>	
            				<iframe  scrolling="no" frameborder="0" allowTransparency="true" src="<?=$this->session['REPONS']['contents'][$i]['illustration']['src']?>"></iframe>
            			<?} else {?>
	        				<img src="<?=$this->session['REPONS']['contents'][$i]['illustration']['src']?>" alt="<?=$this->session['REPONS']['contents'][$i]['titre']?>" >
						<?}?>
        			<?}?>
        
        			<p><strong><?=$this->session['REPONS']['contents']['titre']?></strong></p>
        			<p><?=$this->session['REPONS']['contents']['sousTitre']?></p>
        			<?foreach($this->session['REPONS']['contents'][$i]['Actions'] as $idAct => $action) {?>
	        			<a target = "<?=$action['target']?>" href="<?=$action['link']?>" class="btn btn-info" role="button"><?=$action['titre']?></a>
        			<?php }?>
        		</div>      
        		
        		<?if($this->session['REPONS']['contents'][$i]['texte']){?>
        			<div class="well"><p><?=$this->session['REPONS']['contents'][$i]['texte']?></p></div>
        		<?}?>
        	</div>
        <?}?> 
	</div>
</div>

<div class="container text-center">    
	<h3>Link</h3>
	<br>
	<div class="row">
		<?
		if(count($this->session['REPONS']['FOOT'])>0){
    		foreach ($this->session['REPONS']['FOOT'] as $cat => $TLK) {?>
    			<div class="col-sm-2">
    				<div class="alert alert-success fade in">
    					<p><strong><?=$cat?></strong></p>
    				</div>    
    				<?	foreach ($TLK as $i => $lk) { ?>
    					<p><a target = "<?=$lk['target']?>" href="<?=$lk['lien']?>"><?=$lk['titre']?></a></p>
    				<?}?>
    			</div>
			<?}
		}?>
	</div>  
</div>
<br>

