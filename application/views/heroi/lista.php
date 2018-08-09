<div class="row">
    <?php
    foreach ($herois as $h) {
        ?>
        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-default heroi">
                <div class="panel-body">
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading title"><?php echo $h['per_nome']; ?></h4>
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
                                    <td colspan="3"><b>Velocidade de ataque:</b> <?php echo $h['per_vel_ataque']; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Velocidade de movimento:</b> <?php echo $h['per_vel_mov']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="media-right">
                            <a href="#">
                                <img class="media-object" src="data:image/gif;base64,<?php echo $h['ava_img']; ?>" alt="<?php echo $h['per_nome']; ?>">
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