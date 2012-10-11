<?php

class Create_Questions_Table {    

	public function up()
    {
		Schema::create('questions', function($table) {
			$table->increments('id');
			$table->integer('quiz_id');
			$table->string('title');
			$table->string('type');
			$table->text('description');
			$table->text('answer');
			$table->text('choices');
			$table->text('accept');
			$table->text('guess');
			$table->text('notes');
		});
    }    

	public function down()
    {
		Schema::drop('questions');

    }

}