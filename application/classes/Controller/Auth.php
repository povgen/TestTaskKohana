<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Template
{

	public $template = 'pages/login';
	public function action_login()
	{
		if (Auth::instance()->logged_in()) {
			$this->redirect('welcome/index');
			return;
		}

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

		$this->redirect('PaymentSystem/index');
	}

	public function action_logout()
	{
		Auth::instance()->logout();
		$this->redirect('auth/login');
	}

}
