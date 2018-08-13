<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->template->set('menu', get_class());
        $this->load->model('tipo_model');
    }

    public function index() {
        $arrParam = [
            'tipos' => $this->tipo_model->listaTipo()
        ];

        $this->template->set('submenu','Lista');
        $this->template->load('template','tipo/lista', $arrParam);
    }

    public function form( $id = null ) {
        $arrParam = [
            'tipo' => [],
        ];
        // Se houver o parâmetro ID, então é uma alteração, recupera as informações
        if( isset($id) ) {
            $arrParam['tipo'] = $this->tipo_model->listaTipoPorId($id);
            // caso não encontre o registro, retorna para a listagem
            if( count($arrParam['tipo']) == 0 ) {
                redirect(base_url('tipo'));
            }
        }

        $this->template->set('submenu','Cadastro');
        $this->template->load('template','tipo/form', $arrParam);
    }

    public function save() {
        $idTipo = $this->input->post('id');
        $arrTipo = [ 'tip_nome' => $this->input->post('nome') ];
        $arrSession = [ 'tipo' => $arrTipo ];

        // Se for uma atualização
        if( $idTipo ) {
            $arrTipo['id_tipo'] = $idTipo;

            if( $this->tipo_model->atualiza($arrTipo) ) {
                redirect(base_url('tipo'));
            } else {
                $arrSession['err'] = '<strong>Ops!</strong> Não foi possível atualizar o Tipo, tente novamente!';
                $this->session->set_userdata($arrSession);

                redirect(base_url('tipo/form'));
            }
        } else {
            if( $this->tipo_model->insere($arrTipo) ) {
                redirect(base_url('tipo'));
            } else {
                $arrSession['err'] = '<strong>Ops!</strong> Não foi possível gravar o Tipo, tente novamente!';
                $this->session->set_userdata($arrSession);

                redirect(base_url('tipo/form'));
            }
        }
    }

    public function apaga( $id = null ) {
        $arrRet = [ 'status' => 0, 'msg' => '' ];

        if( $id ) {
            if($this->tipo_model->apaga($id)) {
                $arrRet['status'] = 1;
            } else {
                $arrRet['msg'] = '<strong>Ops!</strong> Parece que houve um problema ao apagar, verifique se este Tipo já está em uso!';
            }
        }

        echo json_encode($arrRet, JSON_NUMERIC_CHECK);
    }
}
