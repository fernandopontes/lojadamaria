<div class="col-xs-12 col-sm-2 col-md-2"></div>
<div class="col-xs-12 col-sm-8 col-md-8">
    <?php
    if( ! $this->session->userdata('usuario_autenticado')) {
    ?>
        <h2 class="text-center">Cadastro de usuários</h2>
    <?php
    }
    else {
    ?>
        <ul class="breadcrumb">
            <li><a href="<?php print(site_url("painel")); ?>">Painel</a></li>
            <li><a href="<?php print(site_url("usuarios_listar")); ?>">Usuários</a></li>
            <li class="active">Cadastrar novo</li>
        </ul>
    <?php
    }


    if(isset($status_cadastro) && $status_cadastro == 1)
    {
        printf('<div class="alert alert-success">%s</div>', lang('usuario_cad_sucesso'));
    }
    elseif(isset($status_cadastro) && $status_cadastro == 0)
    {
        printf('<div class="alert alert-danger">%s</div>', lang('usuario_cad_falha'));
    }

    if(isset($error_validacao) && count($error_validacao) > 0)
    {
        print('<div class="alert alert-danger"><ul>');

        foreach($error_validacao as $erro)
        {
            printf('<li>%s</li>', $erro);
        }

        print('</ul></div>');
    }

    $erro = validation_errors();
    if($erro != "")
        printf('<div class="alert alert-danger">%s</div>', $erro);

    print(form_open(site_url('usuario_cadastro_db'), array('class' => 'form-login')));
    ?>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
        <input type="text" name="nome" class="form-control" placeholder="Seu nome" aria-describedby="basic-addon1" value="<?php printf('%s', set_value('nome')); ?>" required>
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon2">@</span>
        <input type="email" name="email" class="form-control" placeholder="Seu email" aria-describedby="basic-addon2" value="<?php printf('%s', set_value('email')); ?>" required>
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon3">**</span>
        <input type="password" name="senha1" class="form-control" placeholder="Sua senha" aria-describedby="basic-addon3" required>
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon4">**</span>
        <input type="password" name="senha2" class="form-control" placeholder="Repita a senha" aria-describedby="basic-addon4" required>
    </div>
    <p class="text-center"><button type="submit" class="btn btn-success">CADASTRAR</button></p>
    </form>
</div>
<div class="col-xs-12 col-sm-2 col-md-2"></div>