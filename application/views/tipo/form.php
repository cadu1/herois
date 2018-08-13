<?php
$msgErr = $this->session->userdata('err');
$strClass = 'oculto';
if( isset($msgErr) ) {
    $tipo = $this->session->userdata('tipo');
    $strClass = '';

    $this->session->unset_userdata('tipo');
    $this->session->unset_userdata('err');
}

$idTipo = exibeCampo($tipo, 'id_tipo', false);
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6">
        <div class="panel panel-default heroi">
            <div class="panel-body">
                <form id="form-tipo" action="<?php echo base_url('tipo/save'); ?>" method="POST" data-toggle="validator">
                    <div class="panel panel-danger msg <?php echo $strClass; ?>">
                        <div class="panel-body"><?php echo $msgErr; ?></div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $idTipo ?>">
                    <div class="form-group">
                        <label for="nome">Nome *</label>
                        <input type="text" class="form-control" id="nome" placeholder="Nome" maxlength="60" name="nome" value="<?php exibeCampo($tipo, 'tip_nome'); ?>" autocomplete="off" required>
                    </div>

                    <a href="<?php echo base_url('tipo'); ?>" class="btn btn-default">Voltar</a>
                    <a href="javascript:$('form').submit()" class="btn btn-success">Gravar</a>
                    <?php
                    if($idTipo) {
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