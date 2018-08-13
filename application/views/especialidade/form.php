<?php
$msgErr = $this->session->userdata('err');
$strClass = 'oculto';
if( isset($msgErr) ) {
    $especialidade = $this->session->userdata('especialidade');
    $strClass = '';

    $this->session->unset_userdata('especialidade');
    $this->session->unset_userdata('err');
}

$idEsp = exibeCampo($especialidade, 'id_especialidade', false);
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6">
        <div class="panel panel-default heroi">
            <div class="panel-body">
                <form id="form-esp" action="<?php echo base_url('especialidade/save'); ?>" method="POST" data-toggle="validator">
                    <div class="panel panel-danger msg <?php echo $strClass; ?>">
                        <div class="panel-body"><?php echo $msgErr; ?></div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $idEsp ?>">
                    <div class="form-group">
                        <label for="nome">Nome *</label>
                        <input type="text" class="form-control" id="nome" placeholder="Nome" maxlength="60" name="nome" value="<?php exibeCampo($especialidade, 'esp_nome'); ?>" autocomplete="off" required>
                    </div>

                    <a href="<?php echo base_url('especialidade'); ?>" class="btn btn-default">Voltar</a>
                    <a href="javascript:$('form').submit()" class="btn btn-success">Gravar</a>
                    <?php
                    if($idEsp) {
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