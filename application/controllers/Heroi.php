<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Heroi extends CI_Controller {

	public function index()
	{
		$this->template->set('menu','list');
		$this->template->load('template','heroi/lista');
	}
}
