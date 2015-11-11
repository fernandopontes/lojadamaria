<?php

class App_painel_produtos_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('image_lib');
    }

    // Verifica se o valor de um campo em particular já está cadastrado
    public function campo_check($campo_form, $campo_db, $tabela_db, $id_registro=NULL)
    {
        if($id_registro != '')
            $this->db->where('id <>', $id_registro);

        $this->db->where($campo_db, $campo_form);
        $this->db->where($campo_db . ' <> ', "");
        $query = $this->db->get($tabela_db);

        if($query->num_rows() > 0)
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function listar_produtos($offset=NULL, $numero_itens=NULL)
    {
        $this->db->select('id, imagem_capa, titulo, slug, valor, situacao, data_cad');
        $this->db->order_by('titulo');
        return $this->db->get(config_item('app-tabela-produtos'), $numero_itens, $offset)->result();
    }

    public function total_produtos()
    {
        $this->db->select("count(*) AS quantidade");
        $consulta = $this->db->get($this->db->dbprefix . config_item('app-tabela-produtos'))->result();

        return $consulta[0]->quantidade;
    }

    public function detalhes_produto($registro, $slug=NULL)
    {
        if($slug != NULL)
        {
            $this->db->where('slug', $slug);
            $produto = $this->db->get($this->db->dbprefix . config_item('app-tabela-produtos'))->result();
        }
        else
        {
            $this->db->where('id', $registro);
            $produto = $this->db->get($this->db->dbprefix . config_item('app-tabela-produtos'))->result();
        }


        if(count($produto) > 0)
        {
            foreach ($produto as $item)
            {
                $this->id = $item->id;
                $this->imagem_capa = $item->imagem_capa;
                $this->titulo = $item->titulo;
                $this->descricao = $item->descricao;
                $this->valor = $item->valor;
                $this->situacao = $item->situacao;
            }

            return $this;
        }
        else {
            return FALSE;
        }
    }

    public function cadastrar_produto_db()
    {
        $this->load->helper('text');

        $status = 0;

        $dados = array(
            'imagem_capa' => ($_FILES['userfile']['name'] != "") ? $this->upload_arquivos(config_item('app-img-diretorio'), config_item('app-img-largura'), config_item('app-img-altura'), NULL, TRUE, config_item('app-img-diretorio'), config_item('app-thumb-largura'), config_item('app-thumb-altura')) : "",
            'titulo' => $this->input->post('titulo', TRUE),
            'slug' => url_title(convert_accented_characters($this->input->post('titulo', TRUE)), '-', TRUE),
            'descricao' => $this->input->post('descricao', TRUE),
            'valor' => $this->input->post('valor', TRUE),
            'situacao' => $this->input->post('situacao'),
            'data_cad' => date('Y-m-d H:i:s')
        );

        $this->db->trans_start();
        $this->db->insert($this->db->dbprefix . config_item('app-tabela-produtos'), $dados);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            log_message('error', lang('debug_transaction'));
        }
        else {
            $status = 1;
        }

        return $status;
    }

    public function editar_produto_db()
    {
        $this->load->helper('text');

        $status = 0;

        $dados = array(
            'titulo' => $this->input->post('titulo', TRUE),
            'slug' => url_title(convert_accented_characters($this->input->post('titulo', TRUE)), '-', TRUE),
            'descricao' => $this->input->post('descricao', TRUE),
            'valor' => $this->input->post('valor', TRUE),
            'situacao' => $this->input->post('situacao'),
        );

        if($_FILES['userfile']['name'] != "")
        {
            $dados_imagem_capa = array(
                'imagem_capa' => $this->upload_arquivos(config_item('app-img-diretorio'), config_item('app-img-largura'), config_item('app-img-altura'), NULL, TRUE, config_item('app-img-diretorio'), config_item('app-thumb-largura'), config_item('app-thumb-altura'))
            );

            $dados = array_merge($dados, $dados_imagem_capa);
        }

        $this->db->trans_start();
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->db->dbprefix . config_item('app-tabela-produtos'), $dados);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            log_message('error', lang('debug_transaction'));
        }
        else {
            $status = 1;
        }

        return $status;
    }

    public function excluir_produto($registro)
    {
        $this->excluir_imagem_capa($registro);

        $status = 0;

        $this->db->trans_start();
        $this->db->where('id', $registro);
        $this->db->delete($this->db->dbprefix . config_item('app-tabela-produtos'));
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            log_message('error', lang('debug_transaction'));

            return FALSE;
        }
        else {
            $status = 1;
        }

        return $status;
    }

    public function excluir_imagem_capa($registro)
    {
        $status = 0;

        $produto = $this->detalhes_produto($registro);

        // Exclui a imagem grande e a thumb do diretório
        if($produto->imagem_capa != "" && file_exists(config_item('app-img-diretorio') . '/' . $produto->imagem_capa))
        {
            unlink(config_item('app-img-diretorio') . '/' . $produto->imagem_capa);

            $imagem_big = explode('.', $produto->imagem_capa);
            $thumb_imagem = $imagem_big[0] . config_item('app-imagem-sufix') . '.' . $imagem_big[1];
            unlink(config_item('app-img-diretorio') . '/' . $thumb_imagem);
        }

        $dados =  array(
            'imagem_capa' => ""
        );

        $this->db->trans_start();
        $this->db->where('id', $registro);
        $this->db->update(config_item('app-tabela-produtos'), $dados);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            log_message('error', lang('debug_transaction'));

            return FALSE;
        }
        else {
            $status = 1;
        }

        return $status;
    }

    // Upload de imagens

    public function reduzir_imagem($foto, $diretorio, $largura, $altura, $thumb=FALSE)
    {
        $this->image_lib->clear();
        $config['source_image'] = $diretorio . '/' . $foto;
        $config['image_library'] = 'GD2';
        $config['quality'] = '100%';
        $config['width'] = $largura;
        $config['height'] = $altura;
        $config['create_thumb'] = $thumb;
        $config['maintain_ratio'] = TRUE;
        $this->image_lib->initialize($config);
        return $this->image_lib->resize();
    }

    // Copia a foto para outro lugar
    public function criar_copia_imagem($foto, $diretorio_origem, $diretorio_destino)
    {
        $this->image_lib->clear();
        $config['source_image'] = $diretorio_origem . '/' . $foto;
        $config['new_image'] = $diretorio_destino . '/' . $foto;
        $this->image_lib->initialize($config);
        return $this->image_lib->resize();
    }

    // Gera as miniaturas das fotos
    public function gerar_miniatura($foto, $diretorio, $largura, $altura, $thumb=FALSE, $thum_sufix=NULL)
    {
        $this->image_lib->clear();
        $config['source_image'] = $diretorio . '/' . $foto;
        $config['image_library'] = 'GD2';
        $config['quality'] = '100%';
        $config['width'] = $largura;
        $config['height'] = $altura;
        $config['create_thumb'] = $thumb;
        $config['thumb_marker'] = $thum_sufix;
        $config['maintain_ratio'] = TRUE;
        $this->image_lib->initialize($config);
        return $this->image_lib->resize();
    }

    // Envia os arquivos para o servidor
    public function upload_arquivos($diretorio=NULL, $largura=NULL, $altura=NULL, $travar_dimensao=NULL, $miniatura=FALSE, $diretorio_thumb=NULL, $thumb_largura=NULL, $thumb_altura=NULL, $multifotos=NULL, $nome_arquivo=NULL)
    {
        $config['upload_path'] = $diretorio;
        $config['allowed_types'] = config_item('app-tipo-arquivo');
        $config['max_size'] = '0';
        if($travar_dimensao != NULL)
        {
            $config['max_width'] = $largura;
            $config['max_height'] = $altura;
        }
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);

        // Para multi-upload
        if($multifotos != NULL)
        {
            $field_name = sprintf("userfile_%d", $multifotos);
        }
        else {
            if($nome_arquivo == NULL)
            {
                $field_name = "userfile";
            }
            else {
                $field_name = $nome_arquivo;
            }
        }

        if( ! $this->upload->do_upload($field_name))
        {
            $error = array('error' => $this->upload->display_errors());
            foreach ($error as $erro)
                $erro .= sprintf('%s\\n', strip_tags($erro));

            printf('<script type="text/javascript">alert("%s"); history.back();</script>', $erro);
            exit();
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $nome_arquivo = $data['upload_data']['file_name'];
            $mime_arquivo = $data['upload_data']['image_type'];

            // Verifica se o arquivo a ser enviado pelo servidor é uma imagem
            $tipo_img_permitido = explode('|', config_item('app-tipo-arquivo'));
            if(in_array($mime_arquivo, $tipo_img_permitido))
            {
                $this->reduzir_imagem($nome_arquivo, $diretorio, $largura, $altura);

                if($miniatura != FALSE)
                {
                    // Para multi-upload
                    if($multifotos != NULL)
                    {
                        $this->gerar_miniatura($nome_arquivo, $diretorio, $thumb_largura, $thumb_altura, $thumb=TRUE, config_item('app-imagem-sufix'));
                    }
                    else {
                        $this->criar_copia_imagem($nome_arquivo, $diretorio, $diretorio_thumb);
                        $this->gerar_miniatura($nome_arquivo, $diretorio_thumb, $thumb_largura, $thumb_altura, $thumb=TRUE, config_item('app-imagem-sufix'));
                    }
                }
            }

            return $nome_arquivo;
        }
    }
}