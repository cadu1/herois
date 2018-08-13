<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$urlAssets = base_url('assets');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="url" content="<?php echo base_url(); ?>">
    <meta name="ctrl" content="<?php echo strtolower($menu); ?>">

    <title>Heróis</title>

    <!-- Bootstrap -->
    <link href="<?php echo $urlAssets;?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $urlAssets;?>/css/herois.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $urlAssets;?>/js/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $urlAssets; ?>/js/data-table/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo $urlAssets; ?>/js/html5shiv.min.js"></script>
    <script src="<?php echo $urlAssets; ?>/js/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo $urlAssets; ?>/js/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <?php $this->load->view('menu'); ?>

        <?php echo $contents; ?>
    </div>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $urlAssets; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $urlAssets; ?>/js/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="<?php echo $urlAssets; ?>/js/bootstrap-select/js/i18n/defaults-pt_BR.min.js"></script>
    <script src="<?php echo $urlAssets; ?>/js/jquery-mask/jquery.mask.min.js"></script>
    <script src="<?php echo $urlAssets; ?>/js/bootstrap-validator/validator.min.js"></script>
    <script src="<?php echo $urlAssets; ?>/js/bootbox/bootbox.min.js"></script>
    <script src="<?php echo $urlAssets; ?>/js/data-table/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $urlAssets; ?>/js/data-table/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo $urlAssets; ?>/js/heroi.js"></script>
</body>
</html>