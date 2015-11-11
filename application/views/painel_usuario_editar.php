<div class="col-xs-12 col-sm-2 col-md-2"></div>
<div class="col-xs-12 col-sm-8 col-md-8">
    <ul class="breadcrumb">
        <li><a href="<?php print(site_url("painel")); ?>">Painel</a></li>
        <li><a href="<?php print(site_url("usuarios_listar")); ?>">Usuários</a></li>
        <li class="active">Editar</li>
    </ul>
    <?php

    if(isset($status_edicao) && $status_edicao == 1)
    {
        printf('<div class="alert alert-success">%s</div>', lang('usuario_edit_sucesso'));
    }
    elseif(isset($status_edicao) && $status_edicao == 0)
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

    if($usuario)
    {
    $campo_hidden = array('id' => $usuario->id);

    print(form_open(site_url('usuario_editar_db'), array('class' => 'form-login'), $campo_hidden));
    ?>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
        <input type="text" name="nome" class="form-control" placeholder="Seu nome" aria-describedby="basic-addon1" required value="<?php print($usuario->nome); ?>">
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon2">@</span>
        <input type="email" name="email" class="form-control" placeholder="Seu email" aria-describedby="basic-addon2" required value="<?php print($usuario->email); ?>">
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon3">**</span>
        <input type="password" name="senha1" class="form-control" placeholder="Sua senha" aria-describedby="basic-addon3">
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon4">**</span>
        <input type="password" name="senha2" class="form-control" placeholder="Repita a senha" aria-describedby="basic-addon4">
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon5"><span class="glyphicon glyphicon-eye-open"></span></span>
        <select name="situacao" class="form-control" aria-describedby="basic-addon5" required>
          <option value="">Situação</option>
          <option value="<?php print(config_item('app-situacao-ativo')); ?>" <?php printf('%s', ($usuario->situacao == config_item('app-situacao-ativo')) ? 'selected' : NULL); ?>><?php print(config_item('app-situacao-ativo')); ?></option>
          <option value="<?php print(config_item('app-situacao-bloqueado')); ?>" <?php printf('%s', ($usuario->situacao == config_item('app-situacao-bloqueado')) ? 'selected' : NULL); ?>><?php print(config_item('app-situacao-bloqueado')); ?></option>
         </select>
    </div>
    <p class="text-center"><button type="submit" class="btn btn-success">EDITAR</button></p>
    </form>
    <?php
    }
    else
    {
        print('<p class="alert alert-warning text-center"><span class="glyphicon glyphicon-info-sign"></span><br>Registro não encontrado!</p>');
    }
    ?>
</div>
<div class="col-xs-12 col-sm-2 col-md-2"></div>