<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoaddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('autoaddresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('belongs_to');
			$table->string('company');
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->string('country');
			$table->string('address1');
			$table->string('address2');
			$table->string('city');
			$table->string('postcode');
			$table->string('state');
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
		Schema::drop('autoaddresses');
	}

}
