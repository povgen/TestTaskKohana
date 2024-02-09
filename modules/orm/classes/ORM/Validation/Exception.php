<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * ORM Validation exceptions.
 *
 * @package    Kohana/ORM
 * @author     Kohana Team
 * @copyright  (c) 2008-2009 Kohana Team
 * @license    http://kohanaphp.com/license
 */
class ORM_Validation_Exception extends Kohana_ORM_Validation_Exception
{
	public function errors_as_array()
	{
		$errors = [];
		foreach ($this->errors() as $key => $val) {
			$errors = array_merge($errors, $this->errors($key));
		}
		return $errors;
	}
}
