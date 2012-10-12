<?php

class Add_Foreign_Key_To_Questions_Table {    

	public function up()
    {
		Schema::table('questions', function($table) 
		{
			$table->engine = 'InnoDB';
			
			$table
				->foreign('quiz_id')
				->references('id')
				->on('quizzes')
				->on_delete('cascade');
		});
    }    

	public function down()
    {
		Schema::table('questions', function($table) {
			$table->drop_foreign('questions_quiz_id_foreign');
		});

    }

}