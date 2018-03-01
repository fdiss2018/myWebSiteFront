<?php 
if (count($this->session['REPONS']['erreurs'])>0) {
foreach ( $this->session['REPONS']['erreurs'] as $k => $val){?>
<div class="alert alert-danger">
  <strong>Erreur!</strong><?= $val ?>
</div>
<?php 
    }
}
 ?>