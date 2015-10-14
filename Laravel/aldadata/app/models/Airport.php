<?php

class Airport extends \Eloquent {

	use SoftDeletingTrait;

	protected $protected = ['id'];
	protected $fillable = ['name'];

	public function address() {
		return $this->belongsTo('Address');
	}

}