<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personagem_model extends CI_Model {

    public function listaHeroi() {
        $this->db->select('per.*, tip.tip_nome, GROUP_CONCAT(esp.esp_nome separator ",") as especialidades,
            avt.ava_img, GROUP_CONCAT(esp.id_especialidade separator ",") as id_espec', false);

        $this->db->from('personagem per');

        $this->db->join('tipo tip', 'per.id_tipo = tip.id_tipo');
        $this->db->join('especialidade_personagem epe', 'per.id_personagem = epe.id_personagem');
        $this->db->join('especialidade esp', 'epe.id_especialidade = esp.id_especialidade');
        $this->db->join('avatar avt', 'per.id_personagem = avt.id_personagem', 'left');

        $this->db->group_by('id_personagem, per_nome, per_vida, per_defesa, per_dano, per_vel_ataque,
            per_vel_mov, id_tipo, tip.tip_nome, avt.ava_img');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function listaHeroiPorId($id) {
        $this->db->where('per.id_personagem', $id);

        return $this->listaHeroi();
    }

    public function insere( $heroi, $especialidade ) {
        $this->db->trans_begin();
        $avatar = $heroi['avatar'];
        unset($heroi['avatar']);

        $this->db->insert('personagem', $heroi);
        $idHeroi = $this->db->insert_id();

        if(!empty($avatar)) {
            $avatar = [
                'ava_img' => base64_encode(file_get_contents($avatar)),
                'id_personagem' => $idHeroi
            ];
            $this->db->insert('avatar', $avatar);
        }

        foreach ($especialidade as $esp) {
            $esp = [
                'id_personagem' => $idHeroi,
                'id_especialidade' => $esp
            ];
            $this->db->insert('especialidade_personagem', $esp);
            @unlink($avatar);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function atualiza( $heroi, $especialidade ) {
        $this->db->trans_begin();
        $avatar = $heroi['avatar'];
        unset($heroi['avatar']);

        $this->db->where('id_personagem', $heroi['id_personagem']);
        $this->db->update('personagem', $heroi);

        $this->db->where('id_personagem', $heroi['id_personagem']);
        $this->db->delete('avatar');
        if( !empty($avatar) ) {
            $avatar = [
                'ava_img' => base64_encode(file_get_contents($avatar)),
                'id_personagem' => $heroi['id_personagem']
            ];
            $this->db->insert('avatar', $avatar);
            @unlink($avatar);
        }

        $this->db->where('id_personagem', $heroi['id_personagem']);
        $this->db->delete('especialidade_personagem');
        foreach ($especialidade as $esp) {
            $esp = [
                'id_personagem' => $heroi['id_personagem'],
                'id_especialidade' => $esp
            ];
            $this->db->insert('especialidade_personagem', $esp);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function apaga( $id ) {
        $this->db->trans_begin();

        $this->db->where('id_personagem', $id);
        $this->db->delete('personagem');

        $this->db->where('id_personagem', $id);
        $this->db->delete('avatar');

        $this->db->where('id_personagem', $id);
        $this->db->delete('especialidade_personagem');

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function listaPersonagemRest($id = null) {
        $this->db->select('per.*, tip.tip_nome, GROUP_CONCAT(esp.esp_nome separator ",") as especialidades,
            avt.ava_img, GROUP_CONCAT(esp.id_especialidade separator ",") as id_espec', false);

        $this->db->from('personagem per');

        $this->db->join('tipo tip', 'per.id_tipo = tip.id_tipo');
        $this->db->join('especialidade_personagem epe', 'per.id_personagem = epe.id_personagem');
        $this->db->join('especialidade esp', 'epe.id_especialidade = esp.id_especialidade');
        $this->db->join('avatar avt', 'per.id_personagem = avt.id_personagem');

        $this->db->group_by('id_personagem, per_nome, per_vida, per_defesa, per_dano, per_vel_ataque,
            per_vel_mov, id_tipo, tip.tip_nome, avt.ava_img');

        if($id) {
            $this->db->where('per.id_personagem', $id);
        }

        $query = $this->db->get();

        return $query->result();
    }
}