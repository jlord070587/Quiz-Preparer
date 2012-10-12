<?php

class Change_Title_Type_To_Text_On_Questions_Table {    

	public function up()
    {
    	Schema::table('questions', function($table) {
			$table->drop_column('title');
		});

		Schema::table('questions', function($table) {
			$table->text('title');
		});

    }    

	public function down()
    {
    	Schema::table('questions', function($table) {
			$table->drop_column('title');
		});

		Schema::table('questions', function($table) {
			$table->string('title');
		});

    }

}