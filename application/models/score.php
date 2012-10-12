<?php

class Score extends Eloquent 
{
	public static $timestamps = false;

	public function quiz()
	{
		return $this->belong_to('Quiz');
	}
}