<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableSubjectUniversity extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subject_university',function($table){
			$table->integer('subject_id');
			$table->integer('university_id');
			//$table->foreign('degree_id')->references('id')->on('degrees');
			//$table->foreign('university_id')->references('id')->on('universities');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subject_university');
	}

}