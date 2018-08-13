<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_model extends CI_Model {

	public function listaTipo() {
		$query = $this->db->get('tipo');

		return $query->result_array();
	}

	public function listaTipoPorId($id) {
		$this->db->where('id_tipo', $id);

		return $this->listaTipo();
	}

    public function insere( $tipo ) {
        return $this->db->insert('tipo', $tipo);
    }

    public function atualiza( $tipo ) {
        $this->db->where('id_tipo', $tipo['id_tipo']);
        return $this->db->update('tipo', $tipo);
    }

    public function apaga( $id ) {
        $this->db->where('id_tipo', $id);
        $query = $this->db->get('personagem');

        // Verifica se há algum personagem que possuí o tipo "amarrado"
        // Se houver então retorna false, pois tipo é obrigatório
        if( count($query->result_array()) > 0 ) {
            return false;
        } else {
            $this->db->where('id_tipo', $id);
            $this->db->delete('tipo');

            return true;
        }
    }
}