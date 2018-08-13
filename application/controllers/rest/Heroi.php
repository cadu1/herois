<?php
class Heroi extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('personagem_model');
    }

	public function heroi_get() {
		$id = $this->uri->segment(4);
        if(!$id) {
            $this->response(['status' => 'failed', 'msg' => 'Necessário informar um código'], 400);
        }

        $arrHeroi = $this->personagem_model->listaPersonagemRest( $id );

        if(count($arrHeroi) > 0) {
            $this->response($arrHeroi, 200); // 200 being the HTTP response code
        } else {
            $this->response(['status' => 'failed', 'msg' => 'Nenhum personagem encontrado'], 400);
        }
    }

	public function lista_get() {
		$arrHerois = $this->personagem_model->listaPersonagemRest();

		if(count($arrHerois) > 0) {
			$this->response($arrHerois, 200);
		} else {
			$this->response(['status' => 'failed', 'msg' => 'Nenhum personagem encontrado'], 400);
		}
	}

	public function atualiza_post() {
		$id = $this->post('id');
		if(!$id) {
            $this->response(['status' => 'failed', 'msg' => 'Necessário informar o código do personagem que será atualizado'], 400);
		}

		$data = validaUpload('avatar');

        $arrHeroi = [
            'id_personagem' => $id,
            'per_nome' => $this->post('nome'),
            'per_vida' => $this->post('vida'),
            'per_defesa' => $this->post('defesa'),
            'per_dano' => $this->post('dano'),
            'per_vel_ataque' => $this->post('vel_ataque'),
            'per_vel_mov' => $this->post('vel_mov'),
            'id_tipo' => $this->post('tipo'),
            'avatar' => is_array( $data ) ? $data['full_path'] : ''
        ];

        $arrEsp = explode(',', $this->post('especialidade'));
        if( ($err = $this->valida($arrHeroi, $arrEsp)) !== true ) {
			$this->response(['status' => 'failed', 'msg' => $err], 400);
        }

        $result = $this->personagem_model->atualiza( $arrHeroi, $arrEsp );

        if($result === false) {
            $this->response(['status' => 'failed', 'msg' => 'Ocorreu um problema ao gravar'], 400);
        } else {
            $this->response(['status' => 'success']);
        }
	}

	private function valida($arrHeroi, $arrEsp) {
		$this->load->model('tipo_model');
		$this->load->model('especialidade_model');

        $flag = false;
        // Verifica se algum campo está vazio
        array_map(function($item) use (&$flag) {
        	if(empty($item)) {
        		$flag = true;
        	}
        }, $arrHeroi);

        if( $flag ) {
			return 'Verifique se todos os campos estão preenchidos';
        }

        if(!is_int((int)$arrHeroi['per_vida'])) {
        	return 'O Campo "vida" precisa ser um número inteiro.';
        }
        if(!is_int((int)$arrHeroi['per_defesa'])) {
        	return 'O Campo "defesa" precisa ser um número inteiro.';
        }
        if(!is_int((int)$arrHeroi['per_dano'])) {
        	return 'O Campo "dano" precisa ser um número inteiro.';
        }
        if(!is_float((float)$arrHeroi['per_vel_ataque'])) {
        	return 'O Campo "velocidade de ataque" precisa ser um número decimal.';
        }
        $arrHeroi['per_vel_ataque'] = number_format($arrHeroi['per_vel_ataque'], 2);
        if(!is_int((int)$arrHeroi['per_vel_mov'])) {
        	return 'O Campo "velocidade de movimento" precisa ser um número inteiro.';
        }


        $arrTipo = $this->tipo_model->listaTipoPorId($arrHeroi['id_tipo']);
        if( count($arrTipo) == 0 ) {
        	return 'O código do tipo informado não está cadastrado';
        }

        $flag = false;
        foreach ($arrEsp as $val) {
        	$espec = $this->especialidade_model->listaEspecialidadePorId($val);
	        if( count($espec) == 0 ) {
	        	$flag = true;
				break;
	        }
        }
        if( $flag ) {
			return 'O código das especialidades informadas não estão cadastradas';
        }

        return true;
	}

	public function novo_post() {
		$data = validaUpload('avatar');

        $arrHeroi = [
            'per_nome' => $this->post('nome'),
            'per_vida' => $this->post('vida'),
            'per_defesa' => $this->post('defesa'),
            'per_dano' => $this->post('dano'),
            'per_vel_ataque' => $this->post('vel_ataque'),
            'per_vel_mov' => $this->post('vel_mov'),
            'id_tipo' => $this->post('tipo'),
            'avatar' => is_array( $data ) ? $data['full_path'] : ''
        ];
        $arrEsp = explode(',', $this->post('especialidade'));

	    if( !$this->valida($arrHeroi, $arrEsp) ) {
			$this->response(['status' => 'failed', 'msg' => $err], 400);
        }
        $result = $this->personagem_model->insere( $arrHeroi, $arrEsp );

        if($result === false) {
            $this->response(['status' => 'failed']);
        } else {
            $this->response(['status' => 'success']);
        }
	}

    public function apaga_delete() {
    	$id = $this->uri->segment(4);
    	if($id) {
	        if( $this->personagem_model->apaga( $id ) ) {
	            $this->response(['status' => 'success']);
	        } else {
            	$this->response(['status' => 'failed', 'msg' => 'Parece que houve um problema ao apagar, tente novamente!'], 400);
	        }
    	} else {
            $this->response(['status' => 'failed', 'msg' => 'Necessário informar ao menos um código'], 400);
    	}

    }
}