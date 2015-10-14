<?php

class Hotel extends \Eloquent {

	use SoftDeletingTrait;

	protected $protected = ['id'];
	protected $fillable = ['name'];

	public function address() {
		return $this->belongsTo('Address');
	}

	public function airports() {
		return $this->belongsTo('Airport');
	}
}