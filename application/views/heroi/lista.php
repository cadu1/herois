<div class="row">
	<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
		<div class="alert alert-info" role="alert">
			<strong>Como jogar</strong><br/>
			<ul>
				<li>De um clique simples em cima dos números desejados</li>
				<li>O valor total será calculado logo abaixo</li>
				<li>Após selecionados os números clique no botão "Jogar"</li>
				<li>O quantidade mínima de números para o jogo é 6, e o máximo é 8</li>
			</ul>
			<br/><br/>
			<strong>Valores</strong><br/>
			<ul>
				<li>6 números R$ 2,50</li>
				<li>7 números R$ 5,00</li>
				<li>8 números R$ 10,00</li>
			</ul>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
		<div id="alerta" class="oculto alert" role="alert"></div>
	</div>
</div>

<div class="row">
	<?php
	// Auxilia na atribuição de valores
	$intCont = 1;
	for($i = 0; $i < 6; $i++) {
		?>
		<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
			<?php
			for($j = 0; $j < 10; $j++, $intCont++) {
				?>
				<div class="bola" data-id="<?php echo $intCont; ?>"><?php echo str_pad($intCont, 2, '0', STR_PAD_LEFT); ?></div>
				<?php
			}
			?>
		</div>
		<?php
	}
	?>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-offset-1 col-sm-8 col-md-offset-2 col-md-6">
		<h3>Total do Jogo: <span class="label label-default total">0,00</span></h3>
	</div>
</div>

<div class="row">
	<div class="col-xs-offset-4 col-xs-2 col-sm-offset-4 col-sm-2 col-md-offset-5 col-md-2">
		<a class="btn btn-default jogar" href="#" role="button">Jogar</a>
	</div>
</div>