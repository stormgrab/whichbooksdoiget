<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPrimaryKeyPivotTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book_university', function($table) {
			$table->primary(array('book_id', 'university_id'));
		});
		Schema::table('degree_university',function($table){
			$table->primary(array('degree_id', 'university_id'));
		});
		Schema::table('subject_university',function($table){
			$table->primary(array('subject_id', 'university_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book_university', function($table) {
			$table->dropPrimary(array('book_id', 'university_id'));
		});
		Schema::table('degree_university',function($table){
			$table->dropPrimary(array('degree_id', 'university_id'));
		});
		Schema::table('subject_university',function($table){
			$table->dropPrimary(array('subject_id', 'university_id'));
		});
	}

}
