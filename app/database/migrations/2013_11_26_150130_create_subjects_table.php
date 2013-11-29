<?php

use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjects',function($table){
			$table->increments('id');
			$table->string('name');
			$table->integer('degree_id');
			$table->timestamps();
			//$table->foreign('degree_id')->references('id')->on('degrees');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subjects');
	}

}