<div class="col-xs-12 col-sm-4 col-md-4"></div>
<div class="col-xs-12 col-sm-4 col-md-4">
    <h2 class="text-center">Identifique-se</h2>
    <?php
    if(isset($error_validacao) && $error_validacao != "")
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

    print(form_open(site_url('usuario_login'), array('class' => 'form-login')));
    ?>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">@</span>
        <input type="email" name="email" class="form-control" placeholder="Seu email" aria-describedby="basic-addon1" required>
    </div>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon2">**</span>
        <input type="password" name="senha" class="form-control" placeholder="Sua senha" aria-describedby="basic-addon2" required>
    </div>
    <p class="text-center"><button type="submit" class="btn btn-success">ENTRAR</button></p>
    <p class="text-center"><a href="<?php print(site_url('usuario_cadastro_form')); ?>"><span class="glyphicon glyphicon-question-sign"></span> Cadastra-se aqui</a></p>
    </form>
</div>
<div class="col-xs-12 col-sm-4 col-md-4"></div>