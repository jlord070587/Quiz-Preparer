<?php

class Helpers {
	public static function dashSeparatedToArray($questions, Array $keys)
	{
	    foreach($questions as &$question) {
	        foreach($keys as $key) {
	            if ( $question->$key !== '' ) {
	                $question->$key = preg_split('/^ ?- ?/m', $question->$key, 0, PREG_SPLIT_NO_EMPTY);
	            }
	        }
	    }

	    return $questions;
	}
}

