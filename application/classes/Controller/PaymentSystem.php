<?php defined('SYSPATH') or die('No direct script access.');

class Controller_PaymentSystem extends Controller_Base
{
	public function action_index()
	{
		$this->template->title = 'Payment systems';
		$this->template->content = View::factory('pages/paymentSystems');
	}
}
