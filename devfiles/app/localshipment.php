<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class localshipment extends Model {

	protected $table = 'localshipments';

	protected $fillable = [

		'booked_by',
		'status',
		'shipment_booking_date',
		'tracking_url',
		'shipment_dimension_L',
		'shipment_dimension_W',
		'shipment_dimension_H',
		'shipment_customs_value',
		'shipment_weight',
		'sender_company',
		'sender_state',
		'sender_name',
		'sender_email',
		'sender_phone',
		'sender_country',
		'sender_address1',
		'sender_address2',
		'sender_city',
		'sender_postcode',
		'rec_company',
		'rec_name',
		'rec_email',
		'rec_phone',
		'rec_country',
		'rec_address1',
		'rec_address2',
		'rec_state',
		'rec_city',
		'rec_postcode',
		'shipment_provider',
		'shipment_class',
		'shipment_cost',
		'p_number',
		'label_url',
		'tracking_number',
		'customs_url',
		'shipment_contents',
		'shipment_contents_type',
		'reference',
	];

}
