<?php

class Add_Slug_To_Quizzes_Table {    

	public function up()
    {
		Schema::table('quizzes', function($table) {
			$table->string('slug');
		});

    }    

	public function down()
    {
		Schema::table('quizzes', function($table) {
			$table->drop_column('slug');
		});

    }

}