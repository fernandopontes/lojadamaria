<div class="col-xs-12 col-sm-2 col-md-2"></div>
<div class="col-xs-12 col-sm-8 col-md-8">
    <ul class="breadcrumb">
        <li><a href="<?php print(site_url('vitrine')); ?>">Página inicial</a></li>
        <li><a href="<?php print(site_url("usuarios_listar")); ?>">Produtos</a></li>
    </ul>
    <?php
    if($produto)
    {

    }
    else
    {
        print('<p class="alert alert-warning text-center"><span class="glyphicon glyphicon-info-sign"></span><br>Registro não encontrado!</p>');
    }
    ?>
</div>
<div class="col-xs-12 col-sm-2 col-md-2"></div>