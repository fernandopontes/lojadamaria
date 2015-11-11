<!DOCTYPE html>
<html lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
        Loja da Maria
    </title>

    <link href="<?php print(base_url()); ?>assets/bootstrap.min.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>assets/css.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>assets/toolkit.css" rel="stylesheet">
    <link href="<?php print(base_url()); ?>assets/application.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

    <style>
        /* note: this is a hack for ios iframe for bootstrap themes shopify page */
        /* this chunk of css is not part of the toolkit :) */
        body {
            width: 1px;
            min-width: 100%;
            *width: 100%;
        }
    </style>

</head>


<body class="ang">

<div class="anq" id="app-growl"></div>

<nav class="ck pc os app-navbar">
    <div class="by">
        <div class="or">
            <button type="button" class="ou collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
                <span class="cv">Toggle navigation</span>
                <span class="ov"></span>
                <span class="ov"></span>
                <span class="ov"></span>
            </button>
            <a class="e" href="<?php print(site_url()); ?>">
                <h1 id="logo-loja">Loja da Maria</h1>
            </a>
        </div>
        <div class="f collapse" id="navbar-collapse-main">

            <?php
            if( ! $this->session->userdata('usuario_autenticado')) {
            ?>
                <ul class="nav navbar-nav ss">
                    <li>
                        <a href="<?php print(site_url()); ?>vitrine">Produtos</a>
                    </li>
                    <li>
                        <a href="<?php print(site_url()); ?>painel">Painel administrativo</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav og ale ss">
                    <li>
                        <a data-toggle="modal" href="#msgModal"><span
                                class="glyphicon glyphicon-shopping-cart carrinho"></span></a>
                    </li>
                </ul>

                <form class="ow og i" role="search">
                    <div class="et">
                        <input kl_vkbd_parsed="true" class="form-control" data-action="grow"
                               placeholder="Buscar produto" type="text">
                    </div>
                </form>

                <ul class="nav navbar-nav st su sv">
                    <li><a href="<?php print(site_url()); ?>vitrine">Produtos</a></li>
                    <li><a href="<?php print(site_url()); ?>painel">Painel administrativo</a></li>
                    <li><a data-toggle="modal" href="#msgModal">Carrinho de compras</a></li>
                </ul>
            <?php
            }
            else
            {
            ?>
                <ul class="nav navbar-nav ss">
                    <li>
                        <a href="<?php print(site_url()); ?>produtos_listar">Produtos</a>
                    </li>
                    <li>
                        <a href="<?php print(site_url()); ?>usuarios_listar">Usuários</a>
                    </li>

                    <li>
                        <a href="<?php print(site_url()); ?>usuario_logout">Sair</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav st su sv">
                    <li><a href="<?php print(site_url()); ?>painel_produtos">Produtos</a></li>
                    <li><a href="<?php print(site_url()); ?>painel_usuarios">Usuários</a></li>
                    <li><a href="<?php print(site_url()); ?>usuario_logout">Sair</a></li>
                </ul>
            <?php
            }
            ?>
        </div>
    </div>
</nav>

<div class="cd fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="d">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <button type="button" class="cg fx fp eg k js-newMsg">New message</button>
                <h4 class="modal-title">Messages</h4>
            </div>

            <div class="modal-body amf js-modalBody">

            </div>
        </div>
    </div>
</div>

<div class="container">
    <main>
        <?php
        if( ! isset($pagina_interna))
        {
            include 'vitrine.php';
        }
        elseif( isset($pagina_interna) && $pagina_interna != "")
        {
            include $pagina_interna . '.php';
        }
        ?>
    </main>
</div>

<script src="<?php print(base_url()); ?>assets/jquery.js"></script>
<script src="<?php print(base_url()); ?>assets/toolkit.js"></script>
<script>
    // execute/clear BS loaders for docs
    $(function(){
        if (window.BS&&window.BS.loader&&window.BS.loader.length) {
            while(BS.loader.length){(BS.loader.pop())()}
        }
    });

    function confirmar_excluir()
    {
        var pergunta = confirm("Tem certeza que deseja excluir este item?");

        if (pergunta == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>



</body></html>
