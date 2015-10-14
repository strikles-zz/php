<?php

class EmailUsage extends \Eloquent {

	use SoftDeletingTrait;

	protected $table = 'emailusage';
	protected $guarded = ['id'];
	public $timestamps = false;

	//protected $dates = ['deleted_at'];

	public function subscription() {
		return $this->belongsTo('Subscription');
	}
}
