<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shipments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('status');
			$table->string('shipment_weight');
			$table->string('shipment_dimension_L');
			$table->string('shipment_dimension_W');
			$table->string('shipment_dimension_H');
			$table->string('shipment_customs_value');
			$table->string('p_number');
			$table->string('shipment_class');
			$table->string('shipment_cost_us');
			$table->string('shipment_cost_client');
			$table->string('sender_name');
			$table->string('sender_company');
			$table->string('sender_phone');
			$table->string('sender_email');
			$table->string('sender_country');
			$table->string('sender_address1');
			$table->string('sender_address2');
			$table->string('sender_city');
			$table->string('sender_postcode');
			$table->string('sender_state');
			$table->string('rec_name');
			$table->string('rec_company');
			$table->string('rec_phone');
			$table->string('rec_email');
			$table->string('rec_country');
			$table->string('rec_address1');
			$table->string('rec_address2');
			$table->string('rec_city');
			$table->string('rec_postcode');
			$table->string('rec_state');
			$table->string('shipment_booking_date');
			$table->string('service_type');
			$table->string('package_type');
			$table->string('shipment_contents');
			$table->string('booked_by');
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
		Schema::drop('shipments');
	}

}
