<?php

class App_painel_produtos extends CI_Controller
{
    public  function __construct()
    {
        parent::__construct();

        $this->load->model('app_painel_produtos_model', 'produtos_model');
        $this->load->helper('app_ldm_utils');
    }

    public function index($paginacao=NULL, $mensagem=NULL)
    {
        if($mensagem != "")
            $dados['app_mensagem'] = $mensagem;

        $this->load->library('pagination');

        $mostrar_por_pagina = config_item('app-itens-por-pagina');
        $dados['produtos'] = $this->produtos_model->listar_produtos($paginacao, $mostrar_por_pagina);
        $dados['produtos_total'] = $this->produtos_model->total_produtos();
        $total_produtos = $this->produtos_model->total_produtos();

        $config['base_url'] = base_url("produtos_listar");
        $config['total_rows'] = $total_produtos;
        $config['per_page'] = $mostrar_por_pagina;
        $config['uri_segment'] = 2;

        $this->pagination->initialize($config);
        $dados['paginacao'] = $this->pagination->create_links();

        $dados['pagina_interna'] = 'painel_produto_listar';

        $this->load->view('index', $dados);
    }

    public function produto_cadastro_form()
    {
        $dados['pagina_interna'] = 'painel_produto_cadastrar';

        $this->load->view('index', $dados);
    }

    public function produto_cadastro_db()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', 'Nome', 'required|trim');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required|trim');
        $this->form_validation->set_rules('valor', 'Valor', 'required|trim|callback_converter_valor_db');
        $this->form_validation->set_rules('situacao', 'Situação', 'required');

        if($this->form_validation->run() === FALSE)
        {
            $this->produto_cadastro_form();
        }
        else
        {
            $error_validacao = array();

            // Verifica se o email já está cadastrado
            if($this->verificar_campo_check($this->input->post('titulo'), 'titulo', config_item('app-tabela-produtos')))
                $error_validacao[] = sprintf("%s", lang('produto_repetido'));

            $dados['error_validacao'] = $error_validacao;

            if(count($error_validacao) == 0)
            {
                $dados['status_cadastro'] = $this->produtos_model->cadastrar_produto_db();
            }

            $dados['pagina_interna'] = 'painel_produto_cadastrar';

            $this->load->view('index', $dados);
        }
    }

    public function produto_editar_form($registro)
    {
        $dados['produto'] = $this->produtos_model->detalhes_produto($registro);

        $dados['pagina_interna'] = 'painel_produto_editar';

        $this->load->view('index', $dados);
    }

    public function produto_editar_db()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', 'Nome', 'required|trim');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required|trim');
        $this->form_validation->set_rules('valor', 'Valor', 'required|trim|callback_converter_valor_db');
        $this->form_validation->set_rules('situacao', 'Situação', 'required');

        if($this->form_validation->run() === FALSE)
        {
            $this->produto_editar_form();
        }
        else
        {
            $error_validacao = array();

            // Verifica se o email já está cadastrado
            if($this->verificar_campo_check($this->input->post('titulo'), 'titulo', config_item('app-tabela-produtos'), $this->input->post('id')))
                $error_validacao[] = sprintf("%s", lang('produto_repetido'));

            $dados['error_validacao'] = $error_validacao;

            if(count($error_validacao) == 0)
            {
                $dados['status_edicao'] = $this->produtos_model->editar_produto_db();
            }

            $dados['produto'] = $this->produtos_model->detalhes_produto($this->input->post('id'));

            $dados['pagina_interna'] = 'painel_produto_editar';

            $this->load->view('index', $dados);
        }
    }

    public function produto_excluir_db($registro)
    {
        $status_excluir = $this->produtos_model->excluir_produto($registro);

        if($status_excluir)
        {
            $mensagem = lang('produto_excluir_sucesso');
        }
        else
        {
            $mensagem = lang('produto_cad_falha');
        }

        $this->index('', $mensagem);
    }

    public function excluir_imagem_capa($registro)
    {
        $produto = $this->produtos_model->detalhes_produto($registro);

        if($produto)
        {
            if($this->produtos_model->excluir_imagem_capa($registro))
            {
                $this->produto_editar_form($registro);
            }

        }

    }

    public function verificar_campo_check($campo_form, $campo_db, $tabela_db, $id_registro=NULL)
    {
        return $this->produtos_model->campo_check($campo_form, $campo_db, $tabela_db, $id_registro);
    }

    public function converter_valor_db($str)
    {
        $str = str_replace(array(".", ","), array("", "."), $str);
        return $str;
    }
}