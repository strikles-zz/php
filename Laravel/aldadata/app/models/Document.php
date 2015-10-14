<?php

class Document extends \Eloquent {

	use SoftDeletingTrait;

	protected $protected = ['id'];
	//protected $fillable = ['name'];

	// public function venue() {
	// 	return $this->belongsTo('Address');
	// }

}