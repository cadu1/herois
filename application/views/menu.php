<?php
$arrMenu = $this->config->item('menu');

if(!isset($menu)) {
    $menu = '';
}
if(!isset($submenu)) {
    $submenu = '';
}
?>
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
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Heróis</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                foreach ($arrMenu as $m) {
                    $cssMenu = $m['ctrl'] == $menu ? 'active' : '';
                    ?>
                    <li class="dropdown <?php echo $cssMenu; ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $m['nome']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach ($m['submenu'] as $val) {
                                $cssSub = $val['nome'] == $submenu && $cssMenu ? 'active' : '';
                                ?>
                                <li class="<?php echo $cssSub; ?>"><a href="<?php echo base_url($val['href']);?>"><?php echo $val['nome']?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>