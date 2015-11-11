<?php

class App_painel_usuarios_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
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

    public function listar_usuarios($offset=NULL, $numero_itens=NULL)
    {

    }

    public function total_usuarios()
    {

    }

    public function detalhes_usuario($registro)
    {

    }

    public function cadastrar_usuario_db()
    {

    }

    public function editar_usuario_db()
    {

    }

    public function excluir_usuario($registro)
    {

    }
}