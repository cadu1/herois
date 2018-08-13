<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidade_model extends CI_Model {
	public function listaEspecialidade() {
		$query = $this->db->get('especialidade');

		return $query->result_array();
	}

	public function listaEspecialidadePorId($id) {
		$this->db->where('id_especialidade', $id);

		return $this->listaEspecialidade();
	}

    public function insere( $especialidade ) {
        return $this->db->insert('especialidade', $especialidade);
    }

    public function atualiza( $especialidade ) {
        $this->db->where('id_especialidade', $especialidade['id_especialidade']);
        return $this->db->update('especialidade', $especialidade);
    }

    public function apaga( $id ) {
        $this->db->where('id_especialidade', $id);
        $query = $this->db->get('especialidade_personagem');

        // Verifica se há algum personagem que possuí o especialidade "amarrado"
        // Se houver então retorna false, pois especialidade é obrigatório
        if( count($query->result_array()) > 0 ) {
            return false;
        } else {
            $this->db->where('id_especialidade', $id);
            $this->db->delete('especialidade');

            return true;
        }
    }
}