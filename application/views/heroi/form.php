<?php
$msgErr = $this->session->userdata('err');
$strClass = 'oculto';
if( isset($msgErr) ) {
    $heroi = $this->session->userdata('heroi');
    $per_espec = $this->session->userdata('esp');
    $strClass = '';

    $this->session->unset_userdata('heroi');
    $this->session->unset_userdata('esp');
    $this->session->unset_userdata('err');
}

if( !isset($per_espec) ) {
    $per_espec = [];
}

$idHeroi = exibeCampo($heroi, 'id_personagem', false);
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6">
        <div class="panel panel-default heroi">
            <div class="panel-body">
                <form id="form-heroi" action="<?php echo base_url('heroi/save'); ?>" method="POST" enctype="multipart/form-data" data-toggle="validator">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <ul>
                                <li>Se for enviar um avatar, a imagem não pode exceder o tamanho de 100x100</li>
                                <li>E também não pode ultrapassar 900kb</li>
                                <li>Com exceção do "avatar", todos os campos são obrigatórios</li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-danger msg <?php echo $strClass; ?>">
                        <div class="panel-body"><?php echo $msgErr; ?></div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $idHeroi ?>">
                    <div class="form-group">
                        <label for="nome">Nome *</label>
                        <input type="text" class="form-control" id="nome" placeholder="Nome" maxlength="60" name="nome" value="<?php exibeCampo($heroi, 'per_nome'); ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo *</label>
                        <select class="form-control" id="tipo" name="tipo" required>
                            <?php
                            $idTipo = exibeCampo($heroi, 'id_tipo', false);
                            foreach ($tipos as $tipo) {
                                $select = $idTipo == $tipo['id_tipo'] ? 'selected' : '';

                                echo "<option value='{$tipo['id_tipo']}' $select>{$tipo['tip_nome']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="especialidade">Especialidade *</label>
                        <select class="form-control selectpicker" multiple="true" id="especialidade" name="especialidade[]" required>
                            <?php
                            foreach ($especialidades as $esp) {
                                $select = in_array($esp['id_especialidade'], $per_espec) ? 'selected' : '';

                                echo "<option value='{$esp['id_especialidade']}' $select>{$esp['esp_nome']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vida">Vida *</label>
                        <input type="text" class="form-control int" id="vida" placeholder="Vida" name="vida" value="<?php exibeCampo($heroi, 'per_vida'); ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="defesa">Defesa *</label>
                        <input type="text" class="form-control int" id="defesa" placeholder="Defesa" name="defesa" value="<?php exibeCampo($heroi, 'per_defesa'); ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="dano">Dano *</label>
                        <input type="text" class="form-control" id="dano int" placeholder="Dano" name="dano" value="<?php exibeCampo($heroi, 'per_dano'); ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="vel_ataque">Velocidade de ataque *</label>
                        <input type="text" class="form-control dec" id="vel_ataque" placeholder="Velocidade de ataque" name="vel_ataque" value="<?php exibeCampo($heroi, 'per_vel_ataque'); ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="vel_mov">Velocidade de movimento *</label>
                        <input type="text" class="form-control  int" id="vel_mov" placeholder="Velocidade de movimento" name="vel_mov" value="<?php exibeCampo($heroi, 'per_vel_mov'); ?>" autocomplete="off" required>
                    </div>
                    <?php
                    $avatar = exibeCampo($heroi, 'ava_img', false);
                    if( !empty($avatar) ) {
                        ?>
                        <div class="form-group avatar">
                            <div class="row">
                                <div class="col-xs-8 col-sm-6 col-md-3">
                                    <a href="javascript:;" class="thumbnail">
                                        <img src="data:image/gif;base64,<?php echo $avatar; ?>" alt="avatar">
                                    </a>
                                </div>
                                <div class="col-xs-4 col-sm-6 col-md-9">
                                    <a href="javascript:remove_avatar();" class="btn btn-danger">Remover</a>
                                </div>
                            </div>
                            <input type="hidden" name="pavatar" value="1">
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input type="file" id="avatar" name="avatar">
                        </div>
                        <?php
                    }
                    ?>

                    <a href="<?php echo base_url('heroi'); ?>" class="btn btn-default">Voltar</a>
                    <a href="javascript:$('form').submit()" class="btn btn-success">Gravar</a>
                    <?php
                    if($idHeroi) {
                        ?>
                        <a href="javascript:remove_reg()" class="btn btn-danger">Excluir</a>
                        <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modelo oculto">
    <label for="avatar">Avatar</label>
    <input type="file" id="avatar" name="avatar">
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
        $('.int').mask("##########0");
        $('.dec').mask("##########0.0", {reverse: true});
    });

    function remove_avatar() {
        modelo = $('div.modelo').html();
        $('div.avatar').html(modelo)
    }
</script>