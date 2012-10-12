<?php

class Quiz extends Eloquent 
{
	public function questions()
	{
		return $this->has_many('Question');
	}
}