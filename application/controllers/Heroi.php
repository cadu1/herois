<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Heroi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('heroi_model');
	}

	public function index()
	{
		$arrParam = [
			'herois' => $this->heroi_model->listaHeroi()
		];

		$this->template->set('menu','list');
		$this->template->load('template','heroi/lista', $arrParam);
	}
}
