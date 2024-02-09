<?php defined('SYSPATH') or die('No direct script access.');

class Controller_PaymentSystemAPI extends Controller
{
	public function before()
	{
		if (!Auth::instance()->logged_in()) {
			$this->redirect('auth/login');
		}
		parent::before();
	}

	public function action_getPaymentSystemList()
	{
		$systems = ORM::factory('PaymentSystem')->find_all_as_array();
		$this->response->json($systems);
	}

	public function action_savePaymentSystem()
	{
		$json = $this->request->json();

		// if isset id we get entity from DB if not we should create a new one
		$paymentSystem = $json->id ? ORM::factory('PaymentSystem', $json->id) : new Model_PaymentSystem();

		//if we should update it, also need check that entity is exists
		if ($json->id && !$paymentSystem->loaded()) {
			$this->response->json([
				'id' => 'Payment system not found'
			], 422);
			return;
		}


		try {
			$paymentSystem->title = $json->title;
			$paymentSystem->save();
		} catch (ORM_Validation_Exception $e) {
			$this->response->json($e->errors_as_array(), 422);
		}

	}

}
