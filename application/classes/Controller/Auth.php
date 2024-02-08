<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Template {

	public $template = 'pages/login';
	public function action_index()
	{
		if (!$this->request->post('submit')) {
			return;
		}

		$login = $this->request->post('login');
		$password = $this->request->post('password');
		$remember =  $this->request->post('is_remember') === 'on';

		if (!Auth::instance()->login($login, $password, $remember)) {
			$this->template->error = 'Sorry, your password or login was incorrect. Please double-check your credentials.';
			return;
		}
		//todo redirect to welcome
	}

	public function action_logout()
	{
		Auth::instance()->logout();
		//todo redirect to login page
	}

}
