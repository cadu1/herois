<?php

$config['menu'] = [
	[
		'nome' => 'Heróis',
		'ctrl' => 'Heroi',
		'submenu' => [
			[ 'nome' => 'Lista', 'href' => '' ],
			[ 'nome' => 'Cadastro', 'href' => 'heroi/form' ]
		]
	],
	[
		'nome' => 'Tipos',
		'ctrl' => 'Tipo',
		'submenu' => [
			[ 'nome' => 'Lista', 'href' => 'tipo' ],
			[ 'nome' => 'Cadastro', 'href' => 'tipo/form' ]
		]
	],
	[
		'nome' => 'Especialidade',
		'ctrl' => 'Especialidade',
		'submenu' => [
			[ 'nome' => 'Lista', 'href' => 'especialidade' ],
			[ 'nome' => 'Cadastro', 'href' => 'especialidade/form' ]
		],
	]
];