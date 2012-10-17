<?php

class Home_Controller extends Base_Controller {
	public $restful = true;

	// Login
	public function get_index()
	{
		return View::make('home.index')
			->with('title', 'Login');
	}

	public function get_logout()
	{
		Auth::logout();
		return Redirect::to('login');
	}

}