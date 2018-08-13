<div class="row">
    <?php
    foreach ($herois as $h) {
        $h['per_nome'] = substr($h['per_nome'], 0, 30);
        ?>
        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-default heroi">
                <div class="panel-body">
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading title">
                                <a href="<?php echo base_url('heroi/form/'.$h['id_personagem']); ?>"><?php echo "({$h['id_personagem']}) {$h['per_nome']}"; ?></a>
                            </h4>
                            <span class="tipo"><?php echo $h['tip_nome']; ?></span>
                            <br/>
                            <table>
                                <tr>
                                    <td colspan="3"><b>Especialidade:</b> <?php echo $h['especialidades']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Vida:</b> <?php echo $h['per_vida']; ?></td>
                                    <td><b>Defesa:</b> <?php echo $h['per_defesa']; ?></td>
                                    <td><b>Dano:</b> <?php echo $h['per_dano']; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Velocidade de ataque:</b> <?php echo number_format($h['per_vel_ataque'],1); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Velocidade de movimento:</b> <?php echo $h['per_vel_mov']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="media-right">
                            <a href="javascript:;">
                                <?php
                                if(!empty($h['ava_img'])) {
                                    ?>
                                    <img class="media-object" src="data:image/gif;base64,<?php echo $h['ava_img']; ?>" alt="<?php echo $h['per_nome']; ?>">
                                    <?php
                                } else {
                                    ?>
                                    <img class="media-object" src="<?php echo base_url('assets/img/unknow.gif'); ?>" alt="avatar">
                                    <?php
                                }
                                ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>