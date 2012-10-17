<?php

class User extends Eloquent
{
	public static $timestamps = false;

	public static $rules = array(
		'username' => 'required',
		'password' => 'required'
	);

	public static function validate($input)
	{
		$v = Validator::make($input, static::$rules);

		return $v->fails()
			? $v->errors
			: false;
	}
}