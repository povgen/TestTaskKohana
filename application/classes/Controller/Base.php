<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller_Template
{

	public $template = 'layouts/base';

	public function before()
	{
		if (!Auth::instance()->logged_in()) {
			$this->redirect('auth/login');
		}
		parent::before();
	}

}
