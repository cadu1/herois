<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Heroi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->template->set('menu', get_class());
        $this->load->model('personagem_model');
    }

    public function index() {
        $arrParam = [
            'herois' => $this->personagem_model->listaHeroi()
        ];

        $this->template->set('submenu','Lista');
        $this->template->load('template','heroi/lista', $arrParam);
    }

    public function form( $id = null ) {
        $this->load->model('tipo_model');
        $this->load->model('especialidade_model');

        $arrParam = [
            'especialidades' => $this->especialidade_model->listaEspecialidade(),
            'tipos' => $this->tipo_model->listaTipo(),
            'heroi' => [],
            'per_espec' => []
        ];
        // Se houver o parâmetro ID, então é uma alteração, recupera as informações
        if( isset($id) ) {
            $arrParam['heroi'] = $this->personagem_model->listaHeroiPorId($id);
            // caso não encontre o registro, retorna para a listagem
            if( count($arrParam['heroi']) == 0 ) {
                redirect(base_url());
            }
            $arrParam['per_espec'] = explode(',', $arrParam['heroi'][0]['id_espec']);
        }

        $this->template->set('submenu','Cadastro');
        $this->template->load('template','heroi/form', $arrParam);
    }

    public function save() {
        $data = validaUpload('avatar');

        $arrEsp = $this->input->post('especialidade');
        $idHeroi = $this->input->post('id');
        $arrHeroi = [
            'per_nome' => $this->input->post('nome'),
            'per_vida' => $this->input->post('vida'),
            'per_defesa' => $this->input->post('defesa'),
            'per_dano' => $this->input->post('dano'),
            'per_vel_ataque' => $this->input->post('vel_ataque'),
            'per_vel_mov' => $this->input->post('vel_mov'),
            'id_tipo' => $this->input->post('tipo')
        ];

        $arrSession = [
            'heroi' => $arrHeroi,
            'esp' => $arrEsp
        ];


        // Se estiver preenchido então o usuário está alterando
        if($idHeroi) {
            // "pavatar" é um input para controle do avatar, se existir o usuário manteve o avatar atual
            $avatar = $this->input->post('pavatar');
            if(!$avatar) {
                $arrHeroi['avatar'] = isset( $data['full_path'] ) ? $data['full_path'] : '';
            }
            $arrHeroi['id_personagem'] = $idHeroi;

            if( $this->personagem_model->atualiza($arrHeroi, $arrEsp) ) {
                redirect(base_url());
            } else {
                $arrSession['err'] = '<strong>Ops!</strong> Não foi possível atualizar o personagem, tente novamente!';
                $this->session->set_userdata($arrSession);

                redirect(base_url('heroi/form'));
            }
        } else {
            $arrHeroi['avatar'] = isset( $data['full_path'] ) ? $data['full_path'] : '';
            if( $this->personagem_model->insere($arrHeroi, $arrEsp) ) {
                redirect(base_url());
            } else {
                $arrSession['err'] = '<strong>Ops!</strong> Não foi possível gravar o personagem, tente novamente!';
                $this->session->set_userdata($arrSession);

                redirect(base_url('heroi/form'));
            }
        }
    }

    public function apaga( $id = null ) {
        $arrRet = [ 'status' => 0, 'msg' => '' ];

        if( $id ) {
            if($this->personagem_model->apaga($id)) {
                $arrRet['status'] = 1;
            } else {
                $arrRet['msg'] = '<strong>Ops!</strong> Parece que houve um problema ao apagar, tente novamente!';
            }
        }

        echo json_encode($arrRet, JSON_NUMERIC_CHECK);
    }
}
