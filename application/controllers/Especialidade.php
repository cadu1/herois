<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidade extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->template->set('menu', get_class());
        $this->load->model('especialidade_model');
    }

    public function index() {
        $arrParam = [
            'especialidades' => $this->especialidade_model->listaEspecialidade()
        ];

        $this->template->set('submenu','Lista');
        $this->template->load('template','especialidade/lista', $arrParam);
    }

    public function form( $id = null ) {
        $arrParam = [
            'especialidade' => [],
        ];
        // Se houver o parâmetro ID, então é uma alteração, recupera as informações
        if( isset($id) ) {
            $arrParam['especialidade'] = $this->especialidade_model->listaEspecialidadePorId($id);
            // caso não encontre o registro, retorna para a listagem
            if( count($arrParam['especialidade']) == 0 ) {
                redirect(base_url('especialidade'));
            }
        }

        $this->template->set('submenu','Cadastro');
        $this->template->load('template','especialidade/form', $arrParam);
    }

    public function save() {
        $idEsp = $this->input->post('id');
        $arrEsp = [ 'esp_nome' => $this->input->post('nome') ];
        $arrSession = [ 'especialidade' => $arrEsp ];

        // Se for uma atualização
        if( $idEsp ) {
            $arrEsp['id_especialidade'] = $idEsp;

            if( $this->especialidade_model->atualiza($arrEsp) ) {
                redirect(base_url('especialidade'));
            } else {
                $arrSession['err'] = '<strong>Ops!</strong> Não foi possível atualizar o Tipo, tente novamente!';
                $this->session->set_userdata($arrSession);

                redirect(base_url('especialidade/form'));
            }
        } else {
            if( $this->especialidade_model->insere($arrEsp) ) {
                redirect(base_url('especialidade'));
            } else {
                $arrSession['err'] = '<strong>Ops!</strong> Não foi possível gravar o Tipo, tente novamente!';
                $this->session->set_userdata($arrSession);

                redirect(base_url('especialidade/form'));
            }
        }
    }

    public function apaga( $id = null ) {
        $arrRet = [ 'status' => 0, 'msg' => '' ];

        if( $id ) {
            if($this->especialidade_model->apaga($id)) {
                $arrRet['status'] = 1;
            } else {
                $arrRet['msg'] = '<strong>Ops!</strong> Parece que houve um problema ao apagar, verifique se esta Especialidade já está em uso!';
            }
        }

        echo json_encode($arrRet, JSON_NUMERIC_CHECK);
    }
}
