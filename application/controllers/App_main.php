<?php

class App_main extends CI_Controller
{
    public  function __construct()
    {
        parent::__construct();

        $this->load->model('app_painel_produtos_model', 'produtos_model');
    }

    public function index($arg=NULL)
    {
        if(!preg_match("/^([1-9]|[1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9])$/", $arg) && $arg != "")
        {
            $dados['produto'] = $this->produtos_model->detalhes_produto(NULL, $arg);

            $dados['pagina_interna'] = 'vitrine_detalhes';
        }
        else
        {
            $this->load->library('pagination');

            $mostrar_por_pagina = config_item('app-itens-por-pagina');
            $dados['produtos'] = $this->produtos_model->listar_produtos($arg, $mostrar_por_pagina);
            $dados['produtos_total'] = $this->produtos_model->total_produtos();
            $total_produtos = $this->produtos_model->total_produtos();

            $config['base_url'] = base_url("vitrine");
            $config['total_rows'] = $total_produtos;
            $config['per_page'] = $mostrar_por_pagina;
            $config['uri_segment'] = 2;

            $this->pagination->initialize($config);
            $dados['paginacao'] = $this->pagination->create_links();

        }

        $this->load->view('index', $dados);
    }
}