<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAircraftTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('aircraft', function (Blueprint $table) {
			$table->increments('id');
			$table->string('rego')->unique();
			$table->string('contest_id');
			$table->string('manufacturer');
			$table->string('model');
			$table->string('serial');
			$table->string('mctow');
			$table->string('class');
			$table->string('transponder');
			$table->string('trailer');
			$table->string('owner');
			$table->date('trailer_wof_due');
			$table->date('trailer_rego_due');
			$table->integer('seats')->default(1);
			$table->boolean('towplane')->default(0);
			$table->boolean('self_launcher')->default(0);
			$table->boolean('sustainer')->default(0);
			$table->boolean('retractable')->default(0);
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
		Schema::drop('aircraft');
	}
}
