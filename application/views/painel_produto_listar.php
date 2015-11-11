<div class="col-xs-12 col-sm-1 col-md-1"></div>
<div class="col-xs-12 col-sm-10 col-md-10" style="overflow: auto;">
    <ul class="breadcrumb">
        <li><a href="<?php print(site_url("painel")); ?>">Painel</a></li>
        <li class="active">Produtos</li>
    </ul>
    <p><a class="btn btn-default" href="<?php print(site_url('produto_cadastro_form')); ?>"><span class="glyphicon glyphicon-ok"></span> Cadastrar novo</a></p>
    <?php
    if(isset($app_mensagem) && $app_mensagem != "")
        printf('<p class="alert alert-danger text-center"><span class="glyphicon glyphicon-info-sign"></span><br>%s</p>', $app_mensagem);
    ?>
    <table class="table">
        <caption>Total de registros: <?php print($produtos_total); ?></caption>
        <thead>
        <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Cadastro</th>
            <th>Situação</th>
            <th colspan="2" class="text-center">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($produtos as $item)
        {
            if($item->imagem_capa != "")
            {
                $imagem_big = explode('.', $item->imagem_capa);
                $thumb_imagem = $imagem_big[0] . config_item('app-imagem-sufix') . '.' . $imagem_big[1];
                $imagem_capa = base_url(config_item('app-img-diretorio') . '/' . $thumb_imagem);
            }
            else
            {
                $imagem_capa = 'http://fakeimg.pl/100x100/?text=ProdutoSemImagem';
            }

            printf('<tr>
                        <td><img src="%s" width="50%s" class="img-responsive"></td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                    </tr>',
                    $imagem_capa,
                    '%',
                    $item->titulo,
                    number_format($item->valor, 2, ',', '.'),
                    formatar_data($item->data_cad),
                    $item->situacao,
                    anchor(
                        site_url("produto_editar_form/". $item->id),
                        '<span class="glyphicon glyphicon-pencil"></span> Editar', array('class' => 'btn btn-primary')
                    ),
                    anchor(
                        site_url("produto_excluir/". $item->id),
                        '<span class="glyphicon glyphicon-remove"></span> Excluir', array('class' => 'btn btn-danger', 'onclick' => 'return confirmar_excluir();')
                    )
            );
        }

        ?>
        </tbody>
    </table>
    <div class="pagination"><?php print($paginacao); ?></div>
</div>
<div class="col-xs-12 col-sm-1 col-md-1"></div>