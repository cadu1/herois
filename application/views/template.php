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

    <title>Heróis</title>

    <!-- Bootstrap -->
    <link href="<?php echo $urlAssets;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $urlAssets;?>/css/herois.css" rel="stylesheet">

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
    <!--nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Heróis</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="<?php echo isset($menu) && $menu == 'list' ? 'active' : '';?>"><a href="<?php echo base_url(); ?>">Lista</a></li>
                <li class="<?php echo isset($menu) && $menu == 'cad' ? 'active' : '';?>"><a href="<?php echo base_url('megasena/sorteio'); ?>">Cadastro</a></li>
            </ul>
        </div>
    </nav-->

    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Heróis</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Herois <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Lista</a></li>
                                <li><a href="#">Cadastro</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tipos <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Lista</a></li>
                                <li><a href="#">Cadastro</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Especialidades <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Lista</a></li>
                                <li><a href="#">Cadastro</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <?php echo $contents; ?>
    </div>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $urlAssets; ?>/js/bootstrap.min.js"></script>
</body>
</html>