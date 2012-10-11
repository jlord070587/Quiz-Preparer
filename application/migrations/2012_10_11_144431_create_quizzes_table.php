<?php

class Create_Quizzes_Table {    

	public function up()
    {
		Schema::create('quizzes', function($table) {
			$table->increments('id');
			$table->string('title');
			$table->string('instructor')->nullable();
			$table->string('courseUrl');
			$table->string('quizUrl')->nullable();
			$table->timestamps();
		});
    }    

	public function down()
    {
		Schema::drop('quizzes');

    }

}