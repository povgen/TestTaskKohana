<?php defined('SYSPATH') or die('No direct script access.');

class Model_PaymentSystem extends ORM
{
	protected $_table_name = 'payment_systems';
	public function rules()
	{
		return [
			'title' => [
				['not_empty'],
				['max_length', [':value', 100]],
			],
		];
	}
}
