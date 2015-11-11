<div class="col-xs-12 col-sm-1 col-md-1"></div>
<div class="col-xs-12 col-sm-10 col-md-10">
    <ul class="breadcrumb">
        <li><a href="<?php print(site_url("painel")); ?>">Painel</a></li>
        <li class="active">Usuários</li>
    </ul>
    <p><a class="btn btn-default" href="<?php print(site_url('usuario_cadastro_form')); ?>"><span class="glyphicon glyphicon-ok"></span> Cadastrar novo</a></p>
    <?php
    if(isset($app_mensagem) && $app_mensagem != "")
        printf('<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-info-sign"></span><br>%s</p>', $app_mensagem);
    ?>
    <table class="table">
        <caption>Total de registros: <?php print($usuarios_total); ?></caption>
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Login</th>
            <th>Cadastro</th>
            <th>Situação</th>
            <th colspan="2" class="text-center">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php


        ?>
        </tbody>
    </table>
    <div class="pagination"><?php print($paginacao); ?></div>
</div>
<div class="col-xs-12 col-sm-1 col-md-1"></div>