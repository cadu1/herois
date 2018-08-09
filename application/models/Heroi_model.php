<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Heroi_model extends CI_Model {

	public function listaHeroi() {
		$this->db->select('per.*, tip.tip_nome, GROUP_CONCAT(esp.esp_nome separator ",") as especialidades,
			avt.ava_img', false);

		$this->db->from('personagem per');

		$this->db->join('tipo tip', 'per.id_tipo = tip.id_tipo');
		$this->db->join('especialidade_personagem epe', 'per.id_personagem = epe.id_personagem');
		$this->db->join('especialidade esp', 'epe.id_especialidade = esp.id_especialidade');
		$this->db->join('avatar avt', 'per.id_personagem = avt.id_personagem');

		$this->db->group_by('id_personagem, per_nome, per_vida, per_defesa, per_dano, per_vel_ataque,
			per_vel_mov, id_tipo, tip.tip_nome, avt.ava_img');

		$query = $this->db->get();

		return $query->result_array();
	}
}