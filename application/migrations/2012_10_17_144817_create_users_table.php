<?php

class Create_Users_Table {

	public function up()
    {
			Schema::create('users', function($table) {
				$table->increments('id');
				$table->string('username');
				$table->string('password');
			});

			$user = new User;
			$user->username = 'admin';
			$user->password = Hash::make('quiz-preparer');
			$user->save();
    }

	public function down()
    {
			Schema::drop('users');
    }

}