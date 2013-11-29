<?php

use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books',function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('author');
			$table->string('desc',500);
			$table->string('image');
			$table->integer('subject_id');
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
		Schema::drop('books');
	}

}