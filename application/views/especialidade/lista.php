<?php
$url = base_url('especialidade');
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-danger msg oculto">
            <div class="panel-body"></div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cód.</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($especialidades as $esp) {
                        ?>
                        <tr>
                            <td><?php echo $esp['id_especialidade']; ?></td>
                            <td><?php echo $esp['esp_nome']; ?></td>
                            <td>
                                <a href="<?php echo "$url/form/{$esp['id_especialidade']}"; ?>" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a>
                                <a href="javascript:remove_reg(<?php echo $esp['id_especialidade']; ?>)" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                "url": "<?php echo base_url('assets'); ?>/js/data-table/pt-br.json"
            },
            "ordering": false
        });
    });
</script>