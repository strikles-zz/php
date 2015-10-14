<?php

class Hospitality extends \Eloquent {

	use SoftDeletingTrait;

	protected $protected = ['id'];
	//protected $fillable = ['name', 'references', 'notes'];
	protected $table = 'hospitality_details';

	// public function airport() {
	// 	return $this->belongsTo('Airport');
	// }
	public function contacts() {
		return $this->belongsTo('Contact');
	}

	public function first_hotel_option() {
		//return $this->hasOne('Hotel','id', 'first_hotel_option_id');
		return $this->belongsTo('Hotel','first_hotel_option_id', 'id');
	}

	public function second_hotel_option() {
		return $this->belongsTo('Hotel', 'second_hotel_option_id', 'id');
	}

	public function venue() {
		return $this->belongsTo('Venue', 'venue_id', 'id');
		return $this->belongsTo('Venue');
	}

	public function airports() {
		return $this->belongsTo('Airport');
	}

	public function getNameAttribute() {
		return $this->id;
	}
}