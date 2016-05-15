<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orgs', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('website');
			$table->string('slug');
			$table->string('gnz_code');
			$table->string('type')->default('contest');
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
		Schema::drop('orgs');
	}
}
