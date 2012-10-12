<?php

class Question extends Eloquent 
{
	public static $timestamps = false;
	public static $hidden = array('quiz_id');

	public function quiz()
	{
		return $this->belongs_to('Quiz');
	}
}