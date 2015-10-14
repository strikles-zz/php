<?php

class Strippenkaart extends \Eloquent {
	use SoftDeletingTrait;

	protected $table = 'strippenkaarten';
	protected $guarded = ['id'];
	protected $dates = ['deleted_at'];

	public function company() {
		return $this->belongsTo('Company');
	}

	public function getMinutesLeftAttribute() {

		$company_id = $this->attributes['company_id'];
		$worklog_hours = Werklog::selectRaw('SUM(minutes) AS minutes')
			->where('company_id', $company_id)
			->where('strippenkaarten_id', $this->id)
			->first();

		$minutes_left = 60 * $this->hours - ( $worklog_hours->minutes ? : 0);

		//Debugbar::info($worklog_hours);
		return $minutes_left;
	}
}