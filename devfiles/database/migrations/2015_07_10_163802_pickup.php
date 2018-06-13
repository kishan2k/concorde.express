<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pickup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pickup', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('booked_by');
			$table->string('collection_confirmation_number');
			$table->string('company');
			$table->string('name');
			$table->string('address');
			$table->string('address1');
			$table->string('city');
			$table->string('postcode');
			$table->string('country');
			$table->string('phone');
			$table->string('peices');
			$table->string('location');
			$table->string('collection_date');
			$table->string('collection_ready_time');
			$table->string('collection_close_time');			
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
		Schema::drop('pickup');
	}

}

