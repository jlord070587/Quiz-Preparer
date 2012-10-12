<?php

class Make_User_Id_Unsigned_On_Questions_Table {    

	public function up()
    {
    	Schema::table('questions', function($table) {
			$table->drop_column('quiz_id');
		});

		Schema::table('questions', function($table) {
			$table->integer('quiz_id')->unsigned();
		});

    }    

	public function down()
    {
		Schema::table('questions', function($table) {
			$table->drop_column('quiz_id');
		});

		Schema::table('questions', function($table) {
			$table->integer('quiz_id');
		});
    }

}