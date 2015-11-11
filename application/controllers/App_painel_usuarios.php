<?php

class App_painel_usuarios extends CI_Controller
{
    public  function __construct()
    {
        parent::__construct();

    }

    public function index()
    {

    }

    public function usuario_cadastro_form()
    {

    }

    public function usuario_cadastro_db()
    {

    }

    public function usuario_editar_form($registro)
    {

    }

    public function usuario_editar_db()
    {

    }

    public function usuario_excluir_db($registro)
    {

    }

    public function verificar_campo_check($campo_form, $campo_db, $tabela_db, $id_registro=NULL)
    {
        return $this->usuarios_model->campo_check($campo_form, $campo_db, $tabela_db, $id_registro);
    }
}