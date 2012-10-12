<?php

class Create_Scores_Table {    

    public function up()
    {
        Schema::create('scores', function($table) {
            $table->increments('id');
            $table->integer('score');
            $table->integer('quiz_id')->unsigned();

            $table
                ->foreign('quiz_id')
                ->references('id')
                ->on('quizzes')
                ->on_delete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('scores');
    }

}