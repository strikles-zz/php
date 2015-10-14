<?php

class Service extends \Eloquent {
	use SoftDeletingTrait;

	protected $table = 'services';
	protected $guarded = ['id'];

	protected $dates = ['deleted_at'];

	public function category() {
		return $this->belongsTo('ServiceCategory');
	}

	public function status() {
		return $this->belongsTo('Status');
	}

	public function period() {
		return $this->belongsTo('Period', 'invoice_periods_id', 'id');
	}
}