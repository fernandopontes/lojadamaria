<?php
class App_painel_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function autenticar_usuario()
    {
        $status = 0;

        $this->db->select('id, nome, email, senha, situacao');
        $this->db->where('email', $this->input->post('email', TRUE));
        $consulta = $this->db->get($this->db->dbprefix . config_item('app-tabela-usuarios'))->result();

        if(count($consulta) > 0)
        {
            if($consulta[0]->situacao == config_item('app-situacao-ativo'))
            {
                if(crypt($this->input->post('senha'), $consulta[0]->senha) === $consulta[0]->senha)
                {
                    $status = 1;

                    $login = array(
                                'usuario_id' => $consulta[0]->id,
                                'usuario_nome' => $consulta[0]->nome,
                                'usuario_email' => $consulta[0]->situacao,
                                'usuario_autenticado' => TRUE
                            );

                    $this->session->set_userdata($login);

                    $dados = array(
                        'data_login' => date("Y-m-d H:i:s")
                    );

                    $this->db->where('id', $consulta[0]->id);
                    $this->db->update($this->db->dbprefix . config_item('app-tabela-usuarios'), $dados);
                }
            }
            else
            {
                $status = 2;
            }
        }

        return $status;
    }
}