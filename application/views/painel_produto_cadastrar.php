<div class="col-xs-12 col-sm-2 col-md-2"></div>
<div class="col-xs-12 col-sm-8 col-md-8">
    <ul class="breadcrumb">
        <li><a href="<?php print(site_url("painel")); ?>">Painel</a></li>
        <li><a href="<?php print(site_url("produtos_listar")); ?>">Produtos</a></li>
        <li class="active">Cadastrar novo</li>
    </ul>
    <?php

    if(isset($status_cadastro) && $status_cadastro == 1)
    {
        printf('<div class="alert alert-success">%s</div>', lang('produto_cad_sucesso'));
    }
    elseif(isset($status_cadastro) && $status_cadastro == 0)
    {
        printf('<div class="alert alert-danger">%s</div>', lang('produto_cad_falha'));
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

    print(form_open_multipart(site_url('produto_cadastro_db'), array('class' => 'form-login')));
    ?>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon0"><span class="glyphicon glyphicon-picture"></span></span>
        <input type="file" name="userfile" placeholder="Imagem de capa" class="form-control" aria-describedby="basic-addon0">
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tags"></span></span>
        <input type="text" name="titulo" class="form-control" placeholder="Nome" aria-describedby="basic-addon1" value="<?php printf('%s', set_value('titulo')); ?>" required>
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-align-justify"></span></span>
        <textarea rows="5" cols="50" class="form-control" name="descricao" aria-describedby="basic-addon2" required><?php printf('%s', set_value('descricao')); ?></textarea>
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon3"><span class="glyphicon glyphicon-usd"></span></span>
        <input type="text" name="valor" class="form-control" placeholder="Valor" aria-describedby="basic-addon3" value="0,00" required>
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon4"><span class="glyphicon glyphicon-eye-open"></span></span>
        <select name="situacao" class="form-control" aria-describedby="basic-addon4" required>
            <option value="">Situação</option>
            <option value="<?php print(config_item('app-situacao-ativo')); ?>" <?php printf('%s', set_select('situacao', config_item('app-situacao-ativo'))); ?>><?php print(config_item('app-situacao-ativo')); ?></option>
            <option value="<?php print(config_item('app-situacao-bloqueado')); ?>" <?php printf('%s', set_select('situacao', config_item('app-situacao-bloqueado'))); ?>><?php print(config_item('app-situacao-bloqueado')); ?></option>
        </select>
    </div>
    <p class="text-center"><button type="submit" class="btn btn-success">CADASTRAR</button></p>
    </form>
</div>
<div class="col-xs-12 col-sm-2 col-md-2"></div>