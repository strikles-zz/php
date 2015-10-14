<?php

class Subscription extends \Eloquent {
	use SoftDeletingTrait;

	protected $table = 'subscriptions';
	protected $guarded = ['id'];
	protected $dates = ['deleted_at'];

	public function company() {
		return $this->belongsTo('Company');
	}

	public function service() {
		return $this->belongsTo('Service');
	}

	public function status() {
		return $this->belongsTo('Status');
	}

	public function period() {
		return $this->belongsTo('Period', 'invoice_periods_id', 'id');
	}
}