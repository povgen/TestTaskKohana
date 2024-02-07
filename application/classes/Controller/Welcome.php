<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {

	public $template = 'layouts/base';
	public function action_index()
	{
		$this->response->body('hello, world!');
	}

	public function action_test()
	{
//		var_dump(Auth::instance()->hash('123'));
//		$res = Auth::instance()->login('admin', '123');
//		$res = Auth::instance()->get_user();
//		var_dump($res);
//		die();

//		$layout =

		$this->template->content = View::factory('pages/login')
			->set('places', array('Rome', 'Paris', 'London', 'New York', 'Tokyo'));

		// The view will have $places and $user variables
//		$this->response->body($view);

	}

} // End Welcome
